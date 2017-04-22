<?php
session_start();

//verification de la présence d'information relative à la db
if (!file_exists(DB_INI_FILE)){
    die('Informations DB manquantes');
}

//importation des routes
$routes = include 'configs/routes.php';
$default_route = $routes['default'];
$default_route_parts = explode('/', $default_route);

//vérification de la route envoyée par l'utilisateur
$method = $_SERVER['REQUEST_METHOD'];
$r = $_REQUEST['r']??$default_route_parts[1];
$a = $_REQUEST['a']??$default_route_parts[2];

//définition de du controller/class et instanciation
$controller_name = 'Controllers\\' . ucfirst($r); //nom qualifié
$controller = new $controller_name;

//exécution de la route, objet->methode, ce qu'elle retourne est affecté à $data, vue et données
$data = call_user_func([$controller, $a]);