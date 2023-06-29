<?php

$id = $_POST['apointmentId'];

$requete = $bdd->prepare("DELETE FROM apointments WHERE id = :id");
$requete->execute([
    "id" => $id
]);

header("Location: liste-rendez-vous.php");
