<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <link rel="stylesheet" href="../design/styleAccueil.css">
    <title>Page d'accueil</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico"/>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>

<body>

<div id="divReponse">
        Hello world
</div>

<div id="boxCentre" class="boxCentre">
    <div class="box">
        <h1>Connexion</h1>
            <form name='connexion' class="boxConnexion1">
                <label class="boxIdentifiant boxConnexion1">
                    Identifiant: <input class="input" name="identifiant">
                </label>

                <label class="boxIdentifiant boxConnexion1">
                    Mot de passe : <input type="password" class="input" name="password">
                </label>

                <div class="boxBouton boxConnexion1">
                    <input type="button" class="button" onclick="return connexionUser()" value="Se connecter">
                </div>


            </form>
        <div class="boxBouton boxConnexion1">
            <a href="lienquimarchepas" class="boxOubli boxConnexion1">Mot de passe oublié ?</a>
        </div>



    </div>


    <div class="box">
        <h1> Inscription</h1>
        <form name='inscription' class="boxConnexion1">
            <label class="boxIdentifiant boxConnexion1">
                Prénom: <input class="input" name="Prenom">
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Nom: <input class="input" name="Nom">
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Adresse mail: <input class="input" name="AdresseMail">
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Date de naissance: <input class="input" type="date" name="DateDeNaissance">
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Mot de passe: <input class="input" name="Mdp">
            </label>
            <div class="boxBouton boxConnexion1">
                <input type="button" class="button" onclick="return inscriptionUser()" value="S'inscrire">
            </div>
        </form>
    </div>
</div>



</body>
</html>
