<?php

$date = date_create($data['date'])->format('d.m.Y');
?>

<div class="newsDate">
    <?= $date ?>
</div>