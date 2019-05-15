<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" charset="UTF-8">
    <title>FAQ</title>
    <link rel="shortcut icon" href="../Images/logoNids.ico" />
    <link rel="stylesheet" type="text/css" media="screen" title="default" href="../design/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include_once ("fonctions.php");      //inclut les fonctions concernant les capteurs
    ?>
</head>
<body>

<div class="container titre">
    <h1>FAQ</h1>

</div>
<?php
$i = 0;
foreach($tabFaq as $q => $r):?>
<section class="faq-section">
    <input type="checkbox" id="<?php echo $i;?>">
    <label for="<?php echo $i;?>"><?php echo $q;?></label>
    <p> <?php echo $r;?></p>
</section>
<?php
$i += 1;
endforeach;?>

</body>
</html>

