<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Forum</title>
    <link rel="shortcut icon" href="Images/logoNids.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<div class="container titre">

    <h1>Forum</h1>

</div>

<form name="formulaireF" class="formulaire">  <!-- formulaire permettant de connaître le type d'annonce voulue -->

    <label> <h1 style="color: white">Article</h1> <br> Titre :
        <br>
        <textarea class="texte" name="Titre" cols="30" rows="1"></textarea>
        <br>
        <br>
        <p style="color: white"> Contenu : </p>
        <br>
        <textarea name="Contenu" class="contenu" cols="30" rows="5"></textarea>
    </label>

    <br>
    <div class="division">
        <button type="button" class="bouton boutonGlobal2" style="float: none" onclick="ajoutF('forum');">    <!-- envoie au controllerAnnonces le résultat du formulaire2 -->
            Envoyer
        </button>
    </div>
</form>

<br>
<br>
<br>
<div id="articles">
    <?php print_r($tabComment);
    afficheArticle($tabForum, $tabComment, $tabDate, $ids)?>
</div>

</html>