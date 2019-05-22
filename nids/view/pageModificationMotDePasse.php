<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Modification mot de passe</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico"/>
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once("fonctions.php");      //inclut les fonctions Javascript?>
</head>
<body>
<div id="retour">
    <form id="changementMdp" name="inscription">
        <label class="boxIdentifiant boxConnexion1" style="color: #FFFFFF">
            Login : <br><input id="identifiant" class="inputForm" name="identifiant">
            <p id="labIdentif" class ="put" style="color: #3c3d51">.</p>
        </label>
        <div id="boutonEnvoi" class="boxBouton boxConnexion1" style="margin: auto">
            <input type = "button" class="boutton_mdpo" value = "Envoyer" onclick="verifLogin()">
        </div>
    </form>
</div>
</body>
</html>

