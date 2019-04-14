<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body onresize="changerContenu('nom')">

<div id="divReponse">
    Hello
</div>

    <div class = 'bandeau'>
        <div style="display: inherit">
            <?php foreach($pagesPossibles as $key => $value):?>
            <form action="../index.php" method="post">
                <input type='hidden' name='utilisateur' value='<?php echo $utilisateur;?>'>
                <input type='hidden' name='id' value='<?php echo $id;?>'>
                <input type='hidden' name='cible' value='<?php echo $value[0];?>'>
                <button type="submit" id='<?php echo $value[1];?>' class='choixPage <?php echo $key;?>' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
                    <i class='fa <?php echo $value[1];?>'></i>
                </button>
            </form>
            <?php endforeach;?>
        </div>

        <div>
            <p id='nom' class='prenom <?php echo $utilisateur;?>'><?php echo $utilisateur2;?></p>
            <button class='bouton' style='height: 40px' onclick="deconnexionUser()">
                Déconnexion
            </button>
        </div>
    </div>
</body>
</html>