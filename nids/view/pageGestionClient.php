<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Gestionnaire des clients</title>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
    <?php foreach($logement as $id => $p):?>
        <input onclick="changerLogement(this.value, this.id); return activerBouton(this.id);" type="button" id="<?php echo $id;?>" class="boutonFil" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
    <?php endforeach;?>
</div>

<div class="container">
    <a href="/controller/infoCompte.php"><button class="bouton boutonAjout"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un client</button></a>
</div>

<li id="zoneClients">
    <p class="info">Veuillez choisir un logement</p>
</li>
</body>
</html>