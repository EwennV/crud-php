<?php
global $mysqli;
session_start();

if (false === isset($_SESSION['valid'])) {
    header('Location: login.php');
} else {
    include('connection.php');

    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $checked = mysqli_real_escape_string($mysqli, $_GET['checked']);

    if ($id === "" || $checked === "") {
        echo("Champs invalides");
        header('Location: index.php');
    }

    $checked = $checked == "on" ? 1 : 0;

    $result = mysqli_query($mysqli, "UPDATE task SET checked = $checked WHERE id = $id") or die("Unable to connect to database");
    header('Location: index.php');
}