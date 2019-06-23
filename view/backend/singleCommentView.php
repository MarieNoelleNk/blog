<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<article>
    <div class="home_article">
        <p><strong> <?= $comment['author'] ?></strong></p>

        <?= $comment['comments'] ?>
    </div>

    <a href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>">Approuver</a>
    <a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">Supprimer</a>

</article>



<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
