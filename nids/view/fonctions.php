<script>
    /*
     * Fonctions
     */

    //=================================== messages à afficher

  /*  function confirmer(message, zone){
        document.getElementById(zone).innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>"+ message +"</h1>" +
        "<form action='../index.php' method='post'>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='fermetureMessage(`divReponse`)' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }*/

  //changements de couleur lors de l'entrée des données pour l'inscription + ajout de message

    function verificationNom(nom){
        let entree = document.forms['inscription'].elements[nom].value;  //récupération de ce qui est mis dans l'entrée pour le nom ou prenom
        if(entree !== "" && entree.length >= 2){
            document.getElementById(nom).style.borderColor = "green";             //change le style du message
            document.getElementById("lab" + nom).style.color = "green";             //change le style du message
            document.getElementById("lab" + nom).innerHTML = "Ok";               //ajout message

            return true;
        } else {
            document.getElementById(nom).style.borderColor = "red";               //change le style du message
            document.getElementById("lab" + nom).style.color = "red";             //change le style du message
            document.getElementById("lab" + nom).innerHTML = "Trop court";               //ajout message
            return false;
        }
    }

    function verificationPass(){
        let mdp = document.forms['inscription'].elements['Mdp'].value;  //récupération de ce qui est mis dans l'entrée pour le mot de passe
        if(mdp !== "" && mdp.length >= 8){
            document.getElementById("Mdp").style.borderColor = "green";             //change le style du message
            document.getElementById("labMdp").style.color = "green";             //change le style du message
            document.getElementById("labMdp").innerHTML = "Ok";               //ajout message
            return true;
        } else {
            document.getElementById("Mdp").style.borderColor = "red";               //change le style du message
            document.getElementById("labMdp").style.color = "red";             //change le style du message
            document.getElementById("labMdp").innerHTML = "Trop court (8 caractères minimum)";       //ajout message
            return false;
        }
    }

    function verificationDate(){
        let naissance = document.forms['inscription'].elements['DateDeNaissance'].value;  //récupération de ce qui est mis dans l'entrée pour la date de naissance
        let date = naissance.split("-");
        if((date[0] > 2020) || (date[0] < 1900)){
            document.getElementById("DateDeNaissance").style.borderColor = "red";               //change le style du message
            document.getElementById("labDateDeNaissance").style.color = "red";             //change le style du message
            document.getElementById("labDateDeNaissance").innerHTML = "Invalide (année de 1900 à 2020)";       //ajout message
            return false;
        } else {
            document.getElementById("DateDeNaissance").style.borderColor = "green";            //change le style du message
            document.getElementById("labDateDeNaissance").style.color = "green";             //change le style du message
            document.getElementById("labDateDeNaissance").innerHTML = "Ok";               //ajout message
        }
    }

    function validationnn(mail) {
        let valeur = document.forms["mdp"].elements[mail].value;
        //création d'une expression régulière pour tester le mail
        let expression = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (expression.test(valeur)){
            document.getElementById("resultat").innerHTML = "adresse mail valide"; //. La méthode test() permet de tester une chaîne de caractères. Elle retourne true si la chaîne est valide, false sinon.
            document.getElementById("resultat").style.color = "green";
            document.getElementById("resultat").style.fontWeight = "bold";
        } else{
            document.getElementById("resultat").innerHTML = "adresse mail invalide";
            document.getElementById("resultat").style.color = "red";
            document.getElementById("resultat").style.fontWeight = "bold";
        }
        return false;
    }

    function verificationMail(){
        let mail = document.forms['inscription'].elements['AdresseMail'].value;  //récupération de ce qui est mis dans l'entrée pour le mot de passe
        if(checkMail(mail)){
            document.getElementById("AdresseMail").style.borderColor = "green";             //change le style du message
            document.getElementById("labAdresseMail").style.color = "green";             //change le style du message
            document.getElementById("labAdresseMail").innerHTML = "Adresse valide";               //ajout message
            return true;
        } else {
            document.getElementById("AdresseMail").style.borderColor = "red";               //change le style du message
            document.getElementById("labAdresseMail").style.color = "red";             //change le style du message
            document.getElementById("labAdresseMail").innerHTML = "Adresse invalide";               //ajout message
            return false;
        }
    }

    //fonction qui récupère le mot de passe et la confirmation et vérifie s'ils sont égaux
    function verificationConfPass(){
        let pass = document.forms['inscription'].elements['Mdp'].value;  //récupération de ce qui est mis dans l'entrée pour le mot de passe
        let pass2 = document.forms['inscription'].elements['ConfirmationMdp'].value;  //récupération de ce qui est mis dans l'entrée pour la confirmation
        if(pass === pass2 && pass !== ""){
            document.getElementById("ConfirmationMdp").style.borderColor = "green";             //change le style du message
            document.getElementById("labConfirmationMdp").innerHTML = "Ok";             //change le message
            document.getElementById("labConfirmationMdp").style.color = "green";             //change le style du message
            return true;
        } else {
            document.getElementById("ConfirmationMdp").style.borderColor = "red";             //change le style du message
            document.getElementById("labConfirmationMdp").innerHTML = "Invalide";             //change le message
            document.getElementById("labConfirmationMdp").style.color = "red";             //change le style du message
            return false;
        }
    }

  //fonction qui permet d'afficher un messsage comme alert en JS mais en personnalisé
    function alerter(message){
        //ajout du message dans le div appelé divReponse
        document.getElementById(`divReponse`).innerHTML = "<div class= 'case'>"+
        "<h1 class='alert'>"+ message +"</h1>"+
            "<div>"+
                "<input type='button' class='bouton boutonGlobal2' value='OK' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</div>"+
            "</div>";
    }

    //fonction permettant de revenir à l'état antérieur après un message à l'écran
    function fermetureMessage(id){
        //changement de style pour le div de réponse
        document.getElementById(id).style.zIndex = '-100';
        document.getElementById(id).style.display = 'none';
    }

    //test de la validité du mail
    function checkMail(mail){
        //création d'une expression régulière pour tester le mail
        let regularExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return(regularExp.test(mail));
    }

    function formulaireMdp(){
        let mail = document.forms['mdp'].elements['mail'].value;
        if(!checkMail(mail)){
        } else {
            document.getElementById('retour').innerHTML= "<p class='mdpo'> Votre mail a été envoyé" +
                "            <br>" +
                "            <br>" +
                "            Mais la prochaine fois, achète toi de la matière grise pour retenir ton mot de passe</p>";
            let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
            request = new XMLHttpRequest();
            request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
                if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                }
            };
            request.open("POST", "controller/messagerie.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("mail=" + mail);                      //envoie le resultat de la requete au serveur
        }
    }

    function verifLogin() {
        let id = document.forms['inscription'].elements['identifiant'].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById('boutonEnvoi').remove();
                document.getElementById('changementMdp').innerHTML += this.responseText;
            }
        };
        request.open("POST", "controller/modificationMotDePasse.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("identifiant=" + id);                      //envoie le resultat de la requete au serveur
    }

    function verifReponse() {
        let id = document.forms['inscription'].elements['identifiant'].value;
        let reponse = document.forms['inscription'].elements['reponse'].value;
        if(id === ""){
            document.getElementById("identifiant").style.borderColor = "red";             //change le style du message
            document.getElementById("labIdentif").style.color = "red";             //change le style du message
            document.getElementById("labIdentif").innerHTML = "Login manquant !";
        } else {
            let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
            request = new XMLHttpRequest();
            request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
                if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                    let vraiReponse = this.responseText;
                    if(vraiReponse === reponse){
                        modifMdp();
                    } else {
                        document.getElementById("reponse").style.borderColor = "red";             //change le style du message
                        document.getElementById("labRep").style.color = "red";             //change le style du message
                        document.getElementById("labRep").innerHTML = "Mauvaise réponse !";
                    }
                }
            };
            request.open("POST", "controller/modificationMotDePasse.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("monId=" + id);                      //envoie le resultat de la requete au serveur
        }
    }

    function modifMdp() {
        let id = document.forms['inscription'].elements['identifiant'].value;
        let mdp = document.forms['inscription'].elements['Mdp'].value;
        let newMdp = document.forms['inscription'].elements['ConfirmationMdp'].value;
        if(id === ""){
            document.getElementById("identifiant").style.borderColor = "red";             //change le style du message
            document.getElementById("labIdentif").style.color = "red";             //change le style du message
            document.getElementById("labIdentif").innerHTML = "Login manquant !";
        } else if(mdp !== newMdp){
        } else {
            let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
            request = new XMLHttpRequest();
            request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
                if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                    document.getElementById('retour').innerHTML = "<p class=\"mdpo\" style='font-size: 25px'>La modification de mot de passe a été prise en compte !</p><br/>" +
                        "<a href='../index.php' style='font-size: 25px'>Retour à la page d'inscription</a>";
                }
            };
            request.open("POST", "controller/modificationMotDePasse.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("new_pass=" + mdp + "&new_pass_conf=" + newMdp + "&identif=" + id);                      //envoie le resultat de la requete au serveur
        }
    }
    //=================================== connexion à la page


    function connexionUser() {
        //recuperation des données du formulaire
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

    //=================================== inscription d'un nouvel utilisateur

    function inscriptionUser() {
        //recuperation des données du formulaire
        let prenom = document.forms["inscription"].elements["Prenom"].value;
        let nom = document.forms["inscription"].elements["Nom"].value;
        let mail = document.forms["inscription"].elements["AdresseMail"].value;
        let naissance = document.forms["inscription"].elements["DateDeNaissance"].value;
        let mdp = document.forms["inscription"].elements["Mdp"].value;
        let confirma = document.forms["inscription"].elements["ConfirmationMdp"].value;
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        //ajout du message dans le div appelé divReponse
        document.getElementById(`divReponse`).innerHTML = "<div class= 'case'>"+
            "<h1 class='alert'>Patientez s'il vous plait, votre inscription est en cours...</h1>"+
            "</div>";
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
            }
        };
        request.open("POST", "controller/accueil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("prenom=" + prenom + "&nom=" + nom + "&mail=" + mail + "&naissance=" + naissance + "&mdp=" + mdp + "&ConfirmationMdp=" + confirma);     //envoie le resultat de la requete au serveur
    }

    //=========================== Déconnexion de l'utilisateur

    function deconnexionUser() {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("divReponse").innerHTML = this.responseText;   //rempli le corps de la page avec la réponse
                document.getElementById("divReponse").style.zIndex = '1';               //change le style de divReponse
                document.getElementById("divReponse").style.display = 'initial';
            }
        };
        request.open("POST", "controller/selection.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("deconnexion=1");                      //envoie le resultat de la requete au serveur
    }

    //============================ modification des informations de l'utilisateur dans le menu editionProfil

    function modificationUser() {
        //recuperation des informations du formulaire modification
        let nom = document.forms["modification"].elements["user_nom"].value;
        let prenom = document.forms["modification"].elements["user_prenom"].value;
        let mail = document.forms["modification"].elements["user_email"].value;
        let phone = document.forms["modification"].elements["user_phone"].value;
        let naissance = document.forms["modification"].elements["user_date"].value;
        let mdp = document.forms["modification"].elements["user_pass"].value;
        let question = document.forms["modification"].elements["user_question"].value;
        let reponse = document.forms["modification"].elements["user_response"].value;

        let date = naissance.split("-");
        if((date[0] > 2020) || (date[0] < 1900)){                   //verification de la date pour eviter tout problème avec
            document.getElementById("divReponse").style.zIndex = '1';
            document.getElementById("divReponse").style.display = 'initial';
            alerter("Date de naissance invalide");
        } else if(mail !== "" && !checkMail(mail)) {                               //verification que l'adresse est bien une adresse mail
            document.getElementById("divReponse").style.zIndex = '1';
            document.getElementById("divReponse").style.display = 'initial';
            alerter("Mail non valide");
        } else {
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
    }

    //=================================== animation boutons

    function montrerTitre(id, type) {       //affiche le nom de la page où aller
        document.getElementById(id).innerHTML = '<i class="fa '+ id + '"></i> ' + type;
    }

    function cacherTitre(id) {              //cache le nom lorsque la souris n'y est plus
        document.getElementById(id).innerHTML = '<i class="fa '+ id + '"></i>';
    }
    function miseEnValeur(id) {             //met en valeur les explications des pages de support
        document.getElementById(id).style.borderColor = 'white';
        document.getElementById(id).style.backgroundColor = 'darkgrey';
        document.getElementById(id).style.color = 'black';

    }
    function changerBordure(id) {          //enlève la mise en valeur les explications des pages de support
        document.getElementById(id).style.backgroundColor = '#3C3D51';
        document.getElementById(id).style.borderColor = '#3C3D51';
        document.getElementById(id).style.color = 'white';
    }

        // fonction header pour changer le contenu du bandeau en fonction de la taille de la fenêtre

    function changerContenu(id){
        let str = document.getElementById(id).classList[1];
        let str2 = str.split('_');
        if(window.innerWidth < 500){            //taille inférieur à 500px
            document.getElementById(id).innerHTML = "";
        } else if(window.innerWidth < 587){
            document.getElementById(id).innerHTML = str2[0].substr(0,1) + "." + str2[1];
        }else if(window.innerWidth < 650){
            document.getElementById(id).innerHTML = str2[0].substr(0,1) + "." + str2[1];
        } else {
            document.getElementById(id).innerHTML = str2[0] + " " + str2[1];
        }
    }

    //changement du contenu en mettant à l'écran le contenu souhaité
    function remettreContenu(id){
        document.getElementById(id).innerHTML = id;
    }


    //=================================== gestion capteurs


    //------------------------fonction de suppression du capteur non voulu

    function supprimer(id) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Voulez-vous supprimer ce capteur ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionSupprimer("+id+")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //sous-fonction pour supprimer le capteur après le message de prévention

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
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("id=" + id2);   //envoie le resultat de la requete
    }

    //-----------------changer la classe de l'icone + envoi requête à la base pour changer l'etat

        //message d'alerte pour prévenir avant tout changement
    function allumerEteindre(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement modifier l'état de ce capteur ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionAllumerEteindre(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
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
            request.open("POST", "controller/gestionCapteur.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("allume=" + 0 + "&idCap=" + id);                                                   //envoie le resultat de la requete par methode get
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
            request.open("POST", "controller/gestionCapteur.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("allume=" + 1 + "&idCap=" + id);                                                    //envoie le resultat de la requete par methode get
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

    function activerBouton3(id) {
        let len = document.getElementsByClassName("boutonFil2").length;
        for(let i = 0; i < len; i++){
            if(document.getElementsByClassName("boutonFil2")[i].classList.contains("activer")){
                document.getElementsByClassName("boutonFil2")[i].classList.remove("activer");
            }
            if(document.getElementsByClassName("boutonFil2")[i].id == id){
                document.getElementsByClassName("boutonFil2")[i].classList.add("activer");
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
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("piece=" + pieceVoulue + "&id=" + id);                                                              //envoie le resultat de la requete au serveur
    }

    //----------------------------fonction qui permet d'afficher les capteurs en fonction de la piece demandée

    function changerPieceEd(pieceVoulue, id) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        if (pieceVoulue === "") {
            document.getElementById("zoneGraphe").innerHTML = "";  //cas ou aucune piece n'est choisi mais un bouton existe
            return;
        }
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById('zoneGraphe').innerHTML = "";
                document.getElementById('zoneGraphe2').innerHTML = "";
                let reponse = this.responseText;
                let division = reponse.split("?");
                let tabLum = division[0].split("+");
                let tabTemp = division[1].split("+");
                tracerGraph(tabTemp, "Température", "°C", "zoneGraphe");
                tracerGraph(tabLum, "Luminosité", "lux", "zoneGraphe2");
            }
        };
        request.open("POST", "controller/gestionClient.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("piece=" + pieceVoulue + "&idPieceActive=" + id);                                                              //envoie le resultat de la requete au serveur
    }

    //fonction qui permet de tracer un graphique dans la zone désigné en fonction des données en entrée
    function tracerGraph(tab, titre, unite, zone){
        //trace en fonction des mois
        let nomMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre']
        let donnees = [];   //les données du graphe
        let mois = [];      //les mois vraiment pris en compte
        for (let i = 0; i < tab.length - 1; i++) {      //récupération du mois et de la valeur
            let tab2 = tab[i].split('!');
            donnees.push(tab2[1]);
            mois.push(nomMois[parseInt(tab2[0]) - 1]);
        }
        let zoneGraph = document.getElementById(zone);  //zone de dessin
        let data = [{       //les données
            x: mois,
            y: donnees,
            type: 'scatter'
        }];
        let layout = {      //comment sera agencé les graphes
            title: titre,
            xaxis: {
                title: 'Mois',
                showgrid: false,
                zeroline: false
            },
            yaxis: {
                title: unite,
                showline: false
            }
        };
        Plotly.newPlot(zoneGraph, data, layout);    //tracé sur un nouveau plot pour éviter le chevauchement
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
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("temp=" + temp);                                                                 //envoie le resultat de la requete
    }

    //-----------------------fonction pour monter / descendre le volet

    //message avant de monter ou descendre le volet
    function monterDescendre(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement modifier l'état de cet élément ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionMonterDescendre(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //fonction récupérant la valeur pour le monter
    function actionMonterDescendre(id){
        document.getElementById("divReponse").innerHTML = "<div class= 'case'>" +
            "<h1 class='alert'>Modifications</h1>" +
            "<form name='modifVolet'>" +
            " <label class='ed edition'> Hauteur du volet [0 (fermer) à 10 (ouvert)] :</label>" +
            "<input type='number' name='volet' min='0' max='10' class='inputForm'>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='finalMonterDescendre(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //fonction envoyant les changements au serveur
    function finalMonterDescendre(id) {
        let etat = document.forms["modifVolet"].elements["volet"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter('La modification a bien été prise en compte');
                document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';
                let len = document.getElementsByClassName("boutonFil").length;
                for(let i = 0; i < len; i++){
                    if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                        document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                    }
                }
            }
        };
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("positionVolet=" + etat + "&idCap2=" + id);
    }


    // ------------------------------------- fonction pour ajouter un capteur dans la maison

    //message pour prévenir de l'ajout
    function ajouterCapteur(id, idUt){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement ajouter cet élément ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionAjouterCapteur(" + id + "," + idUt +")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    // affichage du formulaire après avoir récupéré les pieces présents dans le logement
    function actionAjouterCapteur(id, idUt){
        let request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(this.readyState === 4 && this.status === 200) {
              let values = this.responseText;
              let tabValues = values.split('_');
              let options = "";
              for(let i = 0; i < tabValues.length - 1; i++){
                  let tabVal2 = tabValues[i].split("!");
                  options += "<option value= "+ tabVal2[0] + ">" + tabVal2[1] + " (" + tabVal2[2] + ")</option>"
              }
              document.getElementById("divReponse").innerHTML = "<div class= 'case' style='height: 300px'>" +
                  "<h1 class='alert'>Informations</h1>" +
                  "<form name='ajoutCap'>" +

                  "<label class='edition ed'> Nom :</label>" +
                  "<input type='text' name='nomCap' class='inputForm'>" +

                  "<label class='edition ed'> Numéro de série :</label>" +
                  "<input type='number' name='numSerie' class='inputForm'>" +

                  "<label class='edition ed'> Piece :</label>" +
                  "<select name='piece' class='inputForm'>" +
                  options +
                  "</select>" +
                  "<label class='edition ed'> Id CeMAC :</label>" +
                  "<input type='number' name='CeMAC' class='inputForm'>" +

                  "<label class='edition ed'> Id Categorie :</label>" +
                  "<input type='number' name='Cat' class='inputForm'>" +

                  "<input type='button' class='bouton boutonGlobal2' onclick='finalAjouterCapteur(" + id + "," + idUt +")' style='float: none' value='OUI'>"+
                  "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
                  "</form>"+
                  "</div>";
          }
        };
        request.open("POST", "controller/catalogue.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idUtil=" + idUt);
    }

    //fonction qui envoie au serveur les informations pour les ajouter dans la base de données + message de confirmation
    function finalAjouterCapteur(id, idUt) {
        let nom = document.forms["ajoutCap"].elements["nomCap"].value;
        let numSerie = document.forms["ajoutCap"].elements["numSerie"].value;
        let piece = document.forms["ajoutCap"].elements["piece"].value;
        let cemac = document.forms["ajoutCap"].elements["CeMAC"].value;
        let cat = document.forms["ajoutCap"].elements["Cat"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter("L'ajout a bien été prise en compte");
            }
        };
        request.open("POST", "controller/catalogue.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idUtilisateur=" + idUt +"&idCap=" + id + "&nom=" + nom + "&numSerie=" + numSerie
            + "&piece=" + piece + "&cemac=" + cemac + "&cat=" + cat);
    }

    // ------------------------------------- fonction pour tout changer dans la maison (allumer / éteindre / monter / descendre

    function changer(id, action, numAction){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement tout "+ action +" ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionChanger(" + id + "," + numAction + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //envoie au serveur les informations
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
                alerter("Tout est " + participe +" !");
                document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';   //rempli la zoneCapteurs
            }
        };
        id -= 100000;
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("id" + action2 + "=" + id);                                                                 //envoie le resultat de la requete
    }

    // --------------------------------------------- fonction qui change les propriétés des capteurs (à continuer)

    //message de prévention avant modification
    function modificationInformations(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement modifier les informations de cet élément ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionModificationInfo(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //fonction pour afficher le formulaire de modification
    function actionModificationInfo(id){
        document.getElementById("divReponse").innerHTML = "<div class= 'case'>" +
            "<h1 class='alert'>Informations</h1>" +
            "<form name='modifInfo'>" +
                " <label class='ed edition'> Nom :</label>" +
                "<input type='text' name='nomCapteur' class='inputForm'>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='finalModification(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //fonction d'envoi des informations au serveur
    function finalModification(id) {
        let nom = document.forms["modifInfo"].elements["nomCapteur"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter('La modification a bien été prise en compte');
                document.getElementById("zoneCapteurs").innerHTML = '<p class="info">Veuillez choisir une pièce</p>';
                let len = document.getElementsByClassName("boutonFil").length;
                for(let i = 0; i < len; i++){
                    if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                        document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                    }
                }
            }
        };
        request.open("POST", "controller/gestionCapteur.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("modifNom=" + nom + "&idDuCapteur=" + id);
    }


    // --------------------------------------------- fonction qui permet d'afficher les clients en fonction du logement demandé

    function changerLogement(logementVoulu, id, idGest) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        if (logementVoulu === "") {
            document.getElementById("zoneClients").innerHTML = "";  //cas ou aucune piece n'est choisi mais un bouton existe
            return;
        }
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("zoneClients").innerHTML = "";
                document.getElementById("zoneClients").innerHTML =              //affiche les clients et la consommation dans l'appartement
                    "<div class=\"container\">" +
                    "    <button class=\"bouton boutonAjout\" onclick=\"ajouterClient("+idGest + "," + id +")\">" +
                    "        <i class=\"fa fa-plus-circle\" aria-hidden=\"true\"></i> Ajouter un client" +
                    "    </button>" +
                    "</div>" +
                    "<div class='caseClient' id='divClients'>" +
                        "<div class='titre titreSup'>Clients</div>" +
                    "</div>" +
                    "<div class='caseClient graphe' id='divClients'>" +
                        "<div class='titre titreSup'>Graphes</div>" +
                    "</div>";
                let result = this.responseText.split("§");
                document.getElementById("divClients").innerHTML += result[0];   //rempli la zoneClients
                document.getElementsByClassName("graphe")[0].innerHTML += result[1];
            }
        };
        request.open("GET", "controller/gestionClient.php?logement=" + logementVoulu + "&id=" + id, true);
        request.send();                                                              //envoie le resultat de la requete au serveur
    }

    //------------------------------fonction qui permet d'afficher les pieces en fonction de l'appartement pour un client

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

    //------------------------------------fonction qui permet d'afficher les pieces en fonction de l'appartement dans l'editeur de profil

    function changerLogement3(id) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("gestionPieces").innerHTML = this.responseText;   //rempli filPieces
            }
        };
        request.open("GET", "controller/editionProfil.php?logement=" + id, true);
        request.send();                                                              //envoie le resultat de la requete au serveur
    }

    function changerLogement4(logementVoulu, id) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        if (logementVoulu === "") {
            document.getElementById("zoneClients").innerHTML = "";  //cas ou aucune piece n'est choisi mais un bouton existe
            return;
        }
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                document.getElementById("zoneClients").innerHTML = "";
                document.getElementById("zoneClients").innerHTML =              //affiche les clients et la consommation dans l'appartement
                    "<div class='caseClient graphe' id='divClients'>" +
                    "<div class='titre titreSup'>Graphes</div>" +
                        this.responseText +
                    "</div>";
            }
        };
        request.open("GET", "controller/statistique.php?logement=" + logementVoulu + "&id=" + id, true);
        request.send();                                                              //envoie le resultat de la requete au serveur
    }

    //------------------------fonction de suppression des clients quittant l'appartement

    //message de prévention avant suppression
    function supprimerClient(id) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Voulez-vous supprimer ce client ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionSupprimerClient("+id+")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //suppression du client par envoi des informations au serveur
    function actionSupprimerClient(id){
        let id2 = -id;
        let client = document.getElementById(id);   // recupere element <ul> avec id="zoneCapteurs"
        client.remove();           // efface celui d'id capteur
        //supprimer de la base de données
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let nom = "";
                for(let i = 1; i < client.classList.length; i++){
                    nom += " " + client.classList[i];
                }
                alerter(nom +' supprimé !');             // /!\ mettre condition si la base n'a pas ete mise a jour
            }
        };
        request.open("POST", "controller/gestionClient.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("id=" + id2);   //envoie le resultat de la requete
    }

    // ------------------------------------- fonction pour ajouter un capteur dans la maison souhaité

    //message de prévention
    function ajouterClient(idGest, idLog){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement ajouter un client ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionAjouterClient(" + idGest + "," + idLog + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //affichage du choix de client
    function actionAjouterClient(idGest, idLog){
                document.getElementById("divReponse").innerHTML = "<div class= 'case' style='height: 300px'>" +
                    "<h1 class='alert'>Ajout d'un client</h1>" +
                    "<form name='ajoutClient'>" +

                    "<label class='ed edition'> Numéro du client :</label>" +
                    "<input type='number' name='num' class='inputForm'>" +

                    "<input type='button' class='bouton boutonGlobal2' onclick='finalAjouterClient(" + idGest + "," + idLog +")' style='float: none' value='OUI'>"+
                    "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
                    "</form>"+
                    "</div>";
    }

    //confirmation
    function finalAjouterClient(idGest, idLog) {
        let num = document.forms["ajoutClient"].elements["num"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                let nomClient = this.responseText;
                document.getElementById("divReponse").innerHTML = "<div class= 'case'>" +
                    "<h1 class='alert'>Voulez-vous ajouter " + nomClient + " à ce logement ?</h1>" +
                    "<form>" +
                        "<input type='button' class='bouton boutonGlobal2' onclick='finalAjouterClientFinal(" + num + "," + idGest + "," + idLog +")' style='float: none' value='OUI'>"+
                        "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>" +
                    "</form>" +
                    "</div>";
            }
        };
        request.open("POST", "controller/gestionClient.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idUtilisateur=" + num);
    }

    //retour au menu de choix d'appartement
    function finalAjouterClientFinal(id, idGest, idLog) {
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter("L'ajout a bien été pris en compte");
                document.getElementById("zoneClients").innerHTML = '<p class="info">Veuillez choisir un logement</p>';
                let len = document.getElementsByClassName("boutonFil").length;
                for(let i = 0; i < len; i++){
                    if(document.getElementsByClassName("boutonFil")[i].classList.contains("activer")){
                        document.getElementsByClassName("boutonFil")[i].classList.remove("activer");
                    }
                }
            }
        };
        request.open("POST", "controller/gestionClient.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idClientAjouter=" + id + "&idGest=" + idGest + "&idLog=" + idLog);
    }

    function ajoutF(page){
        let titre = document.forms["formulaireF"].elements['Titre'].value;
        let contenu = document.forms["formulaireF"].elements['Contenu'].value;
        if(titre === "" || contenu === ""){
            document.getElementById("divReponse").style.zIndex = '1';
            document.getElementById("divReponse").style.display = 'initial';
            alerter("L'ajout n'a pas été pris en compte");
        }
        else {
            let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
            request = new XMLHttpRequest();
            request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
                if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                    document.getElementById("divReponse").style.zIndex = '1';
                    document.getElementById("divReponse").style.display = 'initial';
                    alerter("L'ajout a bien été pris en compte");
                    document.getElementById("articles").innerHTML = this.responseText;
                }
            };
            request.open("POST", "controller/"+ page +".php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("Titre=" + titre + "&Contenu=" + contenu);
        }
    }

    function supprimerArticle(question) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Voulez-vous supprimer cet article ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionSupprimerArticle("+ question +")'   style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionSupprimerArticle(question){
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter("Article supprimé !");
                document.getElementById("articles").innerHTML = this.responseText;
            }
        };
        request.open("POST", "controller/FAQ.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("question=" + question);
    }

    //-----------------Fonctions comptes secondaires edition de profil


    function supprimComptes(id_sec) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Voulez-vous supprimer ce compte secondaire ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionSupprimComptes("+id_sec+")'   style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }


    function actionSupprimComptes(id_sec){
        //supprimer de la base de données
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                let div = document.getElementById(id_sec);
                let nom = div.classList[0];
                div.remove();
                alerter('Compte secondaire de '+nom+' supprimé');
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("id_sec=" + id_sec);   //envoie le resultat de la requete
    }


    function ajoutCompteSec() {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Quel est le nom et le prénom du compte qui vous voulez lier ?</h1>" +
            "<form name='comptesec'>" +
            "<input type=\"text\" placeholder='Nom' name='nomsec' class='compteSec'/>"+
            "<input type=\"text\" placeholder='Prénom' name='prenomsec' class='compteSec'/>"+
            "<br> <input type=\"text\" placeholder='Adresse' name='logementsec' class='compteSec'/>"+
            "<br> <input type='button' class='bouton boutonGlobal2' value='VALIDER' onclick='actionAjoutCompteSec()' style='float: none'>"+
            "<input type='button' class='bouton boutonGlobal2' value='ANNULER' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionAjoutCompteSec() {
        let nomsec = document.forms["comptesec"].elements["nomsec"].value;
        let prenomsec = document.forms["comptesec"].elements["prenomsec"].value;
        let logementsec = document.forms["comptesec"].elements["logementsec"].value;
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                alerter("L'ajout du compte a bien été prise en compte");
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("nomsec=" + nomsec + "&nprenomsec=" + prenomsec
            + "&logementsec=" + logementsec);
    }

    function ajoutLogement() {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Quelle est l'adresse de votre logement ?</h1>" +
            "<form name='logement'>" +
            "<br> <input type=\"text\" placeholder='Adresse' name='logementsec' class='compteSec'/>"+
            "<br> <input type='button' class='bouton boutonGlobal2' value='VALIDER' onclick='actionAjoutLogement()' style='float: none'>"+
            "<input type='button' class='bouton boutonGlobal2' value='ANNULER' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    function actionAjoutLogement() {
        let logementsec = document.forms["logement"].elements["logementsec"].value;
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                alerter("L'ajout du logement a bien été prise en compte");
                document.getElementById('divClients2').innerHTML = this.responseText;
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("logement=" + logementsec);
    }

    function suppressionLogement() {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        let request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                let logements = this.responseText;
                let tabValues = logements.split('_');
                let options = "";
                for(let i = 0; i < tabValues.length - 1; i++){
                    let tabVal2 = tabValues[i].split("!");
                    options += "<option value= "+ tabVal2[0] + ">" + tabVal2[1] + "</option>"
                }
                document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
                    "<h1 class='alert'> Quel logement voulez-vous supprimer ?</h1>" +
                    "<form name='logementSppr'>" +
                    "<select name='log' class='inputForm'>" +
                        options +
                    "</select>" +
                    "<br> <input type='button' class='bouton boutonGlobal2' value='VALIDER' onclick='actionSuppressionLogement()' style='float: none'>"+
                    "<input type='button' class='bouton boutonGlobal2' value='ANNULER' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
                    "</form>"+
                    "</div>";
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("suppLogement=1");
    }

    function actionSuppressionLogement() {
        let logementsec = document.forms["logementSppr"].elements["log"].value;
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                alerter("L'ajout du logement a bien été prise en compte");
                document.getElementById('divClients2').innerHTML = this.responseText;
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("logementASuppr=" + logementsec);
    }

    //======================================= ajout d'une pièce dans la maison qui lui appartient
    function ajouterPiece(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'>Voulez-vous réellement ajouter une pièce dans la maison ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionAjouterPiece(" + id + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    // affichage du formulaire après avoir récupéré les pieces présents dans le logement
    function actionAjouterPiece(id){
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Quel est le nom de la nouvelle pièce ?</h1>" +
            "<form name='ajoutPiece'>" +
            "<label class='ed edition'> Nom :</label>" +
            "<input type='text' name='nomPiece' class='inputForm'>"+
            "<br> <input type='button' class='bouton boutonGlobal2' value='VALIDER' onclick='finalAjouterPiece(" + id + ")' style='float: none'>"+
            "<input type='button' class='bouton boutonGlobal2' value='ANNULER' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //fonction qui envoie au serveur les informations pour les ajouter dans la base de données + message de confirmation
    function finalAjouterPiece(id) {
        let nom = document.forms["ajoutPiece"].elements["nomPiece"].value;
        let request;                         //requete http permettant d'envoyer au fichier serveur de modifier la page
        request = new XMLHttpRequest();
        request.onreadystatechange = function () {                    //applique la fonction défini après lorsque le changement s'opère
            if (this.readyState === 4 && this.status === 200) {      // 4 = reponse prete / 200 = OK
                alerter("L'ajout a bien été prise en compte");
                changerLogement3(id);
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idLogement="+ id + "&nomPiece=" + nom);
    }

    //============================================== fonction pour supprimer une pièce de la maison
    function supprimerPiece(id, idMaison) {
        document.getElementById("divReponse").style.zIndex = '1';
        document.getElementById("divReponse").style.display = 'initial';
        document.getElementById("divReponse").innerHTML = "<div class= 'case'> "+
            "<h1 class='alert'> Voulez-vous supprimer cette pièce de la maison ?</h1>" +
            "<form>" +
            "<input type='button' class='bouton boutonGlobal2' onclick='actionSupprimerPiece(" + id + "," + idMaison + ")' style='float: none' value='OUI'>"+
            "<input type='button' class='bouton boutonGlobal2' value='NON' onclick='fermetureMessage(`divReponse`)' style='float: none'>"+
            "</form>"+
            "</div>";
    }

    //sous-fonction pour supprimer le capteur après le message de prévention

    function actionSupprimerPiece(id, idMaison){
        //supprimer de la base de données
        let request;
        request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                alerter('Pièce supprimée !');             // /!\ mettre condition si la base n'a pas ete mise a jour
                changerLogement3(idMaison);
            }
        };
        request.open("POST", "controller/editionProfil.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("idPieceSuppr=" + id);   //envoie le resultat de la requete
    }
</script>