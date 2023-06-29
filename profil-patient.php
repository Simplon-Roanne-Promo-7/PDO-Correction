<?php
include "config/connexion.php";

$id = $_GET['id'];
$requete = $bdd->prepare("SELECT * FROM patients WHERE id = :id");
$requete->execute([
    "id" => $id
]);

$patient = $requete->fetch(PDO::FETCH_ASSOC);


$requete = $bdd->query("SELECT * FROM appointments 
                        WHERE idPatients = $id");

$allPatientApointements = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    table,
    th,
    td {
        border: 1px solid black;
        margin: auto;
    }
</style>

<body>
    <form action="traitement-update-patient.php" method="post">

        <input type="hidden" name="id" value="<?= $patient["id"] ?>">

        <label for="lastname"> nom : </label>
        <input type="text" name="lastname" value="<?= $patient["lastname"] ?>">
        </br>
        <label for="firstname"> prenom : </label>
        <input type="text" name="firstname" value="<?= $patient["firstname"] ?>">
        </br>
        <label for="birthdate"> birthdate : </label>
        <input type="text" name="birthdate" value="<?= $patient["birthdate"] ?>">
        </br>
        <label for="adress"> adress : </label>
        <input type="text" name="phone" value="<?= $patient["phone"] ?>">
        </br>
        <label for="mail"> mail : </label>
        <input type="text" name="mail" value="<?= $patient["mail"] ?>">
        </br>
        <input type="submit" value="envoyer">
    </form>

    <table>
        <h2> Liste des rendez-vous</h2>
        <thead>
            <tr>
                <th>dateHour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($allPatientApointements as $apointement) : ?>
                <tr>
                    <td><?= $apointement["dateHour"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="liste-patients.php">liste des patients</a>
</body>

</html>