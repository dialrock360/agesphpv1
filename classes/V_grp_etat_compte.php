<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:18=====================*/

        class V_grp_etat_compte extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $ide;
        private  $idfa;
        private  $idmouv;
        private  $depense;
        private  $gains;
        private  $stock;
        private  $datee;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_grp_etat_compte";
                 $this->ide = 0 ;
                 $this->idfa = 0 ;
                 $this->idmouv = 0 ;
                 $this->depense = 0 ;
                 $this->gains = 0 ;
                 $this->stock = 0 ;
                 $this->datee = date("") ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIde()
                 {
                     return $this->ide;
                 }

             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getIdmouv()
                 {
                     return $this->idmouv;
                 }

             public function getDepense()
                 {
                     return $this->depense;
                 }

             public function getGains()
                 {
                     return $this->gains;
                 }

             public function getStock()
                 {
                     return $this->stock;
                 }

             public function getDatee()
                 {
                     return $this->datee;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIde($ide)
                 {
                      $this->ide = $ide;
                 }

             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setIdmouv($idmouv)
                 {
                      $this->idmouv = $idmouv;
                 }

             public function setDepense($depense)
                 {
                      $this->depense = $depense;
                 }

             public function setGains($gains)
                 {
                      $this->gains = $gains;
                 }

             public function setStock($stock)
                 {
                      $this->stock = $stock;
                 }

             public function setDatee($datee)
                 {
                      $this->datee = $datee;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count v_grp_etat_compte =====================*/
					public function countV_grp_etat_compte(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get v_grp_etat_compte =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    ;
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste v_grp_etat_compte =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("v_grp_etat_compte");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("v_grp_etat_compte");
					    $condition = array(  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("v_grp_etat_compte");
					    $condition = array(  );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_v_grp_etat_compte = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If v_grp_etat_compte existe =====================*/
					public function ifV_grp_etat_compteexiste($condition){
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
                                                       $this->ide = (!isset($ide) || empty($ide) )  ? 0: $ide;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->idmouv = (!isset($idmouv) || empty($idmouv) )  ? 0: $idmouv;
                       $this->depense = (!isset($depense) || empty($depense) )  ? 0: $depense;
                       $this->gains = (!isset($gains) || empty($gains) )  ? 0: $gains;
                       $this->stock = (!isset($stock) || empty($stock) )  ? 0: $stock;
                       $this->datee = (!isset($datee) || empty($datee) )  ? '': $datee;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDE'=>($this->ide == 0 )  ? $OldTable['ide']:$this->ide,
                                  'IDFA'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'IDMOUV'=>($this->idmouv == 0 )  ? $OldTable['idmouv']:$this->idmouv,
                                  'DEPENSE'=>($this->depense == 0 )  ? $OldTable['depense']:$this->depense,
                                  'GAINS'=>($this->gains == 0 )  ? $OldTable['gains']:$this->gains,
                                  'STOCK'=>($this->stock == 0 )  ? $OldTable['stock']:$this->stock,
                                  'DATEE'=>($this->datee == null )  ? $OldTable['datee']:$this->datee					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDE'=>0,
                                  'IDFA'=>0,
                                  'IDMOUV'=>0,
                                  'DEPENSE'=>0,
                                  'GAINS'=>0,
                                  'STOCK'=>0,
                                  'DATEE'=>date("")					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



