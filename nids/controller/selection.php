<?php
/**
 * Controleur de la selection de page
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");

//tableau qui contient les pages possibles en fonction de l'utilisateur connecté
$pagesPossibles = array();
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];

if(isset($_POST['deconnexion'])){
    updateEtat($bdd, $id, 0);
    affichageReponse2();  //affichage de la déconnexion + retour à l'accueil si accepté
} else {
    if($utilisateur != ""){     //pour un utilisateur existant
        $type = recupType($bdd, $id);
        switch($type){
            case 1: //client
                $pagesPossibles["Domotique"] = array("domotique", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("support", "fa-question");
                break;
            case 2: //gestionnaire
                $pagesPossibles["Domotique"] = array("domotique", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("support", "fa-question");
                break;
            case 3: //SAV
                $pagesPossibles["Comptes"] = array("infoCompte", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("support", "fa-question");
                break;
            case 4: //admin
                $pagesPossibles["Comptes"] = array("infoCompte", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("support", "fa-question");
                break;
            default:
                break;
        }
    }
}
