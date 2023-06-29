<?php
function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

include "config/connexion.php";

$rdvAndPatientsData = [];

$requete = $bdd->query("SELECT * FROM appointments ");
$apointements = $requete->fetchAll(PDO::FETCH_ASSOC);

foreach ($apointements as $apointement) {
    $requete = $bdd->prepare("SELECT * FROM patients WHERE id = :id");
    $requete->execute([
        "id" => $apointement['idPatients'],
    ]);
    $patient = $requete->fetch(PDO::FETCH_ASSOC);
    $rdvAndPatientsData[] = [
        "dateHour" => $apointement['dateHour'],
        "firstname" => $patient['firstname'],
        "lastname" => $patient['lastname'],
        "idPatient" => $patient['id'],
        "idApointments" => $apointement['id'],
    ];
}

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

    h1 {
        text-align: center;
    }
</style>

<body>
    <h1>Liste RDV</h1>
    <table>

        <thead>
            <tr>
                <th>dateHour</th>
                <th>patient firstname</th>
                <th>patient lastname</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($rdvAndPatientsData as $data) : ?>
                <tr>
                    <td><?= $data['dateHour'] ?></td>
                    <td><?= $data['firstname'] ?></td>
                    <td><?= $data['lastname'] ?></td>
                    <td><a href="profil-patient.php?id=<?= $data['idPatient'] ?>">profil</a></td>
                    <td>
                        <form action="changement-rendez-vous.php" method="POST">
                            <input type="hidden" name="idRdv" value="<?= $data['idApointments'] ?>">
                            <input type="hidden" name="patientId" value="<?= $data['idPatient'] ?>">
                            <input type="submit" value="modifier">
                        </form>
                    </td>
                    <td>
                        <form action="delete-rendez-vous.php" method="POST">
                            <input type="hidden" name="patientId" value="<?= $data['idPatient'] ?>">
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <a href="ajout-rendez-vous.php">ajouter un rdv</a>

</body>

</html>