<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<h2 class="text-center">Redaction d'un nouveau chapitre</h2>

<form action="index.php?action=addPost" method="post">

    <p>
        <label for="chapter_number">Numéro du chapitre:</label>
        <input type="number" name="chapter" id="chapter_number">
    </p>

    <p>
        <label for="chapter">Titre du chapitre</label>
        <input type="text" name="title" id="chapter">
    </p>

    <p><label for="">Contenu du chapitre</label></p>
    <textarea  name="content" rows="15" cols="90"></textarea>
    <button type="submit"class="btn btn-success">Ajouter</button>
</form>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>

