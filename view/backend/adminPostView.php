<?php $title = "Afficher un chapitre"; ?>

<?php  ob_start();?>

<div class="jumbotron">

    <article>

        <div class="home_article">

            <h2 class="text-center">Chapitre <?= $post['chapter']; ?> : <?= $post['title']; ?></h2>

            <p>
                Publié le <?= $post['date_creation']; ?>
            </p>

            <p>
                <?= $post['content']; ?>
            </p>

        </div>
        <a href="index.php?action=editPost&amp;id=<?= $post['id']; ?>"><button type="button" class="btn btn-warning btn-md"><span class="glyphicon glyphicon-ok">Editer</span></button></a>
        <a href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>"><span class="glyphicon glyphicon-remove"><button type="button" class="btn btn-danger btn-md">Supprimer</button></span></a>

    </article>

</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
