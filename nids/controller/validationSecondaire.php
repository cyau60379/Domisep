<?php

include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
include_once ("fonctions.php");

//test du login

if(isset($_GET['grp']) && isset($_GET['ajt']) && isset($_GET['m'])){

    $renvoi = $_GET['grp'];
    $log = $_GET['m'];
    $gest = intval((sqrt($renvoi) - 666) / 3);
    $ajoute = $_GET['ajt'];
    $client = intval((sqrt($ajoute) - 333) / 6);
    $nomGest = decoupeString2(recupererUtilisateur($bdd, $gest));
    $relation = recupRelation($bdd, $gest, $client);
    if (empty($relation)){                      //verifier que la personne n'est pas déjà liée
        ajouterComptesSecondaires($bdd, $gest, $client, $log);
    }
}

include_once ($_SERVER["DOCUMENT_ROOT"] . "/view/header.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/view/pageValidationSecondaire.php");
include_once ($_SERVER["DOCUMENT_ROOT"] . "/view/footer.php");