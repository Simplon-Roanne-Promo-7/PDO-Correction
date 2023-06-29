<?php
include "config/connexion.php";

function pretyDump($data)
{
    highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>");
}

$requete = $bdd->query("SELECT * FROM patients");
$data = $requete->fetchAll(PDO::FETCH_ASSOC);
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
    <h1>Liste patients</h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>lastname</th>
                <th>firstname</th>
                <th>profil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $patient) : ?>
                <tr>
                    <td><?= $patient['id'] ?></td>
                    <td><?= $patient['lastname'] ?></td>
                    <td><?= $patient['firstname'] ?></td>
                    <td><a href="profil-patient.php?id=<?= $patient['id'] ?>">profil</a></td>
                    <td>
                        <form action="delete-patient.php" method="POST">
                            <input type="hidden" name="patientId" value="<?= $patient['id'] ?>">
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>


    <a href="ajout-rendez-vous.php">ajouter un rdv</a>
    <a href="liste-rendez-vous.php">liste RDV</a>
</body>

</html>