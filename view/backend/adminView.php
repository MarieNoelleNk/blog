
<?php $title = "Gestion des chapitres"; ?>

<?php  ob_start();?>

<div class="responsive-table-line jumbotron">

    <h2 class="text-center"> Gestion des billets </h2>

    <table class="table table-condensed table-bordered table-body-center">

        <thead>
        <tr>
            <th>Chapitre</th>
            <th>Titre</th>
            <th>Date</th>
            <th>Contenu</th>
            <th>Modification</th>
            <th>Supression</th>
            <th>Affichage</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($posts as $post): ?>

            <tr>

                <td data-title="chapitre"><?= $post['chapter']; ?> </td>
                <td data-title="titre"><?= $post['title']; ?></td>
                <td data-title="date"><?= $post['date_creation']; ?></td>
                <td data-title="contenu">
                    <?= mb_substr($post['content'],0,20); ?>...
                </td>
                <td data-title="edition"><a href="index.php?action=editPost&amp;id=<?= $post['id']; ?>">Editer</a></td>
                <td data-title="suppression"><a href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">Supprimer</a></td>
                <td data-title="lecture"><a href="index.php?action=readPost&amp;id=<?= $post['id']; ?>">lire</a></td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>
    <div class="admin_tab">

        <a href="index.php?action=getPage" class="btn btn-info" role="button">Ajouter un chapitre</a>

    </div>
</div>



<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>



