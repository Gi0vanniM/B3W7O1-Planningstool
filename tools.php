<?php
$title = "Tools";
?>

<?php include("assets/includes/header.php"); ?>

    <div class="container">

        <div class="card-deck mt-5">

            <!-- ADD PLANNING  <i class="fas fa-plus"></i> -->
            <div class="card p-2">
                <a class="card-block stretched-link text-decoration-none text-center" href="add.php">
                    <h3 class="card-title"><i class="fas fa-plus"></i></h3>
                    <p class="card-text">Plan a new game</p>

                </a>

            </div>

            <!-- EDIT PLANNING -->
            <div class="card p-2">
                <a class="card-block stretched-link text-decoration-none text-center" href="editList.php">
                    <h3 class="card-title"><i class="far fa-edit"></i></h3>
                    <p class="card-text">Edit current events</p>

                </a>

            </div>

        </div>

    </div>

<?php include("assets/includes/footer.php") ?>