<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

function recupDescription(PDO $bdd, $id){
    $query = "SELECT element_catalogue.Description FROM element_catalogue WHERE element_catalogue.id = '$id'";
    $donnees = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
    return $donnees;
}

function recuperationId(PDO $bdd){
    $query = "SELECT element_catalogue.id FROM element_catalogue";
    $donnees = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
    return $donnees;
}

function recupTypeCapteur(PDO $bdd){
    $query = "SELECT element_catalogue.Type FROM element_catalogue";
    $donnees = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
    return $donnees;
}