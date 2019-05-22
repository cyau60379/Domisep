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
$ids = recupIdsForum($bdd);
$tabComment = recupCommentaires($bdd);
$tabDate = recupDate($bdd);

if(isset($_POST['Titre']) && isset($_POST['Contenu'])) {
    $titre = $_POST['Titre'];
    $contenu = $_POST['Contenu'];
    ajoutArticleForum($bdd, $titre, $contenu);
    $tabForum = decoupeString(forum($bdd));
    $ids = recupIdsForum($bdd);
    afficheArticle($tabForum, $tabComment, $tabDate, $ids);
}

if(isset($_POST['identifiantArticle']) && isset($_POST['ContenuCommentaire'])) {
    $idArticle= $_POST['identifiantArticle'];
    $contenu = $_POST['ContenuCommentaire'];
    ajoutCommentaires($bdd, $contenu, $idArticle);
    $tabComment = recupCommentaires($bdd);
    $tabDate = recupDate($bdd);
    afficheArticle($tabForum, $tabComment, $tabDate, $ids);
}