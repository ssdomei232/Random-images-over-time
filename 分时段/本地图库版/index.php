<?php
// 获取模式参数
$mode = isset($_GET['m']) ? str_replace("//", "/", $_GET['m']) : '';  
// 图片目录
$baseURL = 'http(s)://example.net/';
$folderPath = 'img/';
// 定义时间段和文件夹映射
$timeFolders = [
    ['start' => 6, 'end' => 8, 'folder' => 'dawn'],
    ['start' => 8, 'end' => 11, 'folder' => 'morning'],
    ['start' => 11, 'end' => 16, 'folder' => 'noon'],
    ['start' => 16, 'end' => 18, 'folder' => 'dusk'],
    ['start' => 18, 'end' => 24, 'folder' => 'evening'],
    ['start' => 0, 'end' => 6, 'folder' => 'evening'] 
]; 
// 获取时间
$currentHour = date('G'); 

// 判定&随机部分
$selectedFolder = null; 
foreach ($timeFolders as $timeFrame) {
    if ($currentHour >= $timeFrame['start'] || ($timeFrame['end'] == 0 && $currentHour < 6)) { 
        $selectedFolder = $timeFrame['folder'];
        break;
    }
} 
if (!$selectedFolder) {
    die("无法识别当前时间段的图片文件夹。");
}
$folderPath = $folderPath . $selectedFolder;
$images = [];
if ($handle = opendir($folderPath)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $images[] = $entry;
        }
    }
    closedir($handle);
} else {
    die("无法打开目录: " . $folderPath);
}

// 拼接路径
if (count($images) > 0) {
    $randomImage = $images[array_rand($images)];
    $imageUrl = $baseURL . $folderPath . '/' . $randomImage;  
    $push_path = $folderPath . '/' . $randomImage;
} else {
    echo "ERROR,NO IMAGE";
}

// 返还数据
if (empty($mode)) {
    header('Content-Type: image/jpeg');
    header('Content-Length: ' . filesize($push_path));
    readfile($push_path);
    exit;
}
elseif ($mode == 'json') {
    header('Content-Type: application/json');
    echo json_encode(['image_url' => $imageUrl,'period' => $selectedFolder,'now' => date('H'),'mode' => 'json']);
    exit;
}
elseif ($mode == 'redirect') {
    header('Location: ' . $imageUrl);
    exit;
}
else {
    header('Location: ' . $imageUrl);
    exit;
}
?>