<?php

require("../assets/includes/function.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST' || empty($_GET['id'])) {
    exit("Error, invalid data received.");
}
$id = $_GET['id'];

$success = editEvent($_POST, $id);

header("Location: ../confirmation.php?success=$success&action=edit");