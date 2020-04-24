<?php

require("../assets/includes/function.php");

if (empty($_GET['id'])) {
    exit("Error, invalid data received.");
}

$success = deleteEvent($_GET['id']);

header("Location: ../confirmation.php?success=$success&action=delete");