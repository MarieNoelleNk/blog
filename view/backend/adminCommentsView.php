<?php $title = "Modération des commentaires"; ?>

<?php  ob_start();?>


<div class="responsive-table-line jumbotron">

    <h2 class="text-center"> Gestion des commentaires </h2>

    <table class="table table-condensed table-bordered table-body-center">

        <thead>
        <tr>
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
                <td data-title="Chapitre"><?= htmlspecialchars($comment['post_id']); ?></td>
                <td data-title="Date"><?= $comment['date_creation']; ?></td>
                <td data-title="Contenu">
                    <?= mb_substr($comment['comments'],0,20); ?>...
                </td>
                <td data-title="Signalement">
                    <?php
                    if($comment['report_comment'] > 0) {?>
                       <p class="report">oui</p>
                    <?php }else{ ?>
                       <p>non</p>
                        <?php
                    }?>
                </td>
                <td data-title="Approuver"><a href="index.php?action=approveComment&amp;id=<?= $comment['id']; ?>">Approuver</a></td>
                <td data-title="Supprimer"><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">Supprimer</a></td>
                <td data-title="Afficher"><a href="index.php?action=singleComment&amp;id=<?= $comment['id']; ?>">Lire</a></td>
            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>
</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>

