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
  use src\entities\Etat_stock;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
        class Etat_stockDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count etat_stock =====================*/
					public function countEtat_stock(){
					                       return count($this->listeEtat_stock());
					        }

				/*================== Get etat_stock =====================*/
					public function getEtat_stock($id){
					$sql = "SELECT * FROM etat_stock WHERE etat_stock.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste etat_stock =====================*/
					public function listeEtat_stock(){
					                $sql = "SELECT * FROM etat_stock";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one etat_stock =====================*/
					public function listeEtat_stockByFactureId($IDF){
					$sql = "SELECT * FROM etat_stock WHERE  etat_stock.IDF = ".$IDF."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many etat_stock =====================*/
					public function listeFactureByEtat_stockId($IDF){
					$sql = "SELECT * FROM facture WHERE  facture.IDF = ".$IDF."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addEtat_stock($etat_stock){
                        $sql = "INSERT INTO etat_stock  VALUES(
                                     null
,
                                     ".$etat_stock->getIdf()."
,
                                     '".$etat_stock->getQnt_av()."'
,
                                     '".$etat_stock->getQnt_apr()."'
,
                                     '".$etat_stock->getDatestk()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateetat_stock($etat_stock){
                        $sql = "UPDATE etat_stock  SET  etat_stock.IDF =  '".$etat_stock->getIdf()."' ,etat_stock.QNT_AV =  '".$etat_stock->getQnt_av()."' ,etat_stock.QNT_APR =  '".$etat_stock->getQnt_apr()."' ,etat_stock.DATESTK =  '".$etat_stock->getDatestk()."'   WHERE   etat_stock.id =  ".$etat_stock->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete etat_stock =====================*/
					public function deleteEtat_stock($id){
					$sql = "DELETE FROM etat_stock WHERE etat_stock.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If etat_stock existe =====================*/
					public function ifEtat_stockexiste($IDF){
					$sql = "SELECT * FROM etat_stock WHERE IDF='".$IDF."' ";
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



