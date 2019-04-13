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
if (isset($_POST['cible']) && !empty($_POST['cible'])) {
    $url = $_POST['cible'];

} else {
    $url = 'accueil';
}

$url2 = ucfirst($url);
$utilisateur = "";

if(isset($_POST['id'])){
    $utilisateur = $_POST['id'];
    $result = preg_split("/\_/", $utilisateur);
    $utilisateur = $result[0] ." ". $result[1];
}

// Appel du contrôleur

include('controller/'.$url.'.php');
include('view/header.php');
include('view/selectionPage.php');
include("view/page$url2.php");
include('view/footer.php');