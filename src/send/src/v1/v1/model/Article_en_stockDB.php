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
  use src\entities\Article_en_stock;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
        class Article_en_stockDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count article_en_stock =====================*/
					public function countArticle_en_stock(){
					                       return count($this->listeArticle_en_stock());
					        }

				/*================== Get article_en_stock =====================*/
					public function getArticle_en_stock($id){
					$sql = "SELECT * FROM article_en_stock WHERE article_en_stock.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste article_en_stock =====================*/
					public function listeArticle_en_stock(){
					                $sql = "SELECT * FROM article_en_stock";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one article_en_stock =====================*/
					public function listeArticle_en_stockByArticleId($id){
					$sql = "SELECT * FROM article_en_stock WHERE  article_en_stock.id_article = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeArticle_en_stockByStockId($id){
					$sql = "SELECT * FROM article_en_stock WHERE  article_en_stock.id_stock = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many article_en_stock =====================*/
					public function listeArticleByArticle_en_stockId($id_article){
					$sql = "SELECT * FROM article WHERE  article.id_article = ".$id_article."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeStockByArticle_en_stockId($id_stock){
					$sql = "SELECT * FROM stock WHERE  stock.id_stock = ".$id_stock."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addArticle_en_stock($article_en_stock){
                        $sql = "INSERT INTO article_en_stock  VALUES(
                                     null
,
                                     ".$article_en_stock->getId_article()."
,
                                     ".$article_en_stock->getId_stock()."
,
                                     '".$article_en_stock->getRef_article()."'
,
                                     '".$article_en_stock->getQnt_article_en_stock()."'
,
                                     '".$article_en_stock->getValeur_article_en_stock()."'
,
                                     '".$article_en_stock->getMin_qnt_article_en_stock()."'
,
                                     '".$article_en_stock->getMax_qnt_article_en_stock()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatearticle_en_stock($article_en_stock){
                        $sql = "UPDATE article_en_stock  SET  article_en_stock.ref_article =  '".$article_en_stock->getRef_article()."' ,article_en_stock.id_article =  '".$article_en_stock->getId_article()."' ,article_en_stock.id_stock =  '".$article_en_stock->getId_stock()."' ,article_en_stock.qnt_article_en_stock =  '".$article_en_stock->getQnt_article_en_stock()."' ,article_en_stock.valeur_article_en_stock =  '".$article_en_stock->getValeur_article_en_stock()."' ,article_en_stock.min_qnt_article_en_stock =  '".$article_en_stock->getMin_qnt_article_en_stock()."' ,article_en_stock.max_qnt_article_en_stock =  '".$article_en_stock->getMax_qnt_article_en_stock()."'   WHERE   article_en_stock.id =  ".$article_en_stock->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete article_en_stock =====================*/
					public function deleteArticle_en_stock($id){
					$sql = "DELETE FROM article_en_stock WHERE article_en_stock.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If article_en_stock existe =====================*/
					public function ifArticle_en_stockexiste($ref_article){
					$sql = "SELECT * FROM article_en_stock WHERE ref_article='".$ref_article."' ";
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



