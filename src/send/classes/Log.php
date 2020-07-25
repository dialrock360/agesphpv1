
<?php


require_once("Db.php");


class log extends Db
{
    private $_id;
    private $_idmv;
    private $_nommv;
    private $_datelog;
    private $_flag;

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
    public function getDatelog()
    {
        return $this->_datelog;
    }

    /**
     * @param mixed $datelog
     */
    public function setDatelog($datelog)
    {
        $this->_datelog = $datelog;
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