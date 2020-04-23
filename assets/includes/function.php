<?php
require("database.php");
// TODO :: SANITIZE INPUTS BETTER

function getAllGames($allDataOrNah)
{
    // Sends either all the variables from table or only the variables needed for add.php
    $select = '*';
    if (!$allDataOrNah) $select = 'id, name, min_players, max_players, play_minutes, explain_minutes';

    $pdo = connect();

    $table = $pdo->query('SELECT ' . $select . ' FROM games ORDER BY name');
    $games = $table->fetchAll(PDO::FETCH_ASSOC);
    disconnect();

    return $games;
}

function getAllGameNames()
{
    $pdo = connect();
    $table = $pdo->query('SELECT id, name FROM games');
    disconnect();
    $games = $table->fetchAll(PDO::FETCH_ASSOC);
    $data = [];
    foreach ($games as $game) {
        $data[$game['id']] = $game['name'];
    }
    return $data;
}

function getGameById($id)
{
    $pdo = connect();
//    $id = sanitize($id);
    $table = $pdo->prepare("SELECT * FROM games WHERE id=?");
    $table->execute([sanitize($id)]);
    return $table->fetch();
}

function getDuration($id)
{
    $id = sanitize($id);
    $pdo = connect();
    $table = $pdo->prepare('SELECT (play_minutes + explain_minutes) as duration FROM games WHERE id=?');
    $table->execute([$id]);
    $duration = $table->fetch();
    return $duration['duration'];
}

function getAllEvents()
{
    $pdo = connect();
    $table = $pdo->query('SELECT * FROM planning ORDER BY date');
    $data = $table->fetchAll(PDO::FETCH_ASSOC);

    disconnect();

    return $data;
}

function getAllRelevantEvents()
{
    $pdo = connect();
    // Get the events that have yet to start and also events that are currently ongoing
    $table = $pdo->query('SELECT * FROM planning WHERE DATE_ADD(date, INTERVAL duration MINUTE) >= NOW() ORDER BY date');
    $data = $table->fetchAll(PDO::FETCH_ASSOC);

    disconnect();

    return $data;
}

function addEvent($data)
{
    $data = filter_var_array($data);
    var_dump($data);
    $success = false;

    $game = sanitize($data['game']);
    $date = sanitize($data['date']);
    $time = sanitize($data['time']);
    $hoster = sanitize($data['hoster']);
    $participants = $data['participants'];
//    $parti = sanitize(json_encode($data['participants']));

    $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
    $parti = json_encode($participants);

    $duration = getDuration($game);

    $pdo = connect();
    $stmt = $pdo->prepare("INSERT INTO planning (host, date, activity_id, duration, participants) 
VALUES (:host, :date, :activity_id, :duration, :participants)");
    $stmt->bindParam(':host', $hoster);
    $stmt->bindParam(':date', $datetime);
    $stmt->bindParam(':activity_id', $game);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':participants', $parti);
    $stmt->execute();
    disconnect();

    if ($stmt) $success = true;

    return $success;
}

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}
