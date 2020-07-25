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

        class Frontend extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idfr;
        private  $libele;
        private  $cible;
        private  $fsection;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="frontend";
                 $this->idfr = 'null' ;
                 $this->libele = "" ;
                 $this->cible = "" ;
                 $this->fsection = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdfr()
                 {
                     return $this->idfr;
                 }

             public function getLibele()
                 {
                     return $this->libele;
                 }

             public function getCible()
                 {
                     return $this->cible;
                 }

             public function getFsection()
                 {
                     return $this->fsection;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdfr($idfr)
                 {
                      $this->idfr = $idfr;
                 }

             public function setLibele($libele)
                 {
                      $this->libele = $libele;
                 }

             public function setCible($cible)
                 {
                      $this->cible = $cible;
                 }

             public function setFsection($fsection)
                 {
                      $this->fsection = $fsection;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count frontend =====================*/
					public function countFrontend(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get frontend =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDFR" =>$this->IDFR);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste frontend =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("frontend");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("frontend");
					    $condition = array( 'IDFR'=>$this->IDFR );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("frontend");
					    $condition = array( 'IDFR'=>$this->IDFR );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_frontend = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If frontend existe =====================*/
					public function ifFrontendexiste($condition){
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
                                                       $this->idfr = (!isset($idfr) || empty($idfr) )  ? 0: $idfr;
                       $this->libele = (!isset($libele) || empty($libele) )  ? '': $libele;
                       $this->cible = (!isset($cible) || empty($cible) )  ? '': $cible;
                       $this->fsection = (!isset($fsection) || empty($fsection) )  ? '': $fsection;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDFR'=>($this->idfr == 0 || $this->idfr == 'null')  ? $OldTable['idfr']:$this->idfr,
                                  'LIBELE'=>(!isset($this->libele) || empty($this->libele) )  ? $OldTable['libele']:$this->libele,
                                  'CIBLE'=>(!isset($this->cible) || empty($this->cible) )  ? $OldTable['cible']:$this->cible,
                                  'FSECTION'=>(!isset($this->fsection) || empty($this->fsection) )  ? $OldTable['fsection']:$this->fsection					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDFR'=>'null',
                                  'LIBELE'=>"",
                                  'CIBLE'=>"",
                                  'FSECTION'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



