
<?php


require_once("Db.php");


class Condis extends Db
{
    private $_idc;
    private $_nomc;

    /**
     * @return mixed
     */
    public function getIdc()
    {
        return $this->_idc;
    }

    /**
     * @param mixed $idc
     */
    public function setIdc($idc)
    {
        $this->_idc = $idc;
    }

    /**
     * @return mixed
     */
    public function getNomc()
    {
        return $this->_nomc;
    }

    /**
     * @param mixed $nomc
     */
    public function setNomc($nomc)
    {
        $this->_nomc = $nomc;
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
    private $_flag;




}