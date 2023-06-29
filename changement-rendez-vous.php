<?php
function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}
include "config/connexion.php";
pretyDump($_POST);
$requete = $bdd->query("SELECT * FROM appointments 
                        INNER JOIN patients ON appointments.idPatients = patients.id 
                        WHERE patients.id = $_POST[patientId]");

$currentPatient = $requete->fetch(PDO::FETCH_ASSOC);



$requete = $bdd->query("SELECT * FROM patients");
$allPatients = $requete->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement-update-rendez-vous.php" method="post">
        <input type="hidden" name="rdvId" value=" <?= $_POST["idRdv"] ?>">

        <label for="dateHour"> date du rdv : </label>
        <input type="datetime-local" name="dateHour" value="<?= $currentPatient['dateHour'] ?>">

        <select name="idPatients" id="">
            <?php foreach ($allPatients as $patient) : ?>

                <?php
                if ($patient["id"] == $currentPatient["idPatients"]) { ?>
                    <option selected value="<?= $patient["id"] ?>"><?= $patient["firstname"] . " " . $patient["lastname"] ?></option>
                <?php } else { ?>
                    <option value="<?= $patient["id"] ?>"><?= $patient["firstname"] . " " . $patient["lastname"] ?></option>
                <?php } ?>

            <?php endforeach; ?>
        </select>

        <input type="submit" value="envoyer">
    </form>
</body>

</html>