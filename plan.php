<?php
// require("assets/includes/connectDatabase.php");
include("assets/includes/function.php");
$games = getAllGames();

?>
<?php include("assets/includes/header.php") ?>
<!-- <body> is inside head.php -->



<div class="container">

    <!-- FORM -->
    <form action="addEvent" method="post" class="m-5 p-5 bg-light">

        <div class="col-12">
            <h1 class="text-center mb-5">Add event</h1>
        </div>

        <!-- SELECT GAME -->
        <div class="form-group row">
            <label for="selecetGame" class="col-4 col-form-label">Select game:</label>
            <select name="game" id="selectGame" class="col-8 form-control">
                <!-- GET THE GAMES FROM DATABASE -->
                <?php foreach ($games as $game) { ?>
                <option value="<?=$game["id"]?>"><?=$game["name"]?></option>
                <?php } ?>

            </select>
        </div>

        <!-- SELECT DATE AND TIME -->
        <div class="form-group row">
            <label for="datetime" class="col-4 col-form-label">Select date and time:</label>
        </div>

        <!-- INPUT EXPLAINER -->
        <div class="form-group row">
            <label for="explainer" class="col-4 col-form-label">Explainer:</label>
            <input type="text" class="form-control col-8" id="explainer">
        </div>

        <!-- INPUT PARTICIPANTS -->
        <div id="addParticipantsInput" class="form-group row">
            <label for="participant" class="col-4 col-form-label">Participants:</label>

            <div class="col-1 p-0">
                <button onCLick="addParticipant();" type="button" class="btn btn-primary from-control mr-auto">
                    <i class="fas fa-plus-square"></i>
                </button>
            </div>

            <input id="participant" type="text" class="form-control col-7">
        </div>

        <div class="form-group row ml-0 mb-0">
            <a href="index.php" class="btn btn-primary mr-auto">Cancel</a>
            <input type="submit" class="btn btn-success ml-auto" value="Add event">
        </div>

    </form>

</div>

<script>
var games = <?php echo json_encode($games) ?>
</script>

<!-- </body> and </html> is inside footer.php -->
<?php include("assets/includes/footer.php") ?>