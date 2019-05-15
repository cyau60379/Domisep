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
            $mdpRegistered = recupMdp($bdd, $id);                           //on recupere le mot de passe de la personne
           if(password_verify($mdp, $mdpRegistered)) {                     //on compare les deux
                $reponse = true;
            }
           session_start();             //commencement de la session si la connexion fonctionne
        }
    }
    $utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));  //
    affichageReponse($reponse, $id, $utilisateur, "Connexion");
}

// ============================================================= inscription

// récupération des données passées dans le formulaire



    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['naissance']) && isset($_POST['mdp']) &&isset($_POST['ConfirmationMdp'])){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['mail'];
        $naissance = $_POST['naissance'];

        if($_POST['prenom'] == ""){
            affichageErreur("votre prénom. Veuillez en rentrer un.");

        } elseif($_POST['nom']==""){
            affichageErreur("votre nom. Veuillez en rentrer un.");

        } elseif($_POST['mail']=="") {
            affichageErreur("votre email. Veuillez en rentrer un.");

        } elseif(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            affichageErreur("votre email. Veuillez rentrer un email valide.");

        } elseif($_POST['naissance']==""){
            affichageErreur("votre date de naissance. Veuillez en rentrer une.");

        } elseif($_POST['mdp']=="") {
            affichageErreur("votre mot de passe. Veuillez en rentrer un.");

        } elseif($_POST['ConfirmationMdp']=="") {
            affichageErreur("votre mot de passe. Veuillez le confirmer.");

        } elseif($_POST['mdp']!=$_POST['ConfirmationMdp']){
            affichageErreur( "le mot de passe. Veuillez rentrer le même deux fois.");
        } else {     //verif avec confirmation
            $mdp = $_POST['mdp'];
            $id = maximumId($bdd) + 1;  //met au nouvel inscrit l'id le plus  grand + 1
            ajouterInscription($bdd, $id, $nom, $prenom, $mail, $naissance, $mdp);
            updateEtat($bdd, $id, 1);
            $utilisateur = $prenom . "_". $nom;
            affichageReponse(true, $id, $utilisateur,"Inscription"); //message envoyé pour être affiché
        }



    }
