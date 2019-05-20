<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>FAQ</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico" />
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs?>
</head>
<body>

<div class="container titre">
    <h1>FAQ</h1>

</div>
<?php if($ajout):?>
<form name="formulaireF" class="formulaire">  <!-- formulaire permettant de connaître le type d'annonce voulue -->
    <label> <h1>Article</h1> <br>
        Titre :
        <br>
        <textarea class="texte" name="Titre" cols="30" rows="1"></textarea>
        <br>
        <br>
        Contenu :
        <br>
        <textarea name="Contenu" class="contenu" cols="30" rows="5"></textarea>
    </label>
    <br>
    <div class="division">
        <button type="button" class="bouton boutonGlobal2" style="float: none" onclick="ajoutF('FAQ');">    <!-- envoie au controllerAnnonces le résultat du formulaire2 -->
            Envoyer
        </button>
    </div>
</form>
<?php endif; ?>
<div id="articles">
    <?php afficheArticle2($tabFaq, $ajout, $ids);?>
</div>
</body>
</html>

