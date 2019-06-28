
<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<div class="jumbotron">
    <h1 class="text-center"> Gestion des posts </h1>

    <table class="table table-striped table-bordered">

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

                <td><?= $post['chapter']; ?> </td>
                <td><?= $post['title']; ?></td>
                <td><?= $post['date_creation']; ?></td>
                <td>
                    <?= mb_substr($post['content'],0,20); ?>...
                </td>
                <td><a href="index.php?action=editPost&amp;id=<?= $post['id']; ?>">Editer</a></td>
                <td><a href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">Supprimer</a></td>
                <td><a href="index.php?action=readPost&amp;id=<?= $post['id']; ?>">lire</a></td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>
</div>
<div class="admin_tab">

    <a href="index.php?action=getPage"><button>Ajouter un chapitre</button></a>

</div>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>



