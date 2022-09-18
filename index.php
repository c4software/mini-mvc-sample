<?php

use routes\base\Router;
use utils\SessionHelpers;

include("autoload.php");

class EntryPoint{
    private Router $router;
    private SessionHelpers $sessionHelpers;

    function __construct(){
        $this->sessionHelpers = new SessionHelpers();

        $this->router = new Router();
        $this->router->LoadRequestedPath();
    }
}

new EntryPoint();