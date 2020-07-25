<?php


require_once $dburl;

class Entitie {
        protected $db;
        protected $tablename;
        protected $tablearray;
        public function __construct(){

            $this->db = new DB();
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

                /**
                 * @return mixed
                 */
                public function getTablearray()
                {
                    return $this->tablearray;
                }

                /**
                 * @param mixed $tablearray
                 */
                public function setTablearray($tablearray)
                {
                    $this->tablearray = $tablearray;
                }

                /**
                 * @param mixed $condition
                 */
                public function conditional_get($condition)
                {
                    $this->db->setTablename($this->tablename);
                    return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
                }

                /**
                 * @param mixed $condition
                 */
                public function conditional_count($condition)
                {
                    $this->db->setTablename($this->tablename);
                    return $this->db->getRows(array("where"=>$condition,"return_type"=>"count"));
                }

                /**
                 * @param mixed $condition
                 * @param mixed $filter
                 */
                public function conditional_liste($condition,$filter)
                {
                    $this->db->setTablename($this->tablename);
                    return $this->db->getRows(array("where"=>$condition,$filter,"return_type"=>"many"));
                }


                public function Querypost($sql)
                {
                    return   $this->db->updatespecificQuery($sql);
                }
                public function post()
                {
                    $this->db->setTablename($this->tablename);
                    return $id_article = $this->db->insertTable($this->tablearray);
                }
                public function put($condition)
                {
                    $this->db->setTablename($this->tablename);
                    return $id_article = $this->db->updateTable($this->tablearray,array('where'=>$condition));

                }
                protected function remove($condition){
                    $this->db->setTablename($this->tablename);
                    return $this->db->deleteTable(array("where"=>$condition));
                }
    }
?>