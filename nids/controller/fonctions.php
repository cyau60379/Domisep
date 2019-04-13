<?php
/**
 * Created by PhpStorm.
 * User: Mr Dark
 * Date: 30/03/2019
 * Time: 14:13
 */

/**
 * @param $utilisateur
 */

function selectionPage($utilisateur){
    echo "    <div>
        <button id='fa-home' class='choixPage Domotique' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
            <i class='fa fa-home'></i>
        </button>

        <button id='fa-file-text-o' class='choixPage Profil' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
            <i class='fa fa-file-text-o'></i>
        </button>

        <button id='fa-question' class='choixPage Support' onmouseover='montrerTitre(this.id, this.classList[1]);' onmouseout='cacherTitre(this.id);'>
            <i class='fa fa-question'></i>
        </button>
    </div>

    <div>
        <p id='nom' class='prenom $utilisateur'>$utilisateur</p>
        <button class='bouton' style='height: 40px'>
            Déconnexion
            <a href = '/index.php?cible=connexion&fonction=deconnexion'></a>
        </button>
    </div>";
}


/**
 * @param $reponse
 * @param $id
 */

function affichageReponse($reponse, $id){
    print_r($id);
    if($reponse){
        echo "<div class= 'case caseCapteur'> 
                <h1>Connexion Réussie !</h1>
                <a href='../index.php?cible=editionProfil&id=$id'><input type='button' class='bouton boutonGlobal' style='float: none' value='OK'></a>
            </div>";
    } else {
        echo "<div class= 'caseCapteur'> 
                <h1>Connexion Echouee !</h1>
                <input type='button' value='OK' onclick='fermtureMessage()'>
            </div>";
    }
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

function affichePieces($pieces, $logement){
    $logement += 100000;
echo "    <div id='gestionGlobale' class= 'container gestionGlobale'>
        <div style='margin: 15px'>
            <label for='tempChoix'>Température du logement voulue:</label>
            <input id='tempChoix' style='width: 50px; height: 30px; text-align: center;' type='number' name='temp' value=20 min=0 max=25> °C
            <input class='bouton' type='submit' value='Valider' onclick='changerTemperature(document.getElementById(`tempChoix`).value)'\">
        </div>
        <button onclick=\"changer(this.id, 'eteindre', 'éteint')\" class=' bouton boutonGlobal' id ='$logement'>Tout éteindre</button>
        <button onclick=\"changer(this.id, 'fermer', 'fermé')\" class=\"bouton boutonGlobal\" id ='$logement'>Tout fermer</button>
        <button onclick=\"changer(this.id, 'allumer', 'allumé')\" class=' bouton boutonGlobal' id ='$logement'>Tout allumer</button>
        <button onclick=\"changer(this.id, 'ouvrir', 'ouvert')\" class=\"bouton boutonGlobal\" id ='$logement'>Tout ouvrir</button>
    </div>

    <div class=\"container fil\" id=\"filPieces\"> ";
        foreach($pieces as $id => $p):
        echo "<input onclick=\"changerPiece(this.value, this.id); return activerBouton(this.id);\" type=\"button\" id='$id' class=\"boutonFil\" value= '$p'>";
    endforeach;
    echo "</div>
        <div class=\"container\">
            <a href=\"/controller/catalogue.php\"><button class=\"bouton boutonAjout\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Ajouter un élément</button></a>
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
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
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