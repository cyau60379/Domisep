<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:49
 */
include ("requetesGenerales.php");

//requête recuperations du logement en fonction de l'id de l'utilisateur

function recuperationLogement (PDO $bdd, $id) {
    $query = 'SELECT LOGEMENT.id FROM LOGEMENT WHERE LOGEMENT.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recuperations des pieces en fonction de l'id de la maison

function recuperationPieces (PDO $bdd, $id) {
    $query = 'SELECT PIECE.nom FROM PIECE WHERE PIECE.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recup capteur en fonction de la pieces en entree

function recuperationCapteurs (PDO $bdd, $pieces, $p) {
    $query = 'SELECT ACTIONNEUR_CAPTEUR.nom FROM ACTIONNEUR_CAPTEUR JOIN PIECE ON PIECE.id = ACTIONNEUR_CAPTEUR.id_pieces WHERE PIECE.nom = ' . $pieces[$p];
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}   //double join pour avoir les données du capteur ?

/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param array $values
 * @param string $table
 * @return boolean
 */
function miseAJour(PDO $bdd, array $values, string $table, string $id): bool {

    $attributs = '';
    $valeurs = '';
    foreach ($values as $key => $value) {

        $attributs .= $key . ', ';
        $valeurs .= ':' . $key . ', ';
        $v[] = $value;
    }
    $attributs = substr_replace($attributs, '', -2, 2);     //retire l'espace et la virgule de trop
    $valeurs = substr_replace($valeurs, '', -2, 2);

    $query = "UPDATE " . $table . " SET " . $attributs . "=" . $valeurs . " WHERE  id=" . $id;  //requete

    $donnees = $bdd->prepare($query);
    $requete = "";
    foreach ($values as $key => $value) {
        $requete = $requete . $key . ' : ' . $value . ', ';
        $donnees->bindParam($key, $values[$key], PDO::PARAM_STR);
    }

    return $donnees->execute();
}