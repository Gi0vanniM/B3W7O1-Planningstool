<?php
include("assets/includes/function.php");

if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $event = getEvent($eventId);
    $game = getGameById($event['activity_id']);
    $amount = getPlayerAmount($event['activity_id']);

    $id = $event['id'];
    $host = $event['host'];
    $date = new DateTime($event['date']);
    $duration = $event['duration'];
    $participants = json_decode($event['participants']);

    $gameId = $game['id'];
    $gameName = $game['name'];
    $gameImg = $game['image'];
    $gameDesc = $game['description'];
    $gameMax = $game['max_players'];
    $gameMin = $game['min_players'];
}

$title = "Event #$eventId";

?>

<?php include("assets/includes/header.php") ?>

<div class="container">

    <div class="bg-dark p-5 m-5 text-white">

        <p class="event-num">Event #<?= $id ?></p>

        <h2 class="text-center mb-5"><?= $gameName ?>, <?= date_format($date, 'd M H:i') ?> </h2>

        <div class="row">

            <!-- game img -->
            <img onclick="window.location='game.php?game=<?= $gameId ?>'" src="assets/images/<?= $gameImg ?>" alt=""
                 class="col-3 h-50" style="width: auto; max-width: 100%">

            <div class="col-9">
                <p>
                    <?= date_format($date, 'd M H:i') ?> <br>
                    Hosted by: <?= $host ?> <br>
                    Duration: <?= $duration ?> minutes<br>
                    From <?= $gameMin ?> to <?= $gameMax ?> players. <br>

                    Game: <?= $gameName ?> <br>
                    <br>
                </p>
                <h5>Description of the game:</h5> <?= $gameDesc ?>

                <a href="game.php?game=<?= $gameId ?>" class="ml-auto text-right">
                    <span class="badge badge-primary badge-large">More game info</span></a>

            </div>
        </div>

        <div class="row">

            <!-- Participants -->
            <div class="col-3">
                <table class="table table-hover table-striped bg-light mt-5 w-40">
                    <thead>
                    <tr>
                        <th scope="col">Participants (<?= count($participants) ?>)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($participants as $participant) { ?>
                        <tr>
                            <th scope="row"><?= $participant ?></th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>


            <!-- Apply to event -->
            <div class="col-9">
                <?php if (count($participants) >= $amount['max_players']) { ?>
                    <h5 class="mt-5">Event is full!</h5>
                <?php } else { ?>
                    <form action="pages/registerParticipant.php" method="post" class="mt-5">
                        <h5>Apply to event?</h5>
                        <!-- Name input -->
                        <div class="form-group row">
                            <input type="text" name="name" class="form-control ml-3 col-8" placeholder="Name" required>
                            <input type="submit" class="btn btn-primary ml-2 col-3" value="Apply">
                            <input type="hidden" name="id" value="<?= $eventId ?>">
                            <input type="hidden" name="activity_id" value="<?= $gameId ?>">
                        </div>
                    </form>
                <?php } ?>
            </div>

        </div>

    </div>

</div>

<?php include("assets/includes/footer.php") ?>
