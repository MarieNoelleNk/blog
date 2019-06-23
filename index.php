<?php

if(session_status()== PHP_SESSION_NONE):

    session_start();

endif;

require('controller/Router.php');

$router = new Router();
$router->routerRequest();
