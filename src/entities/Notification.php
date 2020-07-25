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

        class Notification extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idn;
        private  $ido;
        private  $origine;
        private  $cible;
        private  $libele;
        private  $datee;
        private  $etat;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="notification";
                 $this->idn = 'null' ;
                 $this->ido = 0 ;
                 $this->origine = "" ;
                 $this->cible = "" ;
                 $this->libele = "" ;
                 $this->datee = date("") ;
                 $this->etat = 0 ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdn()
                 {
                     return $this->idn;
                 }

             public function getIdo()
                 {
                     return $this->ido;
                 }

             public function getOrigine()
                 {
                     return $this->origine;
                 }

             public function getCible()
                 {
                     return $this->cible;
                 }

             public function getLibele()
                 {
                     return $this->libele;
                 }

             public function getDatee()
                 {
                     return $this->datee;
                 }

             public function getEtat()
                 {
                     return $this->etat;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdn($idn)
                 {
                      $this->idn = $idn;
                 }

             public function setIdo($ido)
                 {
                      $this->ido = $ido;
                 }

             public function setOrigine($origine)
                 {
                      $this->origine = $origine;
                 }

             public function setCible($cible)
                 {
                      $this->cible = $cible;
                 }

             public function setLibele($libele)
                 {
                      $this->libele = $libele;
                 }

             public function setDatee($datee)
                 {
                      $this->datee = $datee;
                 }

             public function setEtat($etat)
                 {
                      $this->etat = $etat;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count notification =====================*/
					public function countNotification(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get notification =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDN" =>$this->IDN);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste notification =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("notification");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("notification");
					    $condition = array( 'IDN'=>$this->IDN );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("notification");
					    $condition = array( 'IDN'=>$this->IDN );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_notification = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If notification existe =====================*/
					public function ifNotificationexiste($condition){
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
                                                       $this->idn = (!isset($idn) || empty($idn) )  ? 0: $idn;
                       $this->ido = (!isset($ido) || empty($ido) )  ? 0: $ido;
                       $this->origine = (!isset($origine) || empty($origine) )  ? '': $origine;
                       $this->cible = (!isset($cible) || empty($cible) )  ? '': $cible;
                       $this->libele = (!isset($libele) || empty($libele) )  ? '': $libele;
                       $this->datee = (!isset($datee) || empty($datee) )  ? '': $datee;
                       $this->etat = (!isset($etat) || empty($etat) )  ? 0: $etat;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDN'=>($this->idn == 0 || $this->idn == 'null')  ? $OldTable['idn']:$this->idn,
                                  'IDO'=>($this->ido == 0 )  ? $OldTable['ido']:$this->ido,
                                  'ORIGINE'=>(!isset($this->origine) || empty($this->origine) )  ? $OldTable['origine']:$this->origine,
                                  'CIBLE'=>(!isset($this->cible) || empty($this->cible) )  ? $OldTable['cible']:$this->cible,
                                  'LIBELE'=>(!isset($this->libele) || empty($this->libele) )  ? $OldTable['libele']:$this->libele,
                                  'DATEE'=>($this->datee == null )  ? $OldTable['datee']:$this->datee,
                                  'ETAT'=>($this->etat == 0 )  ? $OldTable['etat']:$this->etat,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDN'=>'null',
                                  'IDO'=>0,
                                  'ORIGINE'=>"",
                                  'CIBLE'=>"",
                                  'LIBELE'=>"",
                                  'DATEE'=>date(""),
                                  'ETAT'=>0,
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



