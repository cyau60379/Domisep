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
        $query = "UPDATE utilisateur SET utilisateur.Etat = '$etat' WHERE utilisateur.id = '$id'";
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

//Récupère l'etat en fonction de l'id
function recupActivite(PDO $bdd, $id){
    $query = "SELECT utilisateur.Etat FROM utilisateur WHERE utilisateur.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Etat'];  //renvoie l'etat
}

//Récupère le mot de passe en fonction de l'id
function recuperationCoordonnees(PDO $bdd, $id){
    $query = "SELECT utilisateur.id, utilisateur.Nom, utilisateur.Prenom, utilisateur.Adresse_mail, 
              utilisateur.numeroTel, utilisateur.Date_naissance, utilisateur.Mot_de_passe, utilisateur.Etat, 
              utilisateur.Question_verif, utilisateur.Reponse_verif, type_utilisateur.Nom AS type 
              FROM utilisateur JOIN type_utilisateur ON utilisateur.id_type_utilsateur = type_utilisateur.id
              WHERE utilisateur.id = '$id'";
    $table = $bdd->query($query)->fetchAll();
    return $table;  //renvoie le mail
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

function update(PDO $bdd, $mdpcript, $id) {
    try {
        $req = "UPDATE utilisateur SET Mot_de_passe = '$mdpcript' WHERE id = '$id'";
        $bdd->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}

function verifAdresse(PDO $bdd, $ad){
    $query = "SELECT Adresse_mail FROM utilisateur WHERE Adresse_mail= '$ad'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);//fetch column qui vérifie si le tableau est vide ou non
}

function recupQuestion(PDO $bdd, $id){
    $query = "SELECT utilisateur.Question_verif FROM utilisateur WHERE utilisateur.id = '$id'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function recupReponse(PDO $bdd, $id){
    $query = "SELECT utilisateur.Reponse_verif FROM utilisateur WHERE utilisateur.id = '$id'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function recupRelation(PDO $bdd, $id1, $id2){
    $query = "SELECT id FROM heritage WHERE id_utilisateur_prim= '$id1' AND id_utilisateur_sec= '$id2'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function recupTypesPossibles(PDO $bdd){
    $query = "SELECT id, Nom FROM type_utilisateur WHERE id IN ('1', '2')";
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");
}

function recupUnType(PDO $bdd, $id){
    $query = "SELECT Nom FROM type_utilisateur WHERE id= '$id'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function recupEssai(PDO $bdd, $id){
    $query = "SELECT utilisateur.essais FROM utilisateur WHERE utilisateur.id = '$id'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function updateEssai(PDO $bdd, $id, $count) {
    try {
        $req = "UPDATE utilisateur SET essais = '$count' WHERE id = '$id'";
        $bdd->exec($req);
    }
    catch(PDOException $e) {
        echo $req . "<br>" . $e->getMessage();
    }
}