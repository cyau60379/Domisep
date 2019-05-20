<?php

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");

//vérifie si la session est toujours active
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];


$tab = recupererToutDansUtilisateur($bdd);
$tabCompte = array();
foreach ($tab as $value){
    array_push($tabCompte, preg_split("/\!/", $value));
}
