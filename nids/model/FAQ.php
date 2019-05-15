<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

function recupFAQ(PDO $bdd){
    $query = "SELECT article_faq.Titre, article_faq.Contenu FROM article_faq";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");
    return $result;
}