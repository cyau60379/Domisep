<?php
/*
 * Fonctions
 *
 */

function tabToString($tab) {
    $str = "";
    foreach($tab as $elt){
        $str = $str . $elt . ";";
    }
    return $str;
}
?>


<script>

    function supprimer(id) {                                           //supprime le capteur non voulu
        let id2 = -id;
        if (confirm('Voulez-vous réellement supprimer ce capteur ?')) {
            let list = document.getElementById(id);   // recupere element <ul> avec id="zoneCapteurs"
            list.remove();           // efface celui d'id capteur
            //supprimer de la base de données
            let xhttp;
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    alert('Capteur ' + id +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
                }
            };
            xhttp.open("GET", "controller/gestionCapteur.php?id=" + id2, true);
            xhttp.send();   //envoie le resultat de la requete
        }
    }

    function allumerEteindre(capteur, id, len){             //changer la classe de l'icone + envoi requête à la base pour changer l'etat
        let zone = [];
        for(let i = 0; i < len; i++){
            zone.push(document.getElementsByClassName("caseCapteur")[i]);
        }
        if (confirm("Voulez-vous réellement modifier l'état de ce capteur ?")) {
            for(let i = 0; i < zone.length; i++){
                let icon = zone[i].getElementsByTagName("i")[2];
                if(icon.id === id){
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


    function changerPiece(pieceVoulue, id) {
           let xhttp;
           if (pieceVoulue === "") {
               document.getElementById("zoneCapteurs").innerHTML = "";
               return;
           }
           xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState === 4 && this.status === 200) {
                   document.getElementById("zoneCapteurs").innerHTML = this.responseText;
               }
           };
           xhttp.open("GET", "controller/gestionCapteur.php?piece=" + pieceVoulue + "&id=" + id, true);
           xhttp.send();   //envoie le resultat de la requete
    }
</script>