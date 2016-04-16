<?php

	require_once "lib/Dropbox/autoload.php";
    require_once "config/config.php";
    
	use \Dropbox as dbx;
	
	if(!empty($_GET['path'])) {
		$path = $_GET['path'];
		$filename = substr($path, strrpos($path, '/') + 1);
		
		$dbxClient = new dbx\Client(AUTH_KEY, "PHP-Example/1.0");
		
		$f = fopen("tmpfiles/" . $filename, "w+b");
		$fileMetadata = $dbxClient->getFile($path, $f);
		fclose($f);
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename("tmpfiles/" . $filename).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize("tmpfiles/" . $filename));
		readfile("tmpfiles/" . $filename);
		exit;
	}
	
?>