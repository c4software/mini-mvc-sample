<?php

namespace controllers;

use controllers\base\Web;

class SampleWeb extends Web
{
    function home()
    {
        $this->header();
        include("views/global/home.php");
        $this->footer();
    }
}