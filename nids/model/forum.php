<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

function forum(PDO $bdd){
    $query = "SELECT article.Titre, article.Contenu, article.Date FROM article ORDER BY article.Date ASC";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup3");
    return $result;
}

function ajoutArticleForum(PDO $bdd, $titre, $contenu){
    $query = "";
    try{
        $query = "INSERT INTO article(titre, contenu) VALUES ('$titre', '$contenu')";
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