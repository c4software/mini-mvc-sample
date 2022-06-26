<?php
namespace utils;

class Template
{
    static function render($filepath, $variables = array()): void
    {
        // Déclare l'ensemble des variables présent dans la variable $variales pour
        // les rendres accessibles directement. Exemple :
        // array("nom" => "Brosseau", "prenom" => "Valentin") va générer
        // $nom = "Brosseau" et $prenom = "Valentin"
        extract($variables);
        include($filepath);
    }
}