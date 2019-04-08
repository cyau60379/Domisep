

<html>
<body>




<table cellspacing = "0" cellpadding = "0" border="0" width =500px>

    <?php


    ?>
    <caption>CATALOGUE CAPTEURS</caption>
    <thead>
    <tr >
        <td class = 'head'>Nom Capteur</td>

        <td class = 'head'>Image Capteur</td>

        <td class = 'head' >Description Capteur</td>

        <td class = 'prix'>PRIX</td>
    </tr>
    </thead>

    <TBODY>
    <tr>
        <td>
            Capteur de mouvement
        </td>
        <td >
            <img class='img' src="Images\CaptureInfra.PNG" alt="capinfra">

        </td>
        <td class = 'descriCapteur'>
            Capteur de mouvement dernière génération. Détecte la présence de mouvement dans l'habitat grâce à un capteur infrarouge
        </td>
        <td class=' prixElement'>

            <input type="button" id = "ajoutCapteur" value="AJOUTER" onclick="AJOUTER" />


        </td>

    </tr>
    <tr>
        <td>
            Capteur de luminsotié
        </td>
        <td  >
            <img class='img' src="Images\capteurLuminosite.PNG" alt="capinfra">
        </td>
        <td class = 'descriCapteur' >Capteur de luminosité à la pointe de la technologie, vous permet de mesurer le taux de luminosité et d'éclairage. Celui-ci est très utile puisqu'il pourra
            déclencher automatiquement l'éclairage électrique de votre maison si celui de l'extérieur venait à diminuer </td>
        <td class='prixElement'>

            <input type="button" id = "ajoutCapteur" value="AJOUTER" onclick="AJOUTER" />
        </td>
    </tr>
    <tr>
        <td>actionneur / moteur
        </td>

        <td >
            <img class = 'img' src="Images\actionneur.PNG" alt="capinfra" >
        </td>

        <td class = 'descriCapteur'>Actionneur, à l'origine des mouvements ou changements d'états des capteurs.

        </td>
        <td class = 'prixElement'>

            <input type="button" id = "ajoutCapteur" value="AJOUTER" onclick="AJOUTER" />
        </td>



    </tr>
    <tr>
        <?php for ($tab =0; $tab<4; $tab ++)

        {echo '<td>'; for ($espace =0; $espace < 10; $espace ++){echo '<br>';}'</td>';}
        ?>
    </tr>

    </TBODY>
    <tfoot>
    </tfoot>

</body>


</table  >

</html>


<style>

 input{

     background-color : black;
     height: 25px;
     width: 75px;
     color : white;

 }



    .descriCapteur{
        width: 12%;
        margin-top: 0px;
        padding-left: 0px;
        padding-right: 0px;
        color : white;
    }


    .prixElement{
        width: 8%;
        margin-top: 0px;
        padding-left: 0px;
        padding-right: 0px;
        color : red;
    }

    .img{
        width : 150px;
        height: 150px;
        border : solid;
        border-color: black;
        border-width: 10px;
        border-style: inset;
    }
    caption{
        color : white;
        padding-top: 8px;
        padding-bottom: 50px;
        font-size: 55px;

    }
    body{
        background-color: #05083E;
    }


    td{
        border : 1px solid white;
        text-align: center;
        padding-left : 150px;
        padding-right: 150px;
        padding-bottom: 10px;
        padding-top: 10px;
        color: white;



    }
    .prix{
        border : 1px solid white;
        padding-left : 30px;
        padding-right: 30px;
        padding-bottom: 10px;
        padding-top: 10px;
        color: white;
        font-weight: bolder;
    }
    .head{
        margin-top: 0px;
        padding-left: 0px;
        padding-right: 0px;
        font-weight: bolder;
        width: 12px;
    }

</style>

