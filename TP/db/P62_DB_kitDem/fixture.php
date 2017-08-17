<?php
/**
 * Prépare la base de donnée de DB_kitDem
 * Ce script n'est pas encore écrit
 * La préparation de la base de donnée est faite via le PHPMyAdmin et le fichier schema.sql
 * Remarques:
 */
require_once('conn.php');

// Création d'un table d'essai
if (!$mysqli->query("DROP TABLE IF EXISTS essai") ||
    !$mysqli->query("CREATE TABLE essai(id INT)") ||
    !$mysqli->query("INSERT INTO essai(id) VALUES (1)")) {
    echo "Echec lors de la création de la table : (" . $mysqli->errno . ") " . $mysqli->error;
}
