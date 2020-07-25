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
  use src\entities\V_conditionement_article;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class V_conditionement_articleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_conditionement_article =====================*/
					public function countV_conditionement_article(){
					                       return count($this->listeV_conditionement_article());
					        }

				/*================== Get v_conditionement_article =====================*/
					public function getV_conditionement_article($id){
					$sql = "SELECT * FROM v_conditionement_article WHERE v_conditionement_article.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_conditionement_article =====================*/
					public function listeV_conditionement_article(){
					                $sql = "SELECT * FROM v_conditionement_article";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_conditionement_article =====================*/

				/*================== One to many v_conditionement_article =====================*/

               public function addV_conditionement_article($v_conditionement_article){
                        $sql = "INSERT INTO v_conditionement_article  VALUES(
                                     '".$v_conditionement_article->getId()."'
,
                                     '".$v_conditionement_article->getId_article_en_stock()."'
,
                                     '".$v_conditionement_article->getQnt_unite()."'
,
                                     '".$v_conditionement_article->getPxa_u_article_en_stock()."'
,
                                     '".$v_conditionement_article->getCout_achat_conditionement_article()."'
,
                                     '".$v_conditionement_article->getPxv_u_conditionement_article()."'
,
                                     '".$v_conditionement_article->getPxv_bar_conditionement_article()."'
,
                                     '".$v_conditionement_article->getPxv_conditionement_article()."'
,
                                     '".$v_conditionement_article->getId_conditionement()."'
,
                                     '".$v_conditionement_article->getNom_conditionement()."'
,
                                     '".$v_conditionement_article->getId_unite()."'
,
                                     '".$v_conditionement_article->getNom_unite_conditionement()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_conditionement_article($v_conditionement_article){
                        $sql = "UPDATE v_conditionement_article  SET  v_conditionement_article.id =  '".$v_conditionement_article->getId()."' ,v_conditionement_article.id_article_en_stock =  '".$v_conditionement_article->getId_article_en_stock()."' ,v_conditionement_article.qnt_unite =  '".$v_conditionement_article->getQnt_unite()."' ,v_conditionement_article.pxa_u_article_en_stock =  '".$v_conditionement_article->getPxa_u_article_en_stock()."' ,v_conditionement_article.cout_achat_conditionement_article =  '".$v_conditionement_article->getCout_achat_conditionement_article()."' ,v_conditionement_article.pxv_u_conditionement_article =  '".$v_conditionement_article->getPxv_u_conditionement_article()."' ,v_conditionement_article.pxv_bar_conditionement_article =  '".$v_conditionement_article->getPxv_bar_conditionement_article()."' ,v_conditionement_article.pxv_conditionement_article =  '".$v_conditionement_article->getPxv_conditionement_article()."' ,v_conditionement_article.id_conditionement =  '".$v_conditionement_article->getId_conditionement()."' ,v_conditionement_article.nom_conditionement =  '".$v_conditionement_article->getNom_conditionement()."' ,v_conditionement_article.id_unite =  '".$v_conditionement_article->getId_unite()."' ,v_conditionement_article.nom_unite_conditionement =  '".$v_conditionement_article->getNom_unite_conditionement()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_conditionement_article =====================*/
					public function deleteV_conditionement_article($id){
					$sql = "DELETE FROM v_conditionement_article WHERE v_conditionement_article.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_conditionement_article existe =====================*/
					public function ifV_conditionement_articleexiste($id){
					$sql = "SELECT * FROM v_conditionement_article WHERE id='".$id."' ";
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



