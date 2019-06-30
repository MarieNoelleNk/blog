<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>


<!--- header -->
<header id="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Billet simple pour l'Alaska</h1>

                <p>Jenna et sa famille rêvent de faire du ski en Alaska et prennent 15 jours pour decouvrir la région.Tout se deroule bien jusqu'à cette heure fatidique de quitter la montagne. Jenna se souvient
                    de cette phrase sortie de la bouche de sa lugubre tante maddie:" je m'attendais à peu de choses mais j'ai enchainé les catastrophes à cause d'un billet simple pour l'Alaska.."</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="public/book-150199_1280.png" class="img-fluid" alt="open book">
            </div>
        </div>
    </div>
</header>

<!--- intro -->

<section class="container site-section" id="intro">

    <div class="jumbotron">

        <h2>Bienvenue sur mon blog</h2>

        <p>Je suis Jean Forteroche, acteur et écrivain. <span>Billet simple pour l'Alaska</span> est mon cinquième roman mais le premier que je publierai entièrement en ligne.</p>
        <p>Une section comentaire est à votre disposition, n'hésitez pas à partager avec moi vos impressions et vos avis sur chaque chapitre</p>
        <p>Bonne lecture!</p>

    </div>
</section>

<!--- summary -->

<section class="container-fluid ">

    <h2 class="text-center" >Sommaire</h2>

    <div class="row summary">

        <?php foreach ($posts as $post):?>

            <article class="col-md-3">

                <div class="card">

                    <div class="card-body">

                        <img src="public/alaska-810433_1920.jpg" class="card-img-top" alt="">

                        <h4 class="card-title text-center">Chapitre <?= $post['chapter']; ?> : <?= htmlspecialchars($post['title']); ?></h4>

                        <p class="text-center">Publié le <?= $post['date_creation']; ?></p>

                        <p class="card-text">
                            <?= mb_substr($post['content'],0,150); ?>...
                        </p>

                        <a href="index.php?action=post&amp;id=<?= $post['id']; ?>" class="btn btn-outline-secondary">Voir en intégralité</a></p>
                    </div>

                </div>

            </article>

        <?php endforeach; ?>
    </div>
</section>


<?php $content= ob_get_clean();?>

<?php require('template.php') ?>