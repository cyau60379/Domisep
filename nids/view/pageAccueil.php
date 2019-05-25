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
    <div class="box boxCo">
        <h1>Connexion</h1>
            <form name='connexion' class="boxConnexion1">
                <label class="boxIdentifiant boxConnexion1">
                    Identifiant: <input class="input" name="identifiant">
                    <p id="labIdentifiant" class ="put">.</p>
                </label>

                <label class="boxIdentifiant boxConnexion1">
                    Mot de passe : <input type="password" class="input" name="password">
                    <p id="labMdpCo" class ="put">.</p>
                </label>

                <div class="boxBouton boxConnexion1">
                    <input type="button" class="button" onclick="return connexionUser()" value="Se connecter">
                </div>


            </form>
        <div class="boxBouton boxConnexion1">
            <a href="http://nids/messagerie" class="boxOubli boxConnexion1">Mot de passe oublié ?</a>
        </div>



    </div>

    <div class="box boxIns">
        <h1> Inscription</h1>
        <form name='inscription' class="boxConnexion1" >
            <label class="boxIdentifiant boxConnexion1">
                Prénom: <input id="Prenom" class="input" name="Prenom" oninput="verificationNom(this.name)">
                <p id="labPrenom" class ="put">.</p>
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Nom: <input id="Nom" class="input" name="Nom" oninput="verificationNom(this.name)">
                <p id="labNom" class ="put">.</p>
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Adresse mail: <input id="AdresseMail" class="input" name="AdresseMail" oninput="verificationMail(this.name)">
                <p id="labAdresseMail" class ="put">.</p>
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Date de Naissance: <input id="DateDeNaissance" class="input" type="date" name="DateDeNaissance" min="1900-01-01" max="2020-12-31" oninput="verificationDate()">
                <p id="labDateDeNaissance" class ="put">.</p>
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Mot de Passe: <input id="Mdp" class="input" type="password" name="Mdp" oninput="verificationPass()">
                <p id="labMdp" class ="put">.</p>
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Confirmation: <input id="ConfirmationMdp" class="input" type="password" name="ConfirmationMdp" oninput="verificationConfPass()">
                <p id="labConfirmationMdp" class ="put">.</p>
            </label>
            <div class="boxBouton boxConnexion1" style="margin: auto">
                <input type="button" class="button"  onclick="return inscriptionUser()" value="S'inscrire">
            </div>
        </form>
    </div>
</div>



</body>
</html>
