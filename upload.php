<?php
	$uploaddir = '/home/pi/files/';
	$uploadfile = $uploaddir . basename($_FILES['file']['name']);

	move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

	header('Location: https://lapota.francoisdescamps.org/cloud.php');
?>
