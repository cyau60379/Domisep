<?php
/**
 * Created by PhpStorm.
 * User: Rapha
 * Date: 22/03/2019
 * Time: 15:40
 */
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel = "stylesheet" type="text/css" href="design/styleHeader.css">
<html>
<body onresize="changerContenu('nom')">
<header>
    <div class="header">
        <img src="Images/logoNids.png" alt="notre logo" class="logo">
        <h1>
            Numérique et Intelligence pour Demeure Sécurisée
        </h1>
    </div>
    <div class="separation">
    </div>
    <div class = "bandeau">
        <div>
            <button id="fa-home" class="choixPage Domotique" onmouseover="montrerTitre(this.id, this.classList[1]);" onmouseout="cacherTitre(this.id);">
                <i class="fa fa-home"></i>
            </button>

            <button id="fa-file-text-o" class="choixPage Profil" onmouseover="montrerTitre(this.id, this.classList[1]);" onmouseout="cacherTitre(this.id);">
                <i class=" fa fa-file-text-o"></i>
            </button>

            <button id="fa-question" class="choixPage Support" onmouseover="montrerTitre(this.id, this.classList[1]);" onmouseout="cacherTitre(this.id);">
                <i class="fa fa-question"></i>
            </button>
        </div>

        <div>
            <p id="nom" class="prenom <?php echo $utilisateur;?>"><?php echo $utilisateur;?></p>
            <button class="bouton" style="height: 40px">
                Déconnexion
                <a href = "/index.php?cible=connexion&fonction=deconnexion"></a>
            </button>
        </div>
    </div>
</header>
</body>
</html>



