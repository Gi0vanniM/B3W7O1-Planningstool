<?php
$title = "Home";

include("assets/includes/function.php");

$events = getAllEventsToday();
$games = getAllGames(true);
$randomNum = rand(0, count($games) - 1);
$randomGame = $games[$randomNum];
//var_dump($randomNum);
//var_dump($randomGame);

?>
<?php include("assets/includes/header.php") ?>

    <div class="container">

        <h1>Welcome</h1>
        <p>
            Hi! Welcome to Planningstool! You can plan a new game event by going to Tools.
        </p>
        
        <div class="row" style="height: 20rem">
            <div class="card bg-dark col-5" style="width: 18rem;">
                <h3 class="card-header text-white">
                    Today's planning
                </h3>
                <table class="card-table table table-hover table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col"><i class="far fa-calendar-alt"></i></th>
                        <th scope="col"><i class="fas fa-chess"></i></th>
                        <th scope="col"><i class="fas fa-users"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($events as $event) {
                        $game = $games[array_search($event['activity_id'], array_column($games, 'id'))];
                        ?>
                        <tr onclick="window.location='event.php?id=<?= $event['id'] ?>'">
                            <th scope="row"><?= date_format(new DateTime($event['date']), 'H:i') ?></th>
                            <th scope="row"><?= $game['name'] ?></th>
                            <th scope="row"><?= count(json_decode($event['participants'])) ?></th>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="3">
                            <a href="planning.php">See all planned events.</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="card bg-dark col-5 ml-auto" style="width: 18rem;">
                <h3 class="card-header text-white"><?= $randomGame['name'] ?></h3>
                <img class="card-img-top w-75 mx-auto" src="assets/images/<?= $randomGame['image'] ?>" alt="">
                <div class="card-body text-center">
                    <?php foreach (explode(";", $randomGame['skills']) as $skill) { ?>
                        <div class="badge badge-secondary"><?= $skill ?></div><?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php include("assets/includes/footer.php") ?>