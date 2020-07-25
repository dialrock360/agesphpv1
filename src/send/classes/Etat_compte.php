
<?php


require_once("Db.php");


class Etat_compte extends Db
{
    private $_id;
    private $_IDFA;
    private $_FLUX;
    private $_mONTANT;
    private $_dATE;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getIDFA()
    {
        return $this->_IDFA;
    }

    /**
     * @param mixed $IDFA
     */
    public function setIDFA($IDFA)
    {
        $this->_IDFA = $IDFA;
    }

    /**
     * @return mixed
     */
    public function getFLUX()
    {
        return $this->_FLUX;
    }

    /**
     * @param mixed $FLUX
     */
    public function setFLUX($FLUX)
    {
        $this->_FLUX = $FLUX;
    }

    /**
     * @return mixed
     */
    public function getMONTANT()
    {
        return $this->_mONTANT;
    }

    /**
     * @param mixed $mONTANT
     */
    public function setMONTANT($mONTANT)
    {
        $this->_mONTANT = $mONTANT;
    }

    /**
     * @return mixed
     */
    public function getDATE()
    {
        return $this->_dATE;
    }

    /**
     * @param mixed $dATE
     */
    public function setDATE($dATE)
    {
        $this->_dATE = $dATE;
    }




}