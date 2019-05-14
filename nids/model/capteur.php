<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:49
 */
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesGenerales.php");

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

function recupValeur4($a1, $a2, $a3, $a4) {
    return "$a1!$a2!$a3!$a4";
}

//requête recup capteur en fonction de la pieces en entree

function recuperationCapteurs (PDO $bdd, $p) {      //prend la bdd et l'id de la piece pour recuperer les capteurs, leur activité et valeur
    $query = "SELECT ac.id, ac.nom, ac.id_element_catalogue, ac.Actif FROM actionneur_capteur AS ac WHERE ac.id_piece = '$p'";
    return $bdd->query($query)->fetchAll(PDO::FETCH_FUNC,"recupValeur4");     //retourne un tableau contenant toutes les resultats de la requete
}

//requête recup donnees des capteurs

function recuperationDonnees (PDO $bdd, $id){
    $query = "SELECT donnees.Valeur FROM donnees 
                WHERE donnees.Date_heure_reception = (SELECT MAX(donnees.Date_heure_reception) FROM donnees WHERE donnees.id_actionneur_capteur = '$id') 
                  AND donnees.id_actionneur_capteur = '$id';";
    return $bdd->query($query)->fetchAll(PDO::FETCH_COLUMN, 0);
}

function recupTypeCap(PDO $bdd, $id){
    $query = "SELECT element_catalogue.Type FROM element_catalogue WHERE element_catalogue.id = '$id'";
    $tab = $bdd->query($query)->fetch();
    return $tab['Type'];
}

/**
 * met a jour la température dans la table logement
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
 * met a jour l'activité dans la table actionneur_capteur
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
 * met a jour des donnees dans la table donnees
 * @param PDO $bdd
 * @param int $actif
 * @param int $id
 */

//changer en insert into lorsque la date sera prise en compte

function miseAJourVolet(PDO $bdd, $actif, $id) {
    try {
        //$query = "INSERT INTO donnees(valeur, id_actionneur_capteur)  VALUES ('$actif', '$id')";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}
/**
 *  met a jour de toutes les données dans la table actionneur_capteur
 * @param PDO $bdd
 * @param int $id
 */

function extinction(PDO $bdd, $id) {
    try {
        $query = 'UPDATE actionneur_capteur SET Actif = 0 
                  WHERE actionneur_capteur.id_piece 
                          IN (SELECT piece.id FROM piece JOIN logement ON piece.id_logement =' . $id .")";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}
/**
 *  met a jour de toutes les donnees dans la table donnees
 * @param PDO $bdd
 * @param int $id
 */

//A MODIFIER

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

/**
 *  met a jour de toutes les données dans la table actionneur_capteur
 * @param PDO $bdd
 * @param int $id
 */

function allumage(PDO $bdd, $id) {
    try {
        $query = 'UPDATE actionneur_capteur SET Actif = 1 
                  WHERE actionneur_capteur.id_piece 
                          IN (SELECT piece.id FROM piece JOIN logement ON piece.id_logement =' . $id .")";
        $bdd->exec($query);
    }
    catch(PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}
/**
 *  met a jour de toutes les donnees dans la table donnees
 * @param PDO $bdd
 * @param int $id
 */

//A MODIFIER

function ouverture(PDO $bdd, $id) {
    try {
        $query = 'UPDATE donnees SET Valeur = 10 
                  WHERE donnees.id_actionneur_capteur IN 
                      (SELECT actionneur_capteur.id FROM actionneur_capteur 
                      JOIN piece ON actionneur_capteur.id_piece = piece.id 
                      WHERE piece.id_logement=' . $id . " AND actionneur_capteur.id_element_catalogue = 4)";
        $bdd->exec($query);
    } catch (PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}

/**
 *  Récupérations des données en fonction de l'id du capteur
 * @param PDO $bdd
 * @param int $id
 * @return array
 */

function recupInformationCapteur(PDO $bdd, $id) {
    $query = "SELECT `actionneur_capteur`.`nom`, `id_piece`, `id_CeMac`, `id_categorie` 
                   FROM `actionneur_capteur` WHERE `actionneur_capteur`.`id` = '$id'";
    $result = $bdd->query($query)->fetchAll(PDO::FETCH_FUNC, 'recupValeur4');
    return $result[0];
}

/**
 *  met a jour de toutes les données dans la table actionneur_capteur
 * @param PDO $bdd
 * @param int $identity
 * @param string $name
 */

function updateNom(PDO $bdd, $identity, $name) {
    try {
        $query = "UPDATE `actionneur_capteur` SET `nom`= '$name' WHERE `actionneur_capteur`.`id`= '$identity'";
        $bdd->exec($query);
    } catch (PDOException $e) {
        echo $query . "<br>" . $e->getMessage();
    }
}