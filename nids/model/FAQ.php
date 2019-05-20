<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

//recuperation des questions et reponses de la FAQ
function recupFAQ(PDO $bdd){
    $query = "SELECT article_faq.Titre, article_faq.Contenu FROM article_faq";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");
    return $result;
}

//recuperation des ids de la FAQ
function recupIds(PDO $bdd){
    $query = "SELECT article_faq.id FROM article_faq";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
    return $result;
}

function ajoutArticleFaq(PDO $bdd, $titre, $contenu){
    $query = "";
    try{
        $query = "INSERT INTO article_faq(titre, contenu) VALUES ('$titre', '$contenu')";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}

function suppressionArticleFaq(PDO $bdd, $question) {
    $query = "";
    try{
        $query = "DELETE FROM article_faq WHERE id= '$question'";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}