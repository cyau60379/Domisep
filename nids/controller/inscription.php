<?php


/* hasher variable fonction, password_hash()*/


include($_SERVER["DOCUMENT_ROOT"] . "/model/capteur.php");

$id = 1;


function verificationConnexion(PDO $bdd, $valAdresse_Mail, $Mdp, $valMdp)
{
    $Mdp = adresse_mailMdp($bdd, $valAdresse_Mail);
    if (password_verify($valMdp, $Mdp)) {
        echo 'Mot de passe valide !';

    } else {
        echo 'Mot de passe invalide ! Si vous avez oublié votre mot de passe appuyez sur "Mot de passe oublié".';
    }
}