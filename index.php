<?php
    require_once 'vendor/autoload.php';
    require_once "lib/Dropbox/autoload.php";
	require_once "config/config.php";

    use \Dropbox as dbx;

    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('twig');
    $twig = new Twig_Environment($loader, array(
        'cache' => 'twigcache',
    ));

	$path = STARTUP_PATH;
	
	if(!empty($_GET['path'])) {
		$path = $_GET['path'];
	}

	$dbxClient = new dbx\Client(AUTH_KEY, "PHP-Example/1.0");
	
	$folderMetadata = $dbxClient->getMetadataWithChildren($path);

	echo $twig->render('index.twig', array(
		'title' => DROPBOX_NAME,
		'path' => $path,
		'meta' => $folderMetadata,
		'startup' => STARTUP_PATH
	));
?>