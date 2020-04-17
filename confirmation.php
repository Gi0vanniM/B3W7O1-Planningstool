<?php
$success = $_GET['success'];
?>

<?php include("assets/includes/header.php") ?>

<div class="container">

    <?php
        if ($success) { ?>
    <div class="m-5 p-5 bg-success rounded">
        <h1 class="text-white text-center">Game added to planning!</h1>
    </div>
    <?php
        } else { ?>
    <div class="m-5 p-5 bg-danger rounded">
        <h1 class="text-white text-center">Operation failed.</h1>
    </div>
    <?php } ?>

    <div class="m-5 p-5 bg-secondary text-center rounded">
        <div class="btn-group btn-group-lg" role="group">
            <a href="plan.php" class="btn btn-primary "><i class="fas fa-long-arrow-alt-left"></i> Back</a>
            <a href="index.php" class="btn btn-primary text-right"><i class="fas fa-home"></i> Home</a>
        </div>
    </div>

</div>

<?php include("assets/includes/footer.php") ?>