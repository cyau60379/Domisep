<?php
/**
 * Controleur des capteurs
 */

include_once ("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");

//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)


//id de l'utilisateur
/*$id = 1;
$utilisateur = decoupeString2(recupererUtilisateur($bdd,$id));*/
//creation du tableau des capteurs de la piece
$capteurs = array();
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));



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

//============================================ logements a afficher

if (isset($_GET['logement'])) {

    $idLogementActif = $_GET['logement'];

    //liste des pieces de la maison sous forme array { [0] => $id!$nom ... }
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);
    affichePieces($pieces, $idLogementActif, $id, $utilisateur);
}

//============================================ test des capteurs a afficher

if (isset($_POST['piece']) && isset($_POST['id'])) {

    $pieceActive = $_POST['piece'];
    $idPieceActive = $_POST['id'];
    $capteurs = recuperationCapteurs($bdd, $idPieceActive);
    $noms = array();
    foreach ($capteurs as $key => $value){
        $tabValeurs = preg_split("/\!/", $value);
        $tabValeurs[2] = recupTypeCap($bdd, $tabValeurs[2]);
        $capteurs[$key] = $tabValeurs;
    }
    afficheCapteur($capteurs);
}

//============================================ test des capteurs a supprimer

if (isset($_POST['id'])){
    supprimerCapteur($bdd, $_POST['id']);
}

//============================================ test de la température a donner a la maison

if (isset($_POST['temp'])) {
    $temperature = $_POST['temp'];
    miseAJourTemp($bdd, $temperature, $id);
}
//============================================ test de l'activité des capteurs

if (isset($_POST['allume']) && isset($_POST['idCap'])) {
    $actif = $_POST['allume'];
    $idCapt = $_POST['idCap'];
    miseAJourActif($bdd, $actif, $idCapt);
}
//============================================ test de l'activité des capteurs

if (isset($_POST['positionVolet']) && isset($_POST['idCap2'])) {

    $volet = $_POST['positionVolet'];
    $idCapt2 = $_POST['idCap2'];
    miseAJourVolet($bdd, $volet, $idCapt2);
    afficheCapteur($capteurs);
}
//============================================ test de l'extinction totale

if (isset($_POST['idEteindre'])) {

    $idMaison = $_POST['idEteindre'];
    extinction($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de la fermeture totale

if (isset($_POST['idFermer'])) {

    $idMaison = $_POST['idFermer'];
    fermeture($bdd, $idMaison);
    afficheCapteur($capteurs);
}

//============================================ test de l'allumage totale

if (isset($_POST['idAllumer'])) {

    $idMaison = $_POST['idAllumer'];
    allumage($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de l'ouverture totale

if (isset($_POST['idOuvrir'])) {

    $idMaison = $_POST['idOuvrir'];
    ouverture($bdd, $idMaison);
    afficheCapteur($capteurs);
}


//============================================ recuperation des coordonnées du capteur

if (isset($_POST['modifNom']) && isset($_POST['idDuCapteur'])) {

    $idCap = $_POST['idDuCapteur'];
    $name = $_POST['modifNom'];
    if($name != ""){
        updateNom($bdd, $idCap, $name);
    }
}

?>