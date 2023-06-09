<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "Portfolio";
			break;
		case "/index.php":
			$CURRENT_PAGE = "Index"; 
			$PAGE_TITLE = "Portfolio";
			break;
		case "/about.php":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About Us";
			break;
		case "/contact.php":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact Us";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Welcome to my homepage!";
	}

	//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
require_once 'backend/Controller_Model/Libro.php';
require_once 'backend/Controller_Model/Usuario.php';
require_once 'backend/Controller_Model/Valoracion.php';
require_once 'backend/Controller_Model/Compra.php';
require_once 'backend/Controller_Model/Autor.php';
require_once 'backend/Controller_Model/LibroController.php';
require_once 'backend/Controller_Model/ValoracionController.php';
require_once 'backend/Controller_Model/UsuarioController.php';
require_once 'backend/Controller_Model/CompraController.php';
require_once 'backend/Controller_Model/AutorController.php';




//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('1092053652031-tsnkk1vhag6dvh2sl2fc6nks44iv47gb.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost:8080/index.php');


$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

$login_button = '';
?>