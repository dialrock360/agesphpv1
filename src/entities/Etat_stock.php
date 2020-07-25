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

        class Etat_stock extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $id;
        private  $idf;
        private  $qnt_av;
        private  $qnt_apr;
        private  $datestk;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="etat_stock";
                 $this->id = 'null' ;
                 $this->idf = 0 ;
                 $this->qnt_av = 0 ;
                 $this->qnt_apr = 0 ;
                 $this->datestk = date("") ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getId()
                 {
                     return $this->id;
                 }

             public function getIdf()
                 {
                     return $this->idf;
                 }

             public function getQnt_av()
                 {
                     return $this->qnt_av;
                 }

             public function getQnt_apr()
                 {
                     return $this->qnt_apr;
                 }

             public function getDatestk()
                 {
                     return $this->datestk;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setId($id)
                 {
                      $this->id = $id;
                 }

             public function setIdf($idf)
                 {
                      $this->idf = $idf;
                 }

             public function setQnt_av($qnt_av)
                 {
                      $this->qnt_av = $qnt_av;
                 }

             public function setQnt_apr($qnt_apr)
                 {
                      $this->qnt_apr = $qnt_apr;
                 }

             public function setDatestk($datestk)
                 {
                      $this->datestk = $datestk;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count etat_stock =====================*/
					public function countEtat_stock(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get etat_stock =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("id" =>$this->id);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste etat_stock =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("etat_stock");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("etat_stock");
					    $condition = array( 'id'=>$this->id );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("etat_stock");
					    $condition = array( 'id'=>$this->id );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_etat_stock = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If etat_stock existe =====================*/
					public function ifEtat_stockexiste($condition){
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
                       $this->idf = (!isset($idf) || empty($idf) )  ? 0: $idf;
                       $this->qnt_av = (!isset($qnt_av) || empty($qnt_av) )  ? 0: $qnt_av;
                       $this->qnt_apr = (!isset($qnt_apr) || empty($qnt_apr) )  ? 0: $qnt_apr;
                       $this->datestk = (!isset($datestk) || empty($datestk) )  ? '': $datestk;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'id'=>($this->id == 0 || $this->id == 'null')  ? $OldTable['id']:$this->id,
                                  'IDF'=>($this->idf == 0 )  ? $OldTable['idf']:$this->idf,
                                  'QNT_AV'=>($this->qnt_av == 0 )  ? $OldTable['qnt_av']:$this->qnt_av,
                                  'QNT_APR'=>($this->qnt_apr == 0 )  ? $OldTable['qnt_apr']:$this->qnt_apr,
                                  'DATESTK'=>($this->datestk == null )  ? $OldTable['datestk']:$this->datestk					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'id'=>'null',
                                  'IDF'=>0,
                                  'QNT_AV'=>0,
                                  'QNT_APR'=>0,
                                  'DATESTK'=>date("")					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



