<?php

include($_SERVER["DOCUMENT_ROOT"] . "/model/connexionBDD.php");


function ajouterInscription(PDO $bdd, $valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp): array
{
    $valMdp = password_hash($valMdp, $id, PASSWORD_DEFAULT);
    $query = 'INSERT INTO utilisateur (Nom, Prenom, Adresse_mail, Date_naissance, Mot_de_passe) VALUES ($valNom, $valPrenom, $valAdresse_mail, $valDate, $valMdp )' . $id; //rajoute les données du nouvel utilisateur
    $bdd->exec($query);

}

function adresse_mailMdp(PDO $bdd, $valAdresse_mail)
{
    $query = 'SELECT utilisateur.id FROM utilisateur WHERE utilisateur.Adresse_mail="$valAdresse_mail"' . $valAdresse_mail;
    $table = $bdd->query($query)->fetchAll();
    $id = $table[0];
    $query = 'SELECT utilisateur.Mot_de_passe FROM utilisateur WHERE utilisateur.Adresse_mail="$valAdresse_mail"' . $id;
    $table = $bdd->query($query);
    return $table[0];  //renvoie le Mot de passe
}