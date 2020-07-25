
<?php


require_once("Db.php");


class Frontend extends Db
{
    private $_id;
    private $_libele;
    private $_cible;
    private $_fsection;

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
    public function getLibele()
    {
        return $this->_libele;
    }

    /**
     * @param mixed $libele
     */
    public function setLibele($libele)
    {
        $this->_libele = $libele;
    }

    /**
     * @return mixed
     */
    public function getCible()
    {
        return $this->_cible;
    }

    /**
     * @param mixed $cible
     */
    public function setCible($cible)
    {
        $this->_cible = $cible;
    }

    /**
     * @return mixed
     */
    public function getFsection()
    {
        return $this->_fsection;
    }

    /**
     * @param mixed $fsection
     */
    public function setFsection($fsection)
    {
        $this->_fsection = $fsection;
    }





}