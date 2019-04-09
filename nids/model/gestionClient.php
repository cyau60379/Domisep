<?php
include ("requetesGenerales.php");

function recup5($id, $prenom, $nom, $tel, $mail){
    return "$id!$prenom!$nom!$tel!$mail";
}

function recuperationClients (PDO $bdd, $id) {
    $query = 'SELECT utilisateur.id, utilisateur.Prenom, utilisateur.Nom, utilisateur.numeroTel, utilisateur.Adresse_mail 
              FROM utilisateur JOIN heritage 
              ON heritage.id_utilisateur_sec = utilisateur.id 
              WHERE heritage.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recup5");     //retourne un tableau contenant toutes les resultats de la requete
}