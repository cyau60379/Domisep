<?php
/**
 * Controleur des clients pour les gestionnaires
 */

include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/gestionClient.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");


//creation du tableau des capteurs de la piece
$clients = array();
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));
$ut = decoupeString2(recupererUtilisateur($bdd, $id));


//============================================ test des clients a afficher

if (isset($_POST['logement']) && isset($_POST['idLogement'])) {

    $logementActif = $_POST['logement'];
    $idLogementActif = $_POST['idLogement'];
    $clients = recuperationClients($bdd, $idLogementActif);
    foreach ($clients as $key => $value){
        $tabValeurs = preg_split("/\!/", $value);
        $clients[$key] = $tabValeurs;       //tableau sous la forme {indice => coordonnees client ...}
    }
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);

    $c = afficheClients($clients);
    $b = affichePieces3($pieces, $id);
    $sortie = $c. "§" . $b;
    //affiche les infos dans le div qui convient via Javascript
    echo $sortie;
}

//============================================ test des graphes a afficher

if (isset($_POST['piece']) && isset($_POST['idPieceActive'])) {

    //récupération par requête post des données voulues
    $pieceActive = $_POST['piece'];
    $idPieceActive = $_POST['idPieceActive'];

    //récupérations des données des capteurs sous la forme array { [0] => $valeur!$date ... }
    $temp = recuperationPourStat($bdd, $idPieceActive, 1);  //recuperation que si l'id du catalogue est celui de la luminosité
    $lum = recuperationPourStat($bdd, $idPieceActive, 2);   //idem mais pour la luminosité
    $donneesTemp = array();     //tableau des donnees de température
    $donneesLum = array();      //tableau des donnees de lumière
    $donneesTempFinal = array();    //tableau de moyenne des températures
    $donneesLumFinal = array();     //tableau de moyenne de la luminosité

    // boucle pour séparer les données de $capteurs et les mettre en fonction du mois
    foreach ($temp as $key => $value) {
        //tableau des valeurs
        $tabValeurs = preg_split("/\!/", $value);
        $mois = preg_split("/\-/", $tabValeurs[1])[1];
        if (isset($donneesTemp[$mois])){        //pour eviter d'ecraser les donnees des différents capteurs
            array_push($donneesTemp[$mois], $tabValeurs[0]);
        } else {
            $donneesTemp[$mois] = array($tabValeurs[0]);
        }
    }
    //meme chose mais pour la température
    foreach ($lum as $key => $value) {
        //tableau des valeurs
        $tabValeurs = preg_split("/\!/", $value);
        $mois = preg_split("/\-/", $tabValeurs[1])[1];
        if (isset($donneesLum[$mois])){
            array_push($donneesLum[$mois], $tabValeurs[0]);
        } else {
            $donneesLum[$mois] = array($tabValeurs[0]);
        }
    }
    //moyenne effectuée pour le graphe en fonction du mois
    foreach ($donneesTemp as $clef => $valeur){
        $len = sizeof($valeur);
        $total = 0.0;
        foreach ($valeur as $v){
            $total += $v;
        }
        $donneesTempFinal[$clef] = $total / $len;
    }
    //idem pour la luminosité
    foreach ($donneesLum as $clef => $valeur){
        $len = sizeof($valeur);
        $total = 0.0;
        foreach ($valeur as $v){
            $total += $v;
        }
        $donneesLumFinal[$clef] = $total / $len;
    }
    //conversion en string pour eviter les conflits avec Javascript
    $lumiere = arrayToString($donneesLumFinal);
    $temperature = arrayToString($donneesTempFinal);
    //mise en commun des deux pour tout envoyer en meme temps
    $resultat = $lumiere . "?" . $temperature;
    echo $resultat; //envoi au JS
}

//============================================ test des clients a supprimer

if (isset($_POST['id'])){
    supprimerClient($bdd, $_POST['id']);
}

//============================================ test des clients a ajouter

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
                        <br> Voici le lien pour accepter la requête : <a href=\"nids/controller/validationSecondaire.php?grp=$renvoi&ajt=$ajoute&m=$logementsec\">Cliquez ici</a>
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