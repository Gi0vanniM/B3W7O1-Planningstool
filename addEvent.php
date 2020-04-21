<?php

require("assets/includes/function.php");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "Error, no post received.";
    return;
}

$success = addEvent($_POST);

header("Location: confirmation.php?success=$success");