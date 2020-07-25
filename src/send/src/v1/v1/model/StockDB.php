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
  use src\entities\Stock;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class StockDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count stock =====================*/
					public function countStock(){
					                       return count($this->listeStock());
					        }

				/*================== Get stock =====================*/
					public function getStock($id){
					$sql = "SELECT * FROM stock WHERE stock.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste stock =====================*/
					public function listeStock(){
					                $sql = "SELECT * FROM stock";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one stock =====================*/
					public function listeStockByServiceId($id){
					$sql = "SELECT * FROM stock WHERE  stock.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many stock =====================*/
					public function listeServiceByStockId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addStock($stock){
                        $sql = "INSERT INTO stock  VALUES(
                                     null
,
                                     ".$stock->getId_service()."
,
                                     '".$stock->getNom_stock()."'
,
                                     '".$stock->getType_stock()."'
,
                                     '".$stock->getNbrarticle()."'
,
                                     '".$stock->getValeur()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatestock($stock){
                        $sql = "UPDATE stock  SET  stock.id_service =  '".$stock->getId_service()."' ,stock.nom_stock =  '".$stock->getNom_stock()."' ,stock.type_stock =  '".$stock->getType_stock()."' ,stock.nbrarticle =  '".$stock->getNbrarticle()."' ,stock.valeur =  '".$stock->getValeur()."'   WHERE   stock.id =  ".$stock->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete stock =====================*/
					public function deleteStock($id){
					$sql = "DELETE FROM stock WHERE stock.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If stock existe =====================*/
					public function ifStockexiste($id_service){
					$sql = "SELECT * FROM stock WHERE id_service='".$id_service."' ";
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



