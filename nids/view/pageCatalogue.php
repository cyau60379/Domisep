<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Catalogue</title>
    <link rel="shortcut icon" href="Images/logoNids.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<table cellspacing = "0" cellpadding = "0" border="0">
    <caption>CATALOGUE CAPTEURS</caption>
    <thead>
    <tr>
        <td class='catalogue nom head'>Nom Capteur</td>
        <td class='catalogue nom head'>Image Capteur</td>
        <td class='catalogue head' >Description Capteur</td>
        <td class='catalogue head'>Ajouter ?</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach($tabCatalogue as $key => $value):?>
    <tr>
        <td class='catalogue nom'>
            <?php echo $value[0]?>
        </td>
        <td class='catalogue nom'>
            <img class='img' src="Images\<?php echo $value[0]?>.png" alt="<?php echo $value[0]?>">
        </td>
        <td class='catalogue' class = 'descriCapteur'>
            <?php echo $value[1]?>
        </td>
        <td class='catalogue prixElement'>
            <input class="ajouter" type="button" id = "ajoutCapteur" value=" AJOUTER" onclick="AJOUTER" />
        </td>

    </tr>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>

<style>

 input.ajouter{
     background-color : black;
     height: 25px;
     width: 75px;
     color : white;
 }

    .descriCapteur{
        margin-top: 0;
        padding-left: 0;
        padding-right: 0;
        color : white;
    }

    .prixElement{
        margin-top: 0;
        padding-left: 0;
        padding-right: 0;
    }

    .img{
        width: 150px;
        height: 150px;
        border-color: black;
        border-width: 10px;
        border-style: inset;
    }
    caption{
        color : white;
        padding-top: 8px;
        padding-bottom: 50px;
        font-size: 55px;
        margin: auto;
        justify-content: center;
    }

    td.catalogue{
        border : 1px solid white;
        text-align: center;
        padding: 10px 100px 10px 100px;
        width: 100%;
    }
    td.nom {
        width: 20%;
    }
    .head{
        margin-top: 0;
        padding-left: 0;
        padding-right: 0;
        font-weight: bolder;
        width: 12px;
    }

</style>

