<?php $title = "Mon Blog"; ?>

<?php  ob_start();?>

<section id="login">
    <h3 class="text-center text-white pt-5">formulaire de connexion</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">

                    <form id="login-form" class="form" action="index.php?action=login" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="login" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control"required>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info btn-md" value="se connecter">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content= ob_get_clean();?>

<?php require('template.php') ?>
