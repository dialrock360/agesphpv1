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
    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/

        class Image extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idimg;
        private  $ido;
        private  $link;
        private  $origin;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="image";
                 $this->idimg = 'null' ;
                 $this->ido = 0 ;
                 $this->link = "" ;
                 $this->origin = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdimg()
                 {
                     return $this->idimg;
                 }

             public function getIdo()
                 {
                     return $this->ido;
                 }

             public function getLink()
                 {
                     return $this->link;
                 }

             public function getOrigin()
                 {
                     return $this->origin;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdimg($idimg)
                 {
                      $this->idimg = $idimg;
                 }

             public function setIdo($ido)
                 {
                      $this->ido = $ido;
                 }

             public function setLink($link)
                 {
                      $this->link = $link;
                 }

             public function setOrigin($origin)
                 {
                      $this->origin = $origin;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count image =====================*/
					public function countImage(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get image =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDIMG" =>$this->IDIMG);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste image =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("image");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("image");
					    $condition = array( 'IDIMG'=>$this->IDIMG );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("image");
					    $condition = array( 'IDIMG'=>$this->IDIMG );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_image = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If image existe =====================*/
					public function ifImageexiste($condition){
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
                                                       $this->idimg = (!isset($idimg) || empty($idimg) )  ? 0: $idimg;
                       $this->ido = (!isset($ido) || empty($ido) )  ? 0: $ido;
                       $this->link = (!isset($link) || empty($link) )  ? '': $link;
                       $this->origin = (!isset($origin) || empty($origin) )  ? '': $origin;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDIMG'=>($this->idimg == 0 || $this->idimg == 'null')  ? $OldTable['idimg']:$this->idimg,
                                  'IDO'=>($this->ido == 0 )  ? $OldTable['ido']:$this->ido,
                                  'LINK'=>(!isset($this->link) || empty($this->link) )  ? $OldTable['link']:$this->link,
                                  'ORIGIN'=>(!isset($this->origin) || empty($this->origin) )  ? $OldTable['origin']:$this->origin,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDIMG'=>'null',
                                  'IDO'=>0,
                                  'LINK'=>"",
                                  'ORIGIN'=>"",
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



