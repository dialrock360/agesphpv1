<?php

   /*==================================================
    MODELE MVC DEVELOPPE PAR Pierre Yem Mback
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 -  79
    ==================================================*/;require_once 'Entitie.php';;
    /*==================Classe creer par Samane samane_ui_admin le 10-12-2019 07:39:18=====================*/

        class V_facture extends Entitie
            {


    /*==================Attribut liste=====================*/
        private  $idf;
        private  $idmvf;
        private  $idpf;
        private  $pu;
        private  $qnt;
        private  $mts;
        private  $row;
        private  $fdesi;
        private  $fcondis;
        private  $idmv;
        private  $idumv;
        private  $nommv;
        private  $date_del;
        private  $objet;
        private  $conten;
        private  $totalht;
        private  $tva;
        private  $mtsch;
        private  $mtsltr;
        private  $reg;
        private  $avans;
        private  $reste;
        private  $cacher;
        private  $flagm;
        private  $idp;
        private  $idcp;
        private  $idcatp;
        private  $libele;
        private  $photo;
        private  $prixa;
        private  $prixv;
        private  $qnti;
        private  $ftech;
        private  $flagp;
        private  $idc;
        private  $nomc;
        private  $flagc;
        private  $id_cat;
        private  $idfamille;
        private  $nom_cat;
        private  $achat;
        private  $vente;
        private  $compt;
        private  $flagct;
        private  $idfa;
        private  $desi;
        private  $color;
        private  $flagfa;
    /*==================End Attribut liste=====================*/


    /*================== Constructor =====================*/
              public function __construct()

                 {
         parent::__construct();

         $this->tablename="v_facture";
                 $this->idf = 0 ;
                 $this->idmvf = 0 ;
                 $this->idpf = 0 ;
                 $this->pu = 0 ;
                 $this->qnt = 0 ;
                 $this->mts = 0 ;
                 $this->row = 0 ;
                 $this->fdesi = "" ;
                 $this->fcondis = "" ;
                 $this->idmv = 0 ;
                 $this->idumv = 0 ;
                 $this->nommv = "" ;
                 $this->date_del = date("") ;
                 $this->objet = "" ;
                 $this->conten = "" ;
                 $this->totalht = 0 ;
                 $this->tva = 0 ;
                 $this->mtsch = 0 ;
                 $this->mtsltr = "" ;
                 $this->reg = "" ;
                 $this->avans = 0 ;
                 $this->reste = 0 ;
                 $this->cacher = 0 ;
                 $this->flagm = 0 ;
                 $this->idp = 0 ;
                 $this->idcp = 0 ;
                 $this->idcatp = 0 ;
                 $this->libele = "" ;
                 $this->photo = "" ;
                 $this->prixa = 0 ;
                 $this->prixv = 0 ;
                 $this->qnti = 0 ;
                 $this->ftech = "" ;
                 $this->flagp = 0 ;
                 $this->idc = 0 ;
                 $this->nomc = "" ;
                 $this->flagc = 0 ;
                 $this->id_cat = 0 ;
                 $this->idfamille = 0 ;
                 $this->nom_cat = "" ;
                 $this->achat = 0 ;
                 $this->vente = 0 ;
                 $this->compt = 0 ;
                 $this->flagct = 0 ;
                 $this->idfa = 0 ;
                 $this->desi = "" ;
                 $this->color = "" ;
                 $this->flagfa = 0 ;
                 }

    /*==================End constructor=====================*/


    /*==================Getters liste=====================*/
             public function getIdf()
                 {
                     return $this->idf;
                 }

             public function getIdmvf()
                 {
                     return $this->idmvf;
                 }

             public function getIdpf()
                 {
                     return $this->idpf;
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

             public function getIdmv()
                 {
                     return $this->idmv;
                 }

             public function getIdumv()
                 {
                     return $this->idumv;
                 }

             public function getNommv()
                 {
                     return $this->nommv;
                 }

             public function getDate_del()
                 {
                     return $this->date_del;
                 }

             public function getObjet()
                 {
                     return $this->objet;
                 }

             public function getConten()
                 {
                     return $this->conten;
                 }

             public function getTotalht()
                 {
                     return $this->totalht;
                 }

             public function getTva()
                 {
                     return $this->tva;
                 }

             public function getMtsch()
                 {
                     return $this->mtsch;
                 }

             public function getMtsltr()
                 {
                     return $this->mtsltr;
                 }

             public function getReg()
                 {
                     return $this->reg;
                 }

             public function getAvans()
                 {
                     return $this->avans;
                 }

             public function getReste()
                 {
                     return $this->reste;
                 }

             public function getCacher()
                 {
                     return $this->cacher;
                 }

             public function getFlagm()
                 {
                     return $this->flagm;
                 }

             public function getIdp()
                 {
                     return $this->idp;
                 }

             public function getIdcp()
                 {
                     return $this->idcp;
                 }

             public function getIdcatp()
                 {
                     return $this->idcatp;
                 }

             public function getLibele()
                 {
                     return $this->libele;
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

             public function getQnti()
                 {
                     return $this->qnti;
                 }

             public function getFtech()
                 {
                     return $this->ftech;
                 }

             public function getFlagp()
                 {
                     return $this->flagp;
                 }

             public function getIdc()
                 {
                     return $this->idc;
                 }

             public function getNomc()
                 {
                     return $this->nomc;
                 }

             public function getFlagc()
                 {
                     return $this->flagc;
                 }

             public function getId_cat()
                 {
                     return $this->id_cat;
                 }

             public function getIdfamille()
                 {
                     return $this->idfamille;
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

             public function getFlagct()
                 {
                     return $this->flagct;
                 }

             public function getIdfa()
                 {
                     return $this->idfa;
                 }

             public function getDesi()
                 {
                     return $this->desi;
                 }

             public function getColor()
                 {
                     return $this->color;
                 }

             public function getFlagfa()
                 {
                     return $this->flagfa;
                 }

    /*==================End Getters liste=====================*/


    /*==================Setters liste=====================*/
             public function setIdf($idf)
                 {
                      $this->idf = $idf;
                 }

             public function setIdmvf($idmvf)
                 {
                      $this->idmvf = $idmvf;
                 }

             public function setIdpf($idpf)
                 {
                      $this->idpf = $idpf;
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

             public function setIdmv($idmv)
                 {
                      $this->idmv = $idmv;
                 }

             public function setIdumv($idumv)
                 {
                      $this->idumv = $idumv;
                 }

             public function setNommv($nommv)
                 {
                      $this->nommv = $nommv;
                 }

             public function setDate_del($date_del)
                 {
                      $this->date_del = $date_del;
                 }

             public function setObjet($objet)
                 {
                      $this->objet = $objet;
                 }

             public function setConten($conten)
                 {
                      $this->conten = $conten;
                 }

             public function setTotalht($totalht)
                 {
                      $this->totalht = $totalht;
                 }

             public function setTva($tva)
                 {
                      $this->tva = $tva;
                 }

             public function setMtsch($mtsch)
                 {
                      $this->mtsch = $mtsch;
                 }

             public function setMtsltr($mtsltr)
                 {
                      $this->mtsltr = $mtsltr;
                 }

             public function setReg($reg)
                 {
                      $this->reg = $reg;
                 }

             public function setAvans($avans)
                 {
                      $this->avans = $avans;
                 }

             public function setReste($reste)
                 {
                      $this->reste = $reste;
                 }

             public function setCacher($cacher)
                 {
                      $this->cacher = $cacher;
                 }

             public function setFlagm($flagm)
                 {
                      $this->flagm = $flagm;
                 }

             public function setIdp($idp)
                 {
                      $this->idp = $idp;
                 }

             public function setIdcp($idcp)
                 {
                      $this->idcp = $idcp;
                 }

             public function setIdcatp($idcatp)
                 {
                      $this->idcatp = $idcatp;
                 }

             public function setLibele($libele)
                 {
                      $this->libele = $libele;
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

             public function setQnti($qnti)
                 {
                      $this->qnti = $qnti;
                 }

             public function setFtech($ftech)
                 {
                      $this->ftech = $ftech;
                 }

             public function setFlagp($flagp)
                 {
                      $this->flagp = $flagp;
                 }

             public function setIdc($idc)
                 {
                      $this->idc = $idc;
                 }

             public function setNomc($nomc)
                 {
                      $this->nomc = $nomc;
                 }

             public function setFlagc($flagc)
                 {
                      $this->flagc = $flagc;
                 }

             public function setId_cat($id_cat)
                 {
                      $this->id_cat = $id_cat;
                 }

             public function setIdfamille($idfamille)
                 {
                      $this->idfamille = $idfamille;
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

             public function setFlagct($flagct)
                 {
                      $this->flagct = $flagct;
                 }

             public function setIdfa($idfa)
                 {
                      $this->idfa = $idfa;
                 }

             public function setDesi($desi)
                 {
                      $this->desi = $desi;
                 }

             public function setColor($color)
                 {
                      $this->color = $color;
                 }

             public function setFlagfa($flagfa)
                 {
                      $this->flagfa = $flagfa;
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
                       $this->idmvf = (!isset($idmvf) || empty($idmvf) )  ? 0: $idmvf;
                       $this->idpf = (!isset($idpf) || empty($idpf) )  ? 0: $idpf;
                       $this->pu = (!isset($pu) || empty($pu) )  ? 0: $pu;
                       $this->qnt = (!isset($qnt) || empty($qnt) )  ? 0: $qnt;
                       $this->mts = (!isset($mts) || empty($mts) )  ? 0: $mts;
                       $this->row = (!isset($row) || empty($row) )  ? 0: $row;
                       $this->fdesi = (!isset($fdesi) || empty($fdesi) )  ? '': $fdesi;
                       $this->fcondis = (!isset($fcondis) || empty($fcondis) )  ? '': $fcondis;
                       $this->idmv = (!isset($idmv) || empty($idmv) )  ? 0: $idmv;
                       $this->idumv = (!isset($idumv) || empty($idumv) )  ? 0: $idumv;
                       $this->nommv = (!isset($nommv) || empty($nommv) )  ? '': $nommv;
                       $this->date_del = (!isset($date_del) || empty($date_del) )  ? '': $date_del;
                       $this->objet = (!isset($objet) || empty($objet) )  ? '': $objet;
                       $this->conten = (!isset($conten) || empty($conten) )  ? '': $conten;
                       $this->totalht = (!isset($totalht) || empty($totalht) )  ? 0: $totalht;
                       $this->tva = (!isset($tva) || empty($tva) )  ? 0: $tva;
                       $this->mtsch = (!isset($mtsch) || empty($mtsch) )  ? 0: $mtsch;
                       $this->mtsltr = (!isset($mtsltr) || empty($mtsltr) )  ? '': $mtsltr;
                       $this->reg = (!isset($reg) || empty($reg) )  ? '': $reg;
                       $this->avans = (!isset($avans) || empty($avans) )  ? 0: $avans;
                       $this->reste = (!isset($reste) || empty($reste) )  ? 0: $reste;
                       $this->cacher = (!isset($cacher) || empty($cacher) )  ? 0: $cacher;
                       $this->flagm = (!isset($flagm) || empty($flagm) )  ? 0: $flagm;
                       $this->idp = (!isset($idp) || empty($idp) )  ? 0: $idp;
                       $this->idcp = (!isset($idcp) || empty($idcp) )  ? 0: $idcp;
                       $this->idcatp = (!isset($idcatp) || empty($idcatp) )  ? 0: $idcatp;
                       $this->libele = (!isset($libele) || empty($libele) )  ? '': $libele;
                       $this->photo = (!isset($photo) || empty($photo) )  ? '': $photo;
                       $this->prixa = (!isset($prixa) || empty($prixa) )  ? 0: $prixa;
                       $this->prixv = (!isset($prixv) || empty($prixv) )  ? 0: $prixv;
                       $this->qnti = (!isset($qnti) || empty($qnti) )  ? 0: $qnti;
                       $this->ftech = (!isset($ftech) || empty($ftech) )  ? '': $ftech;
                       $this->flagp = (!isset($flagp) || empty($flagp) )  ? 0: $flagp;
                       $this->idc = (!isset($idc) || empty($idc) )  ? 0: $idc;
                       $this->nomc = (!isset($nomc) || empty($nomc) )  ? '': $nomc;
                       $this->flagc = (!isset($flagc) || empty($flagc) )  ? 0: $flagc;
                       $this->id_cat = (!isset($id_cat) || empty($id_cat) )  ? 0: $id_cat;
                       $this->idfamille = (!isset($idfamille) || empty($idfamille) )  ? 0: $idfamille;
                       $this->nom_cat = (!isset($nom_cat) || empty($nom_cat) )  ? '': $nom_cat;
                       $this->achat = (!isset($achat) || empty($achat) )  ? 0: $achat;
                       $this->vente = (!isset($vente) || empty($vente) )  ? 0: $vente;
                       $this->compt = (!isset($compt) || empty($compt) )  ? 0: $compt;
                       $this->flagct = (!isset($flagct) || empty($flagct) )  ? 0: $flagct;
                       $this->idfa = (!isset($idfa) || empty($idfa) )  ? 0: $idfa;
                       $this->desi = (!isset($desi) || empty($desi) )  ? '': $desi;
                       $this->color = (!isset($color) || empty($color) )  ? '': $color;
                       $this->flagfa = (!isset($flagfa) || empty($flagfa) )  ? 0: $flagfa;
                  }
					  private function ObjecToarrayMaker(){
					    $OldTable=$this->emptyarrayMaker();
					    if ($this->id>0){
					        $OldTable=$this->get();
					     }
					     $Table= array(
                                 
                                  'IDF'=>($this->idf == 0 )  ? $OldTable['idf']:$this->idf,
                                  'idmvf'=>($this->idmvf == 0 )  ? $OldTable['idmvf']:$this->idmvf,
                                  'idpf'=>($this->idpf == 0 )  ? $OldTable['idpf']:$this->idpf,
                                  'PU'=>($this->pu == 0 )  ? $OldTable['pu']:$this->pu,
                                  'QNT'=>($this->qnt == 0 )  ? $OldTable['qnt']:$this->qnt,
                                  'MTS'=>($this->mts == 0 )  ? $OldTable['mts']:$this->mts,
                                  'ROW'=>($this->row == 0 )  ? $OldTable['row']:$this->row,
                                  'FDESI'=>(!isset($this->fdesi) || empty($this->fdesi) )  ? $OldTable['fdesi']:$this->fdesi,
                                  'FCONDIS'=>(!isset($this->fcondis) || empty($this->fcondis) )  ? $OldTable['fcondis']:$this->fcondis,
                                  'IDMV'=>($this->idmv == 0 )  ? $OldTable['idmv']:$this->idmv,
                                  'idumv'=>($this->idumv == 0 )  ? $OldTable['idumv']:$this->idumv,
                                  'NOMMV'=>(!isset($this->nommv) || empty($this->nommv) )  ? $OldTable['nommv']:$this->nommv,
                                  'DATE_DEL'=>($this->date_del == null )  ? $OldTable['date_del']:$this->date_del,
                                  'OBJET'=>(!isset($this->objet) || empty($this->objet) )  ? $OldTable['objet']:$this->objet,
                                  'CONTEN'=>(!isset($this->conten) || empty($this->conten) )  ? $OldTable['conten']:$this->conten,
                                  'TOTALHT'=>($this->totalht == 0 )  ? $OldTable['totalht']:$this->totalht,
                                  'TVA'=>($this->tva == 0 )  ? $OldTable['tva']:$this->tva,
                                  'MTSCH'=>($this->mtsch == 0 )  ? $OldTable['mtsch']:$this->mtsch,
                                  'MTSLTR'=>(!isset($this->mtsltr) || empty($this->mtsltr) )  ? $OldTable['mtsltr']:$this->mtsltr,
                                  'REG'=>(!isset($this->reg) || empty($this->reg) )  ? $OldTable['reg']:$this->reg,
                                  'AVANS'=>($this->avans == 0 )  ? $OldTable['avans']:$this->avans,
                                  'RESTE'=>($this->reste == 0 )  ? $OldTable['reste']:$this->reste,
                                  'CACHER'=>($this->cacher == 0 )  ? $OldTable['cacher']:$this->cacher,
                                  'flagm'=>($this->flagm == 0 )  ? $OldTable['flagm']:$this->flagm,
                                  'IDP'=>($this->idp == 0 )  ? $OldTable['idp']:$this->idp,
                                  'idcp'=>($this->idcp == 0 )  ? $OldTable['idcp']:$this->idcp,
                                  'idcatp'=>($this->idcatp == 0 )  ? $OldTable['idcatp']:$this->idcatp,
                                  'libele'=>(!isset($this->libele) || empty($this->libele) )  ? $OldTable['libele']:$this->libele,
                                  'PHOTO'=>(!isset($this->photo) || empty($this->photo) )  ? $OldTable['photo']:$this->photo,
                                  'PRIXA'=>($this->prixa == 0 )  ? $OldTable['prixa']:$this->prixa,
                                  'PRIXV'=>($this->prixv == 0 )  ? $OldTable['prixv']:$this->prixv,
                                  'qnti'=>($this->qnti == 0 )  ? $OldTable['qnti']:$this->qnti,
                                  'FTECH'=>(!isset($this->ftech) || empty($this->ftech) )  ? $OldTable['ftech']:$this->ftech,
                                  'flagp'=>($this->flagp == 0 )  ? $OldTable['flagp']:$this->flagp,
                                  'IDC'=>($this->idc == 0 )  ? $OldTable['idc']:$this->idc,
                                  'NOMC'=>(!isset($this->nomc) || empty($this->nomc) )  ? $OldTable['nomc']:$this->nomc,
                                  'flagc'=>($this->flagc == 0 )  ? $OldTable['flagc']:$this->flagc,
                                  'ID_CAT'=>($this->id_cat == 0 )  ? $OldTable['id_cat']:$this->id_cat,
                                  'idfamille'=>($this->idfamille == 0 )  ? $OldTable['idfamille']:$this->idfamille,
                                  'NOM_CAT'=>(!isset($this->nom_cat) || empty($this->nom_cat) )  ? $OldTable['nom_cat']:$this->nom_cat,
                                  'ACHAT'=>($this->achat == 0 )  ? $OldTable['achat']:$this->achat,
                                  'VENTE'=>($this->vente == 0 )  ? $OldTable['vente']:$this->vente,
                                  'COMPT'=>($this->compt == 0 )  ? $OldTable['compt']:$this->compt,
                                  'flagct'=>($this->flagct == 0 )  ? $OldTable['flagct']:$this->flagct,
                                  'IDFA'=>($this->idfa == 0 )  ? $OldTable['idfa']:$this->idfa,
                                  'DESI'=>(!isset($this->desi) || empty($this->desi) )  ? $OldTable['desi']:$this->desi,
                                  'COLOR'=>(!isset($this->color) || empty($this->color) )  ? $OldTable['color']:$this->color,
                                  'flagfa'=>($this->flagfa == 0 )  ? $OldTable['flagfa']:$this->flagfa					     );
                                  return $Table;
                  }
					  private function emptyarrayMaker(){
					     $Table= array(
                                 
                                  'IDF'=>0,
                                  'idmvf'=>0,
                                  'idpf'=>0,
                                  'PU'=>0,
                                  'QNT'=>0,
                                  'MTS'=>0,
                                  'ROW'=>0,
                                  'FDESI'=>"",
                                  'FCONDIS'=>"",
                                  'IDMV'=>0,
                                  'idumv'=>0,
                                  'NOMMV'=>"",
                                  'DATE_DEL'=>date(""),
                                  'OBJET'=>"",
                                  'CONTEN'=>"",
                                  'TOTALHT'=>0,
                                  'TVA'=>0,
                                  'MTSCH'=>0,
                                  'MTSLTR'=>"",
                                  'REG'=>"",
                                  'AVANS'=>0,
                                  'RESTE'=>0,
                                  'CACHER'=>0,
                                  'flagm'=>0,
                                  'IDP'=>0,
                                  'idcp'=>0,
                                  'idcatp'=>0,
                                  'libele'=>"",
                                  'PHOTO'=>"",
                                  'PRIXA'=>0,
                                  'PRIXV'=>0,
                                  'qnti'=>0,
                                  'FTECH'=>"",
                                  'flagp'=>0,
                                  'IDC'=>0,
                                  'NOMC'=>"",
                                  'flagc'=>0,
                                  'ID_CAT'=>0,
                                  'idfamille'=>0,
                                  'NOM_CAT'=>"",
                                  'ACHAT'=>0,
                                  'VENTE'=>0,
                                  'COMPT'=>0,
                                  'flagct'=>0,
                                  'IDFA'=>0,
                                  'DESI'=>"",
                                  'COLOR'=>"",
                                  'flagfa'=>0					     );
                                  return $Table;
                  }


    /*==================End Persistence Methode list=====================*/
           }
  
   



   ?>



