<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}
if (isset ($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT id, Name, Description, Number, Equipment, Rules, pic FROM games WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $records = mysqli_fetch_assoc($result);
    mysqli_close($conn);
}
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
    <link rel="stylesheet" href="detail.css">
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
    </div>

    <div class="container1">
        <h1>
            <?php echo htmlspecialchars($records['Name']) ?>
        </h1>
        <img src="<?php echo $records['pic']; ?>" class='drink'>
        <h2>Description:</h2>
        <p>
            <?php echo htmlspecialchars($records['Description']); ?>
        </p>
        <h2>Number of players:</h2>
        <p>
            <?php echo htmlspecialchars($records['Number']); ?>
        </p>
        <h2>Equipment:</h2>
        <p>
            <?php echo htmlspecialchars($records['Equipment']); ?>
        </p>
        <h2>Rules:</h2>
        <p>
            <?php echo htmlspecialchars($records['Rules']); ?>
        </p>
    </div>

</body>

</html>