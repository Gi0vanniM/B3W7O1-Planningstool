<?php

$host = "localhost";
$database = "school_opdrachten";
$username = "root";
$password = "";

function connect()
{
    global $host, $database, $username, $password;
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;", "$username", "$password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } catch (PDOException $e) {
        $e->getMessage();
        die("Something went wrong with the database.");
    }
}
