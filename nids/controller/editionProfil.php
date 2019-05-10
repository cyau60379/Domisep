<?php
/**
 * Controleur pour l'edition de profil
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/capteur.php");

if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd, $id)));

//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));

$coord = recuperationCoordonnees($bdd, $id);

if(isset($_POST['user_nom']) && !empty($_POST['user_nom'])){
    updateUtilisateur($bdd, $id, $_POST['user_nom'], "Nom");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_prenom']) && !empty($_POST['user_prenom'])){
    updateUtilisateur($bdd, $id, $_POST['user_prenom'], "Prenom");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_email']) && !empty($_POST['user_email'])){
    updateUtilisateur($bdd, $id, $_POST['user_email'], "Adresse_mail");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_phone']) && !empty($_POST['user_phone'])){
    updateUtilisateur($bdd, $id, $_POST['user_phone'], "numeroTel");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_date']) && !empty($_POST['user_date'])){
    updateUtilisateur($bdd, $id, $_POST['user_date'], "Date_naissance");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_pass']) && !empty($_POST['user_pass'])){
    updateMdp($bdd, $id, $_POST['user_pass'], "Mot_de_passe");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_question']) && !empty($_POST['user_question'])){
    updateUtilisateur($bdd, $id, $_POST['user_question'], "Question_verif");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}
if(isset($_POST['user_response']) && !empty($_POST['user_response'])){
    updateUtilisateur($bdd, $id, $_POST['user_response'], "Reponse_verif");
    affichageReponse(true, $id, $utilisateur, "Modifiction");
}

//============================================ logements a afficher

if (isset($_GET['logement'])) {

    $idLogementActif = $_GET['logement'];

    //liste des pieces de la maison sous forme array { [0] => $id!$nom ... }
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);
    affichePieces2($pieces, $idLogementActif, $id, $utilisateur);
}