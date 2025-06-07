<?php

use utils\SessionHelpers;
?>

<div class="container">
    <div class="page-header">
        <h1 class="page-title">
            <i class="icon-logs"></i>
            Journaux Système
        </h1>
        <p class="page-description">Consultez et gérez les logs de l'application</p>
    </div>

    <?php if ($message = SessionHelpers::getFlashMessage('success')): ?>
        <div class="alert alert-success">
            <strong>Succès!</strong> <?= htmlspecialchars($message); ?>
        </div>
    <?php elseif ($message = SessionHelpers::getFlashMessage('error')): ?>
        <div class="alert alert-danger">
            <strong>Erreur!</strong> <?= htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <div class="logs-section">
        <?php if (!empty($logs)): ?>
            <div class="logs-header">
                <h2>Liste des logs</h2>
                <div class="logs-count">
                    <span class="count-badge"><?= count($logs); ?></span> entrées
                </div>
            </div>

            <div class="table-responsive">
                <table class="logs-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Niveau</th>
                            <th>Message</th>
                            <th>Module</th>
                            <th>Utilisateur</th>
                            <th>IP</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $log): ?>
                            <tr class="log-row log-level-<?= strtolower($log->level); ?>">
                                <td class="log-id">#<?= htmlspecialchars($log->id); ?></td>
                                <td>
                                    <span class="badge level-<?= strtolower($log->level); ?>">
                                        <?= htmlspecialchars($log->level); ?>
                                    </span>
                                </td>
                                <td class="log-message"><?= htmlspecialchars($log->message); ?></td>
                                <td class="log-module"><?= htmlspecialchars($log->module); ?></td>
                                <td><?= $log->user_id ? '#' . htmlspecialchars($log->user_id) : '<span class="text-muted">-</span>'; ?></td>
                                <td class="log-ip"><?= htmlspecialchars($log->ip_address); ?></td>
                                <td class="log-date"><?= date('d/m/Y H:i', strtotime($log->created_at)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <div class="empty-icon">📋</div>
                <h3>Aucun log trouvé</h3>
                <p>Il n'y a actuellement aucune entrée de log dans le système.</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="add-log-section">
        <div class="section-header">
            <h2>Ajouter un nouveau log</h2>
            <p>Créez manuellement une entrée de log pour les tests</p>
        </div>

        <div class="form-container">
            <form action="/addLog" method="POST" class="log-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="level">Niveau *</label>
                        <select id="level" name="level" required>
                            <option value="">Sélectionner un niveau</option>
                            <option value="INFO">Info</option>
                            <option value="WARN">Avertissement</option>
                            <option value="ERROR">Erreur</option>
                            <option value="DEBUG">Debug</option>
                            <option value="FATAL">Fatal</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="module">Module *</label>
                        <input type="text" id="module" name="module" placeholder="Ex: auth, database, api..." required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="3" placeholder="Décrivez l'événement..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="user_id">ID Utilisateur</label>
                    <input type="number" id="user_id" name="user_id" placeholder="Optionnel">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <span>+</span> Ajouter le log
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-header {
        margin-bottom: 40px;
        text-align: center;
        padding: 30px 0;
        border-radius: 12px;
        margin: -20px -20px 40px -20px;
    }

    .page-title {
        font-size: 2.5rem;
        margin: 0 0 10px 0;
        font-weight: 700;
    }

    .page-description {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }

    /* Section des logs */
    .logs-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 40px;
        overflow: hidden;
    }

    .logs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 25px 30px;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }

    .logs-header h2 {
        margin: 0;
        color: #495057;
    }

    .logs-count {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        color: #6c757d;
    }

    .count-badge {
        background: #007bff;
        color: white;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.9rem;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .logs-table {
        width: 100%;
        border-collapse: collapse;
    }

    .logs-table th {
        background: #f8f9fa;
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        color: #495057;
        border-bottom: 2px solid #dee2e6;
    }

    .logs-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
    }

    .log-row:hover {
        background-color: #f8f9fa;
    }

    .log-id {
        font-family: monospace;
        font-weight: 600;
        color: #6c757d;
    }

    .log-message {
        max-width: 300px;
        word-wrap: break-word;
    }

    .log-module {
        font-family: monospace;
        background: #e9ecef;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.9rem;
    }

    .log-ip {
        font-family: monospace;
        font-size: 0.9rem;
    }

    .log-date {
        font-size: 0.9rem;
        color: #6c757d;
    }

    .text-muted {
        color: #adb5bd;
    }

    /* Badges de niveau */
    .badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .level-info {
        background-color: #cff4fc;
        color: #055160;
        border: 1px solid #b6effb;
    }

    .level-error {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
    }

    .level-warn {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffecb5;
    }

    .level-debug {
        background-color: #d1e7dd;
        color: #0f5132;
        border: 1px solid #badbcc;
    }

    .level-fatal {
        background-color: #f8d7da;
        color: #842029;
        border: 2px solid #dc3545;
        font-weight: bold;
    }

    /* État vide */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        color: #6c757d;
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 20px;
    }

    .empty-state h3 {
        margin: 0 0 10px 0;
        color: #495057;
    }

    /* Section formulaire */
    .add-log-section {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .section-header {
        padding: 25px 30px;
        background: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }

    .section-header h2 {
        margin: 0 0 5px 0;
        color: #495057;
    }

    .section-header p {
        margin: 0;
        color: #6c757d;
    }

    .form-container {
        padding: 30px;
    }

    .log-form {
        max-width: 600px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #495057;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    }

    .form-actions {
        padding-top: 10px;
    }

    .btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .logs-header {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }

        .logs-table {
            font-size: 0.9rem;
        }

        .logs-table th,
        .logs-table td {
            padding: 10px 12px;
        }
    }
</style>