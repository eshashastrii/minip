<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}

if (isset ($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT * FROM games WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $record = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    if (isset ($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
        $rules = mysqli_real_escape_string($conn, $_POST['rules']);
        $sql = "UPDATE games SET Name = '$name', Description = '$description', Number = '$number', Equipment = '$equipment', Rules = '$rules' WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            header('Location: india.php');
        } else {
            echo 'Query error: ' . mysqli_error($conn);
        }
    }
} else {
    echo 'ID not specified';
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="edit.css">
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
        <h2>Edit Game</h2>
        <form action="edit.php?id=<?php echo $record['id']; ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($record['Name']); ?>"><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description"
                value="<?php echo htmlspecialchars($record['Description']); ?>>"><br>

            <label for="number">Number:</label>
            <input type="text" id="number" name="number" value="<?php echo htmlspecialchars($record['Number']); ?>"><br>

            <label for="equipment">Equipment:</label>
            <input type="text" id="equipment" name="equipment"
                value="<?php echo htmlspecialchars($record['Equipment']); ?>"><br>

            <label for="rules">Rules:</label>
            <input id="rules" name="rules" value="<?php echo htmlspecialchars($record['Rules']); ?>"><br>

            <input type="submit" name="submit" value="Save Changes">
        </form>
    </div>
</body>

</html>