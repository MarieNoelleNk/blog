<?php $title = "Lire un chapitre"; ?>

<?php  ob_start();?>

<article class="chapter">


    <div class="container home_article">

        <h1 class="text-center">Chapitre <?= $post['chapter']; ?> : <?= $post['title']; ?></h1>

        <p>
            Publié le <?= $post['date_creation']; ?>
        </p>

        <p>
            <?= $post['content']; ?>
        </p>

    </div>

</article>

<h2 class="text-center pt-5"> Commentaires </h2>

<?php forEach ($comments as $comment) :?>

    <div class="container" id="comment_post">

        <div class="jumbotron">

            <div id="comments_header" >

                <p><?= htmlspecialchars($comment['author']); ?></p>

                <p>Posté le <?= $comment['date_creation']?></p>

            </div>

            <p> <?= nl2br(htmlspecialchars($comment['comments'])); ?></p>

            <a href="index.php?action=signalComment&amp;id=<?= $comment['id']; ?>&amp;chapterId=<?= $comment['post_id']; ?>" class="text-center"> <button class="btn btn-danger" >signaler</button></a>

            <?php if($comment['report_comment']>0) { ?>

               <span id="reported">Commentaire signalé!</span>
               <?php
            }
            ?>

        </div>

    </div>



<?php endforeach; ?>

<h3 class="text-center">Ajouter un commentaire</h3>

<form class="text-center" action="index.php?action=makeComment&amp;id=<?= $post['id'] ?>" method="post">

    <p>
        <label for="pseudo"> Nom </label><br>
        <input type="text" name="author" id="pseudo" required>
    </p>

    <p>
        <label for="comments">Message</label><br>
        <textarea name="comments"  id="comments" cols="30" rows="10" required></textarea>
        <input type="hidden" name="id" value="<?= $post['id'] ?>" />
        <input type="hidden" name="chapter" value="<?=$post['chapter']?>">
    </p>

    <p><input type="submit" class="btn btn-success" value="Envoyer"></p>

</form>



<?php $content= ob_get_clean();?>

<?php require('template.php') ?>



