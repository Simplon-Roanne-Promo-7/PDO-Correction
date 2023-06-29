<?php
include "config/connexion.php";
function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}




$id = $_POST['rdvId'];
$dateHour = htmlspecialchars($_POST['dateHour'], ENT_QUOTES);
$idPatients = htmlspecialchars($_POST['idPatients'], ENT_QUOTES);


$requete = $bdd->prepare("UPDATE appointments SET dateHour = :dateHour , idPatients = :idPatients WHERE id = :id  ");
$requete->execute([
    "dateHour" => $dateHour,
    "idPatients" => $idPatients,
    "id" => $id,
]);

header("location:liste-rendez-vous.php");
