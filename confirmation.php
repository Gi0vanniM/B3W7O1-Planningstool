<?php
$success = false;
$action = "";
if (isset($_GET['success'])) {
    $success = $_GET['success'];
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
?>

<?php include("assets/includes/header.php") ?>

    <div class="container">

        <?php if ($success) { ?>
            <div class="m-5 p-5 bg-success rounded">
                <h1 class="text-white text-center">

                    <?php switch ($action) {
                        case "add":
                            echo "Game event added to planning!";
                            break;
                        case "edit":
                            echo "Game event updated!";
                            break;
                        case "delete":
                            echo "Game event deleted!";
                            break;
                    } ?>
                </h1>
            </div>
        <?php } else { ?>
            <div class="m-5 p-5 bg-danger rounded text-white text-center">
                <h1 class="">Operation failed.</h1>
                <?php if (isset($_GET['players'])) { ?>
                    <p class="">Invalid amount of players.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="m-5 p-5 bg-secondary text-center rounded">
            <div class="btn-group btn-group-lg" role="group">
                <a href="<?php switch ($action) {
                    case "add":
                        echo "add.php";
                        break;
                    case "edit":
                    case "delete":
                        echo "editList.php";
                        break;
                } ?>" class="btn btn-primary "><i class="fas fa-long-arrow-alt-left"></i> Back</a>
                <a href="index.php" class="btn btn-primary text-right"><i class="fas fa-home"></i> Home</a>
            </div>
        </div>

    </div>

<?php include("assets/includes/footer.php") ?>