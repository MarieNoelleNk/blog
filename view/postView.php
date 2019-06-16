<?php $this->title = "Mon Blog"; ?>


<article>
    <p><a href="index.php">Retour à l'accueil</a></p>

    <h1>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h1>

    <p>
        Publié le <?= $post['date_creation']; ?>
    </p>

    <p>
        <?= nl2br(htmlspecialchars($post['content'])); ?>
    </p>

</article>

<h2> Commentaires </h2>
<?php forEach ($comments as $comment) :?>
<div id="comments_header">
    <p><?= htmlspecialchars($comment['author']); ?></p>
    <p>Posté le <?= $comment['date_creation']?></p>
</div>
<p><?= nl2br(htmlspecialchars($comment['comments']));  ?>

    <?php endforeach; ?>

<h3>Ajoutez un commentaire</h3>
<form>

    <p>
        <label for="pseudo"> Nom </label><br>
        <input type="text" name="author" id="pseudo">
    </p>
    <p>
        <label for="comments">Message</label><br>
        <textarea name="comment" id="" cols="30" rows="10"></textarea>
    </p>

    <p><input type="submit" value="Envoyer"></p>

</form>





