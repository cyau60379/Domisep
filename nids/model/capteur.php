<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:49
 */
include ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

//suppression des capteurs non desirés

function supprimerCapteur(PDO $bdd, $id){
    try {
        $query = 'DELETE FROM actionneur_capteur WHERE id ='.$id;
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

// fonction pour recuperer les valeurs de la base de donnees sous forme de string

function recupValeurPiece($id, $nom) {
    return "$id!$nom";
}

//requête recuperations des pieces en fonction de l'id de la maison

function recuperationPieces (PDO $bdd, $id) {
    $query = 'SELECT piece.id, piece.nom FROM piece WHERE piece.id_logement = ' . $id;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC,"recupValeurPiece");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recup capteur en fonction de la pieces en entree

function recupValeurCapteur($id, $nom, $type, $valeur, $actif) {
    return "$id!$nom!$type!$valeur!$actif";
}

//requête recup capteur en fonction de la pieces en entree

function recuperationCapteurs (PDO $bdd, $p) {      //prend la bdd et l'id de la piece pour recuperer les capteurs, leur activité et valeur
    $query = 'SELECT ac.id, ac.nom, ac.id_element_catalogue, donnees.Valeur, ac.Actif
                FROM actionneur_capteur AS ac 
                JOIN donnees ON ac.id = donnees.id_actionneur_capteur
                WHERE ac.id_piece = ' . $p;
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC,"recupValeurCapteur");     //retourne un tableau contenant toutes les resultats de la requete
}

/**
 * met a jour un élément dans une table
 * @param PDO $bdd
 * @param int $temp
 * @param int $id
 */
function miseAJourTemp(PDO $bdd, $temp, $id) {
    try {
        $query = 'UPDATE logement SET Temperature_consigne = '. $temp .' WHERE logement.id_utilisateur = '. $id;
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param int $actif
 * @param int $id
 */
function miseAJourActif(PDO $bdd, $actif, $id) {
    try {
        $query = 'UPDATE actionneur_capteur SET Actif = '. $actif .' WHERE actionneur_capteur.id = '. $id;
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param int $actif
 * @param int $id
 */

//changer en insert into lorsque la date sera prise en compte

function miseAJourVolet(PDO $bdd, $actif, $id) {
    try {
        $query = 'UPDATE donnees SET Valeur = '. $actif .' WHERE donnees.id_actionneur_capteur = '. $id;
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}
/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param int $id
 */

function extinction(PDO $bdd, $id) {
    try {
        $query = 'UPDATE actionneur_capteur SET Actif = 0 WHERE actionneur_capteur.id_piece IN (SELECT piece.id FROM piece JOIN logement ON piece.id_logement =' . $id .")";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}
/**
 * Insère un nouvel élément dans une table
 * @param PDO $bdd
 * @param int $id
 */

function fermeture(PDO $bdd, $id) {
    try {
        $query = 'UPDATE donnees SET Valeur = 0 
                  WHERE donnees.id_actionneur_capteur IN 
                      (SELECT actionneur_capteur.id FROM actionneur_capteur 
                      JOIN piece ON actionneur_capteur.id_piece = piece.id 
                      WHERE piece.id_logement=' . $id ." AND actionneur_capteur.id_element_catalogue = 4)";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}