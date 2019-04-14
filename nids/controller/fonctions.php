<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 30/03/2019
 * Time: 14:13
 */


/**
 * @param $reponse
 * @param $id
 * @param $utilisateur
 * @param $type
 */

function affichageReponse($reponse, $id, $utilisateur, $type){
    if($reponse){
        echo "<div class= 'case caseCapteur'> 
                <h1>$type Réussie !</h1>
                <form action='../index.php' method='post'>
                    <input type='hidden' name='cible' value='editionProfil'>
                    <input type='hidden' name='id' value= $id>
                    <input type='hidden' name='utilisateur' value= $utilisateur>
                    <input type='submit' class='bouton boutonGlobal' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OK'>
                </form>
            </div>";
    } else {
        echo "<div class= 'case caseCapteur'> 
                <h1>$type Echouee !</h1>
                <input type='button' class='bouton boutonGlobal' value='OK' onclick='fermetureMessage(`divReponse`)' style='float: none'>
            </div>";
    }
}

function affichageReponse2(){
        echo "<div class= 'case caseCapteur'> 
                <h1>Voulez-vous vous déconnecter ?</h1>
                <form action='../index.php' method='post'>
                    <input type='hidden' name='cible' value='accueil'>
                    <input type='hidden' name='id' value= 0>
                    <input type='hidden' name='utilisateur' value= ''>
                    <input type='submit' class='bouton boutonGlobal' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OUI'>
                    <input type='button' class='bouton boutonGlobal' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>
                </form>
            </div>";
}

/**
 * @param $list
 * @return array
 */

function decoupeString($list){
    $tab = array();
    foreach ($list as $str){
        $result = preg_split("/\!/", $str);
        $tab[$result[0]] = $result[1];
    }
    return $tab;
}

function decoupeString2($list){
    $string = "";
    foreach ($list as $str){
        $result = preg_split("/\!/", $str);
        $string = $result[0] ." ". $result[1];
    }
    return $string;
}

function decoupeString3($str){
    $result = preg_split("/\s/", $str);
    $string = $result[0] . "_" . $result[1];
    return $string;
}

function decoupeString4($str){
    if($str != ""){
        $result = preg_split("/\_/", $str);
        $string = $result[0] . " " . $result[1];
        return $string;
    }
}

function affichePieces($pieces, $logement, $id, $utilisateur){
    $logement += 100000;
echo "    <div id='gestionGlobale' class= 'container gestionGlobale'>
        <div style='margin: 15px'>
            <label for='tempChoix'>Température du logement voulue:</label>
            <input id='tempChoix' style='width: 50px; height: 30px; text-align: center;' type='number' name='temp' value=20 min=0 max=25> °C
            <input class='bouton' type='submit' value='Valider' onclick='changerTemperature(document.getElementById(`tempChoix`).value)'\">
        </div>
        <button onclick=\"changer(this.id, 'eteindre', 2)\" class=' bouton boutonGlobal' id ='$logement'>Tout éteindre</button>
        <button onclick=\"changer(this.id, 'fermer', 4)\" class=\"bouton boutonGlobal\" id ='$logement'>Tout fermer</button>
        <button onclick=\"changer(this.id, 'allumer', 1)\" class=' bouton boutonGlobal' id ='$logement'>Tout allumer</button>
        <button onclick=\"changer(this.id, 'ouvrir', 3)\" class=\"bouton boutonGlobal\" id ='$logement'>Tout ouvrir</button>
    </div>

    <div class=\"container fil\" id=\"filPieces\"> ";
        foreach($pieces as $identif => $p):
        echo "<input onclick=\"changerPiece(this.value, this.id); return activerBouton(this.id);\" type=\"button\" id='$identif' class=\"boutonFil\" value= '$p'>";
    endforeach;
    echo "</div>
        <div class=\"container\">
            <form action='../index.php' method='post'>
            <input type='hidden' name='cible' value='catalogue'>
             <input type='hidden' name='id' value= $id>
             <input type='hidden' name='utilisateur' value= $utilisateur>
                <button type='submit' class=\"bouton boutonAjout\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Ajouter un élément</button>
            </form>
        </div>

        <li id=\"zoneCapteurs\">
            <p class=\"info\">Veuillez choisir une pièce</p>  <!-- à améliorer -->
        </li>";
}

function afficheDonnees($tab){
    if (sizeof($tab) < 5){
        return "null";
    } else {
        $type = $tab[2];
        switch ($type){
            case 1:
                return ("<div class='actionneur imageCapteur'>
                            <p>$tab[3] °C </p>
                            </div>");
                break;
            case 2:
                return ("<div class='actionneur imageCapteur'>
                            <p>$tab[3] lux</p>
                            </div>");
                break;
            case 3:
                if($tab[3] == 0){
                    return ("<div class='actionneur imageCapteur'>
                            <p>Aucun mouvement</p>
                            </div>");
                } else {
                    return ("<div class='actionneur imageCapteur'>
                            <p>Mouvement à <br> $tab[3] m</p>
                            </div>");
                }
                break;
            case 4:
                if($tab[3] == 0){
                    return (" 
                            <div class='actionneur imageCapteur'>
                            <br> Fermé <br>
                                <input type='button' id='haut' class='bouton $tab[0]' value='&#x25b2;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                } elseif(($tab[3] <= 9) && ($tab[3] >= 1)) {
                    return ("
                            <div class='actionneur imageCapteur'>
                                <br> Entrouvert <br>
                                <input type='button' id='haut' class='bouton $tab[0]' value='&#x25b2;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                                <input type='button' id='bas' class='bouton $tab[0]' value='&#x25bc;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                } else {
                    return (" 
                            <div class='actionneur imageCapteur'>
                                <br> Ouvert <br>
                                <input type='button' id='bas' class='bouton $tab[0]' value='&#x25bc;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                }
                break;
        }
    }
}

function afficheCapteur($cap){
    $taille = sizeof($cap);     //nombre de capteurs
    foreach ($cap as $c):
        $id = -$c[0];           //id negatif
        $type = preg_split("/\s/", $c[1]);  //recuperation type
        $donnees = afficheDonnees($c);              //recuperation des donnees
        $actif = '';                                //récupération de l'activité du capteur
        if($c[4] == 1){
            $actif = 'on';
        } else {
            $actif = 'off';
        }
        echo "<div id= '$id' class= 'caseCapteur $c[1]'> 
                <div class='titre'>
                    $c[1]
                    <a href='javascript:supprimer($id)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true'></i>
                    </a>
                    <i class='fa fa-cogs editionCapteur'></i>
                </div>
                <img src='Images/$type[0].png' alt='$type[0]' class='imageCapteur'>
                <a href='javascript:allumerEteindre($c[0], $taille)'>
                    <i class='fa fa-power-off editionCapteur $c[1] $actif' id='$c[0]'></i>
                </a>
                $donnees
            </div>";
    endforeach;
}

function afficheClients($clients){
    $taille = sizeof($clients);
    foreach ($clients as $c):
        $id = -$c[0];
        echo "<div id= '$id' class= ' caseClient '> 
                <div class='titre'>
                    $c[1] $c[2]
                    <a href='javascript:supprimer($id)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
                    </a>
                    <i class='fa fa-cogs editionCapteur'></i>
                </div>
                numéro client : $c[0]<br>$c[3]<br>$c[4]
            </div>";
    endforeach;
}
?>