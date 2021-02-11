<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	header('Content-Type: image/jpeg');	

	$img_f=ImageCreateFromJpeg($foto);//crea una variable para manejar la imagen
	$prop=$tam/imagesx($img_f);//calcula proporción
	$tam_x=$prop*(imagesx($img_f));//recalcula los nuevos tamaños
	$tam_y=$prop*(imagesy($img_f));
	$img_d=ImageCreatetruecolor($tam_x,$tam_y);//crea imagen
	$img_entre = imageinterlace ( $img_d, 0); // con esto saco el progresivo de la imagen jpg
//	ImageCopyResized($img_d,$img_f,0,0,0,0,$tam_x,$tam_y,imagesx($img_f),imagesy($img_f));//copia cambiando de tamaño
	imagecopyresampled ($img_d,$img_f,0,0,0,0,$tam_x,$tam_y,imagesx($img_f),imagesy($img_f));
	imagejpeg($img_d);//muestra
?>
