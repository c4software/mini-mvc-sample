<?php

namespace routes;

use cli\Internal;
use routes\base\Route;

class Cli
{
    function __construct()
    {
        $internal = new Internal();
        Route::Add('serve', [$internal, 'serve']); # Démarrage du serveur de développement

        Route::Add('db:migrate', [$internal, 'dbMigrate']); # Migration de la base de données
        Route::Add('controller:create', [$internal, 'createController']); # Création d'un contrôleur
        Route::Add('model:create', [$internal, 'createModel']); # Création d'un modèle

        # Alias for compatibility with Laravel
        Route::Add('make:controller', [$internal, 'createController']);
        Route::Add('make:model', [$internal, 'createModel']);
    }
}
