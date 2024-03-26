<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}
$sql = 'SELECT id, Title, country, status, size, tlimit, edetails, ephoto, cdetails, cphoto, fdetails, fphoto, rules, photo, vlink, terms, types, playerlist, time, artiphoto FROM games ORDER BY time';
$result = mysqli_query($conn, $sql);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPORTS MANAGEMENT SYSTEM</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/india.css">
</head>

<body>
    <div class="hero">
        <header id="navbar">
            <a class="logo">GameOn</a>
            <nav class="header">
                <ul>
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
        <a href="indiaform.php" class="add">+ADD GAMES</a>
    </div>
    <div class="container">
        <?php foreach ($records as $record) { ?>
            <div>
                <a href="detail.php?id=<?php echo $record['id']; ?>" class="details">
                    <div class="element1">
                        <img src="<?php echo $record['photo']; ?>" class='drink'>
                        <h1>
                            <?php echo htmlspecialchars($record['Title']); ?>
                        </h1>
                    </div>
                </a>
                <a href="edit.php?id=<?php echo $record['id']; ?>" class="edit"><img src="./svg/edit.svg"></a>
                <a href="delete.php?id=<?php echo $record['id']; ?>" class="edit"
                    onclick="return confirm('Are you sure you want to delete this game?')"><img src="./svg/delete.svg"></a>
            </div>
        <?php } ?>
    </div>
</body>

</html>