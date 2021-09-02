<?php

namespace controllers;

use controllers\base\Api;

class SampleApi extends Api
{
    function sample()
    {
        echo json_encode(array("Ceci est un exemple", "de", "tableau"));
    }
}