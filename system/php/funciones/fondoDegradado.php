<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

header("Content-Type: image/png");

function elColor($color)	{
	$red = 256 * 256;
	$green = 256;
	$blue = 1;
	return ($red * $color[0]) + ($green * $color[1]) + ($blue * $color[2]);
}

function losColores($arrayColores)	{
	$devolver = array();
	for ($i = 0; $i < count($arrayColores); $i ++)
		$devolver[$i] = elColor($arrayColores[$i]);
	return $devolver;
}

function desglose($fondo)	{
	return array(hexdec($fondo[1]),hexdec($fondo[2]),hexdec($fondo[3]));
}

function rgbColor($fondo)	{
	$red = 100;
	$green = 100;
	$blue = 100;
	if( eregi( "([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})", $fondo, $retornar ) )
		return $retornar;
	else
		return array($fondo, $red, $green, $blue);
}

function transitar($color1, $color2, $pasos) {
	$devolver = array();
	$pasos--;
	$devolver[0] = desglose(rgbColor($color1));
	$devolver[$pasos] = desglose(rgbColor($color2));
	$rIni = $devolver[0][0];
	$gIni = $devolver[0][1];
	$bIni = $devolver[0][2];

	$rFin = $devolver[$pasos][0];
	$gFin = $devolver[$pasos][1];
	$bFin = $devolver[$pasos][2];

	$rMed = ($rFin - $rIni) / $pasos;
	$gMed = ($gFin - $gIni) / $pasos;
	$bMed = ($bFin - $bIni) / $pasos;

	for ($i = 1; $i < $pasos; $i ++)	{
		$devolver[$i] = array($rIni + round($rMed * $i), $gIni + round($gMed * $i), $bIni + round($bMed * $i));
	}
	return losColores($devolver);
}

if (isset($_GET["altura"])) $altura = $_GET["altura"];
else $altura = 2;
$anchura = 1;
if (isset($_GET["color1"])) $color1 = $_GET["color1"];
else $color1 = "000123";
if (isset($_GET["color2"])) $color2 = $_GET["color2"];
else $color2 = "ffabcd";

$fondo1 = desglose(rgbColor($color1));
$fondo2 = desglose(rgbColor($color2));
$transito = transitar($color1, $color2, $altura);

//$destino = imagecreate($anchura, $altura);
$destino = imageCreateTrueColor($anchura, $altura);
for ($i = 0; $i < count($transito); $i ++)
	imagesetpixel($destino, 0, $i, $transito[$i]);

	@imagepng($destino);
	
	imagedestroy($destino);
?>