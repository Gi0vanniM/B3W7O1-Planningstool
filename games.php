<?php
$title = "Games";

include("assets/includes/function.php");
$games = getAllGames(true);
?>

<?php include("assets/includes/header.php"); ?>

    <div class="container">

        <h1 class="">Games we play:</h1>

        <div class="card-columns">

            <?php foreach ($games as $game) { ?>
                <div class="card h-100">
                    <img class="card-image img-fluid" src="assets/images/<?= $game['image'] ?>" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?= $game['name'] ?></h4>
                        <p class="card-text"><?php foreach (explode(";", $game['skills']) as $skill) { ?>
                        <div class="badge badge-secondary"><?= $skill ?></div>
                        <?php } ?>
                        </p>
                    </div>
                </div>
            <?php } ?>

        </div>

    </div>

<?php include("assets/includes/footer.php"); ?>