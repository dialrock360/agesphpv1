
<?php


require_once("Db.php");


class Utilisateur extends Db
{
    protected $_idu;
    protected $_cni;
    protected $_nom;
    protected $_adresse;
    protected $_email;
    protected $_tel;
    protected $_infos;
    protected $_flag;

    /**
     * @return mixed
     */
    public function getIdu()
    {
        return $this->_idu;
    }

    /**
     * @param mixed $idu
     */
    public function setIdu($idu)
    {
        $this->_idu = $idu;
    }

    /**
     * @return mixed
     */
    public function getCni()
    {
        return $this->_cni;
    }

    /**
     * @param mixed $cni
     */
    public function setCni($cni)
    {
        $this->_cni = $cni;
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
    public function getAdresse()
    {
        return $this->_adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->_adresse = $adresse;
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
    public function getInfos()
    {
        return $this->_infos;
    }

    /**
     * @param mixed $infos
     */
    public function setInfos($infos)
    {
        $this->_infos = $infos;
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