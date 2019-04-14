<?php
/**
 * Controleur pour l'edition de profil
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");

if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];

$coord = recuperationCoordonnees($bdd, $id);

if(isset($_POST['user_nom']) && !empty($_POST['user_nom'])){
    updateUtilisateur($bdd, $id, $_POST['user_nom'], "Nom");
}
if(isset($_POST['user_prenom']) && !empty($_POST['user_prenom'])){
    updateUtilisateur($bdd, $id, $_POST['user_prenom'], "Prenom");
}
if(isset($_POST['user_email']) && !empty($_POST['user_email'])){
    updateUtilisateur($bdd, $id, $_POST['user_email'], "Adresse_mail");
}
if(isset($_POST['user_phone']) && !empty($_POST['user_phone'])){
    updateUtilisateur($bdd, $id, $_POST['user_phone'], "numeroTel");
}
if(isset($_POST['user_date']) && !empty($_POST['user_date'])){
    updateUtilisateur($bdd, $id, $_POST['user_date'], "Date_naissance");
}
if(isset($_POST['user_pass']) && !empty($_POST['user_pass'])){
    updateUtilisateur($bdd, $id, $_POST['user_pass'], "Mot_de_passe");
}
if(isset($_POST['user_question']) && !empty($_POST['user_question'])){
    updateUtilisateur($bdd, $id, $_POST['user_question'], "Question_verif");
}
if(isset($_POST['user_response']) && !empty($_POST['user_response'])){
    updateUtilisateur($bdd, $id, $_POST['user_response'], "Reponse_verif");
}