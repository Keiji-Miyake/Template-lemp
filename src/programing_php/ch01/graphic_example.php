<?php
if (isset($_GET['message'])) {
    // フォントと画像を読み込み、テキストの横幅を計算します。
    $font = "./azuki.ttf";
    $size = 12;
    $image = imagecreatefrompng("button.png");
    $tsize = imagettfbbox($size, 0, $font, $_GET['message']);

    // 中央を求める
    $dx = abs($tsize[2] - $tsize[0]);
    $dy = abs($tsize[5] - $tsize[3]);
    $x = (imagesx($image) - $dx) / 2;
    $y = (imagesy($image) - $dy) / 2 + $dy;

    // テキストを描画
    $im = imagecreatetruecolor(300, 150);
    $black = imagecolorallocate($im, 0, 0, 0);
    imagettftext($image, $size, 0, $x, $y, $black, $font, $_GET['message']);

    // 画像を返します。
    header("Content-type: image/png");
    imagepng($image);

    // 後始末
    imagedestroy($image);
    exit;
} ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        Enter message to appear on button:
        <input type="text" name="message"><br>
        <input type="submit" value="Create Button">
    </form>
</body>
</html>
