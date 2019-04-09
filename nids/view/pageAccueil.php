<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design/styleAccueil.css">
    <title>Page d'accueil</title>
</head>

<body>


<div class="boxCentre">
    <div class="box">
        <h1>Connexion</h1>
        <div class="boxConnexion1 ">

            <label class="boxIdentifiant boxConnexion1">
                Identifiant: <input class="input" name="identifiant">
            </label>

            <label class="boxIdentifiant boxConnexion1">
                Mot de passe : <input class="input" name="password">
            </label>



            <div class="boxBouton boxConnexion1">
                <a href="../index.php?cible=connexion&fonction=captainMarcel"  <button class="button"> Se connecter </button></a>

            </div>

            <a href="../index.php?cible=connexion&fonction=captainMarcel" class="boxOubli boxConnexion1">Mot de passe oublié ?</a>

        </div>


    </div>

    <div class="box">
        <h1> Inscription</h1>
        <div class="boxConnexion1">
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
                Date de Naissance: <input class="input" name="DateDeNaissance">
            </label>
            <label class="boxIdentifiant boxConnexion1">
                Mot de Passe: <input class="input" name="Mdp">
            </label>
            <div class="boxBouton boxConnexion1">
                <a href="../index.php?cible=connexion&fonction=captainMarcel"  <button class="button"> S'inscrire </button></a>
            </div>
        </div>
    </div>
</div>




</body>
</html>
