<?php

require("../assets/includes/function.php");

//if (empty($_GET['id'])) {
//    exit("Error, invalid data received.");
//}

$success = deleteAllOldEvents();

header("Location: ../confirmation.php?success=$success&action=deleteAllOldEvents");