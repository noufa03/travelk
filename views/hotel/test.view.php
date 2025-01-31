<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to shop</h1><br>
    <h2>Business Name : <?= $bName ?></h2>
    <ul>
        <?php foreach($business['categories'] as $category) :?>
            <li><?= $category;?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>