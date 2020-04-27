<?php

require("../assets/includes/function.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit("Error, invalid data received.");
}

$success = registerParticipant($_POST);

header("Location: ../confirmation.php?success=$success&action=register");