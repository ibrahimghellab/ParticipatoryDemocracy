<?php
require_once("modele.php");
class Role extends Modele
{
    public static function getAll()
    {
        $url = 'https://projets.iut-orsay.fr/saes3-ttroles/ParticipatoryDemocracy/API/roles';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Erreur cURL: ' . curl_error($ch);
            return null;
        }
        curl_close($ch);
        return $response;
    }
}