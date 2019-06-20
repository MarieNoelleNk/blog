<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<article>

    <div class="home_article">
        <p><a href="index.php">Retour à l'accueil</a></p>

        <h1>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h1>

        <p>
            Publié le <?= $post['date_creation']; ?>
        </p>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
        </p>
    </div>
</article>

<h2> Commentaires </h2>

<?php forEach ($comments as $comment) :?>

    <div id="comments_header">

        <p><?= htmlspecialchars($comment['author']); ?></p>

        <p>Posté le <?= $comment['date_creation']?></p>

    </div>

    <p> <?= nl2br(htmlspecialchars($comment['comments'])); ?></p>

    <button><a href="../../index.php?action=signalComment&amp;id=<?= $comment['id']; ?>&amp;chapterId=<?= $comment['post_id']; ?>"> signaler</a></button>


<?php endforeach; ?>

<h3 class="text-center">Ajouter un commentaire</h3>

<form class="text-center" action="index.php?action=makeComment&amp;id=<?= $post['id'] ?>" method="post">

    <p>
        <label for="pseudo"> Nom </label><br>
        <input type="text" name="author" id="pseudo">
    </p>

    <p>
        <label for="comments">Message</label><br>
        <textarea name="comments"  cols="30" rows="10"></textarea>
        <input type="hidden" name="id" value="<?= $post['id'] ?>" />
    </p>

    <p><input type="submit" value="Envoyer"></p>

</form>



<?php $content= ob_get_clean();?>

<?php require('template.php') ?>




