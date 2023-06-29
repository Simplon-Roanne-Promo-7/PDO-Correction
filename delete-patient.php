<?php

include 'config/connexion.php';

$id = $_POST['patientId'];

$requete = $bdd->prepare("DELETE FROM patients WHERE id = :id");
$requete->execute([
    "id" => $id
]);

header("Location: liste-patients.php");
