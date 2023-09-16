<?php
// 从文本文件中读取图像URL并存入数组
$imageUrls = file('image_urls.txt', FILE_IGNORE_NEW_LINES);

// 从数组中随机选择一个图像URL
$randomImageUrl = $imageUrls[array_rand($imageUrls)];

// 重定向到随机图像URL
header('Location: ' . $randomImageUrl);
exit; // 添加这一行以确保脚本终止
?>