<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Support</title>
    <link rel="shortcut icon" href="Images/logoNids.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>

<div id="boite">
    <h3 style="color: #FFFFFF">Contactez-nous</h3>
</div>

<div id="boite">
    <div>
        <form action="../index.php" method="post">
            <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
            <input type='hidden' name='id' value='<?php echo $id;?>'>
            <input type='hidden' name='cible' value='catalogue'>
            <button type="submit" id="fa-home" class="choixPage">
                <i class="fa fa-file-text"></i> produits
            </button>
        </form>

        <form action="../index.php" method="post">
            <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
            <input type='hidden' name='id' value='<?php echo $id;?>'>
            <input type='hidden' name='cible' value='FAQ'>
            <button type="submit" id="fa-file-text-o" class="choixPage">
                <i class="fa fa-question-circle"></i> FAQ
            </button>
        </form>

       <!-- <form action="../index.php" method="post"> -->
          <!--  <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
            <input type='hidden' name='id' value='<?php echo $id;?>'>
            <input type='hidden' name='cible' value='catalogue'> -->
            <button id="fa-question" class="choixPage"> <!--type="submit"-->
                <i class="fa fa-map-marker"></i> Forum
            </button>
       <!-- </form> -->

    </div>
</div>

</html>