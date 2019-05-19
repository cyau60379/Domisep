<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Catalogue</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen " href="../design/style.css" type="text/css" />
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<table cellspacing = "0" cellpadding = "0" border="0" style="margin: auto">
    <caption>CATALOGUE CAPTEURS</caption>
    <thead>
    <tr>
        <td class='catalogue nom head'>Nom Capteur</td>
        <td class='catalogue nom head'>Image Capteur</td>
        <td class='catalogue head' >Description Capteur</td>
        <?php if($ajout):?>
        <td class='catalogue head'>Ajouter ?</td>
        <?php endif;?>
    </tr>
    </thead>

    <tbody>
    <?php foreach($tabCatalogue as $key => $value):?>
    <tr>
        <td class='catalogue nom'>
            <?php echo $value[0]?>
        </td>
        <td class='catalogue nom'>
            <img class='img' src="../Images\<?php echo $value[0];?>.png" alt="<?php echo $value[0];?>">
        </td>
        <td class='catalogue descriCapteur'>
            <?php echo $value[1];?>
        </td>
        <?php if($ajout):?>
        <td class='catalogue prixElement'>
            <input class="bouton boutonGlobal <?php echo $id;?> boutonAjout2" type="button" id ="<?php echo $key;?>" value="Ajouter" onclick="ajouterCapteur(this.id, this.classList[2])" />
        </td>
        <?php endif;?>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>


