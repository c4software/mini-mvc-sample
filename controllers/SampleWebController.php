<?php

namespace controllers;

use utils\Template;
use utils\EmailUtils;
use controllers\base\WebController;

class SampleWebController extends WebController
{
    function home(): string
    {
        return Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }

    function exempleFormulaire(): string
    {
        // Si le formulaire a été soumis et que l'email est valide, on affiche un message de confirmation.
        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            try {
                $message = "Merci pour votre message, nous vous répondrons à l'adresse : {$_POST['email']}";
                // Envoi de l'email avec la librairie EmailUtils
                $data = array(
                    "email" => $_POST['email'],
                    "message" => "Merci pour votre message, nous vous répondrons à l'adresse.",
                );
                $subject = "Nouveau message de {$_POST['email']}";

                EmailUtils::sendEmail($_POST['email'], $subject, "contact", $data);
            } catch (\Exception $e) {
                $message = "Une erreur est survenue lors de l'envoi de votre message. Veuillez réessayer plus tard.";
            }

            return Template::render("views/sample/exemple-formulaire.php", array("message" => $message));
        }

        return Template::render("views/sample/exemple-formulaire.php");
    }

    function exemple($parametre = 'Valeur par défaut'): string
    {
        return "Voilà votre paramètre : $parametre";
    }
}
