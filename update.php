<?php
global $mysqli;
session_start();
?>

<html>
<head>
    <title>Modifier une tâche</title>
</head>

<body>

<?php
include('base.php');
include('connection.php');

if (false === isset($_SESSION['valid'])) {
    header('Location: login.php');
}

if (true === isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $task = mysqli_real_escape_string($mysqli, $_POST['task']);

    if ($id === "" || $task === "") {
        echo("Champs invalides");
    } else {
        $result = mysqli_query($mysqli, "UPDATE task SET content = '$task' where id = $id") or die("Unable to connect to database");
        header('Location: index.php');
    }
}
if (false === isset($_GET['id']) || $_GET['id'] === "") {
    header('Location: index.php');
}
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $result = mysqli_query($mysqli, "SELECT * FROM task WHERE id = $id") or die("Unable to connect to database");
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];
?>

<div class="container-fluid col-12 col-xl-6 p-3 p-md-5">
    <div class="box p-3 shadow">
        <form action="" method="post">
            <legend class="d-flex justify-content-between flex-column-reverse flex-sm-row gap-3">
                <h3 class="m-0">Modifier une tâche</h3>
                <a href="index.php" class="btn btn-outline-primary">< Retour aux tâches</a>
            </legend>
            <div class="mb-3">
                <label for="task" class="form-label">Tâche</label>
                <textarea name="task" id="task" class="form-control"><?php echo($content) ?></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Modifier</button>
        </form>
    </div>
</div>


</body>

