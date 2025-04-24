<?php require (BASE_PATH.'views/partials/user/head.php'); ?>
<?php require (BASE_PATH.'views/partials/user/styles.php');?>

<div>
    <h1>Trip Budget</h1>
    <p>Total Budget: <?= $total_budget[0]; ?></p>
    <p><?= $total_budget[1]; ?></p>
    <div>
        <h2>Restaurants</h2>
        <ul>
            <?php foreach ($rest_userID as $item) : ?>
                <li><?= $item['display_name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h2>Hotels</h2>
        <ul>
            <?php foreach ($stay_userID as $item) : ?>
                <li><?= $item['display_name']; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php require (BASE_PATH.'views/partials/user/script.php');?>