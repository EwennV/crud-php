<?php
    global $mysqli;
    session_start();
?>

<html>
<head>
    <title>Ajouter une tâche</title>
</head>

<body>

<?php
    include('base.php');

    if (false === isset($_SESSION['valid'])) {
        header('Location: login.php');
    }

    if (true === isset($_POST['submit'])) {
        include('connection.php');
        $task = mysqli_real_escape_string($mysqli, $_POST['task']);

        if ($task === "") {
            echo("Champs invalides");
        } else {
            $result = mysqli_query($mysqli, "INSERT INTO task (content) VALUES ('$task')") or die("Unable to connect to database");
            header('Location: index.php');
        }
    }
?>

<div class="container-fluid col-12 col-xl-6 p-3 p-md-5">
    <div class="box p-3 shadow">
        <form action="" method="post">
            <legend class="d-flex justify-content-between flex-column-reverse flex-sm-row gap-3">
                <h3 class="m-0">Ajouter une tâche</h3>
                <a href="index.php" class="btn btn-outline-primary">< Retour aux tâches</a>
            </legend>
            <div class="mb-3">
                <label for="task" class="form-label">Tâche</label>
                <textarea name="task" id="task" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Ajouter</button>
        </form>
    </div>
</div>





</body>

