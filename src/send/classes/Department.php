
<?php


require_once("Db.php");


class Department extends Db
{
    private $_idd;
    private $_nomd;
    private $_id;

    /**
     * @return mixed
     */
    public function getIdd()
    {
        return $this->_idd;
    }

    /**
     * @param mixed $idd
     */
    public function setIdd($idd)
    {
        $this->_idd = $idd;
    }

    /**
     * @return mixed
     */
    public function getNomd()
    {
        return $this->_nomd;
    }

    /**
     * @param mixed $nomd
     */
    public function setNomd($nomd)
    {
        $this->_nomd = $nomd;
    }

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






}