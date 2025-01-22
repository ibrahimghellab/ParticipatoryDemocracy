<?php

require_once("modele.php");
class User extends Modele
{
    private $idGroupe;
    private $nomGroupe;
    private $imageGroupe;
    private $couleurGroupe;
    private $dateCreation;
    private $description;


    public function __construct($tab)
    {
        foreach ($tab as $cle => $valeur) {
            $this->set($cle, $valeur);
        }
    }


}