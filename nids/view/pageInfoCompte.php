<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>Information comptes</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen " href="../design/style.css" type="text/css" />
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs?>
</head>
<body>

<table cellspacing = "0" cellpadding = "0" border="0" style="margin: auto; width: 100%">
    <caption>Comptes clients</caption>
    <thead>
    <tr>
        <td class='catalogue2 head'>ID</td>
        <td class='catalogue2 nom head'>Nom</td>
        <td class='catalogue2 nom head'>Prénom</td>
        <td class='catalogue2 head'>Adresse mail</td>
        <td class='catalogue2 head' >Numéro de téléphone</td>
        <td class='catalogue2 head' >Date de naissance</td>
        <td class='catalogue2 head' >Type</td>
    </tr>
    </thead>

    <tbody>
    <?php foreach($tabCompte as $key => $value):?>
        <tr>
            <td class='catalogue2'>
                <?php echo $value[0]?>
            </td>
            <td class='catalogue2 nom'>
                <?php echo $value[1];?>
            </td>
            <td class='catalogue2 nom'>
                <?php echo $value[2];?>
            </td>
            <td class='catalogue2'>
                <?php echo $value[3];?>
            </td>
            <td class='catalogue2'>
                <?php echo $value[4];?>
            </td>
            <td class='catalogue2'>
                <?php echo $value[5];?>
            </td>
            <td class='catalogue2'>
                <?php echo $value[6];?>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>