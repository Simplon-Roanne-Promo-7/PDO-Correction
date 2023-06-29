<?php
include "config/connexion.php";
function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}


$id = $_POST['id'];
$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
$birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES);
$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES);

$requete = $bdd->prepare("UPDATE patients SET firstname = :firstname , lastname = :lastname,birthdate = :birthdate, phone = :phone ,mail = :mail WHERE id = :id  ");
$requete->execute([
    "lastname" => $lastname,
    "firstname" => $firstname,
    "birthdate" =>  $birthdate,
    "phone" => $phone,
    "mail" => $mail,
    "id" => $id,
]);

header("location:profil-patient.php?id=$id");
