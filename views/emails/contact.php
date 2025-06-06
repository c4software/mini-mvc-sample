<?php
// Exemple de vue pour l'envoi d'un e-mail de contact (views/emails/contact.php)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            color: #555;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nouveau message reçu</h1>
        <p>Vous avez reçu un nouveau message via le formulaire de contact.</p>
        <p><strong>Email de l'expéditeur :</strong> <?php echo htmlspecialchars($email ?? 'Non fourni'); ?></p>
        <p><strong>Message :</strong></p>
        <p><?php echo nl2br(htmlspecialchars($message ?? 'Aucun message fourni')); ?></p>
        <hr>
        <p><em>Ceci est un message automatique.</em></p>
    </div>
</body>

</html>