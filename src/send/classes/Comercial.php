
<?php


require_once("utilisateur.php");


class Comercial extends utilisateur
{
    private $_statut;

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->_statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->_statut = $statut;
    }


}