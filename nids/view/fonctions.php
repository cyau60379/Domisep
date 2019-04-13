<?php
/*
 * Fonctions
 *
 */
?>


<script>

    function connexionUser() {
        let id = document.forms["connexion"].elements["identifiant"];
        let mdp = document.forms["connexion"].elements["password"];
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';
            }
        };
        request.open("POST", "controller/accueil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("identifiant=" + id + "&password=" + mdp);                                                              //envoie le resultat de la requete au serveur
    }

    function montrerTitre(id, type) {
        document.getElementById(id).innerHTML = '<i class="fa '+ id + '"></i> ' + type;
    }

    function cacherTitre(id) {
        document.getElementById(id).innerHTML = '<i class="fa '+ id + '"></i>';
    }

    // fonction header changer contenu bouton
    function changerContenu(id){
        let str = document.getElementById(id).classList[1];
        let str2 = document.getElementById(id).classList[2];
        if(window.innerWidth < 500){
            document.getElementById(id).innerHTML = "";
        } else if(window.innerWidth < 587){
            document.getElementById(id).style.fontSize = "12px";
            document.getElementById(id).innerHTML = str.substr(0,1) + "." + str2;
        }else if(window.innerWidth < 650){
            document.getElementById(id).innerHTML = str.substr(0,1) + "." + str2;
            document.getElementById(id).style.fontSize = "15px";
        } else {
            document.getElementById(id).innerHTML = str + " " + str2;
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
                    let nom = "";
                    for(let i = 1; i < cap.classList.length; i++){
                        nom += cap.classList[i];
                    }
                    alert('Capteur ' + nom +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
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
                let nom = "";
                for(let i = 3; i < (icon.classList.length - 1); i++){
                    nom += " " + icon.classList[i];
                }
                if(icon.id == id){
                    if (icon.classList.contains('on')){                             //change l'etat s'il s'agit du bon element
                        let request = new XMLHttpRequest();
                        request.onreadystatechange = function() {
                            if (this.readyState === 4 && this.status === 200) {
                                icon.classList.remove('on');      // change l'etat
                                icon.classList.add('off');        // change l'etat
                                alert('Capteur ' + nom +' éteint !');
                                let boutons = zone[i].getElementsByTagName("input");
                                for(let i = 0; i < boutons.length; i ++){
                                    boutons[i].style.visibility = "hidden";
                                }
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
                                alert('Capteur ' + nom +' allumé !');
                                let boutons = zone[i].getElementsByTagName("input");
                                for(let i = 0; i < boutons.length; i ++){
                                    boutons[i].style.visibility = "visible";
                                }
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
            if(document.getElementsByClassName("boutonFil")[i].id == id){
                document.getElementsByClassName("boutonFil")[i].classList.add("activer");
            }
        }
    }

    //change la classe des boutons en fonction de s'il y en a un qui est activé ce en fonction de l'id du bouton

    function activerBouton2(id) {
        let len = document.getElementsByClassName("boutonAppart").length;
        for(let i = 0; i < len; i++){
            if(document.getElementsByClassName("boutonAppart")[i].classList.contains("activerAppart")){
                document.getElementsByClassName("boutonAppart")[i].classList.remove("activerAppart");
            }
        }
        document.getElementById(id).classList.add("activerAppart");
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
                            let len = document.getElementsByClassName("boutonFil").length;
                            for(let i = 0; i < len; i++){
                                if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                                    document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                                }
                            }
                            document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
                            alert('Volet monté !');
                        }
                    };
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + 10 + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                } else {
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            let len = document.getElementsByClassName("boutonFil").length;
                            for(let i = 0; i < len; i++){
                                if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                                    document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                                }
                            }
                            document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
                            alert('Volet monté !');
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
                            let len = document.getElementsByClassName("boutonFil").length;
                            for(let i = 0; i < len; i++){
                                if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                                    document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                                }
                            }
                            document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
                            alert('Volet descendu !');
                        }
                    };
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + 0 + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                } else {
                    request.onreadystatechange = function() {
                        if (this.readyState === 4 && this.status === 200) {
                            let len = document.getElementsByClassName("boutonFil").length;
                            for(let i = 0; i < len; i++){
                                if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                                    document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                                }
                            }
                            document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
                            alert('Volet descendu !');
                        }
                    };
                    etat -= 1;
                    request.open("GET", "controller/gestionCapteur.php?positionVolet=" + etat + "&idCap2=" + id, true);
                    request.send();                                                    //envoie le resultat de la requete par methode get
                }
            }
        }
    }

    // fonction pour tout changer dans la maison

    function changer(id, action, participe){
        action2 = action.charAt(0).toUpperCase() + action.slice(1);
        if(confirm("Voulez-vous vraiment tout " + action + " ?")) {
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    let len = document.getElementsByClassName("boutonFil").length;
                    for(let i = 0; i < len; i++){
                        if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                            document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                        }
                    }
                    alert("Tout est " + participe +" !");
                 /*   let boutons = document.getElementsByClassName("bas");
                    let boutons2 = document.getElementsByClassName("haut");
                    if(action == "ouvrir") {
                        for(let i = 0; i < boutons.length; i ++){
                                boutons[i].style.visibility = "visible";
                        }
                        for(let i = 0; i < boutons2.length; i ++){
                            boutons2[i].style.visibility = "visible";
                        }
                    } else if(action == "fermer") {
                        for(let i = 0; i < boutons.length; i ++){
                            for(let i = 0; i < boutons.length; i ++){
                                boutons[i].style.visibility = "hidden";
                            }
                            for(let i = 0; i < boutons2.length; i ++){
                                boutons2[i].style.visibility = "hidden";
                            }
                        }
                    }*/
                    document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
                }
            };
            id -= 100000;
            request.open("GET", "controller/gestionCapteur.php?id" + action2 + "=" + id, true);
            request.send();                                                                 //envoie le resultat de la requete
        }
    }

    //fonction qui permet d'afficher les capteurs en fonction de la piece demandée

    function changerLogement(logementVoulu, id) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        if (logementVoulu === "") {
            document.getElementById("zoneClients").innerHTML = "";  //cas ou aucune piece n'est choisi mais un bouton existe
            return;
        }
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("zoneClients").innerHTML = "";
                document.getElementById("zoneClients").innerHTML = "<div class='caseClient' id='divClients'>" +
                                                                        "<div class='titre titreSup'>Clients</div>" +
                                                                    "</div>" +
                                                                    "<div class='caseClient' id='divClients'>" +
                                                                        "<div class='titre titreSup'>Graphes</div>" +
                                                                    "</div>";
                document.getElementById("divClients").innerHTML += this.responseText;   //rempli la zoneCapteurs
            }
        };
        request.open("GET", "controller/gestionClient.php?logement=" + logementVoulu + "&id=" + id, true);
        request.send();                                                              //envoie le resultat de la requete au serveur
    }

    //fonction qui permet d'afficher les pieces en fonction de l'appartement

    function changerLogement2(id) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("zoneGestion").innerHTML = this.responseText;   //rempli filPieces
            }
        };
        request.open("GET", "controller/gestionCapteur.php?logement=" + id, true);
        request.send();                                                              //envoie le resultat de la requete au serveur
    }
</script>