<?php $title = "Modération des commentaires"; ?>

<?php  ob_start();?>


<div class="responsive-table-line jumbotron">

    <h2 class="text-center"> Gestion des commentaires </h2>

    <table class="table table-condensed table-bordered table-body-center">

        <thead>
        <tr>
            <th class="text-center">Chapitre</th>
            <th class="text-center">Date</th>
            <th class="text-center">Contenu</th>
            <th class="text-center">Signalement</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($comments as $comment): ?>

            <tr>
                <td data-title="Chapitre" class="text-center"><?= $comment['post_id']; ?></td>
                <td data-title="Date" class="text-center"><?= $comment['date_creation']; ?></td>
                <td data-title="Contenu">
                    <?= mb_substr($comment['comments'],0,20); ?>...
                </td>
                <td data-title="Signalement" class="text-center">
                    <?php if($comment['report_comment'] > 0) :?>
                       <p class="font-weight-bold">oui</p>
                    <?php else : ?>
                       <p>non</p>
                    <?php endif;?>
                </td>
                <td data-title="Actions">
                    <a class="btn btn-success" href="index.php?action=singleComment&amp;id=<?= $comment['id']; ?>">Lire</a>
                    <a class="btn btn-primary" href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>">Approuver</a>
                    <a class="btn btn-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">Supprimer</a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>
</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>

