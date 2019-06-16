<?php $this->title = "Mon Blog"; ?>


    <article>
        <p><a href="index.php">Retour à l'accueil</a></p>

        <h2>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h2>

        <p>
            Publié le <?= $post['date_creation']; ?>
        </p>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
        </p>

    </article>

    <h3> Commentaires </h3>
<?php forEach ($comments as $comment) :?>

    <p><?= htmlspecialchars($comment['author']); ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comments']));  ?><br>
        Posté le <?= $comment['date_creation']?></p>

<?php endforeach; ?>