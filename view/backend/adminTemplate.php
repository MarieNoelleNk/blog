
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> <?= $title ?></title>
        <script src="https://cdn.tiny.cloud/1/lxs97m54mcfenmx34hi42djka9fj14gzia10cwic7wi9slt5/tinymce/5/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="public/style.css">
    </head>

    <body>

    <header>

        <a href="index.php?action=disconnect">Deconnexion</a>

    </header>

    <section>

        <?= $content ?>

    </section>

    <footer class="text-center">

        <p>Roman écrit en 2019</p>

    </footer>

    </body>

</html>

