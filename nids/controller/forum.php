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
$tabForum = array();
$tabForum0 = decoupeString(forum($bdd));
foreach ($tabForum0 as $key => $value){
    $tabForum[$key] = preg_split("/\*/", $value);
}
$ids = recupIdsForum($bdd);
$tabComment = array();
$tabComment0 = decoupeString(recupCommentaires($bdd));
foreach ($tabComment0 as $key => $value){
    $tabComment[$key] = preg_split("/\*/", $value);
}
$tabDate = recupDate($bdd);


//ajout
if(isset($_POST['Titre']) && isset($_POST['Contenu'])) {
    $titre = $_POST['Titre'];
    $contenu = $_POST['Contenu'];
    ajoutArticleForum($bdd, $titre, $contenu, $id);
    $tabForum0 = decoupeString(forum($bdd));
    foreach ($tabForum0 as $key => $value){
        $tabForum[$key] = preg_split("/\*/", $value);
    }
    $ids = recupIdsForum($bdd);
    afficheArticle($tabForum, $tabComment, $tabDate, $ids);
}

if(isset($_POST['identifiantArticle']) && isset($_POST['ContenuCommentaire'])) {
    $idArticle= $_POST['identifiantArticle'];
    $contenu = $_POST['ContenuCommentaire'];
    ajoutCommentaires($bdd, $contenu, $idArticle, $id);
    $tabComment0 = decoupeString(recupCommentaires($bdd));
    foreach ($tabComment0 as $key => $value){
        $tabComment[$key] = preg_split("/\*/", $value);
    }
    $tabDate = recupDate($bdd);
    afficheArticle($tabForum, $tabComment, $tabDate, $ids);
}