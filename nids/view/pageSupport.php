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
    <h3 style="color: #FFFFFF">Support</h3>
</div>

<div id="boite">
    <form class="form" action="http://nids/catalogue" method="post" >
        <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
        <input type='hidden' name='id' value='<?php echo $id;?>'>
        <button type="submit" id="fa-home" class="choixPage">
            <i class="fa fa-file-text"></i> Produits
        </button>
        <br>
        <br>
        <p id="prod" class="explications" onmouseover='miseEnValeur(this.id);' onmouseout='changerBordure(this.id);'>Accès au pannel de nos<br><br>
            produits sur notre catalogue
        </p>
    </form>

    <form class="form" action="http://nids/FAQ" method="post" >
        <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
        <input type='hidden' name='id' value='<?php echo $id;?>'>
        <button type="submit" id="fa-file-text-o" class="choixPage">
            <i class="fa fa-question-circle"></i> FAQ
        </button>
        <br>
        <br>
        <p id="foireaq" class="explications" onmouseover='miseEnValeur(this.id);' onmouseout='changerBordure(this.id);'>Besoin d'aide?<br>
            <br>
            Accès à notre foire aux questions
        </p>
    </form>

    <form class="form" action="http://nids/forum" method="post">
        <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
        <input type='hidden' name='id' value='<?php echo $id;?>'>
        <button id="fa-question" class="choixPage">
            <i class="fa fa-map-marker"></i> Forum
        </button>
        <br>
        <br>
        <p id="forum" class="explications" onmouseover='miseEnValeur(this.id);' onmouseout='changerBordure(this.id);'> Sinon posez une questions <br><br>à notre communauté</><br>
        <br>
        ils seront ravis de vous répondre ;)
        </p>
    </form>

</div>
<div class="contacteznous">
    <h3 style="color: #FFFFFF">Contactez-nous</h3>
</div>

<div id="boite" style="flex-flow: wrap">
    <a href="https://www.facebook.com/genesisbde/" ><img src="Images/facebook.png" class="imgfb" alt="fb"/></a>
    <a href="https://www.facebook.com/genesisbde/" ><img src="Images/Twitter.png" class="imgtwt" alt="twitter"/></a>
    <a href="https://www.youtube.com/watch?v=u4HlUyVC2CE" ><img src="Images/youtube.png" class="imgyou" alt="yt"/></a>

    <p class="explications">Adresse : 10 Rue de Vanves <br><br> 92130 Issy-Les-Moulineaux<br><br>Numéro de tel: 09XXXXXXXX<br><br>Mail: NIDS@iBep.com</p>
</div>

</html>