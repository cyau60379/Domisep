<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Edition de profil</title>
    <link rel="shortcut icon" href="Images/logoNids.ico"/>
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div id="zoneClients">
    <li class='caseClient' id='divClients'>     <!-- Contient les options de modifications de profil -->
        <div class='titre titreSup'>Edition de profil</div>
        <div class="bloc">
            <form class="formulaire" method="post" action="../controller/editionProfil.php">
                <p> <label class="ed" for="nom">Nom:</label>
                    <input class="edi" type="text" id="nom" name="user_nom" placeholder="Monteiro"></p>
                <p> <label class="ed" for="prenom"> Prenom:</label>
                    <input class="edi" type="text" id="prenom" name="user_prenom" placeholder="Romuald"></p>
                <p> <label class="ed" for="phone"> N° de téléphone:</label>
                    <input class="edi" type="tel" id="phone" name="user_phone" placeholder="0632"></p>
                <p> <label class="ed" for="mail"> E-mail:</label>
                    <input class="edi" type="email" id="email" name="user_email" placeholder="contact@romuald"></p>
                <p> <label class="ed" for="pass"> Mot de passe:</label>
                    <input class="edi" type="password" id="pass" name="user_pass" placeholder="c'est secret"></p>
                <input type="submit" class="bouton edi" value="Modifier les informations" />
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

    <li class='caseClient' id='divClients'>     <!-- Contient les options de modifications de logement -->
        <div class='titre titreSup'>Logement</div>
        <div class="container fil" id="filPieces">     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->
            <input type="button" class="boutonFil" value="appartement 1"> <!-- creation des boutons avec un ID identique au nom de la salle -->
            <input type="button" class="boutonFil" value="appartement 2"> <!-- creation des boutons avec un ID identique au nom de la salle -->
            <input type="button" class="boutonFil" value="appartement 3"> <!-- creation des boutons avec un ID identique au nom de la salle -->
        </div>
        <div class="container gestionGlobale">
            <div>
                <table>
                    <thead>                   <!-- En-tête du tableau -->
                    <tr>
                        <th>  </th>
                        <th>Salle</th>
                    </tr>
                    </thead>

                    <tbody>                 <!-- Corps du tableau -->
                    <tr>
                        <td><input class="imgInput" type="image" src="Images/times-circle-regular.svg" /></td>
                        <td>Cuisine</td>
                    </tr>
                    <tr>
                        <td><input class="imgInput" type="image" src="Images/times-circle-regular.svg" /></td>
                        <td>Salon</td>
                    </tr>
                    <tr>
                        <td><input class="imgInput" type="image" src="Images/times-circle-regular.svg" /></td>
                        <td>Chambre</td>
                    </tr>
                    <tr>
                        <td><input class="imgInput" type="image" src="Images/times-circle-regular.svg" /></td>
                        <td>Salle de bain</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="titre"> Ajout d'une salle dans : [Appartement 2]
                    <p>
                        <form method="post" action="../controller/editionProfil.php">
                            <div>
                    <p><label for="pays">Salle :</label>
                        <select name="nouvelleSalle" id="nouvelleSalle">
                            <option value="Chambre">Chambre</option>
                            <option value="Terasse">Terasse</option>
                        </select>
                        <input class="imgInput" type="image" src="Images/check-circle-regular.svg" />
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