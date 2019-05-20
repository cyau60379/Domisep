<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/connexionBDD.php");

//fonction pour mettre les données sous forme de string lors d'un retour avec 2 infos
function recup7($u1, $u2, $u3, $u4, $u5, $u6, $u7){
    return "$u1!$u2!$u3!$u4!$u5!$u6!$u7";
}

//fonction de recupération des données d'un tableau
function recupererToutDansUtilisateur(PDO $bdd) {
    $query = 'SELECT utilisateur.id, utilisateur.Nom, utilisateur.Prenom, 
              utilisateur.Adresse_mail, utilisateur.numeroTel, utilisateur.Date_naissance, 
              type_utilisateur.Nom FROM utilisateur JOIN type_utilisateur ON utilisateur.id_type_utilsateur = type_utilisateur.id';
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup7");     //retourne un tableau contenant toutes les resultats de la requete
}

//fonction pour mettre les données sous forme de string lors d'un retour avec 2 infos
function recup2($prenom, $nom){
    return "$prenom!$nom";
}

//fonction pour mettre les données sous forme de string lors d'un retour avec 3 infos
function recup3($a1, $a2, $a3){
    return "$a1!$a2!$a3";
}

//recupération du nom et prenom de l'utilisateur en fonction de l'id
function recupererUtilisateur(PDO $bdd, $id): array {
    $query = ' SELECT utilisateur.prenom, utilisateur.nom  FROM utilisateur WHERE utilisateur.id='. $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recuperations du logement en fonction de l'id de l'utilisateur
function recupLogements (PDO $bdd, $id) {
    $query = 'SELECT logement.id, logement.Adresse FROM logement WHERE logement.id_utilisateur = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recuperations du logement en fonction de l'id de l'utilisateur
function recupLgmnt (PDO $bdd, $id) {
    $query = 'SELECT logement.Adresse FROM logement WHERE logement.id = ' . $id;
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);     //retourne un tableau contenant toutes les resultats de la requete
    return $result;
}

//requête recuperations du logement en fonction de l'id de l'utilisateur et si location
function recupLocation (PDO $bdd, $id) {
    $query = 'SELECT logement.id, logement.Adresse FROM logement JOIN heritage ON logement.id = heritage.id_logement WHERE heritage.id_utilisateur_sec = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recuperations du logement en fonction de l'id de l'utilisateur
function recupLogementsParPiece (PDO $bdd, $id) {
    $query = 'SELECT piece.id_logement FROM piece WHERE piece.id = ' . $id;
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);     //retourne un tableau contenant toutes les resultats de la requete
    return $result;
}

function recupTitre(PDO $bdd, $id){
    $query = "SELECT article.Titre FROM article WHERE article.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Titre'];  //renvoie le titre
}

function recupContenu(PDO $bdd, $id){
    $query = "SELECT article.Contenu FROM article WHERE article.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Contenu'];  //renvoie le contenu
}

function addPieces(PDO $bdd, $idLog, $nom){
    $query = "";
    try{
        $query = "INSERT INTO piece(nom, id_logement) VALUES ('$nom', '$idLog')";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}

function supprPieces(PDO $bdd, $id){
    $query = "";
    try{
        $query = "DELETE FROM piece WHERE id = '$id'";
        $bdd->exec($query);
    } catch (PDOException $e){
        echo $query . "<br>" . $e->getMessage();
    }
}

