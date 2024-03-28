<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}
$sql = 'SELECT id, name, time, svg FROM country ORDER BY time';
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
</head>

<body>
    <div class="hero">
        <header id="navbar">

            <a class="logo">GameOn</a>
            <nav class="header">
                <ul>
                    <li class="item"><a href="#">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="scrolll">
        <button class="icon" onclick="scrollr()"><img src="./svg/before.svg" class="next"></button>

        <div class="scroll">
            <?php foreach ($records as $record) { ?>
                <div class="element">
                    <a href="userindia.php?name=<?php echo $record['name']; ?>" class="details">
                        <div class="content">
                            <img src="<?php echo $record['svg']; ?>" class='drink'>
                            <h1>
                                <?php echo htmlspecialchars($record['name']); ?>
                            </h1>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <button class="icon" onclick="scrolll()"><img src="./svg/next.svg" class="next"></button>
    </div>
    <script src="index.js"></script>
    </div>
    </div>
</body>

</html>