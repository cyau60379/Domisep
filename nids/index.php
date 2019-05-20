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


// Appel des fonctions du contrôleur
include_once("controller/fonctions.php");
session_start();

if(isset($_GET['mdpOublie'])){
    include('view/header.php');
    include_once('controller/messagerie.php');
    include_once('view/pageMessagerie.php');
    include('view/footer.php');
}

if(isset($_GET['changement'])){
    include('view/header.php');
    include_once('controller/modificationMotDePasse.php');
    include_once('view/changerMotDePasse.php');
    include('view/footer.php');
}


// Identification du contrôleur à appeler
    if (isset($_POST['cible']) && !empty($_POST['cible'])) {
        $url = $_POST['cible'];
    } else {
        $url = 'accueil';
    }

    $url2 = ucfirst($url);
    $utilisateur = "";
    $utilisateur2 = "";
    $cible = "";

    if (isset($_POST['id']) && isset($_POST['utilisateur'])) {
        $_SESSION['idUtilisateur'] = $_POST['id'];
        $utilisateur = $_POST['utilisateur'];
        $utilisateur2 = decoupeString4($utilisateur);
    }

// Appel du contrôleur

    include('view/header.php');
    include('controller/' . $url . '.php');
    if ($utilisateur != "") {
        include('controller/selection.php');
        include('view/selectionPage.php');
    }
    include('view/page' . $url2 . '.php');
    include('view/footer.php');
