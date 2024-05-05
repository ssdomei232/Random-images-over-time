<?php
$mode = isset($_GET['m']) ? str_replace("//", "/", $_GET['m']) : ''; 
$imageUrls = file('image_urls.txt', FILE_IGNORE_NEW_LINES);
$randomImageUrl = $imageUrls[array_rand($imageUrls)];

// 输出
if (empty($mode)) {
    header('Location: ' . $randomImageUrl);
    exit;
} elseif ($mode == 'json') {
    header('Content-Type: application/json');
    echo json_encode(['image_url' => $randomImageUrl,'mode' => 'json']);
    exit;
} else {
    header('Location: ' . $randomImageUrl);
    exit;
}
?>