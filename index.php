<?php
require("assets/includes/connectDatabase.php");
$pdo = connect();

$table =$pdo->query('SELECT * FROM games ORDER BY name');
$char = $table->fetchAll(PDO::FETCH_BOTH);

// foreach ($char as $haha) {
//     echo $haha["name"] . "<br>";
// }

?>
<?php include("assets/includes/head.php") ?>


<body>

    <a name="" id="" class="btn btn-primary" href="plan.php" role="button">Create event</a>

</body>

</html>