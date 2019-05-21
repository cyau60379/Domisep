<?php
/**
 * Created by PhpStorm.
 * User: Rapha
 * Date: 17/05/2019
 * Time: 15:35
 */

include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
include_once ("fonctions.php");
$mdpbislol="";
$mdp="";
$adresseMail="";

//test du login

if(isset($_POST['identifiant'])){
    $identif = $_POST['identifiant'];                       //identifiant de la forme 2 lettres du prenom, 2 lettres du nom, id
    $prenom = substr($identif,0,2);
    $nom = substr($identif,2,2);
    $id = intval(substr($identif,4));
    $tabIdPrenom = prenomVersId($bdd,$prenom);          //id des personnes ayant un debut de prenom correspondant
    $tabIdNom = nomVersId($bdd,$nom);                //id des personnes ayant un debut de nom correspondant

    if(!empty($tabIdPrenom) && !empty($tabIdNom)){
        if(in_array($id, $tabIdPrenom) && in_array($id, $tabIdNom)){        //si l'id appartient à une personne
            $question = recupQuestion($bdd, $id)[0];
            afficheChangementMdp($question);
        } else {
            afficheRelance();
        }
    } else {
        afficheRelance();
    }
}

if(isset($_POST['monId'])){
    $id = intval(substr($_POST['monId'],4));
    echo recupReponse($bdd, $id)[0];
}


if (isset ($_POST['new_pass'])&& isset($_POST['new_pass_conf']) && isset($_POST['identif'])) {
    $mdp = $_POST['new_pass']; //depuis la page changerDeMotDepasse.php
    $mdpbislol = $_POST['new_pass_conf'];
    $id = intval(substr($_POST['identif'],4));
    if ($mdp == $mdpbislol) {
        $mdpcript = password_hash($mdp, PASSWORD_DEFAULT);
        update($bdd, $mdpcript, $id);
    } else {
        echo 'Vous n\'avez pas tapé deux fois le même mot de passe';
    }
}

?>