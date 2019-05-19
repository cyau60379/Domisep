<?php
/**
 * Controleur pour l'edition de profil
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/capteur.php");

//test de la connexion, redémarre une session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}

//récupération de l'id
$id = $_SESSION['idUtilisateur'];

//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd, $id)));

//id des logements
$logement = decoupeString(recupLogements($bdd, $id));

//récupération des coordonnées de l'utilisateur
$coord = recuperationCoordonnees($bdd, $id);


$ComptesSecondaires = recuperationComptesSecondaires($bdd, $id);

if(isset($_POST['id_sec'])){
    $id_sec = $_POST['id_sec'];
    supprimComptesSecondaires($bdd, $id, $id_sec);
}

if(isset($_POST['logementsec']) && isset($_POST['prenomsec']) && isset($_POST['nomsec'])){
    $logementsec = $_POST['logementsec'];
    $prenomsec = $_POST['prenomsec'];
    $nomsec = $_POST['nomsec'];
    $id_logementsec = recupLogementFromAdressse($bdd,$logementsec);
    $id_secadd = recupIdSecFromNomPrenom($bdd, $prenomsec, $nomsec);
    if (!empty($id_logementsec) && !empty($id_secadd)){     //verifier que le logement existe & personne existe
        ajouterComptesSecondaires($bdd, $id, $id_secadd, $id_logementsec);
    }
}


$modif = false;

//================================================ changement du nom
if(isset($_POST['user_nom']) && !empty($_POST['user_nom'])){
    updateUtilisateur($bdd, $id, $_POST['user_nom'], "Nom");
    $modif = true;
}

//================================================ changement du prenom
if(isset($_POST['user_prenom']) && !empty($_POST['user_prenom'])){
    updateUtilisateur($bdd, $id, $_POST['user_prenom'], "Prenom");
    $modif = true;
}

//================================================ changement du mail
if(isset($_POST['user_email']) && !empty($_POST['user_email'])){
    updateUtilisateur($bdd, $id, $_POST['user_email'], "Adresse_mail");
    $modif = true;
}

//================================================ changement du téléphone
if(isset($_POST['user_phone']) && !empty($_POST['user_phone'])){
    updateUtilisateur($bdd, $id, $_POST['user_phone'], "numeroTel");
    $modif = true;
}

//================================================ changement de la date de naissance
if(isset($_POST['user_date']) && !empty($_POST['user_date'])){
    updateUtilisateur($bdd, $id, $_POST['user_date'], "Date_naissance");
    $modif = true;
}

//================================================ changement du mot de passe
if(isset($_POST['user_pass']) && !empty($_POST['user_pass'])){
    updateMdp($bdd, $id, $_POST['user_pass'], "Mot_de_passe");
    $modif = true;
}

//================================================ changement de la question de vérification
if(isset($_POST['user_question']) && !empty($_POST['user_question'])){
    updateUtilisateur($bdd, $id, $_POST['user_question'], "Question_verif");
    $modif = true;
}

//================================================ changement de la réponse de vérification
if(isset($_POST['user_response']) && !empty($_POST['user_response'])){
    updateUtilisateur($bdd, $id, $_POST['user_response'], "Reponse_verif");
    $modif = true;
}

if ($modif === true){
    affichageReponse(true, $id, $utilisateur, "Modification");
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