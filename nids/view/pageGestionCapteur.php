<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Gestionnaire des capteurs</title>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div class="container gestionGlobale">
    <div style="margin: 15px">
        <label for="tempChoix">Température du logement voulue:</label>
        <input id="tempChoix" style="width: 50px; height: 30px; text-align: center;" type="number" name="temp" value=20 min=0 max=25> °C
        <input class="bouton" type="submit" value="Valider" onclick="changerTemperature(document.getElementById('tempChoix').value)">
    </div>
    <button onclick="changer(this.id, 'eteindre', 'éteint')" class=' bouton boutonGlobal' id ='<?php echo ($logement + 100000)?>'>Tout éteindre</button>
    <button onclick="changer(this.id, 'fermer', 'fermé')" class="bouton boutonGlobal" id ='<?php echo ($logement + 100000)?>'>Tout fermer</button>
    <button onclick="changer(this.id, 'allumer', 'allumé')" class=' bouton boutonGlobal' id ='<?php echo ($logement + 100000)?>'>Tout allumer</button>
    <button onclick="changer(this.id, 'ouvrir', 'ouvert')" class="bouton boutonGlobal" id ='<?php echo ($logement + 100000)?>'>Tout ouvrir</button>
</div>

<div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
    <?php foreach($pieces as $id => $p):?>
        <input onclick="changerPiece(this.value, this.id); return activerBouton(this.id);" type="button" id="<?php echo $id;?>" class="boutonFil" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
    <?php endforeach;?>
</div>

<div class="container">
    <a href="/controller/catalogue.php"><button class="bouton boutonAjout"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un élément</button></a>
</div>

<li id="zoneCapteurs">
    <p class="info">Veuillez choisir une pièce</p>  <!-- à améliorer -->
</li>
</body>
</html>
