<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 19/03/2019
 * Time: 21:38
 */
try{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=nids;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}           // a modifier avec BDD NIDS
catch(Exception $e)
{
    die('Erreur :'.$e->getMessage());
}