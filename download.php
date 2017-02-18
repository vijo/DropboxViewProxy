<?php

	require_once "lib/Dropbox/autoload.php";
	require_once "config/config.php";
    
	use \Dropbox as dbx;
	
	if(!empty($_GET['path'])) {
		$path = $_GET['path'];
		$filename = substr($path, strrpos($path, '/') + 1);
		
		$dbxClient = new dbx\Client(AUTH_KEY, "PHP-Example/1.0");
		
		$f = tmpfile();
		$metaDatas = stream_get_meta_data($f);
		$tmpFilename = $metaDatas['uri'];
		$fileMetadata = $dbxClient->getFile($path, $f);
		
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($tmpFilename));
		readfile($tmpFilename);
		fclose($f);
		exit;
	}
	
?>