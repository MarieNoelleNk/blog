<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>

    <h1> Titre du roman </h1>
    <nav>
        <ul>
            <li><a href="view/login.php">Connexion</a></li>
            <li><a href="">Accueil</a></li>
        </ul>
    </nav>

</header>



<?= $content ?>


<footer>

    <p>Roman écrit en 2019</p>

</footer>

</body>

</html>