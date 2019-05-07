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

//requête recuperations les pieces des logements en fonction de l'id de l'utilisateur

function recupInfoPieces(PDO $bdd, $id) {
    $query = 'SELECT piece.id, piece.Nom, logement.Adresse FROM logement JOIN piece ON logement.id = piece.id_logement WHERE logement.id_utilisateur = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup3");     //retourne un tableau contenant toutes les resultats de la requete
}

function ajoutBDD(PDO $bdd, $idUt, $idCap, $nom, $numSerie, $piece, $cemac, $cat){
    $query = "";
    try {
        $query = "INSERT INTO `actionneur_capteur`(`nom`, `Etat`, `Actif`, `NumeroSerie`, `id_element_catalogue`, `id_CeMac`, `id_piece`, `id_utilisateur`, `id_categorie`)
                    VALUES ('$nom', '1', '0', '$numSerie', '$idCap', '$cemac', '$piece', '$idUt', '$cat')";
        $bdd->exec($query);
    } catch (PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function recupDernierCapteur(PDO $bdd){
    $query = "SELECT MAX(`actionneur_capteur`.`id`) FROM `actionneur_capteur`";
    $donnees = $bdd->query($query)->fetchAll();
    return $donnees[0][0];
}

function ajoutDonnees(PDO $bdd, $id){
    $query = "";
    try {
        $query = "INSERT INTO `donnees`(`Valeur`, `id_actionneur_capteur`)
                    VALUES ('0', '$id')";
        $bdd->exec($query);
    } catch (PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}