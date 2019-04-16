<?php

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/catalogue.php");


if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];


$tabId = recuperationId($bdd);
$tabType = recupTypeCapteur($bdd);

$tabCatalogue = array();
for($i = 0; $i < sizeof($tabId); $i++){
    $description = recupDescription($bdd, $tabId[$i])[0];
    $tabCatalogue[$tabId[$i]] = array($tabType[$i],$description);
}
