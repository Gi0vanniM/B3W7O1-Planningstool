<?php
$title = "Edit";

include("assets/includes/function.php");
$all = false;
if (isset($_GET['allEvents'])) {
    if ((bool)$_GET['allEvents']) {
        $all = true;
    }
}

$events = getAllEvents($all);
$games = getAllGameNames();
//var_dump($games);

?>

<?php include("assets/includes/header.php"); ?>

<?php if (!(bool)$all) { ?>
    <a href="editList.php?allEvents=1" class="btn btn-sm btn-secondary">Show all events</a>
<?php } else { ?>
    <a href="editList.php" class="btn btn-sm btn-secondary">Only show relevant events</a>
    <button type="button" class="float-right btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteAllEvents">
        Delete all old events
    </button>

    <div class="modal fade" id="deleteAllEvents" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Delete old events?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete all old events?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="pages/deleteOldEvents.php">Delete</a>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Time</th>
            <th scope="col">Game</th>
            <th scope="col">Host</th>
            <th scope="col">Players</th>
            <th scope="col">Duration</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($events as $ev) { ?>
            <tr>
                <th scope="row"><?= $ev['id'] ?></th>
                <th scope="row"><?= date_format(new DateTime($ev['date']), 'd M H:i') ?></th>
                <th scope="row"><?= $games[$ev['activity_id']] ?></th>
                <th scope="row"><?= $ev['host'] ?></th>
                <th scope="row"><?= count(json_decode($ev['participants'])) ?></th>
                <th scope="row"><?= $ev['duration'] ?>m</th>
                <th scope="row"><?php
                    if (new DateTime($ev['date']) <= new DateTime()) {
                        $eventTime = new DateTime($ev['date']);
                        $eventStopTime = $eventTime->add(new DateInterval("PT" . $ev['duration'] . "M"));
                        if ($eventStopTime <= new DateTime()) {
                            echo "Over";
                        } else {
                            echo "Ongoing";
                        }
                    } else {
                        echo "Waiting";
                    } ?></th>
                <th scope="col"><a href="edit.php?id=<?= $ev['id'] ?>"><i class="far fa-edit"></i></a></th>
            </tr>
        <?php } ?>

        </tbody>
    </table>


<?php include("assets/includes/footer.php"); ?>