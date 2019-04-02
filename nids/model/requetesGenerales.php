<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:28
 */
include("connexionBDD.php");

function recupererToutDans(PDO $bdd, string $table): array {
    $query = 'SELECT * FROM ' . $table;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}

function recupUtilisateur($prenom, $nom){
    return "$prenom!$nom";
}
function recupererUtilisateur(PDO $bdd, $id): array {
    $query = ' SELECT utilisateur.prenom, utilisateur.nom  FROM utilisateur WHERE utilisateur.id='. $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, "recupUtilisateur");     //retourne un tableau contenant toutes les resultats de la requete
}

function recupererUnAttributUnType(PDO $bdd, string $attribut, string $table, string $id, string $valeur): array {
    $query = 'SELECT ' . $attribut . ' FROM ' . $table . ' WHERE ' . $id . '=' . $valeur;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}