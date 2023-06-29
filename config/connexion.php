<?php
try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=hospitale2n', "root", "");
} catch (PDOException $e) {
    echo "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
