<?php

if (isset($_POST['mail'])){
$login = $_POST['mail'];}
$sujet="test";
$header = "MIME-Version: 1.0\r\n";
$header.='From:"Genesis"<contactservice123456@gmail.com>'."\n";
$header.='Content-Type:text/html; charset="utf-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';
//$mail = "bastien.corcaud@gmail.com";
$messsage ='
<html>
<body><div align="center" font-size="500px">
<h1>Vote ta mère</h1>

</div>
</body>';


//$sujet = "Hey mon ami !";

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $login))
{
    $passage_ligne = "\r\n";
}
else
{
    $passage_ligne = "\n";
}

try{mail($login,$sujet,$messsage, $header);
    echo "Votre mail a été envoyé";
}  catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

?>
<br>
<br>
<html>Mais la prochaine fois, achète toi de la matière grise pour retenir ton mot de passe</html>
