<?php

require("../assets/includes/function.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    exit("Error, no post received.");
}

$success = addEvent($_POST);

header("Location: ../confirmation.php?success=$success&action=add");