<?php
// require("assets/includes/connectDatabase.php");
include("assets/includes/function.php");
$games = getAllGames(false);
$title = "Add Event";
?>
<?php include("assets/includes/header.php") ?>
    <!-- <body> is inside head.php -->


    <div class="container">

        <!-- FORM -->
        <form action="pages/addEvent.php" method="post" class="m-5 p-5 bg-light">

            <div class="col-12">
                <h1 class="text-center mb-5">Schedule game</h1>
            </div>

            <!-- SELECT GAME -->
            <div class="form-group row">
                <label for="selecetGame" class="col-4 col-form-label" id="">Select game:</label>
                <select name="game" id="selectGame" class="col-8 form-control custom-select" required>
                    <!-- GET THE GAMES FROM DATABASE -->
                    <option value="">- Choose game -</option>
                    <?php foreach ($games as $game) { ?>
                        <option value="<?= $game["id"] ?>"><?= $game["name"] ?></option>
                    <?php } ?>

                </select>
            </div>

            <!-- SELECT DATE AND TIME -->
            <div class="form-group row">
                <label for="date time" class="col-4 col-form-label">Select date and time:</label>
                <input name="date" type="date" class="form-control col-4 mr-1" id="" required>
                <input name="time" type="time" class="form-control col-3 ml-auto" required>
            </div>

            <!-- INPUT host -->
            <div class="form-group row">
                <label for="hoster" class="col-4 col-form-label">Host:</label>
                <input name="hoster" type="text" class="form-control col-8" id="hoster" required>
            </div>

            <!-- INPUT PARTICIPANTS -->
            <div id="addParticipantsInput" class="form-group row">
                <label for="participant" class="col-4 col-form-label">Participants:</label>

                <div class="col-1 p-0">
                    <button onCLick="addParticipant();" type="button" class="btn btn-primary from-control mr-auto">
                        <i class="fas fa-plus-square"></i>
                    </button>
                </div>

                <input name="participants[]" id="participant" type="text" class="form-control col-7">
            </div>

            <div class="form-group row ml-0 mb-0">
                <a href="index.php" class="btn btn-primary mr-auto">Cancel</a>
                <input type="submit" class="btn btn-success ml-auto" value="Add event">
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