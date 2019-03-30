<?php
/*
 * Fonctions
 *
 */

function tabToString($tab) {
    $str = "";
    foreach($tab as $elt){
        $str = $str . $elt . ",";
    }
    return $str;
}
?>


<script>

    function recupCapteurs(piece, capteurs) {                                     //affiche les capteurs de la piece
        document.getElementById("zoneCapteurs").innerHTML = "";
        let tab = capteurs.split(",");
        for(let i = 0; i < (tab.length - 1); i++){
            document.getElementById("zoneCapteurs").innerHTML +="<div id= " + tab[i] + " class=\"caseCapteur\">\n" +
                "        <div class=\"titreCapteur\">\n" +
                "            "+ tab[i].replace("_", " ") + "\n" +
                "            <a href=\"javascript:supprimer("+ tab[i] +")\">\n" +
                "                <i class=\"fa fa-times-circle editionCapteur\" style=\"color: red;\" aria-hidden=\"true\" id=" + i + "></i>\n" +
                "            </a>\n" +
                "            <i class=\"fa fa-cogs editionCapteur\"></i>\n" +
                "        </div>\n" +
                "        <img src=\"Images/"+ tab[i].split('_')[0] +".png\" alt=" + tab[i] + " class=\"imageCapteur\">\n" +
                "            <a href=\"javascript:allumerEteindre("+ tab[i] +"," + (tab.length - 1) + ")\">\n" +
                "        <i class=\"fa fa-power-off editionCapteur on \" id="+ tab[i] +"></i>\n" +
                "            </a>\n" +
                "    </div>";
        }
    }
    function supprimer(capteur) {                                           //supprime le capteur non voulu
        if (confirm('Voulez-vous réellement supprimer ce capteur ?')) {
            alert('Capteur ' + capteur.id.replace("_", " ") +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
            let list = document.getElementById("zoneCapteurs");   // recupere element <ul> avec id="zoneCapteurs"
            list.removeChild(document.getElementById(capteur.id));           // efface celui d'id capteur
            //supprimer de la base de données
        }
    }

    function allumerEteindre(capteur, len){             //changer la classe de l'icone + envoi requête à la base pour changer l'etat
        let zone = [];
        for(let i = 0; i < len; i++){
            zone.push(document.getElementsByClassName("caseCapteur")[i]);
        }
        if (confirm("Voulez-vous réellement modifier l'état de ce capteur ?")) {
            for(let i = 0; i < zone.length; i++){
                let icon = zone[i].getElementsByTagName("i")[2];
                if(icon.id === capteur.id){
                    if (icon.classList.contains('on')){
                        icon.classList.remove('on');      // change l'etat
                        icon.classList.add('off');           // change l'etat
                        alert('Capteur ' + capteur.id.replace("_", " ") +' éteint !');
                        //changer l'etat dans la base de données
                    } else {
                        icon.classList.remove('off');           // change l'etat
                        icon.classList.add('on');           // change l'etat
                        alert('Capteur ' + capteur.id.replace("_", " ") +' allumé !');
                        //changer dans la base de données
                    }
                }
            }

        }
    }

    function activerBouton(id) {
        let len = document.getElementsByClassName("boutonFil").length;
        for(let i = 0; i < len; i++){
            if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
            }
        }
        document.getElementById(id).classList.add("activer");
    }


    /*   function changerTemperature() {
           var xhttp;
           if (pieceVoulue === "") {
               document.getElementById("zoneCapteur").innerHTML = "";
               return;
           }
           xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState === 4 && this.status === 200) {
                   document.getElementById("zoneCapteur").innerHTML = this.responseText;
               }
           };
           xhttp.open("POST", "capteursController.php", true);
           xhttp.send("piece=" + pieceVoulue);   //envoie le resultat de la requete
       }
   */
</script>