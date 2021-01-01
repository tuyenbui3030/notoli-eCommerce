<?php
class Captcha extends Controller {
    public function Action() {
        // $rand_num=rand(11111,99999);
        // $_SESSION['CODE']=$rand_num;
        // $layer=imagecreatetruecolor(60,30);
        // $captcha_bg=imagecolorallocate($layer,255,160,120);
        // imagefill($layer,0,0,$captcha_bg);
        // $captcha_text_color=imagecolorallocate($layer,0,0,0);
        // imagestring($layer,5,5,5,$rand_num,$captcha_text_color);
        // header('Content-Type:image/jpeg');
        // imagejpeg($layer);

        $codigoCaptcha = substr(md5(time()) ,0, 8);
        $_SESSION['CODE'] = $codigoCaptcha;
        $imagemCaptcha = imagecreatefrompng("public/assets/img/fundocaptch.png");
        $fonteCaptcha = imageloadfont("public/assets/fonts/captcha/anonymous.gdf");
        $corCaptcha = imagecolorallocate($imagemCaptcha, 0,98,215);
        imagestring($imagemCaptcha, $fonteCaptcha, 15, 5, $codigoCaptcha, $corCaptcha);
        header('Content-Type:image/png');
        imagepng($imagemCaptcha);
        imagedestroy($imagemCaptcha);
    }
    public function checkCaptcha() {
        if($_POST['register_captcha'] == $_SESSION['CODE']) {
            exit("true");
        } else {
            exit("false");
        }
    }
}
?>