<?php
/**
 * Controleur des capteurs
 */

include_once ("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");

//creation du tableau des capteurs de la piece
$capteurs = array();

// test de la session, si cette dernière n'est pas active, la redémarrer
if(!isset($_SESSION['idUtilisateur'])){
    session_start();
}
//id de l'utilisateur
$id = $_SESSION['idUtilisateur'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=007A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);
$data_tab = str_split($data,33);
$size = sizeof($data_tab);
$indice = recupIndice($bdd, $id);
for($i = $indice; $i < $size - 1; $i++){
    list($type,$equipe,$req,$c,$n,$valCap,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($data_tab[$i],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
    $date = "$year-$month-$day $hour:$min:$sec";
    //verif de l'autheticité de la trame
    $trame = $type . $equipe . $req . $c . $n . $valCap . $a;
    $sum = 0;
    for($j = 0; $j < strlen($trame); $j++){     //conversion du code ascii en decimal
        $sum += 48 + intval(hexdec($trame[$j]));
        if(intval(hexdec($trame[$j])) > 9) {
            $sum += 7;
        }
    }
    $sum %= 256;
    $check = dechex($sum);
    $x2 = intval(hexdec($x));
    if($sum == $x2){
        updateDonnees($bdd, intval(hexdec($n)), $date, intval(hexdec($valCap)));
    }
}

miseAJourIndice($bdd, $size - 1, $id);
//prendre dans le tableau a partir du i eme element

//récupération du nom de l'utilisateur
$utilisateur = decoupeString3(decoupeString2(recupererUtilisateur($bdd,$id)));//recupération de la forme prenom!nom, puis découpe en prenom nom puis prenom_nom
//pour mettre dans une classe et pas deux avec nom et prénoms


//id des logements du gestionnaire
$logement = decoupeString(recupLogements($bdd, $id));
$location = decoupeString(recupLocation($bdd, $id));
$total = $logement + $location;

//============================================ logements a afficher

if (isset($_POST['logement'])) {

    $idLogementActif = $_POST['logement'];
    $ad = recupLgmnt($bdd, $idLogementActif);
    $adValue = "";
    if (!empty($ad)){
        $adValue = $ad[0];
    }

    //liste des pieces de la maison sous forme array { [0] => $id!$nom ... }
    $listePieces = recuperationPieces($bdd, $idLogementActif);

    //liste des pieces de la maison sous forme array { [$id] => $nom ... }
    $pieces = decoupeString($listePieces);

    //affiche les pièces dans le div qui convient via Javascript
    if(in_array($adValue, $location)){
        affichePiecesLocation($pieces, $idLogementActif, $id, $utilisateur);
    } else {
        affichePieces($pieces, $idLogementActif, $id, $utilisateur);
    }
}

//============================================ test des capteurs a afficher

if (isset($_POST['piece']) && isset($_POST['id'])) {

    //récupération par requête post des données voulues
    $pieceActive = $_POST['piece'];
    $idPieceActive = $_POST['id'];

    //vérification appartient à une location
    $idLoge = recupLogementsParPiece($bdd, $idPieceActive);
    $logValue = "";
    if (!empty($idLoge)){
        $logValue = $idLoge[0];
    }

    //récupérations des données des capteurs sous la forme array { [0] => $id!$nom!$type!$valeur!$actif ... }
    $capteurs = recuperationCapteurs($bdd, $idPieceActive);

    // boucle pour séparer les données de $capteurs
    foreach ($capteurs as $key => $value){

        //tableau des valeurs
        $tabValeurs = preg_split("/\!/", $value);

        //mise de l'activité à l'indice 4 et la valeur à l'indice 3

        $actif = $tabValeurs[3];
        $tabValeurs[3] = recuperationDonnees($bdd, $tabValeurs[0])[0];
        $tabValeurs[4] = $actif;

        //changement du type en son nom plutôt que son id pour récupérer l'image adéquate

        $tabValeurs[2] = recupTypeCap($bdd, $tabValeurs[2]);

        //remise des données pour avoir un tableau de tableau
        $capteurs[$key] = $tabValeurs;
    }

    //affichage des capteurs dans le bon div
    if(array_key_exists($logValue, $location)){
        afficheCapteurLocation($capteurs);
    } else {
        afficheCapteur($capteurs);
    }
}

//============================================ test des capteurs a supprimer

if (isset($_POST['id'])){
    supprimerCapteur($bdd, $_POST['id']);
}

//============================================ test de la température a donner a la maison

if (isset($_POST['temp'])) {
    $temperature = $_POST['temp'];
    miseAJourTemp($bdd, $temperature, $id);
}
//============================================ test de l'activité (allumé ou éteint) des capteurs

if (isset($_POST['allume']) && isset($_POST['idCap'])) {
    $actif = $_POST['allume'];
    $idCapt = $_POST['idCap'];
    miseAJourActif($bdd, $actif, $idCapt);
}
//============================================ test de la position du volet d'indice idCap2 récupérer par post

if (isset($_POST['positionVolet']) && isset($_POST['idCap2'])) {

    $volet = $_POST['positionVolet'];
    $idCapt2 = $_POST['idCap2'];
    $position = recupAncienPosition($bdd, $idCapt2);
    $action = 0;
    $time = 0;
    if ($position > $volet){
        $action = 2;
        $time = $position - $volet;
    } elseif ($position < $volet) { //ouverture
        $action = 1;
        $time = $volet - $position;
    } else {        //fermeture
        $action = 0;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=007A&TRAME=1007A2a02000".$action."10");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    sleep($time);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=007A&TRAME=1007A2a02000010");
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);

    miseAJourVolet($bdd, $volet, $idCapt2);
    afficheCapteur($capteurs);
}
//============================================ test de l'extinction totale

if (isset($_POST['idEteindre'])) {

    $idMaison = $_POST['idEteindre'];
    extinction($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de la fermeture totale

if (isset($_POST['idFermer'])) {

    $idMaison = $_POST['idFermer'];
    fermeture($bdd, $idMaison);
    afficheCapteur($capteurs);
}

//============================================ test de l'allumage totale

if (isset($_POST['idAllumer'])) {

    $idMaison = $_POST['idAllumer'];
    allumage($bdd, $idMaison);
    afficheCapteur($capteurs);
}
//============================================ test de l'ouverture totale

if (isset($_POST['idOuvrir'])) {

    $idMaison = $_POST['idOuvrir'];
    ouverture($bdd, $idMaison);
    afficheCapteur($capteurs);
}


//============================================ Changement des données en fonction de ce que l'utilisateur souhaite

if (isset($_POST['modifNom']) && isset($_POST['idDuCapteur'])) {

    $idCap = $_POST['idDuCapteur'];
    $name = $_POST['modifNom'];
    if($name != ""){
        updateNom($bdd, $idCap, $name);
    }
}

?>