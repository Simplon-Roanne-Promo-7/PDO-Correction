<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="traitement-ajout-patient.php" method="post">
        <label for="lastname"> nom : </label>
        <input type="text" name="lastname" placeholder="nom">
        </br>
        <label for="firstname"> prenom : </label>
        <input type="text" name="firstname" placeholder="prenom">
        </br>
        <label for="birthdate"> birthdate : </label>
        <input type="text" name="birthdate" placeholder="birthdate">
        </br>
        <label for="adress"> adress : </label>
        <input type="text" name="phone" placeholder="phone">
        </br>
        <label for="mail"> mail : </label>
        <input type="text" name="mail" placeholder="mail">
        </br>
        <input type="submit" value="envoyer">
    </form>
</body>

</html>