

<?php


require_once("Db.php");


class Facture extends Db
{
    private $_iDF;
    private $_IDP;
    private $_IDFA;
    private  $_pU;
    private  $_qNT;
    private  $_mTS;
    private  $_tYPEF;
    private  $_dATEF;
    private  $_rOW;
    private  $_fDESI;
    private  $_fCONDIS;
    private  $_fLAG;

    /**
     * @return mixed
     */
    public function getIDF()
    {
        return $this->_iDF;
    }

    /**
     * @param mixed $iDF
     */
    public function setIDF($iDF)
    {
        $this->_iDF = $iDF;
    }

    /**
     * @return mixed
     */
    public function getIDP()
    {
        return $this->_IDP;
    }

    /**
     * @param mixed $IDP
     */
    public function setIDP($IDP)
    {
        $this->_IDP = $IDP;
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
    public function getPU()
    {
        return $this->_pU;
    }

    /**
     * @param mixed $pU
     */
    public function setPU($pU)
    {
        $this->_pU = $pU;
    }

    /**
     * @return mixed
     */
    public function getQNT()
    {
        return $this->_qNT;
    }

    /**
     * @param mixed $qNT
     */
    public function setQNT($qNT)
    {
        $this->_qNT = $qNT;
    }

    /**
     * @return mixed
     */
    public function getMTS()
    {
        return $this->_mTS;
    }

    /**
     * @param mixed $mTS
     */
    public function setMTS($mTS)
    {
        $this->_mTS = $mTS;
    }

    /**
     * @return mixed
     */
    public function getTYPEF()
    {
        return $this->_tYPEF;
    }

    /**
     * @param mixed $tYPEF
     */
    public function setTYPEF($tYPEF)
    {
        $this->_tYPEF = $tYPEF;
    }

    /**
     * @return mixed
     */
    public function getDATEF()
    {
        return $this->_dATEF;
    }

    /**
     * @param mixed $dATEF
     */
    public function setDATEF($dATEF)
    {
        $this->_dATEF = $dATEF;
    }

    /**
     * @return mixed
     */
    public function getROW()
    {
        return $this->_rOW;
    }

    /**
     * @param mixed $rOW
     */
    public function setROW($rOW)
    {
        $this->_rOW = $rOW;
    }

    /**
     * @return mixed
     */
    public function getFDESI()
    {
        return $this->_fDESI;
    }

    /**
     * @param mixed $fDESI
     */
    public function setFDESI($fDESI)
    {
        $this->_fDESI = $fDESI;
    }

    /**
     * @return mixed
     */
    public function getFCONDIS()
    {
        return $this->_fCONDIS;
    }

    /**
     * @param mixed $fCONDIS
     */
    public function setFCONDIS($fCONDIS)
    {
        $this->_fCONDIS = $fCONDIS;
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