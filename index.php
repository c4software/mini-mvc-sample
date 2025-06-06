<?php

use routes\base\Router;
use utils\SessionHelpers;

include("autoload.php"); // Pour les classes internes (controllers, utils, routes, etc.)
include("vendor/autoload.php"); // Pour les librairies externes. (PHPMailer, etc.)



/*
 * Permet l'utilisation du serveur PHP interne et l'affichage des contenus static.
 */
if (php_sapi_name() == 'cli-server') {
    if (str_starts_with($_SERVER["REQUEST_URI"], '/public/')) {
        return false;
    }
}

class EntryPoint
{
    private Router $router;
    private SessionHelpers $sessionHelpers;

    function __construct()
    {
        $this->sessionHelpers = new SessionHelpers();

        $this->router = new Router();
        $this->router->LoadRequestedPath();
    }
}

new EntryPoint();
