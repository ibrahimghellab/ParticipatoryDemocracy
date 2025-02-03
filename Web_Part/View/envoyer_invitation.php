<?php
// Exemple de génération d'un token (normalement il devrait être unique et stocké dans la base de données)
$token = bin2hex(random_bytes(16)); // Génération d'un token aléatoire
// Enregistrez le token dans votre base de données ici, associé à un utilisateur.

// URL de l'invitation avec le token
$url_invitation = "https://ton-site.com/invitation.php?token=" . $token;

// Adresse e-mail de l'utilisateur
$destinataire = "ghellabibrahim@gmail.com";

// Sujet et message de l'email
$objet = "Invitation à rejoindre notre groupe";
$corps = "Bonjour,%0A%0AVous%20avez%20reçu%20une%20invitation%20à%20rejoindre%20notre%20groupe.%20Cliquez%20sur%20le%20lien%20pour%20accepter%20ou%20refuser:%20" . urlencode("https://projets.iut-orsay.fr/saes3-ttroles/Web_Part/View/signup.php?token=" . $token);

// Construction du lien mailto
$mailto_link = "mailto:" . $destinataire . "?subject=" . urlencode($objet) . "&body=" . $corps;

// Affichage du lien mailto pour l'envoi
echo "Cliquez pour envoyer l'invitation : <a href='" . $mailto_link . "'>Envoyer l'invitation</a>";
?>
