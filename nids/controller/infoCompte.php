<?php

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");

//vérifie si la session est toujours active
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];

//recuperation du type
$idTypeUtil = recupType($bdd, $id);
$ajout = false;
//changement en fonction de l'utilisateur
if($idTypeUtil == 4){   //Admin peut changer les types
    $ajout = true;
}

$tab = recupererToutDansUtilisateur($bdd);
$tabCompte = array();
foreach ($tab as $value){
    array_push($tabCompte, preg_split("/\!/", $value));
}

// =========================================== modification du type

if(isset($_POST['modifType'])){
    $types = recupTypesPossibles($bdd);
    $stringTypes = "";
    foreach ($types as $value){
        $stringTypes .= $value . "_";
    }
    echo $stringTypes;
}

// ============================================ demande de modification de type

if(isset($_POST['nvxType']) && isset($_POST['idDemandeur'])){
    $idDemandeur = $_POST['idDemandeur'];
    $nom = recuperationCoordonnees($bdd, $idDemandeur)[0]['Nom'];
    $prenom = recuperationCoordonnees($bdd, $idDemandeur)[0]['Prenom'];
    $mail = recuperationCoordonnees($bdd, $idDemandeur)[0]['Adresse_mail'];
    $nvxType = recupUnType($bdd, $_POST['nvxType'])[0];
    updateUtilisateur($bdd, $idDemandeur, $_POST['nvxType'], 'id_type_utilsateur');
//envoi de mail pour récupérer les identifiants
    $sujet = "Votre changement de status effectué";
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $messsage = "Bonjour $prenom,
                 <br> suite à votre demande, vous avez maintenant le statut de $nvxType.
                 <br>Cordialement,
                 <br>L'équipe de NIDS";
    try {
        mail($mail, $sujet, $messsage, $header);
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
    $tab = recupererToutDansUtilisateur($bdd);
    $tabCompte = array();
    foreach ($tab as $value){
        array_push($tabCompte, preg_split("/\!/", $value));
    }
    $utilisateur = $prenom . " " . $nom;
    $reponse = affichePageDonnees($tabCompte, $ajout) . "!" . $utilisateur;
    echo $reponse;
}