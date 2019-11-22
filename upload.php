<?php
	$uploaddir = '/media/DATA1/';
	$uploadfile = $uploaddir . basename($_FILES['file']['name']);

	move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

	header('Location: /cloud.php');
?>
