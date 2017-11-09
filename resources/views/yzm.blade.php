<?php
//生成验证码图片
header("Content-type: image/png");
// 全数字
$yzm = new YZM(request()->id);
$verifyCode = $yzm->push(60, 4);

$im = imagecreate(58,28);    //生成图片
$black = imagecolorallocate($im, 0,0,0);     //此条及以下三条为设置的颜色
$white = imagecolorallocate($im, 238,238,235);
$gray = imagecolorallocate($im, 200,200,200);
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im,0,0,$white);     //给图片填充颜色

//将验证码绘入图片
imagestring($im, 5, 10, 8, $verifyCode, $black);    //将验证码写入到图片中

for($i=0;$i<50;$i++){
     imagesetpixel($im, rand() , rand() , $black);    //加入点状干扰素
     imagesetpixel($im, rand() , rand() , $red);
     imagesetpixel($im, rand() , rand() , $gray);
     imagearc($im, rand(), rand(), 20, 20, 75, 170, $black);    //加入弧线状干扰素
     imageline($im, rand(), rand(), rand(), rand(), $red);    //加入线条状干扰素
}
imagepng($im);
imagedestroy($im);
?>