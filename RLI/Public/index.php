<?php

require_once '../controllers/logincontroller.php';

$request_url = $_SERVER['REQUEST_URI'];

// var_dump($request_url);
$url = "";
// on récupère toute l'url passée dans le param get 'url'
if(isset($_GET['url'])) $url = $_GET['url'];



// var_dump($url);

$parametres = explode('/', $url);
// var_dump($parametres);

switch($parametres[0]) {
    case 'chat':
        echo 'miaou';
        if(isset($parametres[1]) && !empty($parametres))
            for($i = 0; $i < $parametres[1]; $i++) echo "miaou $i<br>";
        break;
    case 'chien':
        echo 'waf';
        break;
    case 'login':
        $loginController = new LoginController();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginController->handlelogin();
        } else {
            $loginController->showloginform();
        }
        break;
    case 'write':
        $apiController = "";

    default:
        // Appeler le controleur avec la main page
        echo 'animal non reconnu trigger une 404';
    

}