<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
$records = [];
if (isset ($_GET['name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['name']);
    $sql = "SELECT id, Title, country, status, size, tlimit, edetails, ephoto, cdetails, cphoto, fdetails, fphoto, rules, photo, vlink, terms, types, playerlist, artiphoto, artinfo FROM $name";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo 'No records found.';
    }
}
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
                    <li class="item"><a href="userindex.php">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container">
        <?php foreach ($records as $record) { ?>
            <div>
                <a href="userdetail.php?id=<?php echo $record['id']; ?>&name=<?php echo $name; ?>" class="details">
                    <div class="element1">
                        <img src="<?php echo $record['photo']; ?>" class='drink'>
                        <h1>
                            <?php echo htmlspecialchars($record['Title']); ?>
                        </h1>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</body>

</html>