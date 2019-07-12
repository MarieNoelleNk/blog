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
        <a href="index.php?action=editPost&amp;id=<?= $post['id']; ?>"><button  class="btn btn-primary btn-md">Editer</button></a>
        <a href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>"><button  class="btn btn-danger btn-md">Supprimer</button></a>

    </article>

</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
