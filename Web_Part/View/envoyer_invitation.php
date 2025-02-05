<?php
$token = bin2hex(random_bytes(16)); 

$url_invitation = "https://ton-site.com/invitation.php?token=" . $token;

$destinataire = "ghellabibrahim@gmail.com";

$objet = "Invitation à rejoindre notre groupe";
$corps = "Bonjour,%0A%0AVous%20avez%20reçu%20une%20invitation%20à%20rejoindre%20notre%20groupe.%20Cliquez%20sur%20le%20lien%20pour%20accepter%20ou%20refuser:%20" . urlencode("https://projets.iut-orsay.fr/saes3-ttroles/Web_Part/View/signup.php?token=" . $token);

$mailto_link = "mailto:" . $destinataire . "?subject=" . urlencode($objet) . "&body=" . $corps;

echo "Cliquez pour envoyer l'invitation : <a href='" . $mailto_link . "'>Envoyer l'invitation</a>";
?>
