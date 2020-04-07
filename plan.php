<?php
// require("assets/includes/connectDatabase.php");
include("assets/includes/function.php");
$games = getAllGames();

?>
<?php include("assets/includes/head.php") ?>


<body>

    <div class="container">

        <!-- FORM -->
        <form action="addEvent" method="post" class="m-5 p-5 bg-light">

            <!-- SELECT GAME -->
            <div class="form-group row">
                <label for="game" class="col-4 col-form-label">Select game:</label>
                <select name="game" id="game" class="col-8 form-control">
                    <!-- GET THE GAMES FROM DATABASE -->
                    <?php foreach ($games as $game) { ?>
                    <option><?=$game["name"]?></option>
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
            <div class="form-group row">
                <label for="participants" class="col-4 col-form-label">Participants:</label>
                <input type="text" class="form-control col-8">
            </div>

            <div class="form-group row m-0">
                <a href="index.php" class="btn btn-primary mr-auto">Cancel</a>
                <input type="submit" class="btn btn-success ml-auto" value="Add event">
            </div>

        </form>

    </div>
</body>

</html>