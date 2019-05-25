<?php //C:\wamp64\bin\apache\apache2.4.37\bin\php.ini?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Changement mot de passe</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico"/>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once("fonctions.php");      //inclut les fonctions JS?>
</head>
<body>
<div id="divReponse">
    Hello
</div>
<h1 class="mdpo"> MOT DE PASSE OUBLIÉ ?</h1>

<h3 class="mdpo">Rentrez votre adresse mail</h3>
<div id="retour">
<form name="mdp">       <!-- formulaire pour recuperer l'adresse mail et envoyer un lien -->
    <label>
        <input class="mdpot" type="text" name="mail" oninput="validationnn(this.name)">
        <p id="resultat">.</p>
    </label>
    <br>

    <input class="boutton_mdpo" type = "button" value = "Envoyer" onclick="formulaireMdp()">
</form>
</div>
</body>