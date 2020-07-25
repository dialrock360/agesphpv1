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
  use src\entities\Conditionement_article;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Conditionement_articleDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count conditionement_article =====================*/
					public function countConditionement_article(){
					                       return count($this->listeConditionement_article());
					        }

				/*================== Get conditionement_article =====================*/
					public function getConditionement_article($id){
					$sql = "SELECT * FROM conditionement_article WHERE conditionement_article.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste conditionement_article =====================*/
					public function listeConditionement_article(){
					                $sql = "SELECT * FROM conditionement_article";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one conditionement_article =====================*/
					public function listeConditionement_articleByArticle_en_stockId($id){
					$sql = "SELECT * FROM conditionement_article WHERE  conditionement_article.id_article_en_stock = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeConditionement_articleByConditionementId($id){
					$sql = "SELECT * FROM conditionement_article WHERE  conditionement_article.id_conditionement = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeConditionement_articleByConditionementId($id){
					$sql = "SELECT * FROM conditionement_article WHERE  conditionement_article.id_unite = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many conditionement_article =====================*/
					public function listeArticle_en_stockByConditionement_articleId($id_article_en_stock){
					$sql = "SELECT * FROM article_en_stock WHERE  article_en_stock.id_article_en_stock = ".$id_article_en_stock."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeConditionementByConditionement_articleId($id_conditionement){
					$sql = "SELECT * FROM conditionement WHERE  conditionement.id_conditionement = ".$id_conditionement."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeConditionementByConditionement_articleId($id_unite){
					$sql = "SELECT * FROM conditionement WHERE  conditionement.id_unite = ".$id_unite."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addConditionement_article($conditionement_article){
                        $sql = "INSERT INTO conditionement_article  VALUES(
                                     null
,
                                     ".$conditionement_article->getId_article_en_stock()."
,
                                     ".$conditionement_article->getId_conditionement()."
,
                                     ".$conditionement_article->getId_unite()."
,
                                     '".$conditionement_article->getQnt_unite()."'
,
                                     '".$conditionement_article->getPxa_u_article_en_stock()."'
,
                                     '".$conditionement_article->getCout_achat_conditionement_article()."'
,
                                     '".$conditionement_article->getPxv_u_conditionement_article()."'
,
                                     '".$conditionement_article->getPxv_bar_conditionement_article()."'
,
                                     '".$conditionement_article->getPxv_conditionement_article()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateconditionement_article($conditionement_article){
                        $sql = "UPDATE conditionement_article  SET  conditionement_article.id_article_en_stock =  '".$conditionement_article->getId_article_en_stock()."' ,conditionement_article.id_conditionement =  '".$conditionement_article->getId_conditionement()."' ,conditionement_article.qnt_unite =  '".$conditionement_article->getQnt_unite()."' ,conditionement_article.pxa_u_article_en_stock =  '".$conditionement_article->getPxa_u_article_en_stock()."' ,conditionement_article.cout_achat_conditionement_article =  '".$conditionement_article->getCout_achat_conditionement_article()."' ,conditionement_article.pxv_u_conditionement_article =  '".$conditionement_article->getPxv_u_conditionement_article()."' ,conditionement_article.pxv_bar_conditionement_article =  '".$conditionement_article->getPxv_bar_conditionement_article()."' ,conditionement_article.pxv_conditionement_article =  '".$conditionement_article->getPxv_conditionement_article()."' ,conditionement_article.id_unite =  '".$conditionement_article->getId_unite()."'   WHERE   conditionement_article.id =  ".$conditionement_article->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete conditionement_article =====================*/
					public function deleteConditionement_article($id){
					$sql = "DELETE FROM conditionement_article WHERE conditionement_article.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If conditionement_article existe =====================*/
					public function ifConditionement_articleexiste($id_article_en_stock){
					$sql = "SELECT * FROM conditionement_article WHERE id_article_en_stock='".$id_article_en_stock."' ";
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



