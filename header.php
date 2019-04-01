<?php
/**
 * Created by PhpStorm.
 * User: Rapha
 * Date: 22/03/2019
 * Time: 15:40
 */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" type="text/css", href="styleHeader.css">
<html>

<head>
</head>
<body>
<div class="header">


            <img src="logonids.png" alt="notre logo" class="flotte">

            <h1>
                Numérique et intelligence pour demeure sécurisée
            </h1>
</div>

<div class = "firstheader">



</div>


<div class = "second_header">

    <button class="Domotique">

        <i class="fa fa-home" style="color: white; "></i>  Domotique
    </button>


    <button class="EditerProfil">

        <i class=" fa fa-file-text-o" style="color: white; "></i>  Editer profil
    </button>

    <button class="Support">

        <i class="fa fa-question" style="color: white; "></i>  Support
    </button>

    <p class="prenom"> <?php echo $_NomUtilisateur['prenom']; ?> est votre prénom !</p>

    <button class="Deconnexion">

        Déconnexion
        <a href = "index.php?" cible = "connexion"&fonction = "deconnexion">

        </a>
    </button>







</div>

</body>


</html>



