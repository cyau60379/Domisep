<?php

include_once("fonctions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");

$login = "";
if (isset($_POST['mail'])) {
    $login = $_POST['mail'];

    $sujet = "Modification de votre mot de passe";
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $messsage = "<div align='center'>
                            <h1>Pour changer de mot de passe, cliquez ici : 
                                    <a href='http://nids/chgnt/1'>Changez de mot de passe</a>
                            </h1>
                        </div>";

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $login)) {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }

    try {
        mail($login, $sujet, $messsage, $header);
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
}
?>