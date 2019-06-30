<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<article class="jumbotron">
    <div class="home_article">
        <p><strong> <?= $comment['author'] ?></strong></p>

        <?= $comment['comments'] ?>
    </div>

    <a href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>"> <button type="button" class="btn btn-warning btn-lg">OK <span class="glyphicon glyphicon-ok"></span></button></a>
    <a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">    <button type="button" class="btn btn-info btn-lg">Supprimer <span class="glyphicon glyphicon-remove"></span></button>
        </a>

</article>



<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>
