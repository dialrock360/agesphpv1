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
    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/

        class Facture extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idf;
        private  $idmv;
        private  $idp;
        private  $pu;
        private  $qnt;
        private  $mts;
        private  $row;
        private  $fdesi;
        private  $fcondis;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="facture";
                 $this->idf = 'null' ;
                 $this->idmv = 0 ;
                 $this->idp = 0 ;
                 $this->pu = 0 ;
                 $this->qnt = 0 ;
                 $this->mts = 0 ;
                 $this->row = 0 ;
                 $this->fdesi = "" ;
                 $this->fcondis = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdf()
                 {
                     return $this->idf;
                 }

             public function getIdmv()
                 {
                     return $this->idmv;
                 }

             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getPu()
                 {
                     return $this->pu;
                 }

             public function getQnt()
                 {
                     return $this->qnt;
                 }

             public function getMts()
                 {
                     return $this->mts;
                 }

             public function getRow()
                 {
                     return $this->row;
                 }

             public function getFdesi()
                 {
                     return $this->fdesi;
                 }

             public function getFcondis()
                 {
                     return $this->fcondis;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdf($idf)
                 {
                      $this->idf = $idf;
                 }

             public function setIdmv($idmv)
                 {
                      $this->idmv = $idmv;
                 }

             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setPu($pu)
                 {
                      $this->pu = $pu;
                 }

             public function setQnt($qnt)
                 {
                      $this->qnt = $qnt;
                 }

             public function setMts($mts)
                 {
                      $this->mts = $mts;
                 }

             public function setRow($row)
                 {
                      $this->row = $row;
                 }

             public function setFdesi($fdesi)
                 {
                      $this->fdesi = $fdesi;
                 }

             public function setFcondis($fcondis)
                 {
                      $this->fcondis = $fcondis;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count facture =====================*/
					public function countFacture(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get facture =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDF" =>$this->IDF);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste facture =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("facture");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("facture");
					    $condition = array( 'IDF'=>$this->IDF );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("facture");
					    $condition = array( 'IDF'=>$this->IDF );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_facture = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If facture existe =====================*/
					public function ifFactureexiste($condition){
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
                                                       $this->idf = (!isset($idf) || empty($idf) )  ? 0: $idf;
                       $this->idmv = (!isset($idmv) || empty($idmv) )  ? 0: $idmv;
                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->pu = (!isset($pu) || empty($pu) )  ? 0: $pu;
                       $this->qnt = (!isset($qnt) || empty($qnt) )  ? 0: $qnt;
                       $this->mts = (!isset($mts) || empty($mts) )  ? 0: $mts;
                       $this->row = (!isset($row) || empty($row) )  ? 0: $row;
                       $this->fdesi = (!isset($fdesi) || empty($fdesi) )  ? '': $fdesi;
                       $this->fcondis = (!isset($fcondis) || empty($fcondis) )  ? '': $fcondis;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDF'=>($this->idf == 0 || $this->idf == 'null')  ? $OldTable['idf']:$this->idf,
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['idmv']:$this->idmv,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'PU'=>($this->pu == 0 )  ? $OldTable['pu']:$this->pu,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'MTS'=>($this->mts == 0 )  ? $OldTable['mts']:$this->mts,
                                  'ROW'=>($this->row == 0 )  ? $OldTable['row']:$this->row,
                                  'FDESI'=>(!isset($this->fdesi) || empty($this->fdesi) )  ? $OldTable['fdesi']:$this->fdesi,
                                  'FCONDIS'=>(!isset($this->fcondis) || empty($this->fcondis) )  ? $OldTable['fcondis']:$this->fcondis					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDF'=>'null',
                                  'IDMV'=>0,
                                  'IDP'=>0,
                                  'PU'=>0,
                                  'QNT'=>0,
                                  'MTS'=>0,
                                  'ROW'=>0,
                                  'FDESI'=>"",
                                  'FCONDIS'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



