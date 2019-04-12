

<html>
<head>
    <meta name="viewport" content="width=device-width"/>
</head>
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
            <?php

            $bdd = new PDO('mysql:host=localhost;dbname=nids;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT Description FROM element_catalogue WHERE id = 1' );
            $donnees = $reponse->fetchAll();

            print_r($donnees[0]['Description']);?>


            //[0] => "température";[1] => "température"
            //PDO :: fetch_func, "___")
        </td>
        <td class=' prixElement'>

            <input type="button" id = "ajoutCapteur" value=" AJOUTER" onclick="AJOUTER" />




        </td>

    </tr>
    <tr>
        <td>
            Capteur de luminsotié
        </td>
        <td  >
            <img class='img' src="Images\capteurLuminosite.PNG" alt="capinfra">
        </td>
        <td class = 'descriCapteur' >
        <?php

        //include ($_SERVER["DOCUMENT_ROOT"] . "nids/model/connexionBDD.php");

        $bdd = new PDO('mysql:host=localhost;dbname=nids;charset=utf8', 'root', '');
        $reponse = $bdd->query('SELECT Description FROM element_catalogue WHERE id = 2' );
        $donnees = $reponse->fetchAll();

        print_r($donnees[0]['Description']);?></td>
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

        <td class = 'descriCapteur'>
<?php
//include ($_SERVER["DOCUMENT_ROOT"] . "nids/model/connexionBDD.php");

            $bdd = new PDO('mysql:host=localhost;dbname=nids;charset=utf8', 'root', '');
            $reponse = $bdd->query('SELECT Description FROM element_catalogue WHERE id = 3' );
            $donnees = $reponse->fetchAll();

            print_r($donnees[0]['Description']);?>
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
        width:100%;
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

