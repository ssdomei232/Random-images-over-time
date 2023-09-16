<?php
// 指定存储图像的文件夹路径
$imageFolder = 'img/';

// 获取文件夹中所有图像文件的列表
$imageFiles = glob($imageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// 从列表中随机选择一张图像
$randomImage = $imageFiles[array_rand($imageFiles)];

// 设置适当的头部信息，指示响应是一个图像
header('Content-Type: image/jpeg');
header('Content-Length: ' . filesize($randomImage));

// 输出图像文件
readfile($randomImage);
?>