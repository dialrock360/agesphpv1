
<?php


require_once("Db.php");


class Mouvement extends Db
{
    private $_idmv;
    private $_nommv;
    private $_date_del;
    private $_objet;
    private $_totalht;
    private $_tva;
    private $_mtsch;
    private $_mtsltr;
    private $_reg;
    private $_avans;
    private $_reste;
    private $_flag;

    /**
     * @return mixed
     */
    public function getIdmv()
    {
        return $this->_idmv;
    }

    /**
     * @param mixed $idmv
     */
    public function setIdmv($idmv)
    {
        $this->_idmv = $idmv;
    }

    /**
     * @return mixed
     */
    public function getNommv()
    {
        return $this->_nommv;
    }

    /**
     * @param mixed $nommv
     */
    public function setNommv($nommv)
    {
        $this->_nommv = $nommv;
    }

    /**
     * @return mixed
     */
    public function getDateDel()
    {
        return $this->_date_del;
    }

    /**
     * @param mixed $date_del
     */
    public function setDateDel($date_del)
    {
        $this->_date_del = $date_del;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->_objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($objet)
    {
        $this->_objet = $objet;
    }

    /**
     * @return mixed
     */
    public function getTotalht()
    {
        return $this->_totalht;
    }

    /**
     * @param mixed $totalht
     */
    public function setTotalht($totalht)
    {
        $this->_totalht = $totalht;
    }

    /**
     * @return mixed
     */
    public function getTva()
    {
        return $this->_tva;
    }

    /**
     * @param mixed $tva
     */
    public function setTva($tva)
    {
        $this->_tva = $tva;
    }

    /**
     * @return mixed
     */
    public function getMtsch()
    {
        return $this->_mtsch;
    }

    /**
     * @param mixed $mtsch
     */
    public function setMtsch($mtsch)
    {
        $this->_mtsch = $mtsch;
    }

    /**
     * @return mixed
     */
    public function getMtsltr()
    {
        return $this->_mtsltr;
    }

    /**
     * @param mixed $mtsltr
     */
    public function setMtsltr($mtsltr)
    {
        $this->_mtsltr = $mtsltr;
    }

    /**
     * @return mixed
     */
    public function getReg()
    {
        return $this->_reg;
    }

    /**
     * @param mixed $reg
     */
    public function setReg($reg)
    {
        $this->_reg = $reg;
    }

    /**
     * @return mixed
     */
    public function getAvans()
    {
        return $this->_avans;
    }

    /**
     * @param mixed $avans
     */
    public function setAvans($avans)
    {
        $this->_avans = $avans;
    }

    /**
     * @return mixed
     */
    public function getReste()
    {
        return $this->_reste;
    }

    /**
     * @param mixed $reste
     */
    public function setReste($reste)
    {
        $this->_reste = $reste;
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