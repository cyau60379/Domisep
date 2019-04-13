<?php
/**
 * Controleur de la selection de page
 */

include_once("fonctions.php");

if(isset($_POST['idUtilisateur'])){
    $utilisateur = decoupeString2(recupererUtilisateur($bdd,$id));
    selectionPage($utilisateur);
}
