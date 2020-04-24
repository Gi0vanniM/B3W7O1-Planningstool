<?php
include("assets/includes/function.php");

// TODO :: Add gui to view planned event for this game

$id = $name = $image = $description = $expansions = $skills = $url = $youtube = $min = $max = $minutes = $explain = "-";

if (isset($_GET['game'])) {
    $game = getGameById($_GET['game']); // Yes I know this isn't really needed.
    $id = $game['id'];
    $name = $game['name'];
    $image = $game['image'];
    $description = $game['description'];
    $expansions = $game['expansions'];
    $skills = $game['skills'];
    $url = $game['url'];
    $youtube = $game['youtube'];
    $min = $game['min_players'];
    $max = $game['max_players'];
    $minutes = $game['play_minutes'];
    $explain = $game['explain_minutes'];
}

$title = $name;

?>

<?php include("assets/includes/header.php"); ?>

<div class="container">

    <div class="m-5 bg-info rounded">
        <h1 class="text-white text-center"><?= $name ?></h1>

        <div class="row m-0 text-white">
            <img src="assets/images/<?= $image ?>" class="col-6 h-50" alt="">

            <div class="col-6">
                <h3>Description:</h3>
                <p><?= $description ?></p>
                <br>
                <p>From <?= $min ?> to <?= $max ?> players.<br>
                    Explanation time: <?= $explain ?> minutes.<br>
                    Play time: <?= $minutes ?> minutes.<br>

                    <!-- Check if there are any expansions, if yes it wil display them. -->
                    <?php if (isset($expansions)) { ?>
                        Expansions: <?php foreach (explode(";", $expansions) as $expansion) { ?>
                            <span class="badge badge-primary"><?= $expansion ?></span>
                        <?php } ?> <br>
                    <?php } ?>

                    <!-- Shows what which skills the game uses. -->
                    Skills: <?php foreach (explode(";", $skills) as $skill) { ?>
                        <span class="badge badge-secondary"><?= $skill ?></span><?php } ?>
                </p>
                <p class="put-to-bottom">For more information <a class="" href="<?= $url ?>"><span class="badge badge-light">click here</span></a>.</p>
            </div>
        </div>
        <div class="row m-0 text-white py-5">
            <div class="col-12 text-center"><?= $youtube ?></div>
        </div>
    </div>

</div>

<?php include("assets/includes/footer.php"); ?>

