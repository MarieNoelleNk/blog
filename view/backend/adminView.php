
<?php $title = "Gestion des chapitres"; ?>

<?php  ob_start();?>

<div class="responsive-table-line jumbotron">

    <h2 class="text-center"> Gestion des billets </h2>

    <table class="table table-condensed table-bordered table-body-center">

        <thead>
        <tr>
            <th class="text-center">Chapitre</th>
            <th class="text-center">Titre</th>
            <th class="text-center">Date</th>
            <th class="text-center">Contenu</th>
            <th class="text-center">Action</th>
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
                <td data-title="Action">
                    <a class="btn btn-success" href="index.php?action=readPost&amp;id=<?= $post['id']; ?>">Lire</a>
                    <a class="btn btn-primary" href="index.php?action=editPost&amp;id=<?= $post['id']; ?>">Editer</a>
                    <a class="btn btn-danger" href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">Supprimer</a>
                </td>

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



