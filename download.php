<?php 
	$file1 = '/media/DATA1/'.$_GET["file"];
	$file2 = '/media/DATA2/'.$_GET["file"];

	if (file_exists($file1))
	{
		header('Content-Description: File Transfer');

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
    		header('Content-Type: ' . finfo_file($finfo, $file1));
    		finfo_close($finfo);

		header('Content-Disposition: attachment; filename="'.basename($file1).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file1));
		readfile($file1);
	}
	elseif (file_exists($file2))
	{
		header('Content-Description: File Transfer');

		$finfo = finfo_open(FILEINFO_MIME_TYPE);
    		header('Content-Type: ' . finfo_file($finfo, $file2));
    		finfo_close($finfo);

		header('Content-Disposition: attachment; filename="'.basename($file2).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file2));
		readfile($file2);
	}

?>
