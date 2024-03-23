<?php
$conn = mysqli_connect('localhost', 'root', '', 'sports');
if (!$conn) {
    echo 'Connection error' . mysqli_connect_error();
}

if (isset ($_GET['id'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "DELETE FROM games WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
        header('Location: india.php');
    } else {
        echo 'Query error: ' . mysqli_error($conn);
    }
} else {
    echo 'ID not specified';
}

mysqli_close($conn);
?>