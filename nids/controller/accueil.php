<?php


/* hasher variable fonction, password_hash()*/

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");


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

    if(!empty($tabIdPrenom) && !empty($tabIdNom)){
        if(in_array($id, $tabIdPrenom) && in_array($id, $tabIdNom)){        //si l'id appartient à une personne
            //$mdpRegistered = recupMdp($bdd, $id);                           //on recupere le mot de passe de la personne
           /* if(password_verify($mdp, $mdpRegistered)) {                     //on compare les deux
                $reponse = true;
            }*/
           $reponse = true;
           session_start();
        }
    }
    $utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));
    affichageReponse($reponse, $id, $utilisateur, "Connexion");
}

// ============================================================= inscription

if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['naissance']) && isset($_POST['mdp'])){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $naissance = $_POST['naissance'];
    $mdp = $_POST['mdp'];
    $result1 = nomVersId($bdd, $nom);
    $result2 = prenomVersId($bdd, $prenom);
    $reponse = false;
    $id = maximumId($bdd) + 1;

    if(empty($result1) && empty($result2)){
        $reponse = true;
        ajouterInscription($bdd, $id, $nom, $prenom, $mail, $naissance, $mdp);
        updateEtat($bdd, $id, 1);
    }

    $utilisateur = $prenom . "_". $nom;
    affichageReponse($reponse, $id, $utilisateur,"Inscription");
}
