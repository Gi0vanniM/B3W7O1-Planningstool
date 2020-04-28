<?php
require("database.php");

function getAllGames($allDataOrNah)
{
    // Sends either all the variables from table or only the variables needed for add.php
    $select = '*';
    if (!$allDataOrNah) $select = 'id, name, min_players, max_players, play_minutes, explain_minutes';

    $pdo = connect();

    $table = $pdo->query('SELECT ' . $select . ' FROM games ');
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
    disconnect();
    return $data;
}

function getGameById($id)
{
    $pdo = connect();
    $id = sanitize($id);
    $table = $pdo->prepare("SELECT * FROM games WHERE id=?");
    $table->execute([$id]);
    disconnect();
    return $table->fetch();
}

function getDuration($id)
{
    $id = sanitize($id);
    $pdo = connect();
    $table = $pdo->prepare("SELECT (play_minutes + explain_minutes) as duration FROM games WHERE id=?");
    $table->execute([$id]);
    $duration = $table->fetch();
    disconnect();
    return $duration['duration'];
}

function getPlayerAmount($id)
{
//    $id = sanitize($id);
    $pdo = connect();
    $table = $pdo->prepare("SELECT min_players, max_players FROM games WHERE id=?");
    $table->execute([$id]);
    $data = $table->fetch();
    disconnect();
    return $data;
}

// if false is put in it will only return the relevant events.
function getAllEvents($all)
{
    $pdo = connect();
    // Get the events that have yet to start and also events that are currently ongoing
    $query = 'SELECT * FROM planning WHERE DATE_ADD(date, INTERVAL duration MINUTE) >= NOW() ORDER BY date';

    if ($all == true) $query = 'SELECT * FROM planning ORDER BY date';

    $table = $pdo->query($query);
    $data = $table->fetchAll(PDO::FETCH_ASSOC);

    disconnect();

    return $data;
}

function getAllEventsToday()
{
    $pdo = connect();
    $table = $pdo->prepare("SELECT * FROM planning WHERE DATE(date) = DATE(NOW())");
    $table->execute();
    $data = $table->fetchAll(PDO::FETCH_ASSOC);
    disconnect();
    return $data;
}

function getAllEventsByGame($id)
{
    $id = sanitize($id);
    $pdo = connect();
    $table = $pdo->prepare('SELECT * FROM planning WHERE activity_id=? ORDER BY date');
    $table->execute([$id]);
    $data = $table->fetchAll(PDO::FETCH_ASSOC);
    disconnect();
    return $data;
}

function addEvent($data)
{
    $data = filter_var_array($data);
    $success = false;

    if (empty($data['game']) || empty($data['date']) || empty($data['time']) || empty($data['hoster']) || empty($data['participants'])) {
        header("Location: ../confirmation.php?success=0&invalidforms=1");
        exit();
    }

    $game = sanitize($data['game']);
    $date = sanitize($data['date']);
    $time = sanitize($data['time']);
    $hoster = sanitize($data['hoster']);
    $participants = $data['participants'];

    $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));

    //
    $people = [];
    foreach ($participants as $participant) {
        if (!empty($participant)) {
            $people[] = sanitize($participant);
        }
    }

    // Check if game can support the amount of players
    $amount = getPlayerAmount($game);
    $length = count($people);
    if ($length > $amount['max_players']) {
        header("Location: ../confirmation.php?success=0&players=0");
        exit();
    }

    $people = json_encode($people);

    $duration = getDuration($game);

    $pdo = connect();
    $stmt = $pdo->prepare("INSERT INTO planning (host, date, activity_id, duration, participants)
VALUES (:host, :date, :activity_id, :duration, :participants)");
    $stmt->bindParam(':host', $hoster);
    $stmt->bindParam(':date', $datetime);
    $stmt->bindParam(':activity_id', $game);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':participants', $people);
    $stmt->execute();
    disconnect();

    if ($stmt) $success = true;

    return $success;
}

function getEvent($id)
{
    $id = sanitize($id);

    $pdo = connect();
    $table = $pdo->prepare("SELECT * FROM planning WHERE id=?");
    $table->execute([$id]);
    $data = $table->fetch();
    disconnect();
    return $data;
}

function editEvent($data, $event)
{
    $data = filter_var_array($data);
    $success = false;

    if (empty($data['game']) || empty($data['date']) || empty($data['time']) || empty($data['hoster']) || empty($data['participants'])) {
        header("Location: ../confirmation.php?success=0&invalidforms=1");
        exit();
    }

    $game = sanitize($data['game']);
    $date = sanitize($data['date']);
    $time = sanitize($data['time']);
    $hoster = sanitize($data['hoster']);
    $participants = $data['participants'];

    $datetime = date('Y-m-d H:i:s', strtotime("$date $time"));

    $people = [];
    foreach ($participants as $participant) {
        if (!empty($participant)) {
            $people[] = sanitize($participant);
        }
    }

    $amount = getPlayerAmount($game);
    $length = count($people);
    if ($length > $amount['max_players']) {
        header("Location: ../confirmation.php?success=0&players=0");
        exit();
    }

    $people = json_encode($people);

    $duration = getDuration($game);

    $pdo = connect();
    $stmt = $pdo->prepare("UPDATE planning 
SET host=:host, date=:date, activity_id=:activity_id, duration=:duration, participants=:participants WHERE id=:id");
    $stmt->bindParam(':host', $hoster);
    $stmt->bindParam(':date', $datetime);
    $stmt->bindParam(':activity_id', $game);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':participants', $people);
    $stmt->bindParam(':id', $event);
    $stmt->execute();

    disconnect();

    if ($stmt) $success = true;

    return $success;
}

function deleteEvent($id)
{
    $id = sanitize($id);
    $success = false;

    $pdo = connect();
    $stmt = $pdo->prepare("DELETE FROM planning WHERE id=?");
    $stmt->execute([$id]);

    if ($stmt) $success = true;

    disconnect();

    return $success;
}

function deleteAllOldEvents()
{
    $success = false;

    $pdo = connect();
    $stmt = $pdo->prepare("DELETE FROM planning WHERE DATE_ADD(date, INTERVAL duration MINUTE) <= NOW()");
    $stmt->execute();

    if ($stmt) $success = true;

    disconnect();

    return $success;
}

function getParticipants($id)
{
    $id = sanitize($id);
    $pdo = connect();
    $table = $pdo->prepare("SELECT participants FROM planning WHERE id=?");
    $table->execute([$id]);
    $participants = $table->fetch();
    disconnect();

    return $participants;
}

function registerParticipant($data)
{
    $success = false;

    $id = sanitize($data['id']);

    $participants = json_decode(getParticipants($id)['participants']);

    $max = getPlayerAmount($data['activity_id']);
    $amount = count($participants);

    if ($amount >= $max['max_players']) {
        header("Location: ../confirmation.php?success=0&action=register&players=0");
        exit();
    }

    $participant = $data['name'];

    if (!empty($participant)) {
        $participants[] = sanitize($participant);
    }

    $participants = json_encode($participants);

    $pdo = connect();
    $stmt = $pdo->prepare("UPDATE planning SET participants=:participants WHERE id=:id");
    $stmt->bindParam("participants", $participants);
    $stmt->bindParam("id", $id);
    $stmt->execute();

    if ($stmt) $success = true;

    disconnect();

    return $success;
}

function sanitize($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}
