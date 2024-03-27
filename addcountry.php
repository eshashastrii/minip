<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}

if (isset ($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $file1 = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], "Images/" . $file1);

    $sql = "INSERT INTO country (Name, svg) VALUES ('$name','Images/$file1')";
    $sql1 = "CREATE TABLE $name (id1 INT(11),
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
        Title VARCHAR(255),
        country VARCHAR(255),
        status VARCHAR(255),
        size VARCHAR(255),
        tlimit VARCHAR(255),
        edetails LONGTEXT,
        ephoto VARCHAR(400),
        cdetails LONGTEXT,
        cphoto VARCHAR(400),
        fdetails LONGTEXT,
        fphoto VARCHAR(255),
        rules LONGTEXT,
        photo VARCHAR(255),
        vlink VARCHAR(255),
        terms LONGTEXT,
        types LONGTEXT,
        playerlist LONGTEXT,
        time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        artiphoto VARCHAR(255),
        artinfo LONGTEXT)";
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
        header('Location: index.php');
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD-GAMES</title>
    <link rel="stylesheet" href="./css/add.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <div class="hero">
        <header id="navbar">

            <a class="logo">GameOn</a>
            <nav class="header">
                <ul>
                    <li class="item"><a href="index.php">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="Name">Name of country:</label>
            <input type="text" placeholder="Enter country name" name="Name" required>
            <label for="file">Photo in svg format:</label>
            <input type="file" name="file" required>
            <button type="submit" name='submit'>SUBMIT</button>
        </form>
    </div>
</body>

</html>