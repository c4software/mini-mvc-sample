<?php

namespace models;

use models\base\SQL;
use utils\SessionHelpers;

class LogsModels extends SQL
{
    public function __construct()
    {
        parent::__construct('logs', 'id');
    }

    public function allLog()
    {
        try {
            return parent::getAll();
        } catch (\Exception $e) {
            SessionHelpers::setFlashMessage('error', 'Erreur lors de la récupération des logs : ' . $e->getMessage());
            return [];
        }
    }

    /**
     * Insert un nouveau log dans la base de données
     */
    public function addLog($level, $message, $module = null, $user_id = null, $ip_address = null)
    {
        // Requête SQL pour insérer un nouveau log
        $sql = "INSERT INTO logs (level, message, module, user_id, ip_address) VALUES (?, ?, ?, ?, ?)";

        // Prépare et exécute la requête d'insertion
        return parent::getPdo()->prepare($sql)->execute([
            $level,
            $message,
            $module,
            $user_id,
            $ip_address
        ]);
    }
}
