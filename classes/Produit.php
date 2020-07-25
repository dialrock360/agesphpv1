<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:17=====================*/

        class Produit extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idp;
        private  $idc;
        private  $id_cat;
        private  $desi;
        private  $composer;
        private  $photo;
        private  $prixa;
        private  $prixv;
        private  $qnt;
        private  $ftech;
        private  $flag;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="produit";
                 $this->idp = 'null' ;
                 $this->idc = 0 ;
                 $this->id_cat = 0 ;
                 $this->desi = "" ;
                 $this->photo = "" ;
                 $this->prixa = 0 ;
                 $this->prixv = 0 ;
                 $this->qnt = 0 ;
                 $this->composer = 0 ;
                 $this->ftech = "" ;
                 $this->flag = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getIdc()
                 {
                     return $this->idc;
                 }

             public function getId_cat()
                 {
                     return $this->id_cat;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

             public function getPhoto()
                 {
                     return $this->photo;
                 }

             public function getPrixa()
                 {
                     return $this->prixa;
                 }

             public function getPrixv()
                 {
                     return $this->prixv;
                 }

             public function getQnt()
                 {
                     return $this->qnt;
                 }

             public function getComposer()
                 {
                     return $this->composer;
                 }

             public function getFtech()
                 {
                     return $this->ftech;
                 }

             public function getFlag()
                 {
                     return $this->flag;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setIdc($idc)
                 {
                      $this->idc = $idc;
                 }

             public function setId_cat($id_cat)
                 {
                      $this->id_cat = $id_cat;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

             public function setPhoto($photo)
                 {
                      $this->photo = $photo;
                 }

             public function setPrixa($prixa)
                 {
                      $this->prixa = $prixa;
                 }

             public function setPrixv($prixv)
                 {
                      $this->prixv = $prixv;
                 }

             public function setQnt($qnt)
                 {
                      $this->qnt = $qnt;
                 }
             public function setComposer($composer)
                 {
                      $this->composer = $composer;
                 }

             public function setFtech($ftech)
                 {
                      $this->ftech = $ftech;
                 }

             public function setFlag($flag)
                 {
                      $this->flag = $flag;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count produit =====================*/
					public function countProduit(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get produit =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    $condition = array("IDP" =>$this->idp);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }
					public function getVprd(){
					    $this->db->setTablename('v_produit');
					    $condition = array("IDP" =>$this->idp);
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }


				/*================== Liste produit =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
            public function listeprd($dispo=true){
                $this->db->setTablename('v_produit');
                $condition = array("FLAG" =>0);
                return $this->db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
                //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
            }

            public function listeprdstk(){
                $this->db->setTablename('v_produit');
                $condition = array("FLAG" =>0,"COMPT" =>1 );
                return $this->db->getRows(array("where"=>$condition,"groupe_by"=>"idcat","order_by"=>"DESI asc","return_type"=>"many"));
                //return $this->db->getRows(array('where"=>$condition,order_by'=>'desi asc','return_type'=>'many'));
            }

                        public  function optionProduit($docTb,$Json='yes')
                        {

                           $option= "";



                            switch($docTb){
                                case 'fac':
                                    $this->db->setTablename('v_select_produit_facture');
                                    break;
                                case 'rec':
                                    $this->db->setTablename('v_select_produit_recu');
                                    break;
                                case 'cmp':
                                    $this->db->setTablename('v_select_produit_composer');
                                    break;
                                case 'charge':
                                    $this->db->setTablename('v_select_produit_charge');
                                    break;
                                case 'all':
                                    $this->db->setTablename('produit');
                                    break;
                                default:
                                    $this->db->setTablename('produit');
                            }

                            $ls =  $this->db->getRows(array('order_by'=>'desi asc','return_type'=>'many'));
                            foreach($ls as $row )
                            {


                                extract($row);
                                  $myJSON = $this->VProdarrayToJson($row); //echo '<hr>';

                                if ($Json=='yes'){
                                    $myJSON = $IDP;
                                }




                                $option .= ' <option value="'.htmlspecialchars($myJSON).'">'.$DESI.' </option>';


                            }
                            return $option;
                        }

            public   function addProd($idc, $cat, $desi, $qnt, $photo, $prixa, $prixv,$ftech)
            {


                $add=0;
                if ($idc> 0 && $cat> 0){
                    //echo $idc.' --- '.$cat;
                    $insertData= array(

                        'IDP'=>'null',
                        'IDC'=>$idc,
                        'ID_CAT'=>$cat,
                        'DESI'=>$desi,
                        'PHOTO'=>$photo,
                        'PRIXA'=>$prixa,
                        'PRIXV'=>$prixv,
                        'QNT'=>$qnt,
                        'COMPOSER'=>0,
                        'FTECH'=>$ftech,
                        'FLAG'=>0
                    );
                    $this->setTablename("produit");
                    $this->setTablearray($insertData);
                    return   $this->post();
                }

                //print_r($insertData);
                return $add;
                //return insert($rowarray,'facture'); $this->etastk
            }

            public   function updateProd( $idc, $cat, $desi, $qnt,$comp, $photo, $prixa, $prixv,$ftech)
            {
                $add=0;
                if ($this->idp> 0){
                     $insertData= array(
                        'IDC'=>$idc,
                        'ID_CAT'=>$cat,
                        'DESI'=>$desi,
                        'PHOTO'=>$photo,
                        'PRIXA'=>$prixa,
                        'PRIXV'=>$prixv,
                        'QNT'=>$qnt,
                        'COMPOSER'=>$comp,
                        'FTECH'=>$ftech,
                        'FLAG'=>0
                    );
                 /*  ECHO  $requete = "UPDATE `produit` SET
                `DESI`='".htmlentities($desi)."',
                `PRIXA`='".htmlentities($prixa)."',
                `PRIXV`='".htmlentities($prixv)."',
                `QNT`='".htmlentities($qnt)."',
                `COMPOSER`='".htmlentities($comp)."',
                `PHOTO`='".htmlentities($photo)."',
                `FTECH`='".htmlentities($ftech)."',
                `IDC`= ".$idc." ,
                `ID_CAT`= ".$cat." ,
                `FLAG`=0'
                 WHERE `IDP`=$this->idp";*/

                  // return   $this->Querypost($requete);
                    $this->setTablename("produit");
                    $condition = array( 'IDP'=>$this->idp );
                    $this->setTablearray($insertData);
                   // $add= $this->put($condition);
                }

                //print_r($insertData);
                return $add;
                //return insert($rowarray,'facture'); $this->etastk
            }
            private function VProdarrayToJson($OLDTABLE){

                /*$Table= array(
                    'IDP'=> "IDP:".$OLDTABLE['IDP'].""  ,
                    'IDC'=> "IDC:".$OLDTABLE['IDC'].""  ,
                    'ID_CAT'=> "ID_CAT:".$OLDTABLE['ID_CAT'].""  ,
                    'DESI'=> "DESI:".$OLDTABLE['DESI'].""  ,
                    'PHOTO'=> "PHOTO:".$OLDTABLE['PHOTO'].""  ,
                    'PRIXA'=> "PRIXA:".$OLDTABLE['PRIXA'].""  ,
                    'PRIXV'=> "PRIXV:".$OLDTABLE['PRIXV'].""  ,
                    'QNT'=> "QNT:".$OLDTABLE['QNT'].""  ,
                    'COMPOSER'=> "COMPOSER:".$OLDTABLE['COMPOSER'].""  ,

                    'FTECH'=> "FTECH:".$OLDTABLE['FTECH'].""  ,
                    'FLAG'=> "FLAG:".$OLDTABLE['FLAG'].""  ,
                    'IDFA'=> "IDFA:".$OLDTABLE['IDFA'].""  ,

                    'NOM_CAT'=> "IDP:".$OLDTABLE['NOM_CAT'].""  ,
                    'ACHAT'=> "ACHAT:".$OLDTABLE['ACHAT'].""  ,
                    'VENTE'=> "VENTE:".$OLDTABLE['VENTE'].""  ,
                    'COMPT'=> "COMPT:".$OLDTABLE['COMPT'].""  ,
                    'NOMF'=> "NOMF:".$OLDTABLE['NOMF'].""  ,
                    'COLOR'=> "COLOR:".$OLDTABLE['COLOR'].""  ,
                    'NOMC'=> "NOMC:".$OLDTABLE['NOMC'].""  ,
                    ''=> $OLDTABLE['NOMC']
                );

                               $Table= '';

                        $Table->IDP  =    $OLDTABLE['IDP']  ;
                        $Table->IDC  =    $OLDTABLE['IDC'];
                        $Table->ID_CAT  =    $OLDTABLE['ID_CAT'];
                        $Table->DESI  =    $OLDTABLE['DESI'];
                        $Table->PHOTO  =    $OLDTABLE['PHOTO'];
                        $Table->PRIXA  =   $OLDTABLE['PRIXA'];
                        $Table->PRIXV  =    $OLDTABLE['PRIXV']  ;
                        $Table->QNT  =   $OLDTABLE['QNT'];
                        $Table->COMPOSER  =   $OLDTABLE['COMPOSER'];
                        $Table->FTECH  =   $OLDTABLE['FTECH'];
                        $Table->FLAG  =   $OLDTABLE['FLAG'];
                        $Table->IDFA  =   $OLDTABLE['IDFA'];
                        $Table->NOM_CAT  =   $OLDTABLE['NOM_CAT'];
                        $Table->ACHAT  =   $OLDTABLE['ACHAT'] ;
                        $Table->VENTE  =   $OLDTABLE['VENTE'];
                        $Table->COMPT  =   $OLDTABLE['COMPT'];
                        $Table->NOMF  =   $OLDTABLE['NOMF'];
                        $Table->COLOR  =   $OLDTABLE['COLOR'];
                        $Table->NOMC  =   $OLDTABLE['NOMC'];
                       $myJSON = json_encode($Table);

                */
                /*$Table= array();

                        $Table['IDP'] = $OLDTABLE['IDP']  ;
                        $Table['IDC'] = $OLDTABLE['IDC'];
                        $Table['ID_CAT'] = $OLDTABLE['ID_CAT'];
                        $Table['DESI'] = $OLDTABLE['DESI'];
                        $Table['PHOTO'] = $OLDTABLE['PHOTO'];
                        $Table['PRIXA'] =$OLDTABLE['PRIXA'];
                        $Table['PRIXV'] = $OLDTABLE['PRIXV']  ;
                        $Table['QNT'] =$OLDTABLE['QNT'];
                        $Table['COMPOSER'] =$OLDTABLE['COMPOSER'];
                        $Table['FTECH'] =$OLDTABLE['FTECH'];
                        $Table['FLAG'] =$OLDTABLE['FLAG'];
                        $Table['IDFA'] =$OLDTABLE['IDFA'];
                        $Table['NOM_CAT'] =$OLDTABLE['NOM_CAT'];
                        $Table['ACHAT'] =$OLDTABLE['ACHAT'] ;
                        $Table['VENTE'] =$OLDTABLE['VENTE'];
                        $Table['COMPT'] =$OLDTABLE['COMPT'];
                        $Table['NOMF'] =$OLDTABLE['NOMF'];
                        $Table['COLOR'] =$OLDTABLE['COLOR'];
                        $Table['NOMC'] =$OLDTABLE['NOMC'];
                       $myJSON = json_encode($Table);
                return $myJSON;*/
                $Table= array(
                    'IDP'=>  $OLDTABLE['IDP']   ,
                    'IDC'=>  $OLDTABLE['IDC'],
                    'ID_CAT'=>  $OLDTABLE['ID_CAT'] ,
                    'DESI'=>  $OLDTABLE['DESI'] ,
                    'PRIXA'=> $OLDTABLE['PRIXA'] ,
                    'PRIXV'=>  $OLDTABLE['PRIXV']   ,
                    'QNT'=> $OLDTABLE['QNT'] ,
                    'COMPOSER'=> $OLDTABLE['COMPOSER'] ,
                    'IDFA'=> $OLDTABLE['IDFA'] ,
                    'NOM_CAT'=> $OLDTABLE['NOM_CAT'] ,
                    'ACHAT'=> $OLDTABLE['ACHAT'] ,
                    'VENTE'=> $OLDTABLE['VENTE'],
                    'COMPT'=> $OLDTABLE['COMPT'],
                    'NOMF'=> $OLDTABLE['NOMF'],
                    'NOMC'=> $OLDTABLE['NOMC']
                );
                return implode("%$",$Table);
            }
            private function VProdToarrayMaker($OLDTABLE){

                $Table= array(
                    'IDP'=>  $OLDTABLE['IDP']   ,
                    'IDC'=>  $OLDTABLE['IDC'],
                    'ID_CAT'=>  $OLDTABLE['ID_CAT'] ,
                    'DESI'=>  $OLDTABLE['DESI'] ,
                    'PHOTO'=>  $OLDTABLE['PHOTO'] ,
                    'PRIXA'=> $OLDTABLE['PRIXA'] ,
                    'PRIXV'=>  $OLDTABLE['PRIXV']   ,
                    'QNT'=> $OLDTABLE['QNT'] ,
                    'COMPOSER'=> $OLDTABLE['COMPOSER'] ,
                    'FTECH'=> $OLDTABLE['FTECH'] ,
                    'FLAG'=> $OLDTABLE['FLAG'] ,
                    'IDFA'=> $OLDTABLE['IDFA'] ,
                    'NOM_CAT'=> $OLDTABLE['NOM_CAT'] ,
                    'ACHAT'=> $OLDTABLE['ACHAT'] ,
                    'VENTE'=> $OLDTABLE['VENTE'],
                    'COMPT'=> $OLDTABLE['COMPT'],
                    'NOMF'=> $OLDTABLE['NOMF'],
                    'COLOR'=> $OLDTABLE['COLOR'],
                    'NOMC'=> $OLDTABLE['NOMC']
                );
                return $Table;
            }
					  public function insert(){
					    $this->setTablename("produit");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }

					  public function updateQnt(){
					    $this->setTablename("produit");
                          $Table= array('QNT'=>$this->qnt);
					    $condition = array( 'IDP'=>$this->idp );
					    $this->setTablearray($Table);
                               return   $this->put($condition);
                               }



					  public function update(){
					    $this->setTablename("produit");
					    $condition = array( 'IDP'=>$this->idp );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
							   
							   
					  public function handlerupdate(){
					    $this->setTablename("produit");
					    $condition = array( 'IDP'=>$this->idp );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
							   
					  public function delete(){
					    $this->setTablename("produit");
					    $condition = array( 'IDP'=>$this->IDP );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
                          $this->setTablename("produit");
                          $Table= array('FLAG'=>1);
                          $condition = array( 'IDP'=>$this->idp );
                          $this->setTablearray($Table);
                          return   $this->put($condition);
                               }

				/*================== If produit existe =====================*/
					public function ifProduitexiste($condition){
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
                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->id_cat = (!isset($id_cat) || empty($id_cat) )  ? 0: $id_cat;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->photo = (!isset($photo) || empty($photo) )  ? '': $photo;
                       $this->prixa = (!isset($prixa) || empty($prixa) )  ? 0: $prixa;
                       $this->prixv = (!isset($prixv) || empty($prixv) )  ? 0: $prixv;
                       $this->qnt = (!isset($qnt) || empty($qnt) )  ? 0: $qnt;
                       $this->ftech = (!isset($ftech) || empty($ftech) )  ? '': $ftech;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ( $this->idp>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDP'=>($this->idp == 0 || $this->idp == 'null')  ? $OldTable['idp']:$this->idp,
                                  'IDC'=>($this->idc == 0 )  ? $OldTable['idc']:$this->idc,
                                  'ID_CAT'=>($this->id_cat == 0 )  ? $OldTable['id_cat']:$this->id_cat,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'PHOTO'=>(!isset($this->photo) || empty($this->photo) )  ? $OldTable['photo']:$this->photo,
                                  'PRIXA'=>($this->prixa == 0 )  ? $OldTable['prixa']:$this->prixa,
                                  'PRIXV'=>($this->prixv == 0 )  ? $OldTable['prixv']:$this->prixv,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'COMPOSER'=>($this->qnt == 0 )  ? $OldTable['COMPOSER']:$this->qnt,
                                  'FTECH'=>(!isset($this->ftech) || empty($this->ftech) )  ? $OldTable['ftech']:$this->ftech,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDP'=>'null',
                                  'IDC'=>0,
                                  'ID_CAT'=>0,
                                  'DESI'=>"",
                                  'PHOTO'=>"",
                                  'PRIXA'=>0,
                                  'PRIXV'=>0,
                                  'QNT'=>0,
                                  'COMPOSER'=>0,
                                  'FTECH'=>"",
                                  'FLAG'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



