<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/FAQ.php");

//redémarrer la session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}

//id de l'utilisateur
$id = $_SESSION['idUtilisateur'];

//recuperation du type
$idTypeUtil = recupType($bdd, $id);
$ajout = false;
//changement en fonction de l'utilisateur
if($idTypeUtil == 3){   //SAV peut ajouter des articles
    $ajout = true;
}

//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

//récupérations des questions et des réponses de la FAQ
$tabFaq = decoupeString(recupFAQ($bdd));