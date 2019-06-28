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

    </article>

</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
