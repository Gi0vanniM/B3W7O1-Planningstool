<?php
if (isset($title)) {
    $title .= " - Planningstool";
} else {
    $title = "Planningstool";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- META -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- BOOTSTRAP JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/a3078cd2a7.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- TITLE -->
    <title><?php echo $title ?></title>
</head>

<body>

    <header class="page-header row p-1 m-0 bg-dark">

    <ul class="nav ">
        <li class="nav-item p-1"><a class="nav-link btn btn-primary" href="index.php"><i class="fas fa-home"></i> Home</a></li>
        <li class="nav-item p-1"><a class="nav-link btn btn-primary" href="planning.php"><i class="far fa-calendar-alt"></i> Planning</a></li>
        <li class="nav-item p-1"><a class="nav-link btn btn-primary" href="games.php"><i class="fas fa-chess"></i> Games</a></li>
        <li class="nav-item p-1"><a class="nav-link btn btn-primary" href="tools.php"><i class="fas fa-tools"></i> Tools</a></li>
    </ul>

    </header>