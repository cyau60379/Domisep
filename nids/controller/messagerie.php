<?php

$login = "";
if (isset($_POST['mail'])) {
    $login = $_POST['mail'];

    $sujet = "Modification de votre mot de passe";
    $header = "MIME-Version: 1.0\r\n";
    $header .= 'From:"NIDS"<contactservice123456@gmail.com>' . "\n";
    $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
    $header .= 'Content-Transfer-Encoding: 8bit';
    $messsage = '<html>
                    <body>
                        <div align="center">
                            <h1>Pour changer de mot de passe, cliquez ici : 
                                    <a href="http://nids/index.php?changement=1">Changez de mot de passe</a>
                            </h1>
                        </div>';

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $login)) {
        $passage_ligne = "\r\n";
    } else {
        $passage_ligne = "\n";
    }

    try {
        mail($login, $sujet, $messsage, $header);
        echo "Votre mail a été envoyé
            <br>
            <br>
            Mais la prochaine fois, achète toi de la matière grise pour retenir ton mot de passe</body></html>";
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
}
?>