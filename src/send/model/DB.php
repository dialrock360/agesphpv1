<?php
/*
 * DB Class
 * This class is used for database related (connect, insert, update, and delete) operations
 * @author    CodexWorld.com
 * @url        http://www.codexworld.com
 * @license    http://www.codexworld.com/license
 */
 
 require_once "dao/database.php";

class DB  {

    private  $tablename;
    private  $databasename;
    private $post_token;
    /*================== Constructor =====================*/

        private $db;
        public function __construct(){
            if(connexion_params()['etat'] == 'on')
            {
                require_once "dao/PHP_DB_Connection.lib.class.php";
                $this->db = getConnexion();
            }
        }
    /**
     * @return mixed
     */
    public function getDatabasename()
    {
        return $this->databasename;
    }

    /**
     * @param mixed $databasename
     */
    public function setDatabasename($databasename)
    {
        $this->databasename = $databasename;
    }

    /**
     * @return mixed
     */
    public function getTablename()
    {
        return $this->tablename;
    }

    /**
     * @param mixed $tablename
     */
    public function setTablename($tablename)
    {
        $this->tablename = $tablename;
    }



    /*
     * Returns rows from the database based on the conditions
     * @param string name of the table
     * @param array select, where, order_by, limit and return_type conditions
     */
    public function getRows($conditions = array(),$cmd=''){
        $sql=($cmd=='')?'SELECT ':' '.$cmd.' ';
        $sql .=($cmd=='')? array_key_exists("select",$conditions)?$conditions['select']:'*':"";
        $sql .= ($cmd=='')?' FROM '.$this->tablename: "";
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $champ => $value){
                $sep = ($i > 0)?' AND ':'';
                $val = ($value =="")?'INJECTAR':$value;
                $sql .= $sep.$champ." = '".$val."'";
                $i++;
            }
        }

        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by'];
        }
        if(array_key_exists("group_by",$conditions)){
            $sql .= ' GROUP BY '.$conditions['group_by'];
        }

        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['limit'];
        }
        /*
echo $sql;
        echo  '<hr/><hr/><hr/>';*/
        $result = $this->db->query($sql);

        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $result->rowCount();
                    break;
                case 'single':
                    $data = $result->fetch();
                    break;
                case 'many':
                    $data = $result->fetchAll();
                    break;
                default:
                    $data = '';
            }
        }else{
            if($this->db != null){
                while($row = $result->fetchAll()){
                    $data[] = $row;
                }
            }
        }

        if($this->db != null)
        {
            return $data;
        }else{
            return null;
        }

    }

 
	    public function getspecificQuery($sql,$returntype='all'){
 

        if($this->db != null)
        {
			 switch($returntype){
                case 'count':
                    $data = $this->db->query($sql)->rowCount();
                    break;
                case 'single':
                    $data = $this->db->query($sql)->fetch();
                    break;
                case 'all':
                    $data = $this->db->query($sql)->fetchAll();
                    break;
                default:
                    $data = '';
            } 
        }
		 return $data ;

    }
    /*
     * Update data into the database*/

    public function updatespecificQuery($req){

        $update = $this->db->exec($req);
        return $update?$update:0;

    }

    /*
     * Delete data from the database
     * @param string name of the table
     * @param array where condition on deleting data
     */


    public function updateTable($rows = array(),$conditions = array()){

        $sql = "UPDATE ".$this->tablename."  SET ";
        $x = 0;
        foreach($rows as $champ => $value){
            $sep = ($x > 0)?' , ':'';
            $sql .= $sep.$champ." = '".htmlspecialchars($value)."'";
            $x++;
        }
        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $champ => $value){
                $sep = ($i > 0)?' AND ':'';
                $val = ($value =="")?'INJECTAR':$value;
                $sql .= $sep.$champ." = '".$val."'";
                $i++;
            }
        }

        /*echo $sql.'<hr>';
        return 1;*/
        //$sql = "UPDATE ".$table."  SET ".$table.".".$champ." =  '".$value."'     WHERE   ".$table.".id =  ".$id."  ";



        if($this->db != null)
        {
            // echo $sql;
            return $this->db->exec($sql);
        }else{
            return null;
        }
    }
    public function deleteTable($conditions = array()){

        $sql = "DELETE FROM  ".$this->tablename." ";


        if(array_key_exists("where",$conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions['where'] as $champ => $value){
                $sep = ($i > 0)?' AND ':'';
                $val = ($value =="")?'INJECTAR':$value;
                $sql .= $sep.$champ." = '".$val."'";
                $i++;
            }
        }

        /* echo $sql.'<hr>';
        return 1;*/


        if($this->db != null)
        {
            // echo $sql;
            return $this->db->exec($sql);
        }else{
            return null;
        }
    }
    public function insertTable($rows = array()){
        $keys = array();
        $values = array();
        $sql = "INSERT INTO ".$this->tablename."  (";

        foreach($rows as $champ => $value){
            $keys[]=$champ;
            $values[]=($value =="null" || $value =="NOW()")?$value:"'".htmlspecialchars($value)."'";
        }

        $sql .= implode(",",$keys);
        $sql .= " ) VALUES ";
        $sql .= "( ";
        $sql .= implode(",",$values);
        $sql .= " ) ";

       /* echo $sql.'<hr>';
        return 1;*/
        //INSERT INTO `status`(`id`, `nom_status`) VALUES ([value-1],[value-2]);

        if($this->db != null)
        {
            $this->db->exec($sql);
            return $this->db->lastInsertId();//Si la clé primaire est auto_increment
        }else{
            return null;
        }
    }
    public function replaceTable($rows = array()){
        $keys = array();
        $values = array();
        $sql = "REPLACE INTO ".$this->tablename."  (";

        foreach($rows as $champ => $value){
            $keys[]=$champ;
            $values[]=($value =="NOW()")?$value:"'".htmlspecialchars($value)."'";

        }

        $sql .= implode(",",$keys);
        $sql .= " ) VALUES ";
        $sql .= "( ";
        $sql .= implode(",",$values);
        $sql .= " ) ";

       /* echo $sql.'<hr>';
        return 1;*/
        //INSERT INTO `status`(`id`, `nom_status`) VALUES ([value-1],[value-2]);

        if($this->db != null)
        {
            $this->db->exec($sql);
            return $this->db->lastInsertId();//Si la clé primaire est auto_increment
        }else{
            return null;
        }
    }
    public function insertTable2($rows = array()){
        $keys = array();
        $values = array();
        $sql = "INSERT INTO ".$this->tablename."  (";

        foreach($rows as $champ => $value){
            $keys[]=$champ;
            $values[]=($value =="null")?$value:"'".htmlentities($value)."'";
        }

        $sql .= implode(",",$keys);
        $sql .= " ) VALUES ";
        $sql .= "( ";
        $sql .= implode(",",$values);
        $sql .= " ) ";

       /* echo $sql.'<hr>';
        return 1;*/
        //INSERT INTO `status`(`id`, `nom_status`) VALUES ([value-1],[value-2]);
        if($this->db != null)
        {
            $this->db->exec($sql);
            return $this->db->lastInsertId();//Si la clé primaire est auto_increment
        }else{
            return null;
        }



    }

    /**
     * @return mixed
     */
    public function getPostToken()
    {
        return $this->post_token;
    }

    /**
     * @param mixed $post_token
     */
    public function setPostToken($post_token)
    {
        $this->post_token = $post_token;
    }


    private function referer(){
        if (isset($_SESSION['token']) AND isset($this->post_token ) AND !empty($_SESSION['token']) AND !empty($this->post_token ))

        {
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $actual_method_name = __FUNCTION__;

            // On vérifie que les deux correspondent
            if ($_SESSION['token'] == $this->post_token ) {
             return true;
            }
        }
        return false;
    }

    public function makeDatabase($cmd){
        $sql =strtoupper($cmd)." DATABASE ".$this->databasename;
        if($this->db != null)
        {
            // echo $sql;
            return $this->db->exec($sql);
        }else{
            return null;
        }
    }
    public  function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public  function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }


}