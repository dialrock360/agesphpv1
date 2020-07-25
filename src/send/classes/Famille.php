
<?php


require_once("Db.php");


class Famille extends Db
{
    private $_iDFA;
    private $_dESI;
    private $_dEPENSE;
    private $_sTOCK;
    private $_cOLOR;
    private $_fLAG;

    /**
     * @return mixed
     */
    public function getIDFA()
    {
        return $this->_iDFA;
    }

    /**
     * @param mixed $iDFA
     */
    public function setIDFA($iDFA)
    {
        $this->_iDFA = $iDFA;
    }

    /**
     * @return mixed
     */
    public function getDESI()
    {
        return $this->_dESI;
    }

    /**
     * @param mixed $dESI
     */
    public function setDESI($dESI)
    {
        $this->_dESI = $dESI;
    }

    /**
     * @return mixed
     */
    public function getDEPENSE()
    {
        return $this->_dEPENSE;
    }

    /**
     * @param mixed $dEPENSE
     */
    public function setDEPENSE($dEPENSE)
    {
        $this->_dEPENSE = $dEPENSE;
    }

    /**
     * @return mixed
     */
    public function getSTOCK()
    {
        return $this->_sTOCK;
    }

    /**
     * @param mixed $sTOCK
     */
    public function setSTOCK($sTOCK)
    {
        $this->_sTOCK = $sTOCK;
    }

    /**
     * @return mixed
     */
    public function getCOLOR()
    {
        return $this->_cOLOR;
    }

    /**
     * @param mixed $cOLOR
     */
    public function setCOLOR($cOLOR)
    {
        $this->_cOLOR = $cOLOR;
    }

    /**
     * @return mixed
     */
    public function getFLAG()
    {
        return $this->_fLAG;
    }

    /**
     * @param mixed $fLAG
     */
    public function setFLAG($fLAG)
    {
        $this->_fLAG = $fLAG;
    }





}