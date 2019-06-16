<?php $this->title = "Mon Blog"; ?>

<?php foreach ($posts as $post):
    ?>
    <article>

        <h2>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h2>

        <p>
            Publié le <?= $post['date_creation']; ?>
        </p>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])); ?>
        </p>
        <p><a href="index.php?action=post&amp;id=<?= $post['id']; ?>">Lire les Commentaires</a></p>
    </article>

<?php endforeach; ?>