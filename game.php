<?php
include("assets/includes/function.php");

if (isset($_GET['game'])) {
    $id = $_GET['game'];
}
//$id = $name = $image = $description = $expansions = $skills = $url = $min = $max = $minutes = $explain = "";
$game = getGameById($id);

$title = $game['name'];

?>

<?php include("assets/includes/header.php"); ?>


<div class="container">

    <div class="m-5 bg-info rounded">
        <h1 class="text-white text-center"><?= $game['name'] ?></h1>

        <div class="row m-0 text-white">
            <img src="assets/images/<?= $game['image'] ?>" class="col-6 h-50" alt="">

            <div class="col-6">
                <h3>Description:</h3>
                <p><?= $game['description'] ?></p>
                <br>
                <p>From <?= $game['min_players'] ?> to <?= $game['max_players'] ?> players.<br>
                    Explanation time: <?= $game['explain_minutes'] ?> minutes.<br>
                    Play time: <?= $game['play_minutes'] ?> minutes.
                </p>
            </div>
        </div>
    </div>


</div>


<?php include("assets/includes/footer.php"); ?>

