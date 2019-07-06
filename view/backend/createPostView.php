<?php $title = "Ajouter un chapitre"; ?>

<?php  ob_start();?>

<h2 class="text-center text-white ">Redaction d'un nouveau chapitre</h2>

<form action="index.php?action=addPost" method="post">

    <p class="form-group">
        <label for="chapter_number">Numéro du chapitre:</label>
        <input type="number" name="chapter" id="chapter_number">
    </p>

    <p class="form-group">
        <label for="chapter">Titre du chapitre</label>
        <input type="text" name="title" id="chapter">
    </p>

    <p class="form-group">
        <label for="">Contenu du chapitre</label>
    </p>
    <textarea  name="content" rows="15" cols="90"></textarea>
    <input type="submit"class="btn btn-success text-center" value=" Ajouter">
</form>

<?php $content= ob_get_clean();?>

<?php require('adminTemplate.php') ?>

