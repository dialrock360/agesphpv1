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
  use src\entities\V_article_en_stock;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class V_article_en_stockDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_article_en_stock =====================*/
					public function countV_article_en_stock(){
					                       return count($this->listeV_article_en_stock());
					        }

				/*================== Get v_article_en_stock =====================*/
					public function getV_article_en_stock($id){
					$sql = "SELECT * FROM v_article_en_stock WHERE v_article_en_stock.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_article_en_stock =====================*/
					public function listeV_article_en_stock(){
					                $sql = "SELECT * FROM v_article_en_stock";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_article_en_stock =====================*/

				/*================== One to many v_article_en_stock =====================*/

               public function addV_article_en_stock($v_article_en_stock){
                        $sql = "INSERT INTO v_article_en_stock  VALUES(
                                     '".$v_article_en_stock->getId()."'
,
                                     '".$v_article_en_stock->getRef_article()."'
,
                                     '".$v_article_en_stock->getId_article()."'
,
                                     '".$v_article_en_stock->getId_stock()."'
,
                                     '".$v_article_en_stock->getQnt_article_en_stock()."'
,
                                     '".$v_article_en_stock->getValeur_article_en_stock()."'
,
                                     '".$v_article_en_stock->getMin_qnt_article_en_stock()."'
,
                                     '".$v_article_en_stock->getMax_qnt_article_en_stock()."'
,
                                     '".$v_article_en_stock->getId_conditionement_article()."'
,
                                     '".$v_article_en_stock->getQnt_unite()."'
,
                                     '".$v_article_en_stock->getPxa_u_article_en_stock()."'
,
                                     '".$v_article_en_stock->getCout_achat_conditionement_article()."'
,
                                     '".$v_article_en_stock->getPxv_u_conditionement_article()."'
,
                                     '".$v_article_en_stock->getPxv_bar_conditionement_article()."'
,
                                     '".$v_article_en_stock->getPxv_conditionement_article()."'
,
                                     '".$v_article_en_stock->getId_conditionement()."'
,
                                     '".$v_article_en_stock->getNom_conditionement()."'
,
                                     '".$v_article_en_stock->getId_unite()."'
,
                                     '".$v_article_en_stock->getNom_unite_conditionement()."'
,
                                     '".$v_article_en_stock->getNom_article()."'
,
                                     '".$v_article_en_stock->getId_service()."'
,
                                     '".$v_article_en_stock->getNom_stock()."'
,
                                     '".$v_article_en_stock->getType_stock()."'
,
                                     '".$v_article_en_stock->getPath_photo()."'
,
                                     '".$v_article_en_stock->getMaster()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_article_en_stock($v_article_en_stock){
                        $sql = "UPDATE v_article_en_stock  SET  v_article_en_stock.id =  '".$v_article_en_stock->getId()."' ,v_article_en_stock.ref_article =  '".$v_article_en_stock->getRef_article()."' ,v_article_en_stock.id_article =  '".$v_article_en_stock->getId_article()."' ,v_article_en_stock.id_stock =  '".$v_article_en_stock->getId_stock()."' ,v_article_en_stock.qnt_article_en_stock =  '".$v_article_en_stock->getQnt_article_en_stock()."' ,v_article_en_stock.valeur_article_en_stock =  '".$v_article_en_stock->getValeur_article_en_stock()."' ,v_article_en_stock.min_qnt_article_en_stock =  '".$v_article_en_stock->getMin_qnt_article_en_stock()."' ,v_article_en_stock.max_qnt_article_en_stock =  '".$v_article_en_stock->getMax_qnt_article_en_stock()."' ,v_article_en_stock.id_conditionement_article =  '".$v_article_en_stock->getId_conditionement_article()."' ,v_article_en_stock.qnt_unite =  '".$v_article_en_stock->getQnt_unite()."' ,v_article_en_stock.pxa_u_article_en_stock =  '".$v_article_en_stock->getPxa_u_article_en_stock()."' ,v_article_en_stock.cout_achat_conditionement_article =  '".$v_article_en_stock->getCout_achat_conditionement_article()."' ,v_article_en_stock.pxv_u_conditionement_article =  '".$v_article_en_stock->getPxv_u_conditionement_article()."' ,v_article_en_stock.pxv_bar_conditionement_article =  '".$v_article_en_stock->getPxv_bar_conditionement_article()."' ,v_article_en_stock.pxv_conditionement_article =  '".$v_article_en_stock->getPxv_conditionement_article()."' ,v_article_en_stock.id_conditionement =  '".$v_article_en_stock->getId_conditionement()."' ,v_article_en_stock.nom_conditionement =  '".$v_article_en_stock->getNom_conditionement()."' ,v_article_en_stock.id_unite =  '".$v_article_en_stock->getId_unite()."' ,v_article_en_stock.nom_unite_conditionement =  '".$v_article_en_stock->getNom_unite_conditionement()."' ,v_article_en_stock.nom_article =  '".$v_article_en_stock->getNom_article()."' ,v_article_en_stock.id_service =  '".$v_article_en_stock->getId_service()."' ,v_article_en_stock.nom_stock =  '".$v_article_en_stock->getNom_stock()."' ,v_article_en_stock.type_stock =  '".$v_article_en_stock->getType_stock()."' ,v_article_en_stock.path_photo =  '".$v_article_en_stock->getPath_photo()."' ,v_article_en_stock.master =  '".$v_article_en_stock->getMaster()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_article_en_stock =====================*/
					public function deleteV_article_en_stock($id){
					$sql = "DELETE FROM v_article_en_stock WHERE v_article_en_stock.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_article_en_stock existe =====================*/
					public function ifV_article_en_stockexiste($id){
					$sql = "SELECT * FROM v_article_en_stock WHERE id='".$id."' ";
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



