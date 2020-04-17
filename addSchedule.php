<?php
# TODO
# - SANITIZE INPUTS

require("assets/includes/database.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Error, no post received.";
    return;
}

$game = $_POST['game'];
$date = $_POST['date'];
$time = $_POST['time'];
$hoster = $_POST['hoster'];
$participants = $_POST['participants'];

$datetime = date('Y-m-d H:i:s', strtotime("$date $time"));
$parti = json_encode($participants);

// echo json_encode($participants);

$pdo = connect();

$stmt = $pdo->prepare("INSERT INTO planning (host, date, activity_id, duration, participants) 
VALUES (:host, :date, :activity_id, :duration, :participants)");
$stmt->bindParam(':host', $hoster);
$stmt->bindParam(':date', $datetime);
$stmt->bindParam(':activity_id', $game);
$stmt->bindParam(':duration', $game);
$stmt->bindParam(':participants', $parti);
$stmt->execute();

$success = false;
if ($stmt) $success = true;

header("Location: confirmation.php?success=$success");

?>
<!-- lol -->