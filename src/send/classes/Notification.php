
  <?php


require_once("Db.php");


class notification extends Db
{
    private $_id;
    private $_ido;
    private $_origine;
    private $_cible;
    private $_texte;
    private $_date;
    private $_etat;
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
    public function getIdo()
    {
        return $this->_ido;
    }

    /**
     * @param mixed $ido
     */
    public function setIdo($ido)
    {
        $this->_ido = $ido;
    }

    /**
     * @return mixed
     */
    public function getOrigine()
    {
        return $this->_origine;
    }

    /**
     * @param mixed $origine
     */
    public function setOrigine($origine)
    {
        $this->_origine = $origine;
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
    public function getTexte()
    {
        return $this->_texte;
    }

    /**
     * @param mixed $texte
     */
    public function setTexte($texte)
    {
        $this->_texte = $texte;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->_etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->_etat = $etat;
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