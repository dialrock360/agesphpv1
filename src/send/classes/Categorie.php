<?php


require_once("Db.php");


class Categorie extends Db
{
    private $_id_cat;
    private $_nom_cat;
    private $_achat;
    private $_vente;
    private $_flag;

    /**
     * @return mixed
     */
    public function getIdCat()
    {
        return $this->_id_cat;
    }

    /**
     * @param mixed $id_cat
     */
    public function setIdCat($id_cat)
    {
        $this->_id_cat = $id_cat;
    }

    /**
     * @return mixed
     */
    public function getNomCat()
    {
        return $this->_nom_cat;
    }

    /**
     * @param mixed $nom_cat
     */
    public function setNomCat($nom_cat)
    {
        $this->_nom_cat = $nom_cat;
    }

    /**
     * @return mixed
     */
    public function getAchat()
    {
        return $this->_achat;
    }

    /**
     * @param mixed $achat
     */
    public function setAchat($achat)
    {
        $this->_achat = $achat;
    }

    /**
     * @return mixed
     */
    public function getVente()
    {
        return $this->_vente;
    }

    /**
     * @param mixed $vente
     */
    public function setVente($vente)
    {
        $this->_vente = $vente;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->_flag;
    }

    /**
     * @param mixed $flag
     */
    public function setFlag($flag)
    {
        $this->_flag = $flag;
    }




}