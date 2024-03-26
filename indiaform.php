<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}

if (isset ($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $team_size = mysqli_real_escape_string($conn, $_POST['size']);
    $time_limit = mysqli_real_escape_string($conn, $_POST['limit']);
    $equipment_details = mysqli_real_escape_string($conn, $_POST['Equipment']);
    $costume_details = mysqli_real_escape_string($conn, $_POST['costume']);
    $footwear_details = mysqli_real_escape_string($conn, $_POST['footwear']);
    $rules = mysqli_real_escape_string($conn, $_POST['Rules']);
    $video_links = mysqli_real_escape_string($conn, $_POST['video']);
    $terminologies_used = mysqli_real_escape_string($conn, $_POST['term']);
    $other_related_types = mysqli_real_escape_string($conn, $_POST['types']);
    $celebrity_players = mysqli_real_escape_string($conn, $_POST['list']);
    $art = mysqli_real_escape_string($conn, $_POST['art']);
    $file1 = $_FILES['file']['name'];
    $file2 = $_FILES['file1']['name'];
    $file3 = $_FILES['file2']['name'];
    $file4 = $_FILES['file3']['name'];
    $file5 = $_FILES['file4']['name'];

    move_uploaded_file($_FILES['file']['tmp_name'], "Images/" . $file1);
    move_uploaded_file($_FILES['file1']['tmp_name'], "Images/" . $file2);
    move_uploaded_file($_FILES['file2']['tmp_name'], "Images/" . $file3);
    move_uploaded_file($_FILES['file3']['tmp_name'], "Images/" . $file4);
    move_uploaded_file($_FILES['file4']['tmp_name'], "Images/" . $file5);

    $sql = "INSERT INTO games (id1, Title, country, status, size, tlimit, edetails, ephoto, cdetails, cphoto, fdetails, fphoto, rules, photo, vlink, terms, types, playerlist, artiphoto, artinfo) VALUES ('$id', '$name', '$country', '$status', '$team_size', '$time_limit', '$equipment_details', 'Images/$file2', '$costume_details', 'Images/$file3', '$footwear_details', 'Images/$file4', '$rules', 'Images/$file1', '$video_links', '$terminologies_used', '$other_related_types', '$celebrity_players', 'Images/$file5', '$art')";

    if (mysqli_query($conn, $sql)) {
        header('Location: india.php');
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
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="item"><a href=""> About us</a></li>
                    <li class="item"><a href="">Contact us</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="id">Sr. No.:</label>
            <input type="text" placeholder="Enter Sr. No." name="id" required>
            <label for="Name">Title:</label>
            <input type="text" placeholder="Enter sports title" name="Name" required>
            <label for="file">Photo:</label>
            <input type="file" name="file" required>
            <label for="country">Country of origin:</label>
            <input type="text" placeholder="Enter Country Name" name="country">
            <label for="status">National/International Status:</label>
            <input type="text" placeholder="Enter status" name="status">
            <label for="size">Team size:</label>
            <input type="text" placeholder="Enter team size" name="size">
            <label for="limit">Time limit:</label>
            <input type="text" placeholder="Enter time limit" name="limit">
            <label for="Equipment">Equipment details:</label>
            <textarea type="text" placeholder="Enter equipments" name="Equipment"></textarea>
            <label for="file1">Equipment Photo:</label>
            <input type="file" name="file1">
            <label for="costume">Costume details:</label>
            <textarea type="text" placeholder="Enter costume details" name="costume"></textarea>
            <label for="file2">Costume Photo:</label>
            <input type="file" name="file2">
            <label for="footwear">Footwear details:</label>
            <textarea type="text" placeholder="Enter footwear details" name="footwear"></textarea>
            <label for="file3">Footwear Photo:</label>
            <input type="file" name="file3">
            <label for="Rules">Rules:</label>
            <textarea type="text" placeholder="Enter rules" name="Rules"></textarea>
            <label for="video">Video links:</label>
            <textarea type="text" placeholder="Enter video link" name="video"></textarea>
            <label for="term">Terminologies:</label>
            <textarea type="text" placeholder="Enter Terminologies used" name="term"></textarea>
            <label for="types">Other related types:</label>
            <textarea type="text" placeholder="Enter other related types" name="types"></textarea>
            <label for="file4">Artifact photo:</label>
            <input type="file" name="file4">
            <label for="art">Artifact detail:</label>
            <textarea type="text" placeholder="Enter Artifact detail" name="art"></textarea>
            <label for="list">Celebrity players list:</label>
            <textarea type="text" placeholder="Enter Celebrity players list" name="list"></textarea>
            <button type="submit" name='submit'>SUBMIT</button>
        </form>
    </div>
</body>

</html>