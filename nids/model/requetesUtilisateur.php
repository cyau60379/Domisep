<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");


function maximumId(PDO $bdd){
    $query = "SELECT max(utilisateur.id) FROM utilisateur";
    $table = $bdd->query($query)->fetch();
    return $table[0];
}

function updateEtat(PDO $bdd, $id, $etat){
    try {
        $query = "UPDATE utilisateur SET id_type_utilsateur = '$etat' WHERE utilisateur.id = '$id'";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function ajouterInscription(PDO $bdd, $id, $valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp) {
    $query = "";
    try {
        $valMdp = password_hash($valMdp, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (id, Nom, Prenom, Adresse_mail, Date_naissance, Mot_de_passe, Etat, id_type_utilsateur) 
              VALUES ($id,'$valNom', '$valPrenom', '$valAdresse_mail', '$valDate', '$valMdp', '1', '1')"; //rajoute les données du nouvel utilisateur
        $bdd->exec($query);
    } catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
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
    try{
        $query = "SELECT utilisateur.id_type_utilsateur FROM utilisateur WHERE utilisateur.id = '$id'";
        $table = $bdd->query($query)->fetch();
        return $table['id_type_utilsateur'];  //renvoie le type
    } catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
}
}

function recupMonId(PDO $bdd, $nom, $prenom, $mail){
    try {
        $query = "SELECT utilisateur.id FROM utilisateur 
                  WHERE utilisateur.Nom = '$nom' AND utilisateur.Prenom = '$prenom' AND utilisateur.Adresse_mail = '$mail'";
        $table = $bdd->query($query)->fetch();
        return $table['id'];  //renvoie l'id
    } catch(PDOException $e) {
        return false;
    }
}

function recupMail(PDO $bdd, $id){
    $query = "SELECT utilisateur.Adresse_mail FROM utilisateur WHERE utilisateur.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Adresse_mail'];  //renvoie le mail
}