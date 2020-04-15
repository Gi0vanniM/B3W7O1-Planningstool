<?php
require("database.php");


function getAllGames()
{
    $pdo = connect();
    $table = $pdo->query('SELECT * FROM games ORDER BY name');
    $games = $table->fetchAll(PDO::FETCH_ASSOC);
    disconnect();

    return $games;
}

