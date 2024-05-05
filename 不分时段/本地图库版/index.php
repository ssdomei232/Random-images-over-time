<?php
$mode = isset($_GET['m']) ? str_replace("//", "/", $_GET['m']) : ''; 
// 指定图片存储的文件夹路径
$baseURL = 'https://api.mmeiblog.cn/rd/pc/luoxiaohei/';
$folderPath = 'img/';

// 判断&随机部分
$files = scandir($folderPath);
$images = array_diff($files, array('.', '..'));
if (empty($images)) {
    echo "文件夹中没有图片。";
    exit;
}
$randomImage = $images[array_rand($images)];
$imageUrl = $baseURL . $folderPath . $randomImage;
$push_path = $folderPath . $randomImage;

// 返还数据
if (empty($mode)) {
    header('Content-Type: image/jpeg');
    header('Content-Length: ' . filesize($push_path));
    readfile($push_path);
    exit;
}
elseif ($mode == 'json') {
    header('Content-Type: application/json');
    echo json_encode(['image_url' => $imageUrl,'mode' => 'json']);
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