<?php
/**
 * Controleur des capteurs
 */

include ("fonctions.php");
include ("/wamp64/www/nids/model/capteur.php");

/*$pieces = array("entree", "cuisine", "salon", "chambre Bastien", "chambre Raph", "cave Julien");
$capteurs = array();
$capteurs["entree"] = array("1,Temperature,1,20", "1,Mouvement,1,20", "1,Luminosite,1,20");
$capteurs["cuisine"] = array("1,Temperature_1,1,20", "1,Temperature_2,1,20", "1,Mouvement_1,1,20", "1,Mouvement_2,1,20", "1,Luminosite,1,20", "1,Volet,1,20");
$capteurs["salon"] = array("1,Temperature,1,20", "1,Mouvement,1,20", "1,Luminosite,1,20", "1,Volet_Nord,1,20", "1,Volet_Sud,1,20");
$capteurs["chambre Bastien"] = array("1,Temperature,1,20", "1,Mouvement,1,20", "1,Luminosite,1,20", "1,Volet,1,20");
$capteurs["chambre Raph"] = array("1,Temperature_1,1,20", "1,Temperature_2,1,20", "1,Mouvement,1,20", "1,Luminosite,1,20", "1,Volet,1,20");
$capteurs["cave Julien"] = array("1,Temperature,1,20", "1,Mouvement_1,1,20", "1,Mouvement_2,1,20", "1,Mouvement_3,1,20", "1,Luminosite,1,20");
*/
//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)

$id = 1;
$capteurs = array();

$table = recuperationLogement($bdd, $id);
$listePieces = recuperationPieces ($bdd, $id);
$pieces = decoupeString($listePieces);

/*foreach ($pieces as $id => $p){
    $capteurs[$p] = recuperationCapteurs($bdd, $id);
}*/

$page = "gestionCapteur";

switch($page){
    case "gestionCapteur":
        $vue = "pageGestionCapteur";
        break;
    default:
        $vue = "erreur";
}

//include_once("view/".$vue .".php");

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

if (isset($_GET['id'])){
    supprimerCapteur($bdd, $_GET['id']);
}

if (isset($_POST['temp'])) {

    $values =  [
        'Temperature_consigne' => $_POST['temp']
    ];

    // Appel à la BDD à travers une fonction du modèle.
    $retour = miseAJour($bdd, $values, $table, $id);

    if ($retour) {
        $alerte = "Ajout réussie";
    } else {
        $alerte = "L'ajout dans la BDD n'a pas fonctionné";
    }
}

?>