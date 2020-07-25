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

        class V_facture extends Entitie
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
        private  $nommv;
        private  $date_del;
        private  $idc;
        private  $id_cat;
        private  $desi;
        private  $photo;
        private  $prixa;
        private  $prixv;
        private  $qntstk;
        private  $composer;
        private  $ftech;
        private  $flag;
        private  $idfa;
        private  $nom_cat;
        private  $achat;
        private  $vente;
        private  $compt;
        private  $nomf;
        private  $color;
        private  $nomc;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_facture";
                 $this->idf = 0 ;
                 $this->idmv = 0 ;
                 $this->idp = 0 ;
                 $this->pu = 0 ;
                 $this->qnt = 0 ;
                 $this->mts = 0 ;
                 $this->row = 0 ;
                 $this->fdesi = "" ;
                 $this->fcondis = "" ;
                 $this->nommv = "" ;
                 $this->date_del = date("") ;
                 $this->idc = 0 ;
                 $this->id_cat = 0 ;
                 $this->desi = "" ;
                 $this->photo = "" ;
                 $this->prixa = 0 ;
                 $this->prixv = 0 ;
                 $this->qntstk = 0 ;
                 $this->composer = 0 ;
                 $this->ftech = "" ;
                 $this->flag = 0 ;
                 $this->idfa = 0 ;
                 $this->nom_cat = "" ;
                 $this->achat = 0 ;
                 $this->vente = 0 ;
                 $this->compt = 0 ;
                 $this->nomf = "" ;
                 $this->color = "" ;
                 $this->nomc = "" ;
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

             public function getNommv()
                 {
                     return $this->nommv;
                 }

             public function getDate_del()
                 {
                     return $this->date_del;
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

             public function getQntstk()
                 {
                     return $this->qntstk;
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

             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getNom_cat()
                 {
                     return $this->nom_cat;
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

             public function getNomf()
                 {
                     return $this->nomf;
                 }

             public function getColor()
                 {
                     return $this->color;
                 }

             public function getNomc()
                 {
                     return $this->nomc;
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

             public function setNommv($nommv)
                 {
                      $this->nommv = $nommv;
                 }

             public function setDate_del($date_del)
                 {
                      $this->date_del = $date_del;
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

             public function setQntstk($qntstk)
                 {
                      $this->qntstk = $qntstk;
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

             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setNom_cat($nom_cat)
                 {
                      $this->nom_cat = $nom_cat;
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

             public function setNomf($nomf)
                 {
                      $this->nomf = $nomf;
                 }

             public function setColor($color)
                 {
                      $this->color = $color;
                 }

             public function setNomc($nomc)
                 {
                      $this->nomc = $nomc;
                 }

    /*==================End Setters liste=====================*/


    /*==================Persistence Methode list=====================*/



				/*================== Count v_facture =====================*/
					public function countV_facture(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"count"));
					                }

				/*================== Get v_facture =====================*/
					public function get(){
					    $this->db->setTablename($this->tablename);
					    ;
                                       return $this->db->getRows(array("where"=>$condition,"return_type"=>"single"));
					                }

				/*================== Liste v_facture =====================*/
					public function liste(){
					    $this->db->setTablename($this->tablename);
                                       return $this->db->getRows(array("return_type"=>"many"));
					                }
					  public function insert(){
					    $this->setTablename("v_facture");
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->post();
                               }
					  public function update(){
					    $this->setTablename("v_facture");
					    $condition = array(  );
					    $this->setTablearray($this->ObjecToarrayMaker());
                               return   $this->put($condition);
                               }
					  public function delete(){
					    $this->setTablename("v_facture");
					    $condition = array(  );
                                       return $this->remove($condition);
                               }
					  public function fldelete(){
					    $this->db->setTablename($this->tablename);
                               return $id_v_facture = $this->db->updateTable($this->ObjecToarrayMaker());
                               }

				/*================== If v_facture existe =====================*/
					public function ifV_factureexiste($condition){
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
                       $this->nommv = (!isset($nommv) || empty($nommv) )  ? '': $nommv;
                       $this->date_del = (!isset($date_del) || empty($date_del) )  ? '': $date_del;
                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->id_cat = (!isset($id_cat) || empty($id_cat) )  ? 0: $id_cat;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->photo = (!isset($photo) || empty($photo) )  ? '': $photo;
                       $this->prixa = (!isset($prixa) || empty($prixa) )  ? 0: $prixa;
                       $this->prixv = (!isset($prixv) || empty($prixv) )  ? 0: $prixv;
                       $this->qntstk = (!isset($qntstk) || empty($qntstk) )  ? 0: $qntstk;
                       $this->composer = (!isset($composer) || empty($composer) )  ? 0: $composer;
                       $this->ftech = (!isset($ftech) || empty($ftech) )  ? '': $ftech;
                       $this->flag = (!isset($flag) || empty($flag) )  ? 0: $flag;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->nom_cat = (!isset($nom_cat) || empty($nom_cat) )  ? '': $nom_cat;
                       $this->achat = (!isset($achat) || empty($achat) )  ? 0: $achat;
                       $this->vente = (!isset($vente) || empty($vente) )  ? 0: $vente;
                       $this->compt = (!isset($compt) || empty($compt) )  ? 0: $compt;
                       $this->nomf = (!isset($nomf) || empty($nomf) )  ? '': $nomf;
                       $this->color = (!isset($color) || empty($color) )  ? '': $color;
                       $this->nomc = (!isset($nomc) || empty($nomc) )  ? '': $nomc;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDF'=>($this->idf == 0 )  ? $OldTable['idf']:$this->idf,
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['idmv']:$this->idmv,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'PU'=>($this->pu == 0 )  ? $OldTable['pu']:$this->pu,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'MTS'=>($this->mts == 0 )  ? $OldTable['mts']:$this->mts,
                                  'ROW'=>($this->row == 0 )  ? $OldTable['row']:$this->row,
                                  'FDESI'=>(!isset($this->fdesi) || empty($this->fdesi) )  ? $OldTable['fdesi']:$this->fdesi,
                                  'FCONDIS'=>(!isset($this->fcondis) || empty($this->fcondis) )  ? $OldTable['fcondis']:$this->fcondis,
                                  'NOMMV'=>(!isset($this->nommv) || empty($this->nommv) )  ? $OldTable['nommv']:$this->nommv,
                                  'DATE_DEL'=>($this->date_del == null )  ? $OldTable['date_del']:$this->date_del,
                                  'IDC'=>($this->idc == 0 )  ? $OldTable['idc']:$this->idc,
                                  'ID_CAT'=>($this->id_cat == 0 )  ? $OldTable['id_cat']:$this->id_cat,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'PHOTO'=>(!isset($this->photo) || empty($this->photo) )  ? $OldTable['photo']:$this->photo,
                                  'PRIXA'=>($this->prixa == 0 )  ? $OldTable['prixa']:$this->prixa,
                                  'PRIXV'=>($this->prixv == 0 )  ? $OldTable['prixv']:$this->prixv,
                                  'QNTSTK'=>($this->qntstk == 0 )  ? $OldTable['qntstk']:$this->qntstk,
                                  'COMPOSER'=>($this->composer == 0 )  ? $OldTable['composer']:$this->composer,
                                  'FTECH'=>(!isset($this->ftech) || empty($this->ftech) )  ? $OldTable['ftech']:$this->ftech,
                                  'FLAG'=>($this->flag == 0 )  ? $OldTable['flag']:$this->flag,
                                  'IDFA'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'NOM_CAT'=>(!isset($this->nom_cat) || empty($this->nom_cat) )  ? $OldTable['nom_cat']:$this->nom_cat,
                                  'ACHAT'=>($this->achat == 0 )  ? $OldTable['achat']:$this->achat,
                                  'VENTE'=>($this->vente == 0 )  ? $OldTable['vente']:$this->vente,
                                  'COMPT'=>($this->compt == 0 )  ? $OldTable['compt']:$this->compt,
                                  'NOMF'=>(!isset($this->nomf) || empty($this->nomf) )  ? $OldTable['nomf']:$this->nomf,
                                  'COLOR'=>(!isset($this->color) || empty($this->color) )  ? $OldTable['color']:$this->color,
                                  'NOMC'=>(!isset($this->nomc) || empty($this->nomc) )  ? $OldTable['nomc']:$this->nomc					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDF'=>0,
                                  'IDMV'=>0,
                                  'IDP'=>0,
                                  'PU'=>0,
                                  'QNT'=>0,
                                  'MTS'=>0,
                                  'ROW'=>0,
                                  'FDESI'=>"",
                                  'FCONDIS'=>"",
                                  'NOMMV'=>"",
                                  'DATE_DEL'=>date(""),
                                  'IDC'=>0,
                                  'ID_CAT'=>0,
                                  'DESI'=>"",
                                  'PHOTO'=>"",
                                  'PRIXA'=>0,
                                  'PRIXV'=>0,
                                  'QNTSTK'=>0,
                                  'COMPOSER'=>0,
                                  'FTECH'=>"",
                                  'FLAG'=>0,
                                  'IDFA'=>0,
                                  'NOM_CAT'=>"",
                                  'ACHAT'=>0,
                                  'VENTE'=>0,
                                  'COMPT'=>0,
                                  'NOMF'=>"",
                                  'COLOR'=>"",
                                  'NOMC'=>""					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



