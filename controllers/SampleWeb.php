<?php

namespace controllers;

use controllers\base\Web;
use utils\Template;

class SampleWeb extends Web
{
    function home()
    {
        $this->header();
        Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
        $this->footer();
    }
}