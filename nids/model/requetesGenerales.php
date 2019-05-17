<?php

include_once($_SERVER["DOCUMENT_ROOT"] . "/model/connexionBDD.php");

//fonction de recupération des données d'un tableau
function recupererToutDans(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
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

function recupTitre(PDO $bdd, $id){
    $query = "SELECT article.Titre FROM article WHERE article.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Titre'];  //renvoie le mail
}

function recupContenu(PDO $bdd, $id){
    $query = "SELECT article.Contenu FROM article WHERE article.id = '$id'";
    $table = $bdd->query($query)->fetch();
    return $table['Contenu'];  //renvoie le mail
}

