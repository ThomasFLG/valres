<?php

// Définitions de constantes pour la connexion à MySQL
$hote="localhost";
$nombd="mdll";
$login="root";
$mdp="";

// Connexion à la base de données
try {
    $pdo=new PDO("mysql:host=$hote;dbname=$nombd","$login","$mdp");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch ( Exception $e ) {
    die ("\n Connection à la base de donnée impossible :  ".$e->getMessage());
}
?>

