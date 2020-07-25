
<?php


require_once("Db.php");


class Produit extends Db
{
    private $_idp;
    private $_desi;
    private $_prixa;
    private $_prixv;
    private $_qnt;
    private $_ftech;
    private $_flag;

    /**
     * @return mixed
     */
    public function getIdp()
    {
        return $this->_idp;
    }

    /**
     * @param mixed $idp
     */
    public function setIdp($idp)
    {
        $this->_idp = $idp;
    }

    /**
     * @return mixed
     */
    public function getDesi()
    {
        return $this->_desi;
    }

    /**
     * @param mixed $desi
     */
    public function setDesi($desi)
    {
        $this->_desi = $desi;
    }

    /**
     * @return mixed
     */
    public function getPrixa()
    {
        return $this->_prixa;
    }

    /**
     * @param mixed $prixa
     */
    public function setPrixa($prixa)
    {
        $this->_prixa = $prixa;
    }

    /**
     * @return mixed
     */
    public function getPrixv()
    {
        return $this->_prixv;
    }

    /**
     * @param mixed $prixv
     */
    public function setPrixv($prixv)
    {
        $this->_prixv = $prixv;
    }

    /**
     * @return mixed
     */
    public function getQnt()
    {
        return $this->_qnt;
    }

    /**
     * @param mixed $qnt
     */
    public function setQnt($qnt)
    {
        $this->_qnt = $qnt;
    }

    /**
     * @return mixed
     */
    public function getFtech()
    {
        return $this->_ftech;
    }

    /**
     * @param mixed $ftech
     */
    public function setFtech($ftech)
    {
        $this->_ftech = $ftech;
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