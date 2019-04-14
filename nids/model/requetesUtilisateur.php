<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");


function ajouterInscription(PDO $bdd, $valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp) {
    $query = "";
    try {
        $valMdp = password_hash($valMdp, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (Nom, Prenom, Adresse_mail, Date_naissance, Mot_de_passe, Etat, id_type_utilsateur) 
              VALUES ('$valNom', '$valPrenom', '$valAdresse_mail', '$valDate', '$valMdp', '1', '1')"; //rajoute les données du nouvel utilisateur
        $bdd->exec($query);
    } catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function recuperationDeId(PDO $bdd, $prenom, $nom) {
    try {
        $query = "SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Prenom = $prenom AND utilisateur.Nom = $nom";
        $table = $bdd->query($query)->fetch();
        return $table['id'];
    } catch(PDOException $e) {
        return false;
    }
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

function recupType(PDO $bdd, $id){
    $query = 'SELECT utilisateur.id_type_utilsateur FROM utilisateur WHERE utilisateur.id =' . $id;
    $table = $bdd->query($query)->fetch();
    return $table['id_type_utilsateur'];  //renvoie le type
}