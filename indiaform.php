<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}
if (isset ($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $des = mysqli_real_escape_string($conn, $_POST['Description']);
    $no = mysqli_real_escape_string($conn, $_POST['Number']);
    $equ = mysqli_real_escape_string($conn, $_POST['Equipment']);
    $rul = mysqli_real_escape_string($conn, $_POST['Rules']);
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileExt1 = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileExt1, $allowed)) {
        if ($fileError === 0) {
            $folder = "Images/" . $fileName;
            move_uploaded_file($fileTmpName, $folder);
            $sql = "INSERT INTO games(Name, Description, Number, Equipment, Rules, pic) VALUES('$name','$des','$no','$equ','$rul', '$folder')";
        } else {
            echo "There was an error uploading your file";
        }
    } else {
        echo "You cannot upload files of this type";
    }
    if (mysqli_query($conn, $sql)) {
        header('Location: india.php');
    } else {
        echo 'error';
    }
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADD-RECIPES</title>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="styles.css">
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
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <label for="Name">Name:</label>
                <input type="text" placeholder="Enter name" name="Name" required>
                <label for="file">Photo:</label>
                <input type="file" name="file" required>
                <label for="Description">Description:</label>
                <input type="text" placeholder="Enter Description" name="Description" required>
                <label for="Number">Number of playes:</label>
                <input type="text" placeholder="Enter number of players" name="Number" required>
                <label for="Equipment">Equipments:</label>
                <input type="text" placeholder="Enter equipments" name="Equipment" required>
                <label for="Rules">Rules:</label>
                <input type="text" placeholder="Enter rules" name="Rules" required>
                <button type="submit" name='submit'>SUBMIT</button>
            </form>
        </div>
</body>

</html>