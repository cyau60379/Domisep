<?php
include_once("requetesGenerales.php");

//fonction pour coller 5 elements ensembles pour ensuite les recuperer
function recup5($id, $prenom, $nom, $tel, $mail){
    return "$id!$prenom!$nom!$tel!$mail";
}

//recuperations des coordonnees des clients du gestionnaire en question
function recuperationClients (PDO $bdd, $id) {
    $query = 'SELECT utilisateur.id, utilisateur.Prenom, utilisateur.Nom, utilisateur.numeroTel, utilisateur.Adresse_mail 
              FROM utilisateur JOIN heritage 
              ON heritage.id_utilisateur_sec = utilisateur.id 
              WHERE heritage.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup5");     //retourne un tableau contenant toutes les resultats de la requete
}

//suppression des clients non desirés
function supprimerClient(PDO $bdd, $id){
    try {
        $query = 'DELETE FROM heritage WHERE id_utilisateur_sec ='.$id;
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

//recuperation d'un client en particulier
function recupClient(PDO $bdd, $id){
    $query = "SELECT prenom, nom FROM utilisateur WHERE id = '$id'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup2");
}


//suppression des clients non desirés
function associationClient(PDO $bdd, $id, $idGest, $idLog){
    $query = "";
    try {
        $query = "INSERT INTO `heritage`(`id_utilisateur_prim`, `id_utilisateur_sec`, `id_logement`) VALUES ('$idGest', '$id', '$idLog')";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}