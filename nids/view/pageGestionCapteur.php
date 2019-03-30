<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestionnaire des capteurs</title>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="/design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div class="container gestionGlobale">
    <form method="post" action="/controller/gestionCapteur.php" style="margin: 15px"> <!-- à déterminer -->
        <label for="tempChoix">Température du logement voulue:</label>
        <input id="tempChoix" style="width: 50px; height: 30px; text-align: center;" type="number" name="temp" value="20" min="0" max="25"> °C
        <input class="bouton" type="submit" value="Valider">
    </form>
    <button class=' bouton boutonGlobal'>Tout éteindre</button>
    <button class="bouton boutonGlobal">Tout fermer</button>
</div>

<div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
    <?php foreach($pieces as $p):?>
        <input onclick="recupCapteurs(this.value, this.id); return activerBouton(this.id);" type="button" id="<?php echo tabToString($capteurs[$p]);?>" class="boutonFil" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
    <?php endforeach;?>
</div>

<div class="container">
    <a href="/controller/catalogue.php"><button class="bouton boutonAjout"><i class="fa fa-plus-circle" aria-hidden="true"></i> Ajouter un élément</button></a>
</div>

<li id="zoneCapteurs">

</li>
</body>
</html>
