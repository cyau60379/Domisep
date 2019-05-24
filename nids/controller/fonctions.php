<?php

/**
 * @param $reponse
 * @param $id
 * @param $utilisateur
 * @param $type
 */

//fonction permettant d'afficher la réponse après la connexion ou l'inscription

function affichageReponse($reponse, $id, $utilisateur, $type){
    if($reponse){                                   //vérifie si la réponse doit être positive ou négative
                    //affiche un formulaire permettant d'aller à la page suivante
        echo "<div class= 'case'> 
                <h1 class='alert'>$type réussie !</h1>
                <form action='../index.php?cible=editionProfil' method='post'>
                    <input type='hidden' name='id' value= $id>
                    <input type='hidden' name='utilisateur' value= $utilisateur>
                    <input type='submit' class='bouton boutonGlobal2' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OK'>
                </form>
            </div>";
    } else {                                        //sinon le message ne fait que se fermer, on revient sur le formulaire d'inscription ou de connexion
        echo "<div class= 'case'> 
                <h1 class='alert'>$type échouée !</h1>
                <div>
                    <input type='button' class='bouton boutonGlobal2' value='OK' onclick='fermetureMessage(`divReponse`)' style='float: none'>
                </div>
            </div>";
    }
}

//fonction pour afficher le message de déconnexion

function affichageReponse2(){
        echo "<div class= 'case'> 
                <h1 class='alert'>Voulez-vous vous déconnecter ?</h1>
                <form action='../index.php?cible=accueil' method='post'>
                    <input type='hidden' name='id' value= 0>
                    <input type='hidden' name='utilisateur' value= ''>
                    <input type='submit' class='bouton boutonGlobal2' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OUI'>
                    <input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>
                </form>
            </div>";
}

//fonction pour erreurs lors de l'inscription (+ connexion)

function affichageErreur($type){
    echo "<div class='case'>
            <h1 class='alert'> Il y a un problème avec $type</h1>
            <div>
                <input type='button' class='bouton boutonGlobal2' value='OK' onclick='fermetureMessage(`divReponse`)' style='float: none'>
            </div>
          </div>";
}
/**
 * @param $list
 * @return array
 */

//fonction pour découper un tableau de string en un tableau de tableau de string avec l'id en indice

function decoupeString($list){
    $tab = array();
    foreach ($list as $str){
        $result = preg_split("/\!/", $str); //découpe un string et crée un tableau avec
        $tab[$result[0]] = $result[1];
    }
    return $tab;
}


//fonction pour découper un tableau de string en un tableau de tableau de string avec l'id en indice

function decoupeString10($list){
    $tab = array();
    foreach ($list as $str){
        $result = preg_split("/\@/", $str); //découpe un string et crée un tableau avec
        $tab[$result[0]] = $result[1];
    }
    return $tab;
}

//fonction pour découper un string en fonction du séparateur choisi ("!")

function decoupeString2($list){
    $string = "";
    foreach ($list as $str){
        $result = preg_split("/\!/", $str);
        $string = $result[0] ." ". $result[1];
    }
    return $string;
}

//idem decoupeString2 avec " " en changeant avec "_"

function decoupeString3($str){
    $string = "";
    if($str != "") {
        $result = preg_split("/\s/", $str);
        $string = $result[0] . "_" . $result[1];
    }
    return $string;
}

//idem decoupeString2 avec "_" en changeant avec " "

function decoupeString4($str){
    $string = "";
    if($str != ""){
        $result = preg_split("/\_/", $str);
        $string = $result[0] . " " . $result[1];
    }
    return $string;
}

//fonction pour afficher les pièces de la maison pour un client voulant gérer sa maison

function affichePieces($pieces, $logement, $id, $utilisateur){
    $logement += 100000;
    echo "<div id='gestionGlobale' class= 'container gestionGlobale'>
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
            <form action='../index.php?cible=catalogue' method='post'>
             <input type='hidden' name='id' value= $id>
             <input type='hidden' name='utilisateur' value= $utilisateur>
                <button type='submit' class=\"bouton boutonAjout\"><i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Ajouter un élément</button>
            </form>
        </div>

        <li id=\"zoneCapteurs\">
            <p class=\"info\">Veuillez choisir une pièce</p>  <!-- à améliorer -->
        </li>";
}

