<?php

function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

include "config/connexion.php";

$dateHour = $_POST['dateHour'];
$idPatients = $_POST['idPatients'];

$requete = $bdd->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour , :idPatients) ");
$requete->execute([
    "dateHour" => $dateHour,
    "idPatients" => $idPatients,
]);

header("location:liste-rendez-vous.php");
