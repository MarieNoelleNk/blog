<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>


<h3 class="text-center text-white pt-5">Modification du chapitre</h3>
<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">

                <h2 class="text-center"></h2>

                <form action="index.php?action=modifyPost&amp;id=<?= $post['id'];?>" method="post">

                    <p>
                        <label for="chapter">Titre du chapitre</label>
                        <input type="text" name="title" id="chapter" value="<?= $post['title']?>">
                    </p>

                    <p><label for="content">Contenu du chapitre</label></p>
                    <textarea  name="content" rows="20" cols="100" id="content"><?= $post['content']?></textarea>
                    <button type="submit"class="btn btn-success">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $content= ob_get_clean();?>


<?php require('adminTemplate.php') ?>
