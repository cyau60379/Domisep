<?php
/*
 * Fonctions
 *
 */

//conversion d'un tableau en string pour l'exporter en javascript
/*
function tabToString($tab) {
    $str = "";
    foreach($tab as $elt){
        $str = $str . $elt . ";";
    }
    return $str;
}
*/
?>


<script>

    // fonction header changer contenu bouton
    function changerContenu(id){
        let str = document.getElementById(id).classList[1];
        let str2 = document.getElementById(id).classList[2];
        let boutons = document.getElementsByClassName("choixPage");
        if(window.innerWidth < 520){
            document.getElementById(id).innerHTML = "";
        } else if(window.innerWidth < 587){
            for(let i = 0; i < boutons.length; i++){
                boutons[i].style.fontSize = "10px";
                boutons[i].style.width = "100px";
            }
            document.getElementById(id).style.fontSize = "12px";
            document.getElementById(id).innerHTML = str.substr(0,1) + "." + str2;
        }else if(window.innerWidth < 650){
            document.getElementById(id).innerHTML = str.substr(0,1) + "." + str2;
            for(let i = 0; i < boutons.length; i++){
                boutons[i].style.fontSize = "12px";
                boutons[i].style.width = "120px";
            }
            document.getElementById(id).style.fontSize = "15px";
        } else {
            document.getElementById(id).innerHTML = str + " " + str2;
            for(let i = 0; i < boutons.length; i++){
                boutons[i].style.fontSize = "15px";
                boutons[i].style.width = "130px";
            }
            document.getElementById(id).style.fontSize = "15px";
        }
    }
    function remettreContenu(id){
        document.getElementById(id).innerHTML = id;
    }


    //fonction de suppression du capteur non voulu

    function supprimer(id) {
        let id2 = -id;
        if (confirm('Voulez-vous réellement supprimer ce capteur ?')) {
            let cap = document.getElementById(id);   // recupere element <ul> avec id="zoneCapteurs"
            cap.remove();           // efface celui d'id capteur
            //supprimer de la base de données
            let request;
            request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    alert('Capteur ' + id +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
                }
            };
            request.open("GET", "controller/gestionCapteur.php?id=" + id2, true);
            request.send();   //envoie le resultat de la requete
        }
    }


    //changer la classe de l'icone + envoi requête à la base pour changer l'etat

    function allumerEteindre(id, len){
        let zone = [];
        for(let i = 0; i < len; i++){
            zone.push(document.getElementsByClassName("caseCapteur")[i]);       //recupere les elements de classe caseCapteur dans un tableau
        }
        if (confirm("Voulez-vous réellement modifier l'état de ce capteur ?")) {    //ouvre une fenetre de confirmation
            for(let i = 0; i < zone.length; i++){
                let icon = zone[i].getElementsByTagName("i")[2];                    //recupere l'icone marche/arret
                if(icon.id == id){
                    if (icon.classList.contains('on')){                             //change l'etat s'il s'agit du bon element
                        let request = new XMLHttpRequest();
                        request.onreadystatechange = function() {
                            if (this.readyState === 4 && this.status === 200) {
                                icon.classList.remove('on');      // change l'etat
                                icon.classList.add('off');        // change l'etat
                                alert('Capteur ' + id +' éteint !');
                            }
                        };
                        request.open("GET", "controller/gestionCapteur.php?allume=" + 0 + "&idCap=" + id, true);
                        request.send();                                                   //envoie le resultat de la requete par methode get
                    } else {
                        let request = new XMLHttpRequest();
                        request.onreadystatechange = function() {
                            if (this.readyState === 4 && this.status === 200) {
                                icon.classList.remove('off');           // change l'etat
                                icon.classList.add('on');           // change l'etat
                                alert('Capteur ' + id +' allumé !');
                            }
                        };
                        request.open("GET", "controller/gestionCapteur.php?allume=" + 1 + "&idCap=" + id, true);
                        request.send();                                                    //envoie le resultat de la requete par methode get
                    }
                }
            }

        }
    }

    //change la classe des boutons en fonction de s'il y en a un qui est activé ce en fonction de l'id du bouton

    function activerBouton(id) {
        let len = document.getElementsByClassName("boutonFil").length;
        for(let i = 0; i < len; i++){
            if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
            }
        }
        document.getElementById(id).classList.add("activer");
    }

    //fonction qui permet d'afficher les capteurs en fonction de la piece demandée

    function changerPiece(pieceVoulue, id) {
           let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
           if (pieceVoulue === "") {
               document.getElementById("zoneCapteurs").innerHTML = "";  //cas ou aucune piece n'est choisi mais un bouton existe
               return;
           }
           request = new XMLHttpRequest();
           request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
               if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                   document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
               }
           };
           request.open("GET", "controller/gestionCapteur.php?piece=" + pieceVoulue + "&id=" + id, true);
           request.send();                                                              //envoie le resultat de la requete au serveur
    }

    //fonction pour modifier la température de la maison

    function changerTemperature() {
        let temp = document.getElementById('tempChoix').value;
        let request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                alert("Le changement de température effectué a bien été pris en compte.");
            }
        };
        request.open("GET", "controller/gestionCapteur.php?temp=" + temp, true);
        request.send();                                                                 //envoie le resultat de la requete
    }

    //fonction pour monter / descendre le volet

    function monterDescendre(id, etat, boutonClic){
        if(confirm("Voulez-vous changer l'état de ce volet ?")){
            let request = new XMLHttpRequest();
            if(boutonClic === 'haut'){
                let monter = prompt("Voulez-vous monter complètement ce volet ? (y/n)");
                if(monter === 'y'){
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            alert('Volet monté !');
                            document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                        }
                    };
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + 10 + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                } else {
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            alert('Volet monté !');
                            document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                        }
                    };
                    etat += 1;
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + etat + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                }
            } else {
                let monter = prompt("Voulez-vous descendre complètement ce volet ? (y/n)");
                if(monter === 'y'){
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            alert('Volet descendu !');
                            document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                        }
                    };
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + 0 + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                } else {
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            alert('Volet descendu !');
                            document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                        }
                    };
                    etat -= 1;
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + etat + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                }
            }
        }
    }

    // fonction pour tout éteindre dans la maison

    function eteindre(id){
        if(confirm("Voulez-vous vraiment tout éteindre ?")) {
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    alert("Tout est éteint !");
                    document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                }
            };
            id -= 100000;
            request.open("GET", "controller/gestionCapteur.php?idEteindre=" + id, true);
            request.send();                                                                 //envoie le resultat de la requete
        }
    }

    // fonction pour tout fermer dans la maison

    function fermer(id){
        if(confirm("Voulez-vous vraiment tout fermer ?")) {
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    alert("Tout est fermé !");
                    document.getElementById("zoneCapteurs").innerHTML = this.responseText;   //rempli la zoneCapteurs
                }
            };
            id -= 100000;
            request.open("GET", "controller/gestionCapteur.php?idFermer=" + id, true);
            request.send();                                                                 //envoie le resultat de la requete
        }
    }

</script>