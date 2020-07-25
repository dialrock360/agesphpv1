<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:18=====================*/

        class V_prd_details extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idc;
        private  $nomc;
        private  $desi;
        private  $img;
        private  $idp;
        private  $idcp;
        private  $pxa;
        private  $pxv;
        private  $qnt;
        private  $flag;
        private  $idcat;
        private  $idfam;
        private  $nomcat;
        private  $achat;
        private  $vente;
        private  $compt;
        private  $idfa;
        private  $fdesi;
        private  $color;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_prd_details";
                 $this->idc = 0 ;
                 $this->nomc = "" ;
                 $this->desi = "" ;
                 $this->img = "" ;
                 $this->idp = 0 ;
                 $this->idcp = 0 ;
                 $this->pxa = 0 ;
                 $this->pxv = 0 ;
                 $this->qnt = 0 ;
                 $this->flag = 0 ;
                 $this->idcat = 0 ;
                 $this->idfam = 0 ;
                 $this->nomcat = "" ;
                 $this->achat = 0 ;
                 $this->vente = 0 ;
                 $this->compt = 0 ;
                 $this->idfa = 0 ;
                 $this->fdesi = "" ;
                 $this->color = "" ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdc()
                 {
                     return $this->idc;
                 }

             public function getNomc()
                 {
                     return $this->nomc;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

             public function getImg()
                 {
                     return $this->img;
                 }

             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getIdcp()
                 {
                     return $this->idcp;
                 }

             public function getPxa()
                 {
                     return $this->pxa;
                 }

             public function getPxv()
                 {
                     return $this->pxv;
                 }

             public function getQnt()
                 {
                     return $this->qnt;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

             public function getIdcat()
                 {
                     return $this->idcat;
                 }

             public function getIdfam()
                 {
                     return $this->idfam;
                 }

             public function getNomcat()
                 {
                     return $this->nomcat;
                 }

             public function getAchat()
                 {
                     return $this->achat;
                 }

             public function getVente()
                 {
                     return $this->vente;
                 }

             public function getCompt()
                 {
                     return $this->compt;
                 }

             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getFdesi()
                 {
                     return $this->fdesi;
                 }

             public function getColor()
                 {
                     return $this->color;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdc($idc)
                 {
                      $this->idc = $idc;
                 }

             public function setNomc($nomc)
                 {
                      $this->nomc = $nomc;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

             public function setImg($img)
                 {
                      $this->img = $img;
                 }

             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setIdcp($idcp)
                 {
                      $this->idcp = $idcp;
                 }

             public function setPxa($pxa)
                 {
                      $this->pxa = $pxa;
                 }

             public function setPxv($pxv)
                 {
                      $this->pxv = $pxv;
                 }

             public function setQnt($qnt)
                 {
                      $this->qnt = $qnt;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

             public function setIdcat($idcat)
                 {
                      $this->idcat = $idcat;
                 }

             public function setIdfam($idfam)
                 {
                      $this->idfam = $idfam;
                 }

             public function setNomcat($nomcat)
                 {
                      $this->nomcat = $nomcat;
                 }

             public function setAchat($achat)
                 {
                      $this->achat = $achat;
                 }

             public function setVente($vente)
                 {
                      $this->vente = $vente;
                 }

             public function setCompt($compt)
                 {
                      $this->compt = $compt;
                 }

             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setFdesi($fdesi)
                 {
                      $this->fdesi = $fdesi;
                 }

             public function setColor($color)
                 {
                      $this->color = $color;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count v_prd_details =====================*/
					public function countV_prd_details(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get v_prd_details =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    ;
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste v_prd_details =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("v_prd_details");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("v_prd_details");
					    $condition = array(  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("v_prd_details");
					    $condition = array(  );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_v_prd_details = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If v_prd_details existe =====================*/
					public function ifV_prd_detailsexiste($condition){
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
                                                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->nomc = (!isset($nomc) || empty($nomc) )  ? '': $nomc;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->img = (!isset($img) || empty($img) )  ? '': $img;
                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->idcp = (!isset($idcp) || empty($idcp) )  ? 0: $idcp;
                       $this->pxa = (!isset($pxa) || empty($pxa) )  ? 0: $pxa;
                       $this->pxv = (!isset($pxv) || empty($pxv) )  ? 0: $pxv;
                       $this->qnt = (!isset($qnt) || empty($qnt) )  ? 0: $qnt;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                       $this->idcat = (!isset($idcat) || empty($idcat) )  ? 0: $idcat;
                       $this->idfam = (!isset($idfam) || empty($idfam) )  ? 0: $idfam;
                       $this->nomcat = (!isset($nomcat) || empty($nomcat) )  ? '': $nomcat;
                       $this->achat = (!isset($achat) || empty($achat) )  ? 0: $achat;
                       $this->vente = (!isset($vente) || empty($vente) )  ? 0: $vente;
                       $this->compt = (!isset($compt) || empty($compt) )  ? 0: $compt;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->fdesi = (!isset($fdesi) || empty($fdesi) )  ? '': $fdesi;
                       $this->color = (!isset($color) || empty($color) )  ? '': $color;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'idc'=>($this->idc == 0 )  ? $OldTable['idc']:$this->idc,
                                  'nomc'=>(!isset($this->nomc) || empty($this->nomc) )  ? $OldTable['nomc']:$this->nomc,
                                  'desi'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'img'=>(!isset($this->img) || empty($this->img) )  ? $OldTable['img']:$this->img,
                                  'idp'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'idcp'=>($this->idcp == 0 )  ? $OldTable['idcp']:$this->idcp,
                                  'pxa'=>($this->pxa == 0 )  ? $OldTable['pxa']:$this->pxa,
                                  'pxv'=>($this->pxv == 0 )  ? $OldTable['pxv']:$this->pxv,
                                  'qnt'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'flag'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag,
                                  'idcat'=>($this->idcat == 0 )  ? $OldTable['idcat']:$this->idcat,
                                  'idfam'=>($this->idfam == 0 )  ? $OldTable['idfam']:$this->idfam,
                                  'nomcat'=>(!isset($this->nomcat) || empty($this->nomcat) )  ? $OldTable['nomcat']:$this->nomcat,
                                  'achat'=>($this->achat == 0 )  ? $OldTable['achat']:$this->achat,
                                  'vente'=>($this->vente == 0 )  ? $OldTable['vente']:$this->vente,
                                  'COMPT'=>($this->compt == 0 )  ? $OldTable['compt']:$this->compt,
                                  'idfa'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'fdesi'=>(!isset($this->fdesi) || empty($this->fdesi) )  ? $OldTable['fdesi']:$this->fdesi,
                                  'COLOR'=>(!isset($this->color) || empty($this->color) )  ? $OldTable['color']:$this->color					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'idc'=>0,
                                  'nomc'=>"",
                                  'desi'=>"",
                                  'img'=>"",
                                  'idp'=>0,
                                  'idcp'=>0,
                                  'pxa'=>0,
                                  'pxv'=>0,
                                  'qnt'=>0,
                                  'flag'=>0,
                                  'idcat'=>0,
                                  'idfam'=>0,
                                  'nomcat'=>"",
                                  'achat'=>0,
                                  'vente'=>0,
                                  'COMPT'=>0,
                                  'idfa'=>0,
                                  'fdesi'=>"",
                                  'COLOR'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



