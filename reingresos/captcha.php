<?php
session_start(); //inicializa la opcion manejo de variables de sesion

  function drawElipse($image){
        for($i=0;$i<5;$i++){
            // choose a color for the ellipse
            $red         = rand(0,255);//escoge color escala RGB con aleatorios
            $green       = rand(0,255);
            $blue        = rand(0,255);
            //imagecolorallocate:devuelve un identificador de color en RGB
            $col_ellipse = imagecolorallocate($image, $red, $green, $blue);
            // draw the ellipse coordenadas de la elipse
            $cx = rand(50,150);
            $cy = rand(40,150);
            $cw = rand(30,150);
            $ch = rand(20,150);
            //imageelipse : dibuja una elipse
            imageellipse($image, $cx, $cy, $cw, $ch, $col_ellipse);
        }

        foreach (range('A', 'Z') as $letter) {
            $red    = rand(0,155);
            $green  = rand(0,155);
            $blue   = rand(0,155);
            $col_letras  = imagecolorallocate($image, $red, $green, $blue);
            $font_size    = rand(1,6);
            $x      = rand(0,200);
            $y      = rand(0,100);
            //dibuja el caracter
            imagechar($image, $font_size, $x, $y, $letter, $col_letras);
        }

        foreach (range('0', '9') as $letter) {
            $red    = rand(0,155);
            $green  = rand(0,155);
            $blue   = rand(0,155);
            $col_numeros  = imagecolorallocate($image, $red, $green, $blue);
            $font_size    = 1;
            $x      = rand(0,200);
            $y      = rand(0,100);
            imagechar($image, $font_size, $x, $y, $letter, $col_numeros);
        }

  }




function randomText($length,$type)
{
    switch ($type)
		{
		case 0: $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		break;
		case 1: $pattern = 'abcdefghijklmnopqrstuvwxyz';
		break;
		case 2: $pattern = '1234567890';
		break;
		case 3: $pattern = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';
		break;
		case 4: $pattern = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		break;
		}

    $key="";
		for($i=0;$i<$length;$i++)
		{
      		$key .= $pattern{mt_rand(0,strlen($pattern)-1)};
    	}
    	return $key;
}

$bgs= array("bgcaptcha.gif", "bgcaptcha2.gif", "bgcaptcha3.gif", "bgcaptcha4.gif");

$_SESSION['tmptxt'] = randomText(6,4);
$captcha = imagecreatefromgif("img_captcha/bgcaptcha5.gif");
//$captcha = imagecreatefromgif($bgs[rand(0,( count($bgs)-1 ) ) ]);
drawElipse($captcha);


/*
Añadimos algunas lineas a nuestra imagen para dificultar la tarea a los robots
*/
$line = imagecolorallocate($captcha,233,239,239);
imageline($captcha,mt_rand(0,100),0,39,29,$line);
imageline($captcha,40,0,64,29,$line);


$colText = imagecolorallocate($captcha, 0, 0, 0);
imagestring($captcha, 5, 16, 7, $_SESSION['tmptxt'], $colText);
header("Content-type: image/gif"); // Vamos a mostrar un gif Imprimir la imagen al navegador (Output the image to browser)
imagegif($captcha);  //Exportar la imagen al navegador o a un fichero

imagedestroy($captcha); // Free from memory
?>