<?php

include "config/connexion.php";

$requete = $bdd->query("SELECT * FROM patients");
$patients = $requete->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement-ajout-rendez-vous.php" method="post">
        <label for="dateHour"> date du rdv : </label>
        <input type="datetime-local" name="dateHour">

        <select name="idPatients" id="">
            <?php foreach ($patients as $patient) : ?>
                <option value="<?= $patient["id"] ?>"><?= $patient["firstname"] . " " . $patient["lastname"] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="envoyer">
    </form>
</body>

</html>