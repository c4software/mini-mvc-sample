<?php

namespace controllers;

use utils\Template;
use models\LogsModels;
use utils\SessionHelpers;
use controllers\base\WebController;

class LogsController extends WebController
{
    private $logModel;

    /**
     * Constructeur de la classe LogsController
     */
    public function __construct()
    {
        $this->logModel = new LogsModels();
    }

    /**
     * Affiche la liste des logs
     */
    public function index()
    {
        return Template::render("views/logs/index.php", array(
            "logs" => $this->logModel->allLog()
        ));
    }

    /**
     * Methode pour ajouter un log
     */
    public function addLog()
    {
        // Récupération des données du formulaire
        $level = $_POST['level'] ?? 'INFO'; // Niveau de log, par défaut 'INFO'
        $module = $_POST['module'] ?? ''; // Module concerné
        $message = $_POST['message'] ?? ''; // Message du log
        $user_id = $_POST['user_id'] ?? null; // ID utilisateur (optionnel)

        // Récupération de l'adresse IP de l'utilisateur
        $ip_address = $_SERVER['REMOTE_ADDR'] ?? '';

        try {
            $this->logModel->addLog($level, $message, $module, $user_id, $ip_address);
            SessionHelpers::setFlashMessage('success', 'Log ajouté avec succès !');
        } catch (\Exception $e) {
            SessionHelpers::setFlashMessage('error', 'Erreur lors de l\'ajout du log : ' . $e->getMessage());
        }

        return Parent::redirect('/logs');
    }
}
