<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



     namespace src\entities;
      use libs\system\Entitie;
    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/

        class Article_en_stock extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $id_article;
        private  $id_stock;
        private  $ref_article;
        private  $qnt_article_en_stock;
        private  $valeur_article_en_stock;
        private  $min_qnt_article_en_stock;
        private  $max_qnt_article_en_stock;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="article_en_stock";
                 $this->id = 'null' ;
                 $this->id_article = 0 ;
                 $this->id_stock = 0 ;
                 $this->ref_article = "" ;
                 $this->qnt_article_en_stock = 0 ;
                 $this->valeur_article_en_stock = 0 ;
                 $this->min_qnt_article_en_stock = 0 ;
                 $this->max_qnt_article_en_stock = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getId_article()
                 {
                     return $this->id_article;
                 }

             public function getId_stock()
                 {
                     return $this->id_stock;
                 }

             public function getRef_article()
                 {
                     return $this->ref_article;
                 }

             public function getQnt_article_en_stock()
                 {
                     return $this->qnt_article_en_stock;
                 }

             public function getValeur_article_en_stock()
                 {
                     return $this->valeur_article_en_stock;
                 }

             public function getMin_qnt_article_en_stock()
                 {
                     return $this->min_qnt_article_en_stock;
                 }

             public function getMax_qnt_article_en_stock()
                 {
                     return $this->max_qnt_article_en_stock;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setId_article($id_article)
                 {
                      $this->id_article = $id_article;
                 }

             public function setId_stock($id_stock)
                 {
                      $this->id_stock = $id_stock;
                 }

             public function setRef_article($ref_article)
                 {
                      $this->ref_article = $ref_article;
                 }

             public function setQnt_article_en_stock($qnt_article_en_stock)
                 {
                      $this->qnt_article_en_stock = $qnt_article_en_stock;
                 }

             public function setValeur_article_en_stock($valeur_article_en_stock)
                 {
                      $this->valeur_article_en_stock = $valeur_article_en_stock;
                 }

             public function setMin_qnt_article_en_stock($min_qnt_article_en_stock)
                 {
                      $this->min_qnt_article_en_stock = $min_qnt_article_en_stock;
                 }

             public function setMax_qnt_article_en_stock($max_qnt_article_en_stock)
                 {
                      $this->max_qnt_article_en_stock = $max_qnt_article_en_stock;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count article_en_stock =====================*/
					public function countArticle_en_stock(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get article_en_stock =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste article_en_stock =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("article_en_stock");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("article_en_stock");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("article_en_stock");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_article_en_stock = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If article_en_stock existe =====================*/
					public function ifArticle_en_stockexiste($condition){
					    $this->db->setTablename($this->tablename);
	$existe=$this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					if($existe != null)
					      {
					                 return 1;
					      } 
					return 0;
					                }
					  public function setPost($post,$file=array()){
					     extract($post);
                                                       $this->id = (!isset($id) || empty($id) )  ? 0: $id;
                       $this->id_article = (!isset($id_article) || empty($id_article) )  ? 0: $id_article;
                       $this->id_stock = (!isset($id_stock) || empty($id_stock) )  ? 0: $id_stock;
                       $this->ref_article = (!isset($ref_article) || empty($ref_article) )  ? '': $ref_article;
                       $this->qnt_article_en_stock = (!isset($qnt_article_en_stock) || empty($qnt_article_en_stock) )  ? 0: $qnt_article_en_stock;
                       $this->valeur_article_en_stock = (!isset($valeur_article_en_stock) || empty($valeur_article_en_stock) )  ? 0: $valeur_article_en_stock;
                       $this->min_qnt_article_en_stock = (!isset($min_qnt_article_en_stock) || empty($min_qnt_article_en_stock) )  ? 0: $min_qnt_article_en_stock;
                       $this->max_qnt_article_en_stock = (!isset($max_qnt_article_en_stock) || empty($max_qnt_article_en_stock) )  ? 0: $max_qnt_article_en_stock;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'id_article'=>($this->id_article == 0 )  ? $OldTable['id_article']:$this->id_article,
                                  'id_stock'=>($this->id_stock == 0 )  ? $OldTable['id_stock']:$this->id_stock,
                                  'ref_article'=>(!isset($this->ref_article) || empty($this->ref_article) )  ? $OldTable['ref_article']:$this->ref_article,
                                  'qnt_article_en_stock'=>($this->qnt_article_en_stock == 0 )  ? $OldTable['qnt_article_en_stock']:$this->qnt_article_en_stock,
                                  'valeur_article_en_stock'=>($this->valeur_article_en_stock == 0 )  ? $OldTable['valeur_article_en_stock']:$this->valeur_article_en_stock,
                                  'min_qnt_article_en_stock'=>($this->min_qnt_article_en_stock == 0 )  ? $OldTable['min_qnt_article_en_stock']:$this->min_qnt_article_en_stock,
                                  'max_qnt_article_en_stock'=>($this->max_qnt_article_en_stock == 0 )  ? $OldTable['max_qnt_article_en_stock']:$this->max_qnt_article_en_stock					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'id_article'=>0,
                                  'id_stock'=>0,
                                  'ref_article'=>"",
                                  'qnt_article_en_stock'=>0,
                                  'valeur_article_en_stock'=>0,
                                  'min_qnt_article_en_stock'=>0,
                                  'max_qnt_article_en_stock'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



