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
    $query = 'SELECT logement.id FROM logement WHERE logement.id_utilisateur = ' . $id;
    return $bdd->query($query)->fetchAll();     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recuperations des pieces en fonction de l'id de la maison

function recupValeurPiece($id, $nom) {
    return "$id!$nom";
}

function supprimerCapteur(PDO $bdd, $id){
    try {
        $query = 'DELETE FROM actionneur_capteur WHERE id ='.$id;
        $bdd->exec($query);
    }
    catch(PDOException $e)
    {
        echo $query . "<br>" . $e->getMessage();
    }
}

function recuperationPieces (PDO $bdd, $id) {
    $query = 'SELECT piece.id, piece.nom FROM piece WHERE piece.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC,"recupValeurPiece");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recup capteur en fonction de la pieces en entree

function recupValeurCapteur($id, $nom, $type, $valeur) {
    return "$id!$nom!$type!$valeur";
}

function recuperationCapteurs (PDO $bdd, $p) {      //prend la bdd et l'id de la piece pour recuperer les capteurs, leur type et valeur
    $query = 'SELECT ac.id, ac.nom, ac.id_element_catalogue, donnees.Valeur 
                FROM actionneur_capteur AS ac 
                JOIN donnees ON ac.id = donnees.id_actionneur_capteur
                WHERE ac.id_piece = ' . $p;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC,"recupValeurCapteur");     //retourne un tableau contenant toutes les resultats de la requete
}

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