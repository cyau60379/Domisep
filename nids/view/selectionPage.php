<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" type="text/css" href="design/styleHeader.css">
</head>
<body onresize="changerContenu('nom')">
    <div class = 'bandeau'>
        <div>
            <button id='fa-home' class='choixPage Domotique' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
                <i class='fa fa-home'></i>
            </button>

            <button id='fa-file-text-o' class='choixPage Profil' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
                <i class='fa fa-file-text-o'></i>
            </button>

            <button id='fa-question' class='choixPage Support' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
                <i class='fa fa-question'></i>
            </button>
        </div>

        <div>
            <p id='nom' class='prenom <?php echo $utilisateur;?>'><?php echo $utilisateur;?></p>
            <button class='bouton' style='height: 40px'>
                Déconnexion
                <a href = '/index.php?cible=connexion&fonction=deconnexion'></a>
            </button>
        </div>
    </div>
</body>
</html>