//fonction pour afficher les pièces de la maison pour un client voulant gérer sa maison

function affichePiecesLocation($pieces, $logement, $id, $utilisateur){
    $logement += 100000;
    echo "<div id='gestionGlobale' class= 'container gestionGlobale'>
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

        <li id=\"zoneCapteurs\">
            <p class=\"info\">Veuillez choisir une pièce</p>  <!-- à améliorer -->
        </li>";
}

//affichage des logements pour un utilisateur dans l'edition de profil

function affichePieces2($pieces, $logement){
    echo  "<div class=\"container\">
                <button id='$logement' class=\"bouton boutonAjout\" onclick=\"ajouterPiece(this.id)\">
                   <i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Ajouter une pièce
                </button>
           </div>";
    if(!empty($pieces)):
        echo "<table>
                 <thead>                   <!-- En-tête du tableau -->
                   <tr>
                      <th>  </th>
                      <th>Salle</th>
                   </tr>
                 </thead>

                  <tbody>                 <!-- Corps du tableau -->";
    foreach($pieces as $identif => $p):
        echo "<tr>
                <td><input class='imgInput' type='image' src='Images/times-circle-regular.svg' alt='x' onclick='supprimerPiece($identif, $logement)'/></td>
                        <td>$p</td>
                    </tr>";
    endforeach;
    endif;
    echo "</table>";
}

//affichage des pièces dans la gestion de client

function affichePieces3($pieces, $id){
    $reponse = "<div class=\"container fil\" id=\"filPieces\"> ";
        foreach($pieces as $identif => $p):
            $reponse .= "<input onclick=\"changerPieceEd(this.value, this.id); return activerBouton3(this.id);\" type=\"button\" id='$identif' class=\"boutonFil2\" value= '$p'>";
        endforeach;
    $reponse .= "</div><div id=\"zoneGraphe\">
            <p class=\"info\" style='color: black'>Veuillez choisir une pièce</p>
        </div><div id=\"zoneGraphe2\">
        </div>";
    return $reponse;
}

//fonction affichant les données dans les cases des capteurs

