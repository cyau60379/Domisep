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
    <li class='caseClient' id='divClients'>     <!-- Contient les options de modifications de profil -->
        <div class='titre titreSup'>Edition de profil</div>
        <div class="bloc">
            <form class="formulaire" name="modification">
                <input type='hidden' name='cible' value='editionProfil'>
                <input type='hidden' name='id' value= "<?php echo $id ?>">
                <input type='hidden' name='utilisateur' value= "<?php echo $utilisateur?>" >
                <p> <label class="ed" for="nom">Nom:</label>
                    <input class="edi" type="text" id="nom" name="user_nom" placeholder="<?php echo $coord["Nom"]?>"></p>

                <p> <label class="ed" for="prenom"> Prenom:</label>
                    <input class="edi" type="text" id="prenom" name="user_prenom" placeholder="<?php echo $coord["Prenom"]?>"></p>

                <p> <label class="ed" for="mail"> E-mail:</label>
                    <input class="edi" type="email" id="email" name="user_email" placeholder="<?php echo $coord["Adresse_mail"]?>"></p>

                <p> <label class="ed" for="phone"> N° de téléphone:</label>
                    <input class="edi" type="tel" id="phone" name="user_phone" placeholder="<?php echo $coord["numeroTel"]?>"></p>

                <p> <label class="ed" for="birth"> Date de naissance:</label>
                    <input class="edi" type="date" id="date" name="user_date" value="<?php echo $coord["Date_naissance"]?>"></p>

                <p> <label class="ed" for="pass"> Mot de passe:</label>
                    <input class="edi" type="password" id="pass" name="user_pass" placeholder="<?php echo $coord["Mot_de_passe"]?>"></p>

                <p> <label class="ed" for="question"> Question vérification:</label>
                    <input class="edi" type="text" id="question" name="user_question" placeholder="<?php echo $coord["Question_verif"]?>"></p>

                <p> <label class="ed" for="reponse"> Réponse vérification:</label>
                    <input class="edi" type="text" id="reponse" name="user_response" placeholder="<?php echo $coord["Reponse_verif"]?>"></p>

                <p> <label class="ed" for="type"> Type:</label>
                    <input class="edi" type="number" id="type" name="user_type" disabled placeholder="<?php echo $coord["id_type_utilsateur"]?>" min="1" max="2"></p>

                <input type="button" onclick="modificationUser()" class="bouton edi" style="float: right" value="Modifier les informations" />
            </form>
        </div>

        <div class="bloc">
            <div class="titre titreSup"> Comptes secondaires liés  <input class="imgInput" type="image" src="Images/plus-circle-solid.svg" /></div>
            <div class="listPersonne">
                <div class="list2">
                    <ul class="client">
                        <li class="client">Thomas-Pierre Rakhastanisque</li> <input class="imgInput" type="image" src="Images/times-circle-regular.svg" />
                    </ul>
                </div>
            </div>
        </div>

    </li>

    <li class='caseClient' id='divClients' style="height: 250px">     <!-- Contient les options de modifications de logement -->
        <div class='titre titreSup'>Logement</div>
        <div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
            <?php foreach($logement as $id => $p):?>
                <input onclick="changerLogement3(this.id); return activerBouton(this.id);" type="button" id="<?php echo $id;?>" class="boutonFil" value="<?php echo $p;?>"> <!-- creation des boutons avec un ID identique au nom de la salle -->
            <?php endforeach;?>
        </div>
        <div class="container gestionGlobale">
            <div id="gestionPieces">

            </div>
            <div>
                <div class="titre" style="color: black"> Ajout d'une salle dans : [Appartement 2]
                    <p>
                        <form method="post" action="../controller/editionProfil.php">
                            <div>
                    <p><label for="pays">Salle :</label>
                        <select name="nouvelleSalle" id="nouvelleSalle">
                            <option value="Chambre">Chambre</option>
                            <option value="Terasse">Terasse</option>
                        </select>
                        <input class="imgInput" type="image" src="../Images/check-circle-regular.svg" />
                    </p>
                    </form>
                    </p>
                </div>
            </div>
        </div>
    </li>
</div>

</body>
</html>