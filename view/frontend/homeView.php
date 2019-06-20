?php $title = "Mon Blog"; ?>

<?php  ob_start();?>


<h1 class="text-center"> Billet simple pour l'Alaska </h1>

<?php foreach ($posts as $post):
    ?>

    <article>

        <div class="home_article">

            <h2>Chapitre <?= $post['id']; ?> : <?= htmlspecialchars($post['title']); ?></h2>

            <p>
                Publié le <?= $post['date_creation']; ?>
            </p>

            <p>
                <?= mb_substr(nl2br(htmlspecialchars($post['content'])),0,200); ?>...
            </p>
            <p><a href="index.php?action=post&amp;id=<?= $post['id']; ?>">Voir en intégralité</a></p>

        </div>
    </article>

<?php endforeach; ?>

<?php $content= ob_get_clean();?>

<?php require('template.php') ?>