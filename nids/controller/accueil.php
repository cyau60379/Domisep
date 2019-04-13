<?php


/* hasher variable fonction, password_hash()*/

include_once("fonctions.php");
include($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");

//$id = 1;

//============================================================== connexion

if(isset($_POST['identifiant']) && isset($_POST['password'])){
    $identif = $_POST['identifiant'];                       //identifiant de la forme 2 lettres du prenom, 2 lettres du nom, id
    $prenom = substr($identif,0,2);
    $nom = substr($identif,2,2);
    $id = intval(substr($identif,4));
    $mdp = $_POST['password'];
    $tabIdPrenom = prenomVersId($bdd,$prenom);          //id des personnes ayant un debut de prenom correspondant
    $tabIdNom = nomVersId($bdd,$nom);                //id des personnes ayant un debut de nom correspondant
    $reponse = false;                                   //reponse qui determinera l'action suivante

    if(!is_bool($tabIdPrenom) && !is_bool($tabIdNom)){
        if(in_array($id, $tabIdPrenom) && in_array($id, $tabIdNom)){        //si l'id appartient à une personne
            //$mdpRegistered = recupMdp($bdd, $id);                           //on recupere le mot de passe de la personne
           /* if(password_verify($mdp, $mdpRegistered)) {                     //on compare les deux
                $reponse = true;
            }*/
           $reponse = true;
        }
    }
    $utilisateur = decoupeString3(recupererUtilisateur($bdd,$id));
    affichageReponse($reponse, $utilisateur);
}
