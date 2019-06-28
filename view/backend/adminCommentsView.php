<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<div class="jumbotron">
    <h1 class="text-center"> Gestion des Commentaires signalés </h1>

    <table class="table table-striped table-bordered">

        <thead>
        <tr>
            <th>Ordre</th>
            <th>Chapitre</th>
            <th>Date</th>
            <th>Contenu</th>
            <th>Signalement</th>
            <th>approuver</th>
            <th>Suprimer</th>
            <th>afficher</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($comments as $comment): ?>

            <tr>

                <td><?= $comment['id']; ?> </td>
                <td><?= htmlspecialchars($comment['post_id']); ?></td>
                <td><?= $comment['date_creation']; ?></td>
                <td>
                    <?= mb_substr($comment['comments'],0,20); ?>...
                </td>
                <td>
                    <?php
                    if($comment['report_comment'] > 0) {
                        echo 'oui';
                    }else{
                        echo 'non';
                    }?>
                </td>
                <td><a href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>">Approuver</a></td>
                <td><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">Supprimer</a></td>
                <td><a href="index.php?action=singleComment&amp;id=<?= $comment['id']; ?>">Lire</a></td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>
</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>

