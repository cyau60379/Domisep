<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/forum.php");
include_once ("fonctions.php");

//redémarrer la session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
//id de l'utilisateur
$id = $_SESSION['idUtilisateur'];
//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));

//récupérations des questions et des réponses (commentaires) du Forum
$tabForum = decoupeString(forum($bdd));

if(isset($_POST['Titre']) && isset($_POST['Contenu'])) {
    $titre = $_POST['Titre'];
    $contenu = $_POST['Contenu'];
    ajoutArticleForum($bdd, $titre, $contenu);
    $tabForum = decoupeString(forum($bdd));
    afficheArticle($tabForum);
}