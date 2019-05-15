<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Gestionnaire des capteurs</title>        <!-- titre de la page -->
    <link rel="shortcut icon" href="../Images/logoNids.ico" />     <!-- mettre une icone sur l'onglet du navigateur -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- banque d'icones -->
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
    <?php foreach($logement as $id => $p):?>
        <input onclick="changerLogement2(this.id); return activerBouton2(this.id);" type="button" id="<?php echo $id;?>" class="boutonAppart" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
    <?php endforeach;?>
</div>

<div id="zoneGestion">          <!-- div qui contiendra les pièces du logement choisi -->
    <p class="info">Veuillez choisir un logement</p>
</div>
</body>
</html>
