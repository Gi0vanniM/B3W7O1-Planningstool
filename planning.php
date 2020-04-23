<?php
$title = "Planning";

include("assets/includes/function.php");
$events = getAllRelevantEvents();
$games = getAllGameNames();
?>

<?php include("assets/includes/header.php") ?>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Time</th>
            <th scope="col">Game</th>
            <th scope="col">Players</th>
            <th scope="col">Duration</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($events as $ev) { ?>
            <tr onclick="window.location='event.php?id=<?= $ev['id'] ?>'">
                <th scope="row"><?= $ev['id'] ?></th>
                <th scope="row"><?= date_format(new DateTime($ev['date']), 'd M H:i') ?></th>
                <th scope="row"><?= $games[$ev['activity_id']] ?></th>
                <th scope="row"><?= count(json_decode($ev['participants'])) ?></th>
                <th scope="row"><?= $ev['duration'] ?>m</th>
                <th scope="row"><?php if (new DateTime($ev['date']) <= new DateTime()) {
                        echo "Ongoing";
                    } else {
                        echo "Waiting";
                    } ?></th>
            </tr>
        <?php } ?>

        </tbody>
    </table>

<?php include("assets/includes/footer.php") ?>