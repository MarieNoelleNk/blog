<?php $title = "Lire un commentaire"; ?>

<?php  ob_start();?>

<article class="jumbotron">

    <div class="home_article">
        <p><strong> <?= $comment['author'] ?></strong></p>

        <?= $comment['comments'] ?>
    </div>

    <div id="moderation_buttons">

        <a href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>"> <button type="button" class="btn btn-warning btn-md">OK</button></a>
        <a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">    <button type="button" class="btn btn-danger btn-md">Supprimer</button>
        </a>

    </div>

</article>





<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
