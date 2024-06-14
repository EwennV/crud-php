<?php
global $mysqli;
session_start();
?>

<html>
<head>
    <title>Todo-list CESI</title>

</head>

<body>
<?php include('base.php'); ?>
<div class="container-fluid col-12 col-xl-6 p-3 p-md-5">
    <?php
    if (false === isset($_SESSION['valid'])) {
        header('Location: login.php');
    } else {
        include('connection.php');

        $result = mysqli_query($mysqli, "SELECT * FROM task ORDER BY checked ASC, id DESC") or die("Unable to connect to database");

        $tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
        <div class="box shadow rounded p-3">
            <div class="d-flex justify-content-between flex-column-reverse flex-sm-row gap-3">
                <h3 class="m-0">Todo-list (<?php echo(count($tasks)) ?>)</h3>
                <a class="btn btn-outline-primary" href="add.php">Ajouter une tâche</a>
            </div>
            <hr/>
            <?php

            foreach ($tasks as $task) {
            ?>
                <div class="d-inline-flex justify-content-between w-100 p-2">
                    <div class="align-items-center justify-items-center d-flex gap-2">
                        <form action="close.php" class="d-inline-flex m-0">
                            <input type="hidden" name="id" value="<?php echo($task['id']); ?>">
                            <input type="checkbox" name="checked" id="task" class="form-check-input m-0" style="width: 20px; height: 20px;" onchange="this.form.submit()" <?php echo($task['checked']==='1') ? 'checked="checked"' : 'null'; ?>>
                        </form>
                        <label for="task" class="form-check-label <?php echo($task['checked']==='1') ? 'text-decoration-line-through' : ''; ?>"><?php echo($task['content']); ?></label>
                    </div>
                    <div class="d-inline-flex align-items-center gap-2 ms-2">
                        <a class="btn btn-sm btn-outline-primary p-2 fs-5" href="update.php?id=<?php echo($task['id']) ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-sm btn-outline-danger p-2 fs-5" href="delete.php?id=<?php echo($task['id']) ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>
