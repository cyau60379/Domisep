<?php
/**
 * Controleur de la selection de page
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");

$pagesPossibles = array();


if(isset($_POST['deconnexion'])){
    affichageReponse2();
} else {
    if($utilisateur != ""){
        $type = recupType($bdd, $id);
        switch($type){
            case 1:
                $pagesPossibles["Domotique"] = array("gestionCapteur", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("selectionSupport", "fa-question");
                break;
            case 2:
                $pagesPossibles["Domotique"] = array("gestionClient", "fa-home");
                $pagesPossibles["Profil"] = array("editionProfil", "fa-file-text-o");
                $pagesPossibles["Support"] = array("selectionSupport", "fa-question");
                break;
            //mettre pour admin + sav
            default:
                break;
        }
}

}
