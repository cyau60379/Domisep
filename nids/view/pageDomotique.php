<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Support</title>
    <link rel="shortcut icon" href="Images/logoNids.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant javascript?>
</head>

<div class="support">
    <h3 style="color: #FFFFFF">Domotique</h3>
</div>

<div id="boite">
    <form action="../index.php?cible=gestionCapteur" method="post" class="form">
        <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
        <input type='hidden' name='id' value='<?php echo $id;?>'>
        <button type="submit" id="fa-home" class="choixPage2">
            Gestion de vos capteurs
        </button>
        <br>
        <br>
        <p id="prod" class="explications" onmouseover='miseEnValeur(this.id);' onmouseout='changerBordure(this.id);'>Accès à la gestion des<br>
            capteurs présents chez vous
        </p>
    </form>

    <form action="../index.php?cible=<?php if($type == 2): echo "gestionClient"; else: echo "statistique"; endif;?>" method="post" class="form">
        <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
        <input type='hidden' name='id' value='<?php echo $id;?>'>
        <button type="submit" id="fa-file-text-o" class="choixPage2">
            Gestion de vos logements
        </button>
        <br>
        <br>
        <p id="foireaq" class="explications" onmouseover='miseEnValeur(this.id);' onmouseout='changerBordure(this.id);'>Accéder aux statistiques <br>de vos logements<br>
            <?php if($type == 2): //cas du gestionnaire?>
            et gérer les clients de chacun
            <?php endif;?>
        </p>
    </form>
</div>
</html>