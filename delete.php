<?php
session_start();
global $mysqli;

if (false === isset($_SESSION['valid'])) {
    header('Location: login.php');
} else {
    include('connection.php');

    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    if ($id === "") {
        echo("id invalide");
        header('Location: index.php');
    }

    $result = mysqli_query($mysqli, "DELETE FROM task WHERE id = $id") or die("Unable to connect to database");
    header('Location: index.php');
}

?>