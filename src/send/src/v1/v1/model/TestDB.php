<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



     namespace src\model;
use libs\system\Model;
  use src\entities\Test;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class TestDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count test =====================*/
					public function countTest(){
					                       return count($this->listeTest());
					        }

				/*================== Get test =====================*/
					public function getTest($id){
					$sql = "SELECT * FROM test WHERE test.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste test =====================*/
					public function listeTest(){
					                $sql = "SELECT * FROM test";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one test =====================*/

				/*================== One to many test =====================*/

               public function addTest($test){
                        $sql = "INSERT INTO test  VALUES(
                                     null
,
                                     '".$test->getValeur()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatetest($test){
                        $sql = "UPDATE test  SET  test.valeur =  '".$test->getValeur()."'   WHERE   test.id =  ".$test->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete test =====================*/
					public function deleteTest($id){
					$sql = "DELETE FROM test WHERE test.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If test existe =====================*/
					public function ifTestexiste($valeur){
					$sql = "SELECT * FROM test WHERE valeur='".$valeur."' ";
					if($this->db != null)
					      {
					       if($this->db->query($sql)->fetch() != null)
					         {
					                 return true;
					         }
					      } 
					return false;
					                }


           }
  
   



   ?>



