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
    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/

        class Categorie extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $id_famille;
        private  $id_nomenclature_article;
        private  $nom_categorie;
        private  $nbr_produit_categorie;
        private  $valeur_categorie;
        private  $flag_categorie;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="categorie";
                 $this->id = 'null' ;
                 $this->id_famille = 0 ;
                 $this->id_nomenclature_article = 0 ;
                 $this->nom_categorie = "" ;
                 $this->nbr_produit_categorie = 0 ;
                 $this->valeur_categorie = 0 ;
                 $this->flag_categorie = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getId_famille()
                 {
                     return $this->id_famille;
                 }

             public function getId_nomenclature_article()
                 {
                     return $this->id_nomenclature_article;
                 }

             public function getNom_categorie()
                 {
                     return $this->nom_categorie;
                 }

             public function getNbr_produit_categorie()
                 {
                     return $this->nbr_produit_categorie;
                 }

             public function getValeur_categorie()
                 {
                     return $this->valeur_categorie;
                 }

             public function getFlag_categorie()
                 {
                     return $this->flag_categorie;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setId_famille($id_famille)
                 {
                      $this->id_famille = $id_famille;
                 }

             public function setId_nomenclature_article($id_nomenclature_article)
                 {
                      $this->id_nomenclature_article = $id_nomenclature_article;
                 }

             public function setNom_categorie($nom_categorie)
                 {
                      $this->nom_categorie = $nom_categorie;
                 }

             public function setNbr_produit_categorie($nbr_produit_categorie)
                 {
                      $this->nbr_produit_categorie = $nbr_produit_categorie;
                 }

             public function setValeur_categorie($valeur_categorie)
                 {
                      $this->valeur_categorie = $valeur_categorie;
                 }

             public function setFlag_categorie($flag_categorie)
                 {
                      $this->flag_categorie = $flag_categorie;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count categorie =====================*/
					public function countCategorie(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get categorie =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste categorie =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("categorie");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("categorie");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("categorie");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_categorie = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If categorie existe =====================*/
					public function ifCategorieexiste($condition){
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
                       $this->id_famille = (!isset($id_famille) || empty($id_famille) )  ? 0: $id_famille;
                       $this->id_nomenclature_article = (!isset($id_nomenclature_article) || empty($id_nomenclature_article) )  ? 0: $id_nomenclature_article;
                       $this->nom_categorie = (!isset($nom_categorie) || empty($nom_categorie) )  ? '': $nom_categorie;
                       $this->nbr_produit_categorie = (!isset($nbr_produit_categorie) || empty($nbr_produit_categorie) )  ? 0: $nbr_produit_categorie;
                       $this->valeur_categorie = (!isset($valeur_categorie) || empty($valeur_categorie) )  ? 0: $valeur_categorie;
                       $this->flag_categorie = (!isset($flag_categorie) || empty($flag_categorie) )  ? 0: $flag_categorie;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'id_famille'=>($this->id_famille == 0 )  ? $OldTable['id_famille']:$this->id_famille,
                                  'id_nomenclature_article'=>($this->id_nomenclature_article == 0 )  ? $OldTable['id_nomenclature_article']:$this->id_nomenclature_article,
                                  'nom_categorie'=>(!isset($this->nom_categorie) || empty($this->nom_categorie) )  ? $OldTable['nom_categorie']:$this->nom_categorie,
                                  'nbr_produit_categorie'=>($this->nbr_produit_categorie == 0 )  ? $OldTable['nbr_produit_categorie']:$this->nbr_produit_categorie,
                                  'valeur_categorie'=>($this->valeur_categorie == 0 )  ? $OldTable['valeur_categorie']:$this->valeur_categorie,
                                  'flag_categorie'=>($this->flag_categorie == 0 )  ? $OldTable['flag_categorie']:$this->flag_categorie					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'id_famille'=>0,
                                  'id_nomenclature_article'=>0,
                                  'nom_categorie'=>"",
                                  'nbr_produit_categorie'=>0,
                                  'valeur_categorie'=>0,
                                  'flag_categorie'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



