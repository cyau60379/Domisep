<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:38
 */
try{
    $bdd = new PDO('mysql:host=localhost:8080;dbname=NIDS;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}           // a modifier avec BDD NIDS
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}