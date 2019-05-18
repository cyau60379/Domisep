<?php
include_once("fonctions.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/gestionClient.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");


//creation du tableau des capteurs de la piece
$clients = array();
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
$id = $_SESSION['idUtilisateur'];
//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));


//============================================ test des clients a afficher

if (isset($_GET['logement']) && isset($_GET['id'])) {

    $logementActif = $_GET['logement'];
    $idLogementActif = $_GET['id'];
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);
    $b = affichePieces3($pieces, $id);
    //affiche les infos dans le div qui convient via Javascript
    echo $b;
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