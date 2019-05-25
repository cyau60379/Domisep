<?php

include_once ("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/FAQ.php");

//redémarrer la session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}

//id de l'utilisateur
$id = $_SESSION['idUtilisateur'];

//recuperation du type
$idTypeUtil = recupType($bdd, $id);
$ajout = false;
//changement en fonction de l'utilisateur
if($idTypeUtil == 3 || $idTypeUtil == 5){   //SAV + webMaster peut ajouter des articles
    $ajout = true;
}

//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

//récupérations des questions et des réponses de la FAQ
$tabFaq = decoupeString(recupFAQ($bdd));
$ids = recupIds($bdd);

if(isset($_POST['Titre']) && isset($_POST['Contenu'])) {
    $titre = $_POST['Titre'];
    $contenu = $_POST['Contenu'];
    ajoutArticleFaq($bdd, $titre, $contenu);
    $tabFaq = decoupeString(recupFAQ($bdd));
    $ids = recupIds($bdd);
    afficheArticle2($tabFaq, $ajout, $ids);

}

if(isset($_POST['question'])) {
    $question = $_POST['question'];
    suppressionArticleFaq($bdd, $question);
    $tabFaq = decoupeString(recupFAQ($bdd));
    $ids = recupIds($bdd);
    afficheArticle2($tabFaq, $ajout, $ids);

}