<?php

	require_once "lib/Dropbox/autoload.php";
    require_once "config/config.php";
    
	use \Dropbox as dbx;
	
	$path = STARTUP_PATH;
	
	if(!empty($_GET['path'])) {
		$path = $_GET['path'];
	}

	$dbxClient = new dbx\Client(AUTH_KEY, "PHP-Example/1.0");
	
	$folderMetadata = $dbxClient->getMetadataWithChildren($path);

	echo '
	<html>
		<head>
			<link rel="stylesheet" href="css/bootstrap.min.css">
            
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		
            <script>
                (function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,"script","https://www.google-analytics.com/analytics.js","ga");

                ga("create", "UA-50355891-2", "auto");
                ga("send", "pageview");

            </script>
        </head>
		<body>
			<br/>
			<br/>
			<center><h1>' . DROPBOX_NAME . '</h1></center>
			<br/>
			<br/>
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
			<div class="table table-responsive table-striped">
				<table class="table" style="width:100%">
					<thead>
						<th>Pfad</th>
					</thead>
					<tbody>
	';
                        if($folderMetadata["path"] != "/")
                        {
						    echo '<tr>';
						    echo '<td>';
						    echo '<span class="glyphicon glyphicon-folder-close" style="padding-right: 15px; color: transparent;"></span>';
						    echo '<a href="index.php?path=' . $path . "/.." . '">...</a>';
						    echo '</td>';
						    echo '</tr>';
                        }
						
						foreach($folderMetadata["contents"] as $content) {
							echo '<tr>';
							echo '<td>';
							if($content["is_dir"] == true) {
								echo '<span class="glyphicon glyphicon-folder-close" style="padding-right: 15px"></span>';
								echo '<a href="index.php?path=' . $content["path"] . '">';
							}
							else {
								echo '<span class="glyphicon glyphicon-file" style="padding-right: 15px"></span>';
								echo '<a href="download.php?path=' . $content["path"] . '">';
							}
                            echo substr($content["path"], strrpos($content["path"], '/') + 1);
							echo '</a>';
							echo '</td>';
							echo '</tr>';
						}
	echo '
					</tbody>
				</table>
			</div>
			</div>
			<div class="col-md-3">
			</div>
            <div class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <center style="margin-top: 15px">&copy; 2016 Jan Kruse</center>
                </div>
            </div>
            <script src="js/bootstrap.min.js" />
		</body>
	</html>
	';
?>