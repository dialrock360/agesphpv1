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
    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/

        class Photo_article extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $id_service;
        private  $id_article;
        private  $path_photo;
        private  $master;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="photo_article";
                 $this->id = 'null' ;
                 $this->id_service = 0 ;
                 $this->id_article = 0 ;
                 $this->path_photo = "" ;
                 $this->master = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getId_service()
                 {
                     return $this->id_service;
                 }

             public function getId_article()
                 {
                     return $this->id_article;
                 }

             public function getPath_photo()
                 {
                     return $this->path_photo;
                 }

             public function getMaster()
                 {
                     return $this->master;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setId_service($id_service)
                 {
                      $this->id_service = $id_service;
                 }

             public function setId_article($id_article)
                 {
                      $this->id_article = $id_article;
                 }

             public function setPath_photo($path_photo)
                 {
                      $this->path_photo = $path_photo;
                 }

             public function setMaster($master)
                 {
                      $this->master = $master;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count photo_article =====================*/
					public function countPhoto_article(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get photo_article =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste photo_article =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("photo_article");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("photo_article");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("photo_article");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_photo_article = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If photo_article existe =====================*/
					public function ifPhoto_articleexiste($condition){
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
                       $this->id_service = (!isset($id_service) || empty($id_service) )  ? 0: $id_service;
                       $this->id_article = (!isset($id_article) || empty($id_article) )  ? 0: $id_article;
                       $this->path_photo = (!isset($path_photo) || empty($path_photo) )  ? '': $path_photo;
                       $this->master = (!isset($master) || empty($master) )  ? 0: $master;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'id_service'=>($this->id_service == 0 )  ? $OldTable['id_service']:$this->id_service,
                                  'id_article'=>($this->id_article == 0 )  ? $OldTable['id_article']:$this->id_article,
                                  'path_photo'=>(!isset($this->path_photo) || empty($this->path_photo) )  ? $OldTable['path_photo']:$this->path_photo,
                                  'master'=>($this->master == 0 )  ? $OldTable['master']:$this->master					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'id_service'=>0,
                                  'id_article'=>0,
                                  'path_photo'=>"",
                                  'master'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



