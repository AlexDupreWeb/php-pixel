<?php
namespace AdwPixel;

class Pixel {

    public static function generate() {
        header('Content-Type: image/png');

        $pixel = @imagecreatetruecolor(1, 1) or die("Impossible de créer un flux d'image GD");
        $black = imagecolorallocate($pixel, 0, 0, 0);

        imagecolortransparent($pixel, $black);
        imagepng($pixel);

        imagedestroy($pixel);
    }

}
