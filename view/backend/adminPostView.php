<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<div class="jumbotron">

    <article>

        <div class="home_article">

            <h1>Chapitre <?= $post['chapter']; ?> : <?= $post['title']; ?></h1>

            <p>
                Publié le <?= $post['date_creation']; ?>
            </p>

            <p>
                <?= $post['content']; ?>
            </p>

        </div>

        <td data-title="edition"><a href="index.php?action=editPost&amp;id=<?= $post['id']; ?>">Editer</a></td>
        <td data-title="suppression"><a href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">Supprimer</a></td>

    </article>

</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
