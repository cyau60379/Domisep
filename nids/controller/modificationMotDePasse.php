<?php
/**
 * Created by PhpStorm.
 * User: Rapha
 * Date: 17/05/2019
 * Time: 15:35
 */

include_once ($_SERVER["DOCUMENT_ROOT"] . "/model/requetesUtilisateur.php");
$mdpbislol="";
$mdp="";
$adresseMail="";

if (isset ($_POST['new_pass'])&& isset($_POST['new_pass_conf']) && isset($_POST['mail'])) {
    $mdp = $_POST['new_pass']; //depuis la page changerDeMotDepasse.php
    $mdpbislol = $_POST['new_pass_conf'];
    $adresseMail = $_POST['mail'];

    if ($mdp == $mdpbislol) {
        $mdpcript = password_hash($mdp, PASSWORD_DEFAULT);
        update($bdd, $mdpcript, $adresseMail);
    } else {
        echo 'Vous n\'avez pas tapé deux fois le même mot de passe';

    }
}

?>