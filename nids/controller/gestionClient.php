<?php
/**
 * Controleur des clients pour les gestionnaires
 */

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/gestionClient.php");

//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)


//id de l'utilisateur
/*$id = 4;
$utilisateur = decoupeString2(recupererUtilisateur($bdd,$id));*/
//creation du tableau des capteurs de la piece
$clients = array();
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
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

//============================================ test des clients a supprimer

if (isset($_POST['id'])){
    supprimerClient($bdd, $_POST['id']);
}

//============================================ test des clients a ajouter

if (isset($_POST['idUtilisateur'])){
    $tab = recupClient($bdd, $_POST['idUtilisateur']);
    echo decoupeString2($tab);
}

//============================================ ajout des clients

if (isset($_POST['idClientAjouter']) && isset($_POST['idGest']) && isset($_POST['idLog'])){
    associationClient($bdd, $_POST['idClientAjouter'], $_POST['idGest'], $_POST['idLog']);
}