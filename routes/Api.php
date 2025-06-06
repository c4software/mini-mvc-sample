<?php

namespace routes;

use controllers\SampleApiController;
use routes\base\Route;

class Api
{
    function __construct()
    {
        $exampleController = new SampleApiController();

        Route::Add('/api/sample', [$exampleController, 'sample']);
        Route::Add('/api/sample/{param}', [$exampleController, 'sampleWithParam']);
    }
}
