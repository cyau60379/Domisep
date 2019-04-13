<?php
/**
 * Controleur des clients pour les gestionnaires
 */

include_once("fonctions.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/model/gestionClient.php");

//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)


//id de l'utilisateur
$id = 4;
$utilisateur = decoupeString2(recupererUtilisateur($bdd,$id));
//creation du tableau des capteurs de la piece
$clients = array();

//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));

//page à activer, dépendra des autres pages de l'utilisateur
$page = "gestionCapteur";


//choix de la vue, à reverifier

switch($page){
    case "gestionClient":
        $vue = "pageGestionClient";
        break;
    default:
        $vue = "erreur";
        break;
}
//============================================ test des clients a afficher

if (isset($_GET['logement']) && isset($_GET['id'])) {

    $logementActif = $_GET['logement'];
    $idLogementActif = $_GET['id'];
    $clients = recuperationClients($bdd, $idLogementActif);
    $noms = array();
    foreach ($clients as $key => $value){
        $tabValeurs = preg_split("/\!/", $value);
        $clients[$key] = $tabValeurs;
    }
    afficheClients($clients);
}