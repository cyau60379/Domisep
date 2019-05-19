<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

// Fonction permettant de récupérer l'id maximum des utilisateurs
function maximumId(PDO $bdd){
    $query = "SELECT max(utilisateur.id) FROM utilisateur";
    $table = $bdd->query($query)->fetch();
    return $table[0];
}

//Changer l'état de connexion
function updateEtat(PDO $bdd, $id, $etat){
    try {
        $query = "UPDATE utilisateur SET id_type_utilsateur = '$etat' WHERE utilisateur.id = '$id'";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

//Ajout de l'utilisateur qui s'inscrit
function ajouterInscription(PDO $bdd, $id, $valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp) {
    $query = "";
    try {
        $valMdp = password_hash($valMdp, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (id, Nom, Prenom, Adresse_mail, Date_naissance, Mot_de_passe, Etat, id_type_utilsateur) 
              VALUES ('$id', '$valNom', '$valPrenom', '$valAdresse_mail', '$valDate', '$valMdp', '1', '1')"; //rajoute les données du nouvel utilisateur
        $bdd->exec($query);
    } catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

//Récupère les id utilisateurs en fonction des deux premières lettres du prenom
function prenomVersId(PDO $bdd, $prenom) {
    try {
        $query = "SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Prenom LIKE '$prenom%'";
        $table = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN);
        return $table;
    } catch(PDOException $e) {
        return false;
    }
}
//Récupère les id utilisateurs en fonction des deux premières lettres du nom
function nomVersId(PDO $bdd, $nom) {
    try {
        $query = "SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Nom LIKE '$nom%'";
        $table = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN);
        return $table;
    } catch(PDOException $e) {
        return false;
    }
}

//Récupère le mot de passe en fonction de l'id
function recupMdp(PDO $bdd, $id){
    $query = 'SELECT utilisateur.Mot_de_passe FROM utilisateur WHERE utilisateur.id =' . $id;
    $table = $bdd->query($query)->fetchAll();
    return $table[0]["Mot_de_passe"];  //renvoie le Mot de passe
}

//Récupère le type en fonction de l'id
function recupType(PDO $bdd, $id){
    try{
        $query = "SELECT utilisateur.id_type_utilsateur FROM utilisateur WHERE utilisateur.id = '$id'";
        $table = $bdd->query($query)->fetch();
        return $table['id_type_utilsateur'];  //renvoie le type
    } catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
        return false;
    }
}

//Récupère l'id en fonction du nom, du prenom et du mail
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

//Récupère le mail en fonction de l'id
function recupMail(PDO $bdd, $id){
    $query = "SELECT utilisateur.Adresse_mail FROM utilisateur WHERE utilisateur.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Adresse_mail'];  //renvoie le mail
}

//Récupère le mot de passe en fonction de l'id
function recuperationCoordonnees(PDO $bdd, $id){
    $query = "SELECT * FROM utilisateur WHERE utilisateur.id = '$id'";
    $table = $bdd->query($query)->fetchAll();
    return $table[0];  //renvoie le mail
}

//Mise à jour dans la base de données en fonctions des changements faits
function updateUtilisateur(PDO $bdd, $id, $chgnt, $colonne){
    try {
        $query = "UPDATE utilisateur SET ". $colonne ."= '$chgnt' WHERE utilisateur.id = '$id'";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

//Met à jour le mot de passe en fonction de l'id
function updateMdp(PDO $bdd, $id, $chgnt, $colonne){
    try {
        $valMdp = password_hash($chgnt, PASSWORD_DEFAULT);
        $query = "UPDATE utilisateur SET ". $colonne ."= '$valMdp' WHERE utilisateur.id = '$id'";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function recuperationComptesSecondaires(PDO $bdd, $id){

    $query = "SELECT * FROM heritage INNER JOIN utilisateur ON heritage.id_utilisateur_sec = utilisateur.id WHERE heritage.id_utilisateur_prim= '$id'";
    $table = $bdd->query($query)->fetchAll();
    return $table;
}


function supprimComptesSecondaires(PDO $bdd, $id, $id_sec){
    try {
        $query = "DELETE FROM heritage WHERE heritage.id_utilisateur_prim='$id' && heritage.id_utilisateur_sec='$id_sec'";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function ajouterComptesSecondaires(PDO $bdd, $id, $id_secadd, $id_logement)
{
    $query = "";
    try {
        $query = "INSERT INTO heritage (id_utilisateur_prim, id_utilisateur_sec, id_logement) 
              VALUES ('$id', '$id_secadd', '$id_logement')"; //rajoute les données du nouvel utilisateur
        $bdd->exec($query);
    } catch (PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

function recupLogementFromAdressse (PDO $bdd, $logementsec){
    $query = "SELECT id FROM logement WHERE Adresse ='$logementsec'";
    $table = $bdd->query($query)->fetch();
    return $table;
}

function recupIdSecFromNomPrenom(PDO $bdd, $prenomsec, $nomsec){
    $query = "SELECT id FROM utilisateur WHERE nom = '$nomsec' AND prenom = '$prenomsec'";
    $table = $bdd->query($query)->fetch();
    return $table;
}