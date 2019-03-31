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

function afficheCapteur($cap){
    foreach ($cap as $c):
        $id = -$c[0];
        $type = preg_split("/\s/", $c[1]);
        echo  "<div id= '$id' class= ' caseCapteur '> 
                <div class='titreCapteur'>
                    $c[1]
                 <a href='javascript:supprimer($id)'>
                    <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
                </a>
                <i class='fa fa-cogs editionCapteur'></i>
            </div>
            <img src='Images/$type[0].png' alt='$type[0]' class='imageCapteur'>
            <a href='javascript:allumerEteindre($c[0])'>
                <i class='fa fa-power-off editionCapteur on' id='$c[0]'></i>
            </a>
        </div>";
    endforeach;
}
?>