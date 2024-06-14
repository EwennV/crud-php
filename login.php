<?php
global $mysqli;
session_start();
?>

<html>

<head>
    <title>Connexion</title>
</head>

<body>
<?php include('base.php'); ?>
<?php
include('connection.php');
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    if ($user === "" || $password === "") {
        echo("Champs invalides");
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user' AND password='$password'") or die("Unable to connect to database");

        $row = mysqli_fetch_assoc($result);

        if (is_array($row) && !empty($row)) {
            $validUser = $row['username'];

            $_SESSION['valid'] = $validUser;
            $_SESSION['username'] = $row['username'];
            $_session['id'] = $row['id'];
        } else {
            echo("Identifiants invalides");

        }

        if (isset($_SESSION['valid'])) {
            header('Location: index.php');
        }
    }
} else {
    ?>
    <div class="container-fluid col-12 col-md-6 col-xl-3 p-3 p-md-5">
        <form action="" method="post" class="shadow p-3 rounded">
            <legend>Se connecter</legend>
            <div class="mb-3">
                <label for="username" class="form-label">Identifiant</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Se connecter</button>
        </form>
    </div>

    <?php
}
?>
</body>
</html>
