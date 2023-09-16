<?php  
// 早晨图片的URL  
$dawnImageUrls = file('dawn.txt', FILE_IGNORE_NEW_LINES);  
  
// 上午图片的URL  
$morningImageUrls = file('morning.txt', FILE_IGNORE_NEW_LINES);  
  
// 中午图片的URL  
$noonImageUrls = file('noon.txt', FILE_IGNORE_NEW_LINES);  
  
// 傍晚图片的URL  
$duskImageUrls = file('dusk.txt', FILE_IGNORE_NEW_LINES);  
  
// 晚上图片的URL  
$eveningImageUrls = file('evening.txt', FILE_IGNORE_NEW_LINES);  
  
// 获取当前小时  
$currentHour = date('H');  
  
// 根据当前时间选择图片URL  
if ($currentHour >= 6 && $currentHour < 8) {  
    $randomImageUrl = $dawnImageUrls[array_rand($dawnImageUrls)];  
} elseif ($currentHour >= 8 && $currentHour < 11) {  
    $randomImageUrl = $morningImageUrls[array_rand($morningImageUrls)];
} elseif ($currentHour >= 11 && $currentHour < 16) {  
    $randomImageUrl = $noonImageUrls[array_rand($noonImageUrls)];  
} elseif ($currentHour >= 16 && $currentHour < 18) {  
    $randomImageUrl = $duskImageUrls[array_rand($duskImageUrls)];  
} else {  
    $randomImageUrl = $eveningImageUrls[array_rand($eveningImageUrls)];  
}  
  
// 返回图片URL  
echo $randomImageUrl;  
header('Location: ' . $randomImageUrl);  
?>