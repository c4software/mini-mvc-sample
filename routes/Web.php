<?php

namespace routes;

use controllers\Account;
use controllers\SampleWebController;
use controllers\VideoWeb;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();

        // Appel la méthode « home » dans le contrôleur $main.
        Route::Add('/', [$main, 'home']);
        Route::Add('/exemple', [$main, 'exemple']);

        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un test
        // l'utilisation d'un contrôleur est préférable.
        Route::Add('/exemple2/{p1}', function ($p1 = 'Valeur par défaut') {
            return "Function inline, Voilà votre paramètre : $p1";
        });

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

