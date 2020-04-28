<?php
include("assets/includes/function.php");
$title = "Edit Event";

if (!isset($_GET['id'])) {
    exit("No event found.");
} else {
    $id = $_GET['id'];
}

$event = getEvent($id);
// Check if the id given exists and is an actual event.
if (!$event) exit("Error, retrieving Event#$id.");

$games = getAllGames(false);

$datetime = new DateTime($event['date']);
$date = $datetime->format("Y-m-d");
$time = $datetime->format("H:i");
?>

<?php include("assets/includes/header.php") ?>
    <!-- <body> is inside head.php -->

    <div class="container">

        <!-- FORM -->
        <form action="pages/editEvent.php?id=<?= $id ?>" method="post" class="m-5 p-5 bg-light">

            <p class="event-num">Event #<?= $id ?></p>
            <div class="col-12">
                <h1 class="text-center mb-5">Edit event</h1>
            </div>

            <!-- SELECT GAME -->
            <div class="form-group row">
                <label for="selectGame" class="col-4 col-form-label">Select game:</label>
                <select name="game" id="selectGame" class="col-8 form-control custom-select" required>
                    <!-- GET THE GAMES FROM DATABASE -->
                    <option value="">- Choose game -</option>
                    <?php foreach ($games as $game) { ?>
                        <option value="<?= $game["id"] ?>" <?php if ($event['activity_id'] == $game['id']) {
                            echo "selected='selected'";
                        } ?>><?= $game["name"] ?></option>
                    <?php } ?>

                </select>
            </div>

            <!-- SELECT DATE AND TIME -->
            <div class="form-group row">
                <label for="date" class="col-4 col-form-label">Select date and time:</label>
                <input name="date" type="date" class="form-control col-4 mr-1" id="date" value="<?= $date ?>" required>
                <input name="time" type="time" class="form-control col-3 ml-auto" id="time" value="<?= $time ?>" required>
            </div>

            <!-- INPUT HOST -->
            <div class="form-group row">
                <label for="hoster" class="col-4 col-form-label">Host:</label>
                <input name="hoster" type="text" class="form-control col-8" id="hoster" value="<?= $event['host'] ?>"
                       required>
            </div>

            <!-- INPUT PARTICIPANTS -->
            <div id="addParticipantsInput" class="form-group row">
                <label for="participant" class="col-4 col-form-label">Participants:</label>

                <div class="col-1 p-0">
                    <button onCLick="addParticipant();" type="button" class="btn btn-primary from-control mr-auto">
                        <i class="fas fa-plus-square"></i>
                    </button>
                </div>

                <?php if (isset($event['participants'])) {
                    foreach (json_decode($event['participants']) as $participant) { ?>
                        <input name="participants[]" id="participant" type="text"
                               class="form-control col-7 mb-1 ml-auto"
                               value="<?= $participant ?>">
                    <?php }
                } else { ?>
                    <input name="participants[]" id="participant" type="text" class="form-control col-7" value="">
                <?php } ?>
            </div>

            <div class="form-group row ml-0 mb-0">
                <a href="editList.php" class="btn btn-primary mr-auto">Cancel</a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteEvent">Delete
                    event
                </button>
                <input type="submit" class="btn btn-warning text-white ml-auto" value="Edit event">

                <div class="modal fade" id="deleteEvent" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">Delete Event #<?= $event['id'] ?>?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                Are you sure you want to delete Event #<?= $event['id'] ?>?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="pages/deleteEvent.php?id=<?= $event['id'] ?>">Delete</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </form>

        <?php include("assets/includes/gameInfo.php") ?>

    </div>


    <!-- PASS PHP ARRAY TO JAVASCRIPT -->
    <script>
        var games = <?php echo json_encode($games) ?>;
    </script>
    <script src="assets/js/event.js "></script>

    <!-- </body> and </html> is inside footer.php -->
<?php include("assets/includes/footer.php") ?>