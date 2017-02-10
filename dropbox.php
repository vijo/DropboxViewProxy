<?php
	require_once "lib/Dropbox/autoload.php";
	require_once "config/config.php";
    
	use \Dropbox as dbx;

    if(!empty($_GET['path'])) {
        $path = $_GET['path'];
        
        $dbxClient = new dbx\Client(AUTH_KEY, "PHP-Example/1.0");

        $link = $dbxClient->createShareableLink($path);
        
        header('Location: '.$link);
        exit;
    }	
?>