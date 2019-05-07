<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/FAQ.php");

if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

$tabFaq = decoupeString(recupFAQ($bdd));
