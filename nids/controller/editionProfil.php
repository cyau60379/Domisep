<?php
/**
 * Controleur pour l'edition de profil
 */

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/requetesUtilisateur.php");
include_once($_SERVER["DOCUMENT_ROOT"]. "/model/capteur.php");

//test de la connexion, redémarre une session si perdue
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}

//récupération de l'id
$id = $_SESSION['idUtilisateur'];

//recuperation du type
$idTypeUtil = recupType($bdd, $id);
$ajout = false;
//changement en fonction de l'utilisateur
if($idTypeUtil == 1 || $idTypeUtil == 2){   //SAV peut ajouter des articles
    $ajout = true;
}
//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd, $id)));
$ut = decoupeString2(recupererUtilisateur($bdd, $id));

//id des logements
$logement = decoupeString(recupLogements($bdd, $id));

//récupération des coordonnées de l'utilisateur
$tabCoord = recuperationCoordonnees($bdd, $id);
$coord = array();
if (!empty($tabCoord)){
    $coord = $tabCoord[0];
}

$ComptesSecondaires = recuperationComptesSecondaires($bdd, $id);

if(isset($_POST['id_sec'])){
    $id_sec = $_POST['id_sec'];
    supprimComptesSecondaires($bdd, $id, $id_sec);
}

if(isset($_POST['logementsec']) && isset($_POST['prenomsec']) && isset($_POST['nomsec'])){
    $logementsec = $_POST['logementsec'];
    $prenomsec = $_POST['prenomsec'];
    $nomsec = $_POST['nomsec'];
    $reponse = false;
    $id_secadd = recupIdSecFromNomPrenom($bdd, $prenomsec, $nomsec);
    if (!empty($id_secadd)){     //verifier que la personne existe
        $relation = recupRelation($bdd, $id, $id_secadd[0]);
        if (empty($relation)){      //verifier que la personne n'est pas déjà liée
            $mail = recupMail($bdd, $id_secadd[0]);
            $renvoi = (3 * $id + 666) ** 2;
            $ajoute = (6 * $id_secadd[0] + 333) ** 2;
            //envoi de mail pour récupérer les identifiants
            $sujet = "Un client veut vous ajouter comme compte secondaire";
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';
            $messsage = "Bonjour $prenomsec,
                        <br> S'il s'agit d'une erreur, ignorez ce mail.
                        <br> $ut a fait une demande pour vous ajouter en tant que compte secondaire.
                        <br> Voici le lien pour accepter la requête : <a href=\"http://nids/validationSecondaire/$renvoi/$ajoute/$logementsec\">Cliquez ici</a>
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
            $reponse = true;
        }
    }
    echo $reponse;
}


$modif = false;

//================================================ changement du nom
if(isset($_POST['user_nom']) && !empty($_POST['user_nom'])){
    updateUtilisateur($bdd, $id, $_POST['user_nom'], "Nom");
    $modif = true;
}

//================================================ changement du prenom
if(isset($_POST['user_prenom']) && !empty($_POST['user_prenom'])){
    updateUtilisateur($bdd, $id, $_POST['user_prenom'], "Prenom");
    $modif = true;
}

//================================================ changement du mail
if(isset($_POST['user_email']) && !empty($_POST['user_email'])){
    updateUtilisateur($bdd, $id, $_POST['user_email'], "Adresse_mail");
    $modif = true;
}

//================================================ changement du téléphone
if(isset($_POST['user_phone']) && !empty($_POST['user_phone'])){
    updateUtilisateur($bdd, $id, $_POST['user_phone'], "numeroTel");
    $modif = true;
}

//================================================ changement de la date de naissance
if(isset($_POST['user_date']) && !empty($_POST['user_date'])){
    updateUtilisateur($bdd, $id, $_POST['user_date'], "Date_naissance");
    $modif = true;
}

//================================================ changement de la question de vérification
if(isset($_POST['user_question']) && !empty($_POST['user_question'])){
    updateUtilisateur($bdd, $id, $_POST['user_question'], "Question_verif");
    $modif = true;
}

//================================================ changement de la réponse de vérification
if(isset($_POST['user_response']) && !empty($_POST['user_response'])){
    updateUtilisateur($bdd, $id, $_POST['user_response'], "Reponse_verif");
    $modif = true;
}

if ($modif === true){
    affichageReponse(true, $id, $utilisateur, "Modification");
}

//============================================ logements a afficher

if (isset($_POST['logementActif'])) {

    $idLogementActif = $_POST['logementActif'];

    //liste des pieces de la maison sous forme array { [0] => $id!$nom ... }
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);
    affichePieces2($pieces, $idLogementActif);
}

// =========================================== ajout d'une piece

if(isset($_POST['idLogement']) && isset($_POST['nomPiece'])){
    addPieces($bdd, $_POST['idLogement'], $_POST['nomPiece']);
}

// =========================================== suppression d'une piece

if(isset($_POST['idPieceSuppr'])){
    supprPieces($bdd, $_POST['idPieceSuppr']);
}

// =========================================== ajout d'un logement

if(isset($_POST['logement'])){
    addLogement($bdd, $_POST['logement'], $id);
    $logement = decoupeString(recupLogements($bdd, $id));
    afficheLogements($logement);
}

// =========================================== recup logements

if(isset($_POST['suppLogement'])){
    $logement = recupLogements($bdd, $id);
    $stringLogement = "";
    foreach ($logement as $value){
        $stringLogement .= $value . "_";
    }
    echo $stringLogement;
}

// =========================================== ajout d'un logement

if(isset($_POST['logementASuppr'])){
    supprLogement($bdd, $_POST['logementASuppr']);
    $logement = decoupeString(recupLogements($bdd, $id));
    afficheLogements($logement);
}

// =========================================== modification du type

if(isset($_POST['modifType'])){
    $types = recupTypesPossibles($bdd);
    $stringTypes = "";
    foreach ($types as $value){
        $stringTypes .= $value . "_";
    }
    echo $stringTypes;
}

// ============================================ demande de modification de type

if(isset($_POST['nvxType'])){
    $nom = $coord['Nom'];
    $prenom = $coord['Prenom'];
    $nvxType = recupUnType($bdd, $_POST['nvxType'])[0];
//envoi de mail pour récupérer les identifiants
    $sujet = "Un client veut changer de type";
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $messsage = "Bonjour,
                 <br>$prenom $nom veut changer de type et devenir $nvxType.
                 <br>Pouvez-vous changer cela ?
                 <br>Cordialement,
                 <br>L'équipe de NIDS";
    try {
        mail("contactservice123456@gmail.com", $sujet, $messsage, $header);
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
}
