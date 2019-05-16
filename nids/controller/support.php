<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

//vérification de la session de l'utilisateur
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];

//récupération de l'utlisateur sous la forme prenom_nom
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));
