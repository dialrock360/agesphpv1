
<?php


require_once("Db.php");


class Employer extends Db
{
    private $_prenom;
    private $_login;
    private $_sexe_user;
    private $_poste;
    private $_salaire;
    private $_datnais;
    private $_datem;
    private $_levesecurity;
    private $_passe;
    private $_photo;
    private $_flag;

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->_prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->_prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->_login = $login;
    }

    /**
     * @return mixed
     */
    public function getSexeUser()
    {
        return $this->_sexe_user;
    }

    /**
     * @param mixed $sexe_user
     */
    public function setSexeUser($sexe_user)
    {
        $this->_sexe_user = $sexe_user;
    }

    /**
     * @return mixed
     */
    public function getPoste()
    {
        return $this->_poste;
    }

    /**
     * @param mixed $poste
     */
    public function setPoste($poste)
    {
        $this->_poste = $poste;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->_salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire)
    {
        $this->_salaire = $salaire;
    }

    /**
     * @return mixed
     */
    public function getDatnais()
    {
        return $this->_datnais;
    }

    /**
     * @param mixed $datnais
     */
    public function setDatnais($datnais)
    {
        $this->_datnais = $datnais;
    }

    /**
     * @return mixed
     */
    public function getDatem()
    {
        return $this->_datem;
    }

    /**
     * @param mixed $datem
     */
    public function setDatem($datem)
    {
        $this->_datem = $datem;
    }

    /**
     * @return mixed
     */
    public function getLevesecurity()
    {
        return $this->_levesecurity;
    }

    /**
     * @param mixed $levesecurity
     */
    public function setLevesecurity($levesecurity)
    {
        $this->_levesecurity = $levesecurity;
    }

    /**
     * @return mixed
     */
    public function getPasse()
    {
        return $this->_passe;
    }

    /**
     * @param mixed $passe
     */
    public function setPasse($passe)
    {
        $this->_passe = $passe;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->_photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->_photo = $photo;
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