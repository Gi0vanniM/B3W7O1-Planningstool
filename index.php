<?php
$title = "Home";
require("assets/includes/database.php");
// $pdo = connect();

// $table =$pdo->query('SELECT * FROM games ORDER BY name');
// $char = $table->fetchAll(PDO::FETCH_BOTH);

// foreach ($char as $haha) {
//     echo $haha["name"] . "<br>";
// }

?>
<?php include("assets/includes/header.php") ?>
    <div class="container">
        <h1>Welcome</h1>
        <p>
            Hi! Welcome to Planningstool! To plan a new game event by going to Tools.
        </p>
    </div>

<?php include("assets/includes/footer.php") ?>