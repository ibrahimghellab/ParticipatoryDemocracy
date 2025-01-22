<?php class Modele
{
    public function get($cle)
    {
        return $this->$cle;
    }

    public function set($cle, $valeur)
    {
        $this->$cle = $valeur;
    }
}

?>