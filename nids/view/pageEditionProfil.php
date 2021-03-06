<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Edition de profil</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico"/>

    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div id="divReponse">
    Hello
</div>

<div id="zoneClients">
    <li class='caseClient <?php if($ajout):?>compte<?php else:?>compte2<?php endif;?>' id='divClients'>     <!-- Contient les options de modifications de profil -->
        <div class='titre titreSup titre2'>Edition de profil</div>
        <div class="bloc">
            <form name="modification">
                <div id="typeUtilisateur">
                     Type : <?php echo $coord["type"]?>
                    <?php if($ajout):?>
                    <button type="button" class="bouton bouton3" onclick="modifStatut()">
                        Modifier
                    </button>
                    <?php endif;?>
                </div>

                <p> <label class="ed" for="nom">Nom:</label>
                    <input class="edi" type="text" id="nom" name="user_nom" placeholder="<?php echo $coord["Nom"]?>"></p>

                <p> <label class="ed" for="prenom"> Prenom:</label>
                    <input class="edi" type="text" id="prenom" name="user_prenom" placeholder="<?php echo $coord["Prenom"]?>"></p>

                <p> <label class="ed" for="mail"> E-mail:</label>
                    <input class="edi" type="email" id="email" name="user_email" placeholder="<?php echo $coord["Adresse_mail"]?>"></p>

                <p> <label class="ed" for="phone"> N° de téléphone:</label>
                    <input class="edi" type="tel" id="phone" name="user_phone" placeholder="<?php echo $coord["numeroTel"]?>"></p>

                <p> <label class="ed" for="date"> Date de naissance:</label>
                    <input class="edi" type="date" id="date" name="user_date" value="<?php echo $coord["Date_naissance"]?>"></p>

                <div id="typeUtilisateur">
                        <a href="http://nids/modificationMotDePasse"><button type="button" class="bouton edi">
                            Modifier votre mot de passe
                        </button></a>
                </div>

                <p> <label class="ed" for="question"> Question vérification:</label>
                    <input class="edi" type="text" id="question" name="user_question" placeholder="<?php echo $coord["Question_verif"]?>"></p>

                <p> <label class="ed" for="reponse"> Réponse vérification:</label>
                    <input class="edi" type="text" id="reponse" name="user_response" placeholder="<?php echo $coord["Reponse_verif"]?>"></p>

                <input type="button" onclick="modificationUser()" class="bouton edi" style="float: right" value="Modifier les informations" />
            </form>
        </div>
        <?php if($ajout):?>
        <div class="bloc"><!-- début romuald -->
            <div class="titre titreSup"> Comptes secondaires liés  <a href='javascript:ajoutCompteSec()'>
                    <i class='fa fa-plus-circle editionCapteur' style='color: black;' aria-hidden='true' id='$c[0]'></i>
                </a></div>
            <div class="listPersonne">
                <div class="list2"><!-- romumumumumumumu -->
                    <ul>
                        <?php afficheComptesSecondaire($ComptesSecondaires);?>
                    </ul>
                </div>
            </div>
        </div>
    </li>
            <li class='caseClient' id='divClients2'>     <!-- Contient les options de modifications de logement -->
                <div class='titre titreSup'>Logement
                    <a href='javascript:ajoutLogement()'>
                        <i class='fa fa-plus-circle editionCapteur' style='color: black;' aria-hidden='true'></i>
                    </a>
                    <a href='javascript:suppressionLogement()'>
                        <i class='fa fa-minus-circle editionCapteur' style='color: black;' aria-hidden='true'></i>
                    </a>
                </div>
                <div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
                    <?php foreach($logement as $id => $p):?>
                        <input onclick="changerLogement3(this.id); return activerBouton3(this.id);" type="button" id="<?php echo $id;?>" class="boutonFil2" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
                    <?php endforeach;?>
                </div>
                <div class="container">
                    <div id="gestionPieces">
                        <p class="info" style="color: black">Veuillez choisir un logement</p>
                    </div>
                </div>
            </li>
        <?php endif;?>
</div>

</body>
</html>