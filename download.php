<?php 
	$file = '/home/pi/files/'.$_GET["file"];

	if (file_exists($file)) {
		header('Content-Description: File Transfer');

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
    		header('Content-Type: ' . finfo_file($finfo, $file));
    		finfo_close($finfo);

		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
	}

?>
