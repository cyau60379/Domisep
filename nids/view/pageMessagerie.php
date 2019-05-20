<?php //C:\wamp64\bin\apache\apache2.4.37\bin\php.ini?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Changement mot de passe</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico"/>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once("fonctions.php");      //inclut les fonctions concernant les capteurs?>
</head>
<body>

<h1> MOT DE PASSE OUBLIE ?</h1>

<h3>Rentrez votre adresse mail</h3>
<form name="mdp">
    Votre adresse mail : <input type = "text" name = "mail"><br/>
    <input type = "button" value = "Envoyer" onclick="formulaireMdp()">
</form>

</body>