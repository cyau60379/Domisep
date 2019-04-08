<?php
/**
 * Controleur des capteurs
 */

include ("fonctions.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");

//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)


//id de l'utilisateur
$id = 1;
$utilisateur = decoupeString2(recupererUtilisateur($bdd,$id));
//creation du tableau des capteurs de la piece
$capteurs = array();

//id du logement
$logement = recuperationLogement($bdd, $id)[0][0];

//liste des pieces de la maison sous forme array { [0] => $id!$nom ... }
$listePieces = recuperationPieces($bdd, $logement);

//liste des pieces de la maison sous forme array { [$id] => $nom ... }
$pieces = decoupeString($listePieces);

//page à activer, dépendra des autres pages de l'utilisateur
$page = "gestionCapteur";


//choix de la vue, à reverifier

switch($page){
    case "gestionCapteur":
        $vue = "pageGestionCapteur";
        break;
    default:
        $vue = "erreur";
        break;
}

//include_once("view/".$vue .".php");

//============================================ test des capteurs a afficher

if (isset($_GET['piece']) && isset($_GET['id'])) {

    $pieceActive = $_GET['piece'];
    $idPieceActive = $_GET['id'];
    $capteurs = recuperationCapteurs($bdd, $idPieceActive);
    $noms = array();
    foreach ($capteurs as $key => $value){
        $tabValeurs = preg_split("/\!/", $value);
        $capteurs[$key] = $tabValeurs;
    }
    afficheCapteur($capteurs);
}

//============================================ test des capteurs a supprimer

if (isset($_GET['id'])){
    supprimerCapteur($bdd, $_GET['id']);
}

//============================================ test de la température a donner a la maison

if (isset($_GET['temp'])) {

    $temperature = $_GET['temp'];
    miseAJourTemp($bdd, $temperature, $id);
}
//============================================ test de l'activité des capteurs

if (isset($_GET['allume']) && isset($_GET['idCap'])) {

    $actif = $_GET['allume'];
    $idCapt = $_GET['idCap'];
    miseAJourActif($bdd, $actif, $idCapt);
}
//============================================ test de l'activité des capteurs

if (isset($_GET['positionVolet']) && isset($_GET['idCap2'])) {

    $volet = $_GET['positionVolet'];
    $idCapt2 = $_GET['idCap2'];
    miseAJourVolet($bdd, $volet, $idCapt2);
    afficheCapteur($capteurs);
}
//============================================ test de l'extinction totale

if (isset($_GET['idEteindre'])) {

    $idMaison = $_GET['idEteindre'];
    extinction($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de la fermeture totale

if (isset($_GET['idFermer'])) {

    $idMaison = $_GET['idFermer'];
    fermeture($bdd, $idMaison);
    afficheCapteur($capteurs);
}

//============================================ test de l'allumage totale

if (isset($_GET['idAllumer'])) {

    $idMaison = $_GET['idAllumer'];
    allumage($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de l'ouverture totale

if (isset($_GET['idOuvrir'])) {

    $idMaison = $_GET['idOuvrir'];
    ouverture($bdd, $idMaison);
    afficheCapteur($capteurs);
}

?>