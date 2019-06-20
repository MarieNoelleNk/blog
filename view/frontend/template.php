
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $title ?> </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/style.css">
</head>

<body>

<header>

    <nav>
        <form class = "form-control" id="Connection" action="index.php?action=login" method="post">
            <P id="connect_label"> Connexion </P>
            <p><input type="text" name="login" value="xyz@example.fr" "></p>
            <p><input type="password" name="password" value="mot de passe" "></p>
            <p><input type="submit" name="submit" ></p>

        </form>
    </nav>

</header>

<?= $content ?>

<footer class="text-center">

    <p>Roman écrit en 2019</p>

</footer>

</body>

</html>