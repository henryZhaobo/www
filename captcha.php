<?php
session_start();
$image=imagecreatetruecolor(100, 30);
$bgcolor=imagecolorallocate($image, rand(180,255), rand(180,255), rand(180,255));
imagefill($image, 0, 0, $bgcolor);

// strlen($str)-1)字符创最后一个字符的索引值
$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
// echo $str[rand(0,strlen($str)-1)];
$temp=null;
//把每次循环的的字符链接起来
for($i=0;$i<4;$i++){
    $temp.=$str[rand(0,strlen($str)-1)];
}
$_SESSION['captcha']=$temp;
$textcolor=imagecolorallocate($image, rand(0,50), rand(0,50), rand(0,50));
for($j=0;$j<4;$j++){
    $size=rand(10,25);
    $angle=rand(-10,10);
    $x=floor(100/4)*$j+8;
    $y=rand(20,30);
    $fontfile="GEORGIAB.TTF";
    imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $temp[$j]);
}
imagepng($image); 
?>