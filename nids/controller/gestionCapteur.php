<?php
/**
 * Controleur des capteurs
 */

//include ("requetesCapteurs.php");

$pieces = array("entree", "cuisine", "salon", "chambre Bastien", "chambre Raph", "cave Julien");
$capteurs = array();
$capteurs["entree"] = array("Temperature", "Mouvement", "Luminosite");
$capteurs["cuisine"] = array("Temperature_1", "Temperature_2", "Mouvement_1", "Mouvement_2", "Luminosite", "Volet");
$capteurs["salon"] = array("Temperature", "Mouvement", "Luminosite", "Volet_Nord", "Volet_Sud");
$capteurs["chambre Bastien"] = array("Temperature", "Mouvement", "Luminosite", "Volet");
$capteurs["chambre Raph"] = array("Temperature_1", "Temperature_2", "Mouvement", "Luminosite", "Volet");
$capteurs["cave Julien"] = array("Temperature", "Mouvement_1", "Mouvement_2", "Mouvement_3", "Luminosite");

//trouver un moyen de récuperer les données en enlevant les espaces (replace( "_", " ") en javascript / str_replace ( char1, char2, string) php)

$id = 1;
$table = "LOGEMENT";
/*$pieces = recuperationPieces ($bdd, $id);

$capteurs = recuperationCapteurs($bdd, $pieces, );*/

$page = "gestionCapteur";

switch($page){
    case "gestionCapteur":
        $vue = "view/pageGestionCapteur";
        break;
    default:
        $vue = "view/erreur";
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

include($vue .".php");
?>