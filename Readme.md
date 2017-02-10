# DropboxViewProxy
&copy; 2017 Jan Kruse

## Abstract
DropboxViewProxy is a PHP and Bootstrap based Web-Application, that connects to a Dropbox using the Dropbox PHP API to view it's content.
DropboxViewProxy is though to be a lightweight user interface to traverse through a Dropbox and to download files.
It is free of trackers, pop-ups and other user-annoying stuff.

## Usage
Simply download DropboxViewProxy, run `composer install` change the values inside `config/config.php` and upload it to your webspace.

## Configuration
`AUTH_KEY`: your Dropbox OAuth Key generated in the Dropbox App Console <br/>
`DROPBOX_NAME`: the page title, that should be display on the top of each site <br/>
`STARTUP_PATH`: the folder in your Dropbox, that sould be viewed, when opening the page <br/>

## Libraries used
Dropbox PHP API v1 <br/>
Twig 1.31.0 <br/>
Bootstrap 3.3.6 <br/>
Font Awesome 4.7.0

## License
Open Source - Do whatever you want

Dropbox PHP API v1 license information included <br/>
Bootstrap 3.3.6 is licensed under MIT license