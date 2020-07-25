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
  use src\entities\Flux_stock;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Flux_stockDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count flux_stock =====================*/
					public function countFlux_stock(){
					                       return count($this->listeFlux_stock());
					        }

				/*================== Get flux_stock =====================*/
					public function getFlux_stock($id){
					$sql = "SELECT * FROM flux_stock WHERE flux_stock.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste flux_stock =====================*/
					public function listeFlux_stock(){
					                $sql = "SELECT * FROM flux_stock";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one flux_stock =====================*/
					public function listeFlux_stockByArticle_en_stockId($id){
					$sql = "SELECT * FROM flux_stock WHERE  flux_stock.id_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeFlux_stockByConditionement_articleId($id){
					$sql = "SELECT * FROM flux_stock WHERE  flux_stock.id_conditionement_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeFlux_stockByStockId($id){
					$sql = "SELECT * FROM flux_stock WHERE  flux_stock.id_stock = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many flux_stock =====================*/
					public function listeArticle_en_stockByFlux_stockId($id_article){
					$sql = "SELECT * FROM article_en_stock WHERE  article_en_stock.id_article = ".$id_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeConditionement_articleByFlux_stockId($id_conditionement_article){
					$sql = "SELECT * FROM conditionement_article WHERE  conditionement_article.id_conditionement_article = ".$id_conditionement_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeStockByFlux_stockId($id_stock){
					$sql = "SELECT * FROM stock WHERE  stock.id_stock = ".$id_stock."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addFlux_stock($flux_stock){
                        $sql = "INSERT INTO flux_stock  VALUES(
                                     null
,
                                     ".$flux_stock->getId_article()."
,
                                     ".$flux_stock->getId_conditionement_article()."
,
                                     ".$flux_stock->getId_stock()."
,
                                     '".$flux_stock->getType_flux()."'
,
                                     '".$flux_stock->getDate_flux_stock()."'
,
                                     '".$flux_stock->getType_flux_stock()."'
,
                                     '".$flux_stock->getQnt_flux_stock()."'
,
                                     '".$flux_stock->getPu_flux_stock()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateflux_stock($flux_stock){
                        $sql = "UPDATE flux_stock  SET  flux_stock.type_flux =  '".$flux_stock->getType_flux()."' ,flux_stock.id_article =  '".$flux_stock->getId_article()."' ,flux_stock.id_stock =  '".$flux_stock->getId_stock()."' ,flux_stock.id_conditionement_article =  '".$flux_stock->getId_conditionement_article()."' ,flux_stock.date_flux_stock =  '".$flux_stock->getDate_flux_stock()."' ,flux_stock.type_flux_stock =  '".$flux_stock->getType_flux_stock()."' ,flux_stock.qnt_flux_stock =  '".$flux_stock->getQnt_flux_stock()."' ,flux_stock.pu_flux_stock =  '".$flux_stock->getPu_flux_stock()."'   WHERE   flux_stock.id =  ".$flux_stock->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete flux_stock =====================*/
					public function deleteFlux_stock($id){
					$sql = "DELETE FROM flux_stock WHERE flux_stock.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If flux_stock existe =====================*/
					public function ifFlux_stockexiste($type_flux){
					$sql = "SELECT * FROM flux_stock WHERE type_flux='".$type_flux."' ";
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



