<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/FAQ.php");

//redémarrer la session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}

//id de l'utilisateur
$id = $_SESSION['idUtilisateur'];

//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

//récupérations des questions et des réponses de la FAQ
$tabFaq = decoupeString(recupFAQ($bdd));