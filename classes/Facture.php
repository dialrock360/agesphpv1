<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;
    require_once 'Entitie.php';
    require_once 'Etat_stock.php';
    require_once 'Produit.php';
    require_once 'Produit_cmp.php';
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

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
        private  $etastk;
        private  $prd;
        private  $prdcmp;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();
           $this->etastk = new Etat_stock();
           $this->prd = new Produit();
           $this->prdcmp = new Produit_cmp();
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
					    $condition = array("IDF" =>$this->idf);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }
					public function getVfc(){
                        $this->db->setTablename('v_facture');
					    $condition = array("IDF" =>$this->idf);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste facture =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
                    function listefactureactive($IDFA,$NOMMV,$date)
                    {

                        $this->db->setTablename('v_facture');
                        $condition = array("IDFA" =>$IDFA,"NOMMV" =>$NOMMV,"DATE_DEL" =>$date);
                        return $this->db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                    }
            public function sumMtsbyfam($idfa,$NOMMV,$datedeb,$datefn){
					    $val=($NOMMV=='facture')?'GAIN':'DEPENSE';
                 $take='SELECT NOMF, IDFA ,sum(MTS) as '.$val.' FROM v_facture WHERE IDFA='.$idfa.' AND NOMMV="'.$NOMMV.'" and DATE_DEL>="'.$datedeb.'" AND DATE_DEL<="'.$datefn.'" ';
                // echo '<hr>';
                return $this->db->getspecificQuery($take,"single" );
            }
            public function getByrangedate2($idfa,$NOMMV,$datedeb,$datefn){
               echo $take='SELECT * FROM v_facture WHERE IDFA='.$idfa.' AND NOMMV="'.$NOMMV.'" and DATE_DEL>="'.$datedeb.'" AND DATE_DEL<="'.$datefn.'" ';
                echo '<hr>';
                return $this->db->getspecificQuery($take,"many" );
            }

            public function insert(){
					    $this->setTablename("facture");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("facture");
					    $condition = array( 'IDF'=>$this->idf );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("facture");
					    $condition = array( 'IDF'=>$this->idf );
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
                         // print_r($this->ObjecToarrayMaker());
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->idf > 0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDF'=>($this->idf == 0 || $this->idf == 'null')  ? $OldTable['IDF']:$this->idf,
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['IDMV']:$this->idmv,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['IDP']:$this->idp,
                                  'PU'=>($this->pu == 0 )  ? $OldTable['PU']:$this->pu,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['QNT']:$this->qnt,
                                  'MTS'=>($this->mts == 0 )  ? $OldTable['MTS']:$this->mts,
                                  'ROW'=>($this->row == 0 )  ? $OldTable['ROW']:$this->row,
                                  'FDESI'=>(!isset($this->fdesi) || empty($this->fdesi) )  ? $OldTable['FDESI']:$this->fdesi,
                                  'FCONDIS'=>(!isset($this->fcondis) || empty($this->fcondis) )  ? $OldTable['FCONDIS']:$this->fcondis					     );
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

            public   function updateFac($idmv,$idf, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis,$nommv,$qntstk,$date)
            {
                $ret=0;
                $updatetab=array();
                $insertData = array('PU' => $pu , 'QNT' => $qnt, 'MTS' => $mts , 'ROW' =>$i  , 'FDESI' =>$fdesi, 'FCONDIS' =>$fcondis);
                $updatetab['newfact']=$insertData;
                               $this->idf=$idf;
                               $oldfact=$this->getVfc();
                              if ($oldfact == null){
                                    $ret=   $this->addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis,$nommv,$oldfact,$date);


                                }
                 if ($oldfact != null){

                     $updatetab['oldfact']=$oldfact;
                     $this->setTablename('facture');
                     $condition = array( 'IDF'=>$idf);
                     $this->setTablearray($insertData);
                     $ret=   $this->put($condition);
                     if($nommv=='facture' || $nommv=='recu'){
                         $this->updateCmtStk($idp,$idf, $nommv, $qnt,$updatetab,$date,'update' );
                      }
                 }
                //print_r($insertData);
                return $ret;
                //return insert($rowarray,'facture'); $this->etastk
            }
            public   function delFac($idf)
            {

                $this->idf=$idf;
                $olfact=$this->getVfc();
                if ($olfact['IDF']> 0){
                    if($olfact['NOMMV']=='facture' || $olfact['NOMMV']=='recu'){
                        extract($olfact);

                        $this->updateCmtStk($IDP,$idf, $NOMMV, $QNT,$QNTSTK,$DATE_DEL,'delete' );
                    }
                }

                //print_r($insertData);
               return $this->delete();
                //return insert($rowarray,'facture'); $this->etastk
            }

            public   function addFac($idmv, $idp, $pu, $qnt, $mts, $i, $fdesi, $fcondis,$nommv,$qntstk,$date)
            {

                $insertData = array();
                if ($idmv> 0){
                        $insertData = array(
                            'IDF' => 'null' ,
                            'IDMV' =>$idmv ,
                            'IDP' =>$idp ,
                            'PU' =>$pu ,
                            'QNT' =>$qnt ,
                            'MTS' =>$mts ,
                            'ROW' =>$i ,
                            'FDESI' =>($nommv=='facture' || $nommv=='recu')  ? "":$fdesi  ,
                            'FCONDIS' =>($nommv=='facture' || $nommv=='recu')  ? "":$fcondis ,
                        );

                    $this->setTablearray($insertData);
                    $idf=$this->post();
                 }
                    if($nommv=='facture' || $nommv=='recu'){
                        $this->updateCmtStk($idp,$idf, $nommv, $qnt,$qntstk,$date,'add' );
                    }
                //print_r($insertData);
                 return $idf;
                //return insert($rowarray,'facture'); $this->etastk
            }
            public  function updateCmtStk($idp,$idf, $nommv, $qnt,$qntstk ,$date,$intert='add')
            {
                $dif=0;

                $oldfac=($intert=='update'   )?$qntstk:null;
                $this->prd->setIdp($idp);
                $olprd= $this->prd->get();
                $qntstk=$olprd['QNT'];
                if ($idf>0){
                    $qntfinal=($intert=='update')?$oldfac['oldfact']['QNT']:0;
                    if($nommv=='facture' ){
                        if($intert=='add' || $intert=='delete' ){
                            $qntfinal=($intert=='add')? (doubleval($qntstk)) - (doubleval($qnt)): (doubleval($qntstk)) + (doubleval($qnt));
                        }


                        if($intert=='update'   ){

                            if($oldfac['oldfact']['QNT']!=$oldfac['newfact']['QNT'] ){

                                if($oldfac['oldfact']['QNT'] < $oldfac['newfact']['QNT'] ){
                                    $dif=(doubleval($oldfac['newfact']['QNT'])) - (doubleval($oldfac['oldfact']['QNT']));
                                    $qntfinal=  (doubleval($qntstk)) - $dif;

                                }
                                if($oldfac['oldfact']['QNT'] > $oldfac['newfact']['QNT'] ){

                                    $dif=(doubleval($oldfac['oldfact']['QNT'])) - (doubleval($oldfac['newfact']['QNT']));
                                    $qntfinal=  (doubleval($qntstk)) + $dif;
                                }
                            }
                        }

                    }
                    if(  $nommv=='recu'){
                        if($intert=='add' || $intert=='delete' ){
                            $qntfinal=($intert=='add')? (doubleval($qntstk)) + (doubleval($qnt)): (doubleval($qntstk)) - (doubleval($qnt));
                        }

                        if($intert=='update'   ){

                            if($oldfac['oldfact']['QNT']!=$oldfac['newfact']['QNT'] ){

                                if($oldfac['oldfact']['QNT'] < $oldfac['newfact']['QNT'] ){
                                    $dif=(doubleval($oldfac['newfact']['QNT'])) - (doubleval($oldfac['oldfact']['QNT']));
                                    $qntfinal=  (doubleval($qntstk)) + $dif;

                                }
                                if($oldfac['oldfact']['QNT'] > $oldfac['newfact']['QNT'] ){

                                    $dif=(doubleval($oldfac['oldfact']['QNT'])) - (doubleval($oldfac['newfact']['QNT']));
                                    $qntfinal=  (doubleval($qntstk)) - $dif;
                                }
                            }
                        }
                    }
                     // echo 'QntOlfact = '.$oldfac['oldfact']['QNT'].' | Dif = '.$dif.' | QntFacfinal = '.$qnt.'<hr>';

                   $this->updateQntStk($idp,$qntfinal,$nommv,$olprd,$intert);

                //    $this->etastk->post();
                    if($intert=='add' || $intert=='delete' ){

                        $upetastk=($intert=='add')? $this->etastk->addetastock($idf,doubleval($qntstk),doubleval($qntfinal),$date):$this->etastk->deletastock($idf,$date);
                    }
                       if($intert=='update'   ){
                        $upetastk=$this->etastk->updateetastock($idf,doubleval($qnt),doubleval($qntfinal),$date);
                       }
                    return $upetastk;
                }

                return 0;
                //return insert($rowarray,'facture'); $this->etastk
            }

            public  function updateQntStk($idp,$qntfinal, $nommv,$olprd,$intert='add' )
            {

              //  echo 'QntPrd = '.$olprd['QNT'].' | QntPrdfinal = '.$qntfinal.'<hr>';

                /*$this->prd->setIdp($idp);
                $olprd= $this->prd->get();*/
                //print_r($olprd);echo '<hr>';
                 if($nommv=='facture' || $nommv=='recu' ){

                     if($olprd['COMPOSER']==1 ){

                         $this->prdcmp->setIdp($idp);
                         $this->prdcmp->updateQntStk($idp,$intert);


                     }else{
                         $this->prd->setQnt(doubleval($qntfinal));
                         $this->prd->updateQnt();
                     }
                 }


               // $olprd= $this->prd->get();
              //  print_r($olprd);
            }
    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



