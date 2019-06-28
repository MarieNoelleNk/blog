<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="public/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/style1.css">
    </head>

    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Jean FtR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarReponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active login-btn" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active login-btn" href="index.php?action=connection">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $content ?>

    <footer class="container-fluid bg-dark">

        <div class="row text-center padding">

            <div class="col-md-6">
                <h2>Me suivre</h2>
            </div>
            <div class="col-md-6 social padding">
                <ul class="social-icon animate">
                    <li><a href="#" title="facebook" target="_blank"><i class="fab fa-facebook"></i></a></li> <!-- change the link to social page and edit title-->
                    <li><a href="#" title="twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="google plus" target="_blank"><i class="fab fa-google-plus"></i></a></li>
                </ul>
            </div>

        </div>

    </footer>

    </body>

</html>