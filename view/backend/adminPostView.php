<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<article>

    <div class="home_article">

        <p><a href="index.php?action=adminPost">Retour au tableau d'administration</a></p>


        <h1>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h1>

        <p>
            Publié le <?= $post['date_creation']; ?>
        </p>

        <p>
            <?= $post['content']; ?>
        </p>

    </div>

</article>


<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
