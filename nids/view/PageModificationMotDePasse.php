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
<body marginheight="40" bgcolor="#ffffff" leftmargin="30">
<div id="retour">
<form name="chgmntMdp">
             <tr>
                    <td>
                     <span class="style4">	Votre adresse mail : <input type="email" name="mail"> </span>
                </td>

                 <td>
            <tr>
                <td>
                    <span class="style4">	Nouveau mot de passe : <input type="password" name="new_pass"> </span>


                </td>

                <td>
            <tr>
                <td>
                    <span class="style4">Confirmation : <input type="password" name="new_pass_conf"></span>

                </td>
            </tr>
    <input type = "button" value = "Envoyer" onclick="modifMdp()">
</form>
</div>
</body>
</html>

