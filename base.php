
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="navbar navbar-dark bg-dark justify-content-between ps-4 pe-4 p-3">
    <a class="navbar-brand fw-bold" href="index.php">
        Todo-list
        <img width="60px" class="ms-1" src="https://moodle.cesi.fr/pluginfile.php/1/theme_edutor/footerlogoimage/1716828923/Logo%20One%20CESI%20blanc.png" />
    </a>
    <div>
        <?php
            if (isset($_SESSION['valid'])) {
                echo('<a class="text-white" href="logout.php">Se déconnecter</a>');
            } else {
                echo('<a class="text-white" href="login.php">Se connecter</a>');
            }
        ?>
    </div>
</div>

</html>