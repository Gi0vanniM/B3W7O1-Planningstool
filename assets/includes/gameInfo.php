<?php
$infoName = $infoMin = $infoMax = "-";
if (isset($event)) {
    $gameInfo = getGameById($event['activity_id']);
    $infoName = $gameInfo['name'];
    $infoMin = $gameInfo['min_players'];
    $infoMax = $gameInfo['max_players'];
}
?>
<div class="m-5 p-5 bg-light">
    <p class="m-0">
        Game: <span
                id="infoGame"><?= $infoName ?></span><br>
        Players: <span id="infoMin"><?= $infoMin ?></span> to <span id="infoMax"><?= $infoMax ?></span>
    </p>
</div>