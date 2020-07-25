
<?php


require_once("Db.php");
require_once("Utilisateur.php");
require_once("Produit.php");


class Image extends Db
{
    private $_id;
    private $_link;
    private $_origin;
    private $_flag;

    private $_User;
    private $_Prod;

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
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->_origin;
    }

    /**
     * @param mixed $origin
     */
    public function setOrigin($origin)
    {
        $this->_origin = $origin;
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

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->_User = $User;
    }

    /**
     * @return mixed
     */
    public function getProd()
    {
        return $this->_Prod;
    }

    /**
     * @param mixed $Prod
     */
    public function setProd($Prod)
    {
        $this->_Prod = $Prod;
    }



}