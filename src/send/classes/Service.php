

<?php


require_once("Db.php");


class Service extends Db
{
    private $_id;
    private $_ninea;
    private $_nom;
    private $_sigle;
    private $_flag;
    private $_email;
    private $_tel;
    private $_secteur_E;
    private $_type;
    private $_ca;
    private $_logo;

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
    public function getNinea()
    {
        return $this->_ninea;
    }

    /**
     * @param mixed $ninea
     */
    public function setNinea($ninea)
    {
        $this->_ninea = $ninea;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getSigle()
    {
        return $this->_sigle;
    }

    /**
     * @param mixed $sigle
     */
    public function setSigle($sigle)
    {
        $this->_sigle = $sigle;
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
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->_tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->_tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getSecteurE()
    {
        return $this->_secteur_E;
    }

    /**
     * @param mixed $secteur_E
     */
    public function setSecteurE($secteur_E)
    {
        $this->_secteur_E = $secteur_E;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getCa()
    {
        return $this->_ca;
    }

    /**
     * @param mixed $ca
     */
    public function setCa($ca)
    {
        $this->_ca = $ca;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->_logo;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        $this->_logo = $logo;
    }


}