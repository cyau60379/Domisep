<?php

/**
 * MVC :
 * - index.php : identifie le routeur à appeler en fonction de l'url
 * - Contrôleur : crée les variables, élabore leurs contenus, identifie la vue et lui envoie les variables
 * - Modèle : contient les fonctions liées à la BDD et appelées par les contrôleurs
 * - Vue : contient ce qui doit être affiché
 **/

// Activation des erreurs
ini_set('display_errors', 1);

/*
// Appel des fonctions du contrôleur
include("controleurs/fonctions.php");
// Appel des fonctions liées à l'affichage
include("vues/fonctions.php");
*/

// Identification du contrôleur à appeler
if (isset($_GET['cible']) && !empty($_GET['cible'])) {
    $url = $_GET['cible'];

} else {
    $url = 'accueil';
}

$url2 = ucfirst($url);
$utilisateur = 0;

if(isset($_GET['id'])){
    $utilisateur = $_GET['id'];
}

// Appel du contrôleur

include('controller/'.$url.'.php');
include('view/header.php');
include('controller/selection.php');
include("view/page$url2.php");
include('view/footer.php');