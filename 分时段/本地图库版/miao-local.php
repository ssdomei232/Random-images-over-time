<?php
// 早晨图片的文件夹路径
$dawnImageFolder = 'dawn_images/';

// 上午图片的文件夹路径
$morningImageFolder = 'morning_images/';

// 中午图片的文件夹路径
$noonImageFolder = 'noon_images/';

// 傍晚图片的文件夹路径
$duskImageFolder = 'dusknoon_images/';

// 晚上图片的文件夹路径
$eveningImageFolder = 'evening_images/';

// 获取当前小时
$currentHour = date('H');

// 根据当前时间选择图片路径
if ($currentHour >= 6 && $currentHour < 8) {
    $randomImage = $$dawnImageFolder . getRandomImage($$dawnImageFolder);
} elseif ($currentHour >= 8 && $currentHour < 11) {
    $randomImage = $morningImageFolder . getRandomImage($morningImageFolder);
} elseif ($currentHour >= 11 && $currentHour < 16) {
    $randomImage = $noonImageFolder . getRandomImage($noonImageFolder);
} elseif ($currentHour >= 16 && $currentHour < 18) {
    $randomImage = $duskImageFolder . getRandomImage($duskImageFolderder);
} else {
    $randomImage = $eveningImageFolder . getRandomImage($eveningImageFolder);
}

// 返回图片路径
echo $randomImage;
header('Location: ' . $randomImage);

// 从指定文件夹中随机选择一张图片
function getRandomImage($folder) {
    $images = glob($folder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    $randomImage = $images[array_rand($images)];
    return basename($randomImage);
}
?>