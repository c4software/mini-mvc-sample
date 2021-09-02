<?php

namespace routes;

use controllers\SampleApi;
use routes\base\Route;

class Api
{
    function __construct()
    {
        $videoApiController = new SampleApi();

        Route::Add('/api/sample', [$videoApiController, 'sample']);
    }
}

