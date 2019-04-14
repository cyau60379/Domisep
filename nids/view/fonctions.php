<?php
/*
 * Fonctions
 *
 */
?>


<script>


    //=================================== messages à afficher

    function confirmer(message, zone){
        document.getElementById(zone).innerHTML = "<div class= 'case caseCapteur'> "+
            "<h1>"+ message +"</h1>" +
        "<form action='../index.php' method='post'>" +
            "<input type='button' class='bouton boutonGlobal' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function alerter(message){
        document.getElementById(`divReponse`).innerHTML = "<div class= 'case caseCapteur'>"+
        "<h1>"+ message +"</h1>"+
        "<input type='button' class='bouton boutonGlobal' value='OK' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</div>";
    }



    //=================================== connexion à la page


    function connexionUser() {
        let id = document.forms["connexion"].elements["identifiant"].value;
        let mdp = document.forms["connexion"].elements["password"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';
                document.getElementById("divReponse").style.display = 'initial';
            }
        };
        request.open("POST", "controller/accueil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("identifiant=" + id + "&password=" + mdp);                      //envoie le resultat de la requete au serveur
    }

    function inscriptionUser() {
        let prenom = document.forms["inscription"].elements["Prenom"].value;
        let nom = document.forms["inscription"].elements["Nom"].value;
        let mail = document.forms["inscription"].elements["AdresseMail"].value;
        let naissance = document.forms["inscription"].elements["DateDeNaissance"].value;
        let mdp = document.forms["inscription"].elements["Mdp"].value;

        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';
                document.getElementById("divReponse").style.display = 'initial';
            }
        };
        request.open("POST", "controller/accueil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("prenom=" + prenom + "&nom=" + nom + "&mail=" + mail + "&naissance=" + naissance + "&mdp=" + mdp);     //envoie le resultat de la requete au serveur
    }


    function fermetureMessage(id){
        document.getElementById(id).style.zIndex = '-100';
        document.getElementById(id).style.display = 'none';
    }

    function deconnexionUser() {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';
                document.getElementById("divReponse").style.display = 'initial';
            }
        };
        request.open("POST", "controller/selection.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("deconnexion=1");                      //envoie le resultat de la requete au serveur
    }

    function modificationUser() {
        let nom = document.forms["modification"].elements["user_nom"].value;
        let prenom = document.forms["modification"].elements["user_prenom"].value;
        let mail = document.forms["modification"].elements["user_email"].value;
        let phone = document.forms["modification"].elements["user_phone"].value;
        let naissance = document.forms["modification"].elements["user_date"].value;
        let mdp = document.forms["modification"].elements["user_pass"].value;
        let question = document.forms["modification"].elements["user_question"].value;
        let reponse = document.forms["modification"].elements["user_response"].value;

        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';
                document.getElementById("divReponse").style.display = 'initial';
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("user_prenom=" + prenom + "&user_nom=" + nom
            + "&user_email=" + mail + "&user_phone=" + phone
            + "&user_date=" + naissance + "&user_pass=" + mdp + "&user_question=" + question + "&user_response=" + reponse);                      //envoie le resultat de la requete au serveur
    }

    //=================================== animation boutons

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

    //=================================== gestion capteurs


    //------------------------fonction de suppression du capteur non voulu

    function supprimer(id) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case caseCapteur'> "+
            "<h1> Voulez-vous supprimer ce capteur ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal' onclick='actionSupprimer("+id+")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionSupprimer(id){
        let id2 = -id;
        let cap = document.getElementById(id);   // recupere element <ul> avec id="zoneCapteurs"
        cap.remove();           // efface celui d'id capteur
        //supprimer de la base de données
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let nom = "";
                for(let i = 1; i < cap.classList.length; i++){
                    nom += " " + cap.classList[i];
                }
                alerter(nom +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
            }
        };
        request.open("GET", "controller/gestionCapteur.php?id=" + id2, true);
        request.send();   //envoie le resultat de la requete
    }

    //-----------------changer la classe de l'icone + envoi requête à la base pour changer l'etat


    function allumerEteindre(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case caseCapteur'> "+
            "<h1>Voulez-vous réellement modifier l'état de ce capteur ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal' onclick='actionAllumerEteindre(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionAllumerEteindre(id){
        let icon = document.getElementById(id);                    //recupere l'icone marche/arret
        let nom = "";
        for (let i = 3; i < (icon.classList.length - 1); i++) {
            nom += " " + icon.classList[i];
        }
        if (icon.classList.contains('on')) {                             //change l'etat s'il s'agit du bon element
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    icon.classList.remove('on');      // change l'etat
                    icon.classList.add('off');        // change l'etat
                    alerter(nom + ' éteint !');
                    let boutons = document.getElementsByTagName("input");
                    for (let i = 0; i < boutons.length; i++) {
                        if(boutons[i].classList.contains(id)){
                            boutons[i].style.visibility = "hidden";
                        }
                    }
                }
            };
            request.open("GET", "controller/gestionCapteur.php?allume=" + 0 + "&idCap=" + id, true);
            request.send();                                                   //envoie le resultat de la requete par methode get
        } else {
            let request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (this.readyState === 4 && this.status === 200) {
                    icon.classList.remove('off');           // change l'etat
                    icon.classList.add('on');           // change l'etat
                    alerter(nom + ' allumé !');
                    let boutons = document.getElementsByTagName("input");
                    for (let i = 0; i < boutons.length; i++) {
                        if(boutons[i].classList.contains(id)){
                            boutons[i].style.visibility = "visible";
                        }
                    }
                }
            };
            request.open("GET", "controller/gestionCapteur.php?allume=" + 1 + "&idCap=" + id, true);
            request.send();                                                    //envoie le resultat de la requete par methode get
        }
    }

    //------------------------change la classe des boutons en fonction de s'il y en a un qui est activé ce en fonction de l'id du bouton

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

    //------------------------change la classe des boutons en fonction de s'il y en a un qui est activé ce en fonction de l'id du bouton

    function activerBouton2(id) {
        let len = document.getElementsByClassName("boutonAppart").length;
        for(let i = 0; i < len; i++){
            if(document.getElementsByClassName("boutonAppart")[i].classList.contains("activerAppart")){
                document.getElementsByClassName("boutonAppart")[i].classList.remove("activerAppart");
            }
        }
        document.getElementById(id).classList.add("activerAppart");
    }

    //----------------------------fonction qui permet d'afficher les capteurs en fonction de la piece demandée

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

    //-----------------------------fonction pour modifier la température de la maison

    function changerTemperature() {
        let temp = document.getElementById('tempChoix').value;
        let request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("divReponse").style.zIndex = '1';
                document.getElementById("divReponse").style.display = 'initial';
                alerter("Le changement de température effectué a bien été pris en compte.");
            }
        };
        request.open("GET", "controller/gestionCapteur.php?temp=" + temp, true);
        request.send();                                                                 //envoie le resultat de la requete
    }

    //-----------------------fonction pour monter / descendre le volet

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

    // ------------------------------------- fonction pour tout changer dans la maison

    function changer(id, action, numAction){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case caseCapteur'> "+
            "<h1>Voulez-vous réellement tout "+ action +" ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal' onclick='actionChanger(" + id + "," + numAction + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionChanger(id, numAction){
        let participe = "";
        let action2 = "";
        switch (numAction) {
            case 1:
                action2 = "Allumer";
                participe = "allumé";
                break;
            case 2:
                action2 = "Eteindre";
                participe = "eteint";
                break;
            case 3:
                action2 = "Ouvrir";
                participe = "ouvert";
                break;
            case 4:
                action2 = "Fermer";
                participe = "fermé";
                break;
        }
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let len = document.getElementsByClassName("boutonFil").length;
                for(let i = 0; i < len; i++){
                    if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                        document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                    }
                }
                alerter("Tout est " + participe +" !");document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
            }
        };
        id -= 100000;
        request.open("GET", "controller/gestionCapteur.php?id" + action2 + "=" + id, true);
        request.send();                                                                 //envoie le resultat de la requete
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