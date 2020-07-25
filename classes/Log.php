<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Log extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idl;
        private  $idmv;
        private  $conten;
        private  $datelog;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="log";
                 $this->idl = 'null' ;
                 $this->idmv = 0 ;
                 $this->conten = "" ;
                 $this->datelog = date("") ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdl()
                 {
                     return $this->idl;
                 }

             public function getIdmv()
                 {
                     return $this->idmv;
                 }

             public function getConten()
                 {
                     return $this->conten;
                 }

             public function getDatelog()
                 {
                     return $this->datelog;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdl($idl)
                 {
                      $this->idl = $idl;
                 }

             public function setIdmv($idmv)
                 {
                      $this->idmv = $idmv;
                 }

             public function setConten($conten)
                 {
                      $this->conten = $conten;
                 }

             public function setDatelog($datelog)
                 {
                      $this->datelog = $datelog;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count log =====================*/
					public function countLog(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get log =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("idl" =>$this->idl);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste log =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("log");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("log");
					    $condition = array( 'idl'=>$this->idl );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("log");
					    $condition = array( 'idl'=>$this->idl );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_log = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If log existe =====================*/
					public function ifLogexiste($condition){
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
                                                       $this->idl = (!isset($idl) || empty($idl) )  ? 0: $idl;
                       $this->idmv = (!isset($idmv) || empty($idmv) )  ? 0: $idmv;
                       $this->conten = (!isset($conten) || empty($conten) )  ? '': $conten;
                       $this->datelog = (!isset($datelog) || empty($datelog) )  ? '': $datelog;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'idl'=>($this->idl == 0 || $this->idl == 'null')  ? $OldTable['idl']:$this->idl,
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['idmv']:$this->idmv,
                                  'conten'=>(!isset($this->conten) || empty($this->conten) )  ? $OldTable['conten']:$this->conten,
                                  'datelog'=>($this->datelog == null )  ? $OldTable['datelog']:$this->datelog,
                                  'flag'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'idl'=>'null',
                                  'IDMV'=>0,
                                  'conten'=>"",
                                  'datelog'=>date(""),
                                  'flag'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