function afficheDonnees($tab){
    if (sizeof($tab) < 5){
        return "null";
    } else {
        $type = $tab[2];
        switch ($type){
            case 'Température':
                return ("<div class='actionneur imageCapteur'>
                            <p>$tab[3] °C </p>
                            </div>");
                break;
            case 'Luminosité':
                return ("<div class='actionneur imageCapteur'>
                            <p>$tab[3] lux</p>
                            </div>");
                break;
            case 'Mouvement':
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
            case 'Volet':
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

//fonction pour afficher les capteurs de la pièce choisie

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
                    <a href='javascript:modificationInformations($c[0])'>
                        <i class='fa fa-cogs editionCapteur' aria-hidden='true'></i>
                    </a>
                </div>
                <img src='Images/$c[2].png' alt='$c[2]' class='imageCapteur'>
                <a href='javascript:allumerEteindre($c[0], $taille)'>
                    <i class='fa fa-power-off editionCapteur $c[1] $actif' id='$c[0]'></i>
                </a>
                $donnees
            </div>";
    endforeach;
}

//fonction pour afficher les capteurs de la pièce choisie

function afficheCapteurLocation($cap){
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
                </div>
                <img src='Images/$c[2].png' alt='$c[2]' class='imageCapteur'>
                <a href='javascript:allumerEteindre($c[0], $taille)'>
                    <i class='fa fa-power-off editionCapteur $c[1] $actif' id='$c[0]'></i>
                </a>
                $donnees
            </div>";
    endforeach;
}

//fonction qui place sur la page les informations concernant les clients liés à un gestionnaire en fonction de l'appartement choisi

function afficheClients($clients) {
    $taille = sizeof($clients);
    $reponse = "";
    foreach ($clients as $c):
        $id = -$c[0];
        $reponse .= "<div id= '$id' class= ' caseClient ' style='margin: 20px auto;'> 
                <div class='titre'>
                    $c[1] $c[2]
                    <a href='javascript:supprimerClient($id)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: red;' aria-hidden='true' id='$c[0]'></i>
                    </a>
                </div>
                numéro client : $c[0]<br>$c[3]<br>$c[4]
            </div>";
    endforeach;
    return $reponse;
}

//fonction pour transformer un arrat en string
function arrayToString($tab){
    $str = "";
    foreach ($tab as $key => $value){
        $str .= "$key!$value+";
    }
    return $str;
}

/**
 * @param $ComptesSecondaires
 */

function afficheComptesSecondaire($ComptesSecondaires){
    if (sizeof($ComptesSecondaires) != 0) {
        $NombredeComptes = (sizeof($ComptesSecondaires)) % 15;
        $compte = 0;
        while (($NombredeComptes) >= 1) {
            $id_sec = $ComptesSecondaires[$compte][4];
            echo "<div id='".$id_sec."' class='" . $ComptesSecondaires[$compte]['Prenom'] . " " . $ComptesSecondaires[$compte]['Nom'] ." compteSecondaire'>
                    <a href='javascript:supprimComptes($id_sec)'>
                        <i class='fa fa-times-circle editionCapteur' style='color: black;' aria-hidden='true'></i>
                    </a> 
                    " . $ComptesSecondaires[$compte]['Prenom'] . " " . $ComptesSecondaires[$compte]['Nom'] . " </div><br>";
            $NombredeComptes = $NombredeComptes - 1;
            $compte = $compte + 1;
        }
    }
}



function afficheArticle2($tabForum, $ajout, $ids){
    $i = 0;
    foreach($tabForum as $q => $r){
        echo "<section class='faq-section'>
            <input type='checkbox' id='$ids[$i]'>
            <label for='$ids[$i]'>$q</label>
            <p class='forum'>$r</p>";
        if($ajout) {
            echo "<button class='bouton boutonGlobal2' onclick='supprimerArticle($ids[$i])'>SUPPRIMER</button>
        </section> <br>";
        }
        $i += 1;
    }
}
function afficheArticle($tabForum, $tabComment, $tabDate, $ids){
    $i = 0;
    foreach($tabForum as $q => $r){
        $contenu = "formulaireComm" . $ids[$i];
        echo "<section class='faq-section'>
            <input type='checkbox' id='$ids[$i]'>
            <label for='$ids[$i]'>$r[2] - $q ($r[1])</label>
            <p class='forum'>$r[0]</p>
            <p class='faq-section' style='font-weight: bold;'> Commentaire : </p>";
        if(isset($tabComment[$ids[$i]])){       //vérification pour savoir si il y a un commentaire pour l'article
            $tab = $tabComment[$ids[$i]];
            echo "<p class='forum'>$tab[1] ($tab[2])<br><br> $tab[0]</p>";
        }
            echo "<br>
               <form name='$contenu'>
                 <textarea name=\"Contenu\" class=\"contenu\" cols=\"30\" rows=\"5\"></textarea>
                  <button type='button' class='bouton boutonGlobal2' onclick='commenterArticle($ids[$i])' style='float: none'>COMMENTER</button>
                </form>
        </section> <br>";
        $i += 1;
    }
}

function afficheLogements($logement){
        echo "<div class='titre titreSup'>Logement <a href='javascript:ajoutLogement()'>
                <i class='fa fa-plus-circle editionCapteur' style='color: black;' aria-hidden='true'></i>
            </a>
            <a href='javascript:suppressionLogement()'>
                <i class='fa fa-minus-circle editionCapteur' style='color: black;' aria-hidden='true'></i>
            </a>
            </div>
        <div class='container fil' id='filPieces'>     <!-- Contient les boutons pour afficher les différents capteurs en fonction de la salle -->";
            foreach($logement as $id => $p) {
                echo "<input onclick='changerLogement3(this.id); return activerBouton3(this.id);' type='button' id='$id' class='boutonFil2' value='$p'> <!-- creation des boutons avec un ID identique au nom de la salle -->";
            }
        echo "</div>
        <div class='container'>
            <div id='gestionPieces'>
                <p class='info' style='color: black'>Veuillez choisir un logement</p>
            </div>
        </div>";
}

function afficheChangementMdp($question, $identif, $page){
    if($question == ""){
        echo "<label class=\"boxIdentifiant boxConnexion1\" style=\"color: #FFFFFF\">
            Mot de Passe: <br><input id=\"Mdp\" class=\"inputForm\" type=\"password\" name=\"Mdp\" oninput=\"verificationPass()\">
            <p id=\"labMdp\" class =\"put\" style=\"color: #3c3d51\">.</p>
        </label>
        <label class=\"boxIdentifiant boxConnexion1\" style=\"color: #FFFFFF\">
            Confirmation : <br><input id=\"ConfirmationMdp\" class=\"inputForm\" type=\"password\" name=\"ConfirmationMdp\" oninput=\"verificationConfPass()\">
            <p id=\"labConfirmationMdp\" class =\"put\" style=\"color: #3c3d51\">.</p>
        </label>
        <div class=\"boxBouton boxConnexion1\" style=\"margin: auto\">
            <input id='$page' type = \"button\" class=\"boutton_mdpo $identif\" value = \"Envoyer\" onclick=\"modifMdp(this.id, this.classList[1])\">
        </div>";
    } else {
        echo "<label class=\"boxIdentifiant boxConnexion1\" style=\"color: #FFFFFF\">
            $question : <br><input id=\"reponse\" class=\"inputForm\" type=\"text\" name=\"reponse\">
            <p id=\"labRep\" class =\"put\" style=\"color: #3c3d51\">.</p>
        </label>
        <label class=\"boxIdentifiant boxConnexion1\" style=\"color: #FFFFFF\">
            Mot de Passe: <br><input id=\"Mdp\" class=\"inputForm\" type=\"password\" name=\"Mdp\" oninput=\"verificationPass()\">
            <p id=\"labMdp\" class =\"put\" style=\"color: #3c3d51\">.</p>
        </label>
        <label class=\"boxIdentifiant boxConnexion1\" style=\"color: #FFFFFF\">
            Confirmation : <br><input id=\"ConfirmationMdp\" class=\"inputForm\" type=\"password\" name=\"ConfirmationMdp\" oninput=\"verificationConfPass()\">
            <p id=\"labConfirmationMdp\" class =\"put\" style=\"color: #3c3d51\">.</p>
        </label>
        <div class=\"boxBouton boxConnexion1\" style=\"margin: auto\">
            <input id='$page' type = \"button\" class=\"boutton_mdpo $identif\" value = \"Envoyer\" onclick=\"verifReponse(this.id, this.classList[1])\">
        </div>";
    }
}

function afficheRelance(){
    echo "<div class=\"boxBouton boxConnexion1\" style=\"margin: auto\">
            <input id=\"boutonEnvoi\" type = \"button\" class=\"boutton_mdpo\" value = \"Envoyer\" onclick=\"verifLogin()\">
        </div>";
}

function affichePageDonnees($tabCompte, $ajout){
    foreach($tabCompte as $key => $value):
        echo "<tr>
            <td class='catalogue2'>
                $value[0]
            </td>
            <td class='catalogue2 nom'>
                $value[1]
            </td>
            <td class='catalogue2 nom'>
                $value[2]
            </td>
            <td class='catalogue2'>
                $value[3]
            </td>
            <td class='catalogue2'>
                $value[4]
            </td>
            <td class='catalogue2'>
                $value[5]
            </td>
            <td class='catalogue2'>
                <p id=\"resultat\">$value[6]</p>";
                if($ajout):
                    echo "<button type='button' class='bouton bouton3' onclick='modifStatut2($value[0])'>
                        Modifier
                    </button>";
                endif;
            echo "</td>
        </tr>";
    endforeach;
    echo "</tbody>";
}

?>