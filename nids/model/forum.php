<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");


function recup4($a1, $a2, $a3, $a4) {
    return "$a1!$a2*$a3*$a4";
}

function forum(PDO $bdd){
    $query = "SELECT article.Titre, article.Contenu, article.Date, utilisateur.Nom FROM article
              JOIN utilisateur ON article.id_utilisateur = utilisateur.id ORDER BY article.Date ASC";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup4");
    return $result;
}

function ajoutArticleForum(PDO $bdd, $titre, $contenu, $idUt){
    $query = "";
    try{
        $query = "INSERT INTO article(titre, contenu) VALUES ('$titre', '$contenu', '$idUt')";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}

//recuperation des ids du forum
function recupIdsForum(PDO $bdd){
    $query = "SELECT article.id FROM article";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
    return $result;
}

function recupCommentaires(PDO $bdd){
    $query = "SELECT article.id, commentaire.Contenu, utilisateur.Nom, commentaire.Date_publication FROM article 
              JOIN commentaire ON commentaire.id_article = article.id
              JOIN utilisateur ON utilisateur.id = commentaire.id_utilisateur
              ORDER BY commentaire.Date_publication DESC";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup4");
    return $result;
}

function recupDate(PDO $bdd){
    $query = "SELECT article.id, commentaire.Date_publication FROM article JOIN commentaire WHERE commentaire.id_article = article.id ORDER BY commentaire.Date_publication DESC";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP);
    return $result;
}

function ajoutCommentaires(PDO $bdd, $contenu, $id, $idUt){
    $query = "";
    try{
        $query = "INSERT INTO `commentaire`(`Contenu`, `Note`, `id_article`, `id_utilisateur`) VALUES ('$contenu', '0', '$id', '$idUt')";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}