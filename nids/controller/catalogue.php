<?php

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/catalogue.php");

//vérifie si la session est toujours active
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];

//id des types de capteurs
$tabId = recuperationId($bdd);

//nom des types de capteurs
$tabType = recupTypeCapteur($bdd);

//tableau des capteurs contenant l'id en indice et un tableau avec nom et description
$tabCatalogue = array();
for($i = 0; $i < sizeof($tabId); $i++){
    $description = recupDescription($bdd, $tabId[$i])[0];
    $tabCatalogue[$tabId[$i]] = array($tabType[$i],$description);
}

//================================================ récupération des informations des pièces de la maison
if(isset($_POST['idUtil'])){
    $pieces = recupInfoPieces($bdd, $id);
    $pieces2 = "";
    foreach ($pieces as $key => $values){
        $pieces2 .= $values . "_";
    }
    echo $pieces2;
}

//================================================ récupération des informations entrées par l'utilisateur pour l'ajout de capteur

if(isset($_POST['idUtilisateur']) &&  isset($_POST['idCap']) && isset($_POST['nom']) && isset($_POST['numSerie'])
    && isset($_POST['piece']) && isset($_POST['cemac']) && isset($_POST['cat'])){
    ajoutBDD($bdd, $_POST['idUtilisateur'], $_POST['idCap'], $_POST['nom'], $_POST['numSerie'], $_POST['piece'], $_POST['cemac'], $_POST['cat']);
    $idCap = recupDernierCapteur($bdd);
    ajoutDonnees($bdd, $idCap);
}