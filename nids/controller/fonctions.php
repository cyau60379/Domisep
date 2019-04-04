<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 30/03/2019
 * Time: 14:13
 */

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
                                <input type='button' id='haut' class='bouton' value='&#x25b2;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                } elseif(($tab[3] <= 9) && ($tab[3] >= 1)) {
                    return ("
                            <div class='actionneur imageCapteur'>
                                <br> Entrouvert <br>
                                <input type='button' id='haut' class='bouton' value='&#x25b2;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                                <input type='button' id='bas' class='bouton' value='&#x25bc;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                } else {
                    return (" 
                            <div class='actionneur imageCapteur'>
                                <br> Ouvert <br>
                                <input type='button' id='bas' class='bouton' value='&#x25bc;' onclick=' monterDescendre($tab[0], $tab[3], this.id)'>
                            </div>");
                }
                break;
        }
    }
}

function afficheCapteur($cap){
    $taille = sizeof($cap);
    foreach ($cap as $c):
        $id = -$c[0];
        $type = preg_split("/\s/", $c[1]);
        $donnees = afficheDonnees($c);
        $actif = '';
        if($c[4] == 1){
            $actif = 'on';
        } else {
            $actif = 'off';
        }
        echo "<div id= '$id' class= ' caseCapteur '> 
                <div class='titreCapteur'>
                    $c[1]
                    <a href='javascript:supprimer($id)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
                    </a>
                    <i class='fa fa-cogs editionCapteur'></i>
                </div>
                <img src='Images/$type[0].png' alt='$type[0]' class='imageCapteur'>
                <a href='javascript:allumerEteindre($c[0], $taille)'>
                    <i class='fa fa-power-off editionCapteur $actif' id='$c[0]'></i>
                </a>
                $donnees
            </div>";
    endforeach;
}

function afficheClients($clients){
    $taille = sizeof($clients);
    foreach ($clients as $c):
        $id = -$c[0];
        echo "<div id= '$id' class= ' caseCapteur '> 
                <div class='titreCapteur'>
                    $c[1] $c[2]
                    <a href='javascript:supprimer($id)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
                    </a>
                    <i class='fa fa-cogs editionCapteur'></i>
                </div>
                $c[3] <br> $c[4] 
            </div>";
    endforeach;
}
?>