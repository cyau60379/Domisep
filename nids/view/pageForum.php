<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Support</title>
    <link rel="shortcut icon" href="Images/logoNids.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<br>
<br>
<div class="container titre">

    <h1>Forum</h1>

</div>
<br>
<br>
<br>
<form name="formulaireForum" class="formulaire">  <!-- formulaire permettant de connaître le type d'annonce voulue -->
    <label> <h1>Article</h1> <br>
        TITRE :
            <input class="texte" type="text" name="Titre">
        <br>
        <br>
        Contenu:
        <br>
            <textarea name="Contenu" class="contenu" cols="30" rows="5"></textarea>
    </label>




    <br>
    <div class="division">
        <button type="button" class="bouton" onclick="ajoutForum();">    <!-- envoie au controllerAnnonces le résultat du formulaire2 -->
            Envoyer
        </button>
    </div>
</form>
<br>
<br>
<br>
<div id="articles">
    <?php
    $i = 0;
    foreach($tabForum as $q => $r):?>
        <section class="faq-section">
            <input type="checkbox" id="<?php echo $i;?>">
            <label for="<?php echo $i;?>"><?php echo $q;?></label>
            <p> <?php echo $r;?></p>
        </section>
        <?php
        $i += 1;

    endforeach;?>
</div>

</html>