<?php
require("connectDatabase.php");
$pdo = connect();

function getAllGames()
{
    global $pdo;

    $table = $pdo->query('SELECT * FROM games ORDER BY name');

    $games = $table->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;

    return $games;
}
