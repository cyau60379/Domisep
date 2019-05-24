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
            $countdownToExtinction = recupEssai($bdd, $id)[0];
            $mdpRegistered = recupMdp($bdd, $id);                           //on recupere le mot de passe de la personne
           if(password_verify($mdp, $mdpRegistered)) {                     //on compare les deux
               $reponse = true;
               $countdownToExtinction = 0;
               updateEssai($bdd, $id, $countdownToExtinction);
            } else {
               $countdownToExtinction += 1;
               updateEssai($bdd, $id, $countdownToExtinction);
           }
           //session_start();             //commencement de la session si la connexion fonctionne
            updateEtat($bdd, $id, 1);
        }
    }
    $utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));  //
    affichageReponse($reponse, $id, $utilisateur, "Connexion");

    if($countdownToExtinction >= 3){
        $chaine="aqwzsxedAZSQXCDERFV1472583690BGTYHNJUIKLOPMcrfvtgbyhnujikolpm1478502369";
        $newMdp = "";
        for($i = 0; $i < 15; $i++){
            $newMdp .= $chaine[mt_rand(0,strlen($chaine)-1)];
        }
        $valMdp = password_hash($newMdp, PASSWORD_DEFAULT);
        update($bdd, $valMdp, $id);
        $mail = recuperationCoordonnees($bdd, $id)[0]['Adresse_mail'];
        $pre = recuperationCoordonnees($bdd, $id)[0]['Prenom'];
        $sujet = " /!\ Intrusion sur votre compte /!\ ";
        $header = "MIME-Version: 1.0\r\n";
        $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
        $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
        $header .= 'Content-Transfer-Encoding: 8bit';
        $messsage = "Bonjour $pre,
                 <br> Quelqu'un tente de s'introduire sur votre session !
                 <br>Votre nouveau mot de passe temporaire : $newMdp
                 <br>Cordialement,
                 <br>L'équipe de NIDS";
        try {
            mail($mail, $sujet, $messsage, $header);
        } catch (Exception $e) {
            echo $e->getMessage(), "\n";
        }
    }
}

// ============================================================= inscription

// récupération des données passées dans le formulaire

    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['naissance']) && isset($_POST['mdp']) &&isset($_POST['ConfirmationMdp'])){
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
        $naissance = $_POST['naissance'];
        $date = preg_split("/\-/", $naissance);

        //vérification que chaque input est bien rempli + mail est bien un mail + date de naissance prise en compte
        if($prenom == ""){
            affichageErreur("votre prénom. Veuillez en rentrer un.");

        } elseif($nom == ""){
            affichageErreur("votre nom. Veuillez en rentrer un.");

        } elseif($mail == "") {
            affichageErreur("votre email. Veuillez en rentrer un.");

        } elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            affichageErreur("votre email. Veuillez rentrer un email valide.");

        } elseif($naissance == "" || ($date['0'] > 2020) || ($date['0'] < 1900)){
            affichageErreur("votre date de naissance. Veuillez en rentrer une.");

        } elseif($_POST['mdp'] == "") {
            affichageErreur("votre mot de passe. Veuillez en rentrer un.");

        } elseif($_POST['ConfirmationMdp'] == "") {
            affichageErreur("votre mot de passe. Veuillez le confirmer.");

        } elseif($_POST['mdp'] != $_POST['ConfirmationMdp']){
            affichageErreur( "le mot de passe. Veuillez rentrer le même deux fois.");
        } else {                                                        //verif avec confirmation
            $mdp = $_POST['mdp'];
            $id = maximumId($bdd) + 1;                          //met au nouvel inscrit l'id le plus  grand + 1
            ajouterInscription($bdd, $id, $nom, $prenom, $mail, $naissance, $mdp);
            $utilisateur = $prenom . "_". $nom;
            $identifiant =  substr($prenom,0,2) . substr($nom,0,2) . $id;
            affichageReponse(true, $id, $utilisateur,"Inscription"); //message envoyé pour être affiché
            //envoi de mail pour récupérer les identifiants
            $sujet = "Votre inscription";
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';
            $messsage = "Bonjour $prenom,
                        <br> vous venez de vous inscrire sur le site NIDS pour gérer vos capteurs en toute sécurité.
                        <br> nous vous communiquons votre identifiant : $identifiant.
                        <br>Cordialement,
                        <br>L'équipe de NIDS";

            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
                $passage_ligne = "\r\n";
            } else {
                $passage_ligne = "\n";
            }
            try {
                mail($mail, $sujet, $messsage, $header);
            } catch (Exception $e) {
                echo $e->getMessage(), "\n";
            }
        }
    }
