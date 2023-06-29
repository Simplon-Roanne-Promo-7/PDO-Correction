<?php
include "config/connexion.php";

$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
$birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES);
$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);

$requete = $bdd->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail) 
VALUES (:firstname , :lastname, :birthdate, :phone , :mail) ");
$requete->execute([
    "lastname" => $lastname,
    "firstname" => $firstname,
    "birthdate" =>  $birthdate,
    "phone" => $phone,
    "mail" => $mail
]);

header("location:affichage.php");
