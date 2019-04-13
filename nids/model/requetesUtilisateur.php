<?php

include($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");


function ajouterInscription(PDO $bdd, $valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp) {
    $valMdp = password_hash($valMdp, PASSWORD_DEFAULT);
    $query = "INSERT INTO utilisateur (Nom, Prenom, Adresse_mail, Date_naissance, Mot_de_passe) 
              VALUES ($valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp)"; //rajoute les données du nouvel utilisateur
    $bdd->exec($query);
}


function prenomVersId(PDO $bdd, $prenom) {
    try {
        $query = "SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Prenom LIKE '$prenom%'";
        $table = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN);
        return $table;
    } catch(PDOException $e) {
        return false;
    }
}

function nomVersId(PDO $bdd, $nom) {
    try {
        $query = "SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Nom LIKE '$nom%'";
        $table = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN);
        return $table;
    } catch(PDOException $e) {
        return false;
    }
}

function recupMdp(PDO $bdd, $id){
    $query = 'SELECT utilisateur.Mot_de_passe FROM utilisateur WHERE utilisateur.id =' . $id;
    $table = $bdd->query($query)->fetchAll();
    return $table[0]["Mot_de_passe"];  //renvoie le Mot de passe
}