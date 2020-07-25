<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 13-09-2019 23:41:41=====================*/
 use libs\system\Controller;

use src\entities\Article_en_stock as Article_en_stockEntity;
use src\model\Article_en_stockDB;

use src\entities\Article as ArticleEntity;
use src\model\ArticleDB;


use src\entities\Conditionement_article as Conditionement_articleEntity;
use src\model\Conditionement_articleDB;


use src\entities\Stock as StockEntity;
use src\model\StockDB;


use src\model\ConditionementDB;
use src\model\DB;


  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


class Stock extends Controller{

    /*==================Attribut list=====================*/
             private  $service;
             private  $servicedb;
             private  $db;


    /*================== Constructor =====================*/
              public function __construct()
                 {

                     require_once 'tools/functions.php';
                        parent::__construct();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/


      public function index($idservice){


          $data["view"] = 'Stock';
          $data["curenview"] = 'Add Stock';
          $data["vewContent"] = 'formstock';
          $data["vewContenttype"] = 'form';
          $data["pageheader"] = 'Gestion de  Stock';
          $data["pageoverview"] = 'Ajouter un stock';
         $data["active"] = 8;
          $tdb = new StockDB();
          $data["stocks"] = $tdb->listeStockByServiceId($idservice);

          return $this->view->load("index/index", $data);

      }



      /*------------------Methode getID--------------------=*/
                
                public function getID( $id_service){
                    $data["id_service"] = $id_service;
                    return $this->view->load("index/index", $data);
                }


    /*------------------Methode get--------------------=*/
                
                public function get($id,$id_service){
                    //Instanciation du model
                    $tdb = new StockDB();
                    $data["stock"] = $tdb->getStock($id,$id_service);
                    return $this->view->load("index/index", $data);
                }

    /*------------------Methode get--------------------=*/

                public function getjs(){
                    //Instanciation du model
                    if (isset($_POST['id']) && !empty($_POST['id'])) {

                        $id = intval($_POST['id']);
                        $tdb = new StockDB();

                        echo json_encode($tdb->getStock($id));
                     }
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    //Instanciation du model
                    $tdb = new StockDB();
                    $data["stocks"] = $tdb->listeStock();
                    return $this->view->load("index/index", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add( ){
    $tdb = new StockDB();


    if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                extract($_POST);
                $data["ok"] = 0;
                if(!empty($id_service)) {
                        if($tdb->ifStockexiste($id_service,$nom_stock)==0) {

                            $stockObject  = new StockEntity();
                            $stockObject ->setId_service($id_service);
                            $stockObject ->setNom_stock($nom_stock);
                            $stockObject ->setType_stock($type_stock);
                            $stockObject ->setNbrarticle(0);
                            $stockObject ->setValeur(0);
                            $ok=$tdb->addStock($stockObject);
                            $returnData = array(
                                'status' =>$ok,
                                'data' => $stockObject
                            );
                            echo json_encode($returnData);
                        }
                }

            }
        }


    /*------------------Methode update--------------------=*/
                
		public function update(){
			//Instanciation du model

            if(isset($_POST["modifier"])){

                extract($_POST);

                     if(!empty($id_service)  && $id_service!=0 ) {
                         $tdb = new StockDB();
                         $stockObject  = new StockEntity();
                         $stockObject ->setId($id);
                         $stockObject ->setId_service($id_service);
                         $stockObject ->setNom_stock($nom_stock);
                         $stockObject ->setType_stock($type_stock);
                         $stockObject ->setNbrarticle($nbrarticle);
                         $stockObject ->setValeur($valeur);
                         $stockData = array(
                             'id_service' => $id_service,
                             'id' => $id,
                             'nom_stock' => $nom_stock,
                             'nbrarticle' => $nbrarticle,
                             'valeur' => $valeur
                         );
                         $returnData = array(
                             'status' =>$tdb->updateStock($stockObject),
                             'data' => $stockData
                         );
                          echo json_encode($returnData);
                     }

            }

       }

    /*------------------Methode list--------------------=*/
                
            public function delete(){
              //Instanciation du model
                    /*$tdb = new StockDB();
            			//Supression
            			$tdb->deleteStock($id,$id_service);*/
                if (isset($_POST['id']) && !empty($_POST['id'])) {

                    $id = intval($_POST['id']);
                    $id_service = intval($_POST['id_service']);
                    $tdb = new StockDB();

                    echo json_encode($tdb->deleteStock($id));
                }


                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            	public function edit($id){

                    $data["view"] = 'MngStock';
                    $data["curenview"] = 'Add Stock';
                    $data["vewContent"] = 'editstock';
                    $data["vewContenttype"] = 'form';
                    $data["pageheader"] = 'Gestion de  Stock';
                    $data["pageoverview"] = 'Manager le stock';
                   $data["active"] = 8;
                    $tdb = new StockDB();
                    $data["stock"] = $tdb->getStock($id);
                    $tdba = new ArticleDB();
                    $tdbc = new ConditionementDB();
                    $lsarticles  = $tdba->listeArticleByServiceId($data["stock"]['id_service']);
                    $lsconditionements =$tdbc->listeConditionement();
                    $optionarticles  =$optionconditionements = '';
                    foreach ($lsarticles as $article){
                        $optionarticles.=' <option value="'.$article['id'].'">'.$article['nom_article'].'</option>';
                     }
                    foreach ($lsconditionements as $conditionement){
                        $optionconditionements.=' <option value="'.$conditionement['id'].'">'.$conditionement['nom_conditionement'].'</option>';
                    }
                    $data["articles"] =$lsarticles;
                      $data["optionarticles"] = strval($optionarticles);
                    $data["conditionements"] = $lsconditionements;
                      $data["optionconditionements"] = strval($optionconditionements);
                      $data["optionconditionementsunite"] = strval($optionconditionements);
                    $tdb = new Article_en_stockDB();
                    $data["article_en_stocks"] = $tdb->listeArticle_en_stockByStockId($id);
                    $data["article_en_stocks_bas"] = $tdb->article_en_stocks_bas($id);
                    $data["nbrarticle_stocks_bas"] = count($data["article_en_stocks_bas"]);
                    $data["article_en_stocks_finis"] = $tdb->article_en_stocks_finis($id);
                    $data["nbrarticle_stocks_finis"] = count($data["article_en_stocks_finis"]);
                    $data["id_stock"] = $id;

                    $data["notif_stock"] = $data["nbrarticle_stocks_finis"]+ $data["nbrarticle_stocks_bas"];

                   return $this->view->load("index/index", $data);
                   }

                public function manage($id){

        $data["view"] = 'Stock';
        $data["curenview"] = 'Add Stock';
        $data["vewContent"] = 'managestock';
        $data["vewContenttype"] = 'manage';
        $data["pageheader"] = 'Gestion de  Stock';
        $data["pageoverview"] = 'Manager le stock';
       $data["active"] = 8;
        $tdb = new StockDB();
        $data["stock"] = $tdb->getStock($id);
        $tdba = new ArticleDB();
        $tdbc = new ConditionementDB();
        $lsarticles  = $tdba->listeArticleByServiceId($data["stock"]['id_service']);
        $lsconditionements =$tdbc->listeConditionement();
        $optionarticles  =$optionconditionements= '';
        foreach ($lsarticles as $article){
            $optionarticles.=' <option value="'.$article['id'].'">'.$article['nom_article'].'</option>';
        }
        foreach ($lsconditionements as $conditionement){
            $optionconditionements.=' <option value="'.$conditionement['id'].'">'.$conditionement['nom_conditionement'].'</option>';
        }
        $data["articles"] =$lsarticles;
        $data["optionarticles"] = strval($optionarticles);
        $data["conditionements"] = $lsconditionements;
        $data["optionconditionements"] = strval($optionconditionements);
        $tdb = new Article_en_stockDB();
        $data["article_en_stocks"] = $tdb->listeArticle_en_stockByStockId($id);
        $data["article_en_stocks_bas"] = $tdb->article_en_stocks_bas($id);
        $data["nbrarticle_stocks_bas"] = count($data["article_en_stocks_bas"]);
        $data["article_en_stocks_finis"] = $tdb->article_en_stocks_finis($id);
        $data["nbrarticle_stocks_finis"] = count($data["article_en_stocks_finis"]);

        $data["notif_stock"] = $data["nbrarticle_stocks_finis"]+ $data["nbrarticle_stocks_bas"];

        return $this->view->load("index/index", $data);
    }


            	public function editarticle($id){

                    $data["view"] = 'Stock';
                    $data["curenview"] = 'Add Stock';
                    $data["vewContent"] = 'editarticleStock';
                    $data["vewContenttype"] = 'form';
                    $data["pageheader"] = 'Gestion de  Stock';
                    $data["pageoverview"] = 'Manager article du stock';
                   $data["active"] = 8;

                    $tdb = new Article_en_stockDB();
                    $article_en_stocks= $tdb->getArticle_en_stock($id);
                    $data["article_en_stock"] = $article_en_stocks;
                 //   print_r($article_en_stocks);
                    $tdb = new StockDB();
                    $data["stock"] = $tdb->getStock($article_en_stocks['id_stock']);
                    //print_r(  $data["stock"] );
                    $tdba = new ArticleDB();
                    $tdbc = new ConditionementDB();
                    $lsarticles  = $tdba->listeArticleByServiceId($data["stock"]['id_service']);
                    $lsconditionements =$tdbc->listeConditionement();
                    $optionarticles  =$optionconditionements= $optionconditionementsunite= '';
                    $optionarticles.=' <option value="'.$article_en_stocks['id_article'].'" selected >'.$article_en_stocks['nom_article'].'</option>';
                    foreach ($lsarticles as $article){
                        if ($article_en_stocks['id_article']!=$article['id']){
                            $optionarticles.=' <option value="'.$article['id'].'">'.$article['nom_article'].'</option>';
                        }

                    }
                    $optionconditionements.=' <option value="'.$article_en_stocks['id_conditionement'].'" selected >'.$article_en_stocks['nom_conditionement'].'</option>';
                    $optionconditionementsunite.=' <option value="'.$article_en_stocks['id_unite'].'" selected >'.$article_en_stocks['nom_unite_conditionement'].'</option>';
                    foreach ($lsconditionements as $conditionement){
                        if ($article_en_stocks['id_conditionement']!=$conditionement['id']){
                            $optionconditionements.=' <option value="'.$conditionement['id'].'">'.$conditionement['nom_conditionement'].'</option>';
                        }
                        if ($article_en_stocks['id_unite']!=$conditionement['id']){
                            $optionconditionementsunite.=' <option value="'.$conditionement['id'].'">'.$conditionement['nom_conditionement'].'</option>';
                        }
                    }

                    $data["articles"] =$lsarticles;
                      $data["optionarticles"] = strval($optionarticles);
                    $data["conditionements"] = $lsconditionements;
                      $data["optionconditionements"] = strval($optionconditionements);
                      $data["optionconditionementsunite"] = strval($optionconditionementsunite);

                     return $this->view->load("index/index", $data);
                   }





    public function add_Article_en_stock($param){
        extract($_POST);

        // print_r($_POST);

            $array=array();
             if(isset($_POST['ref_article']) ){

                 $array['ref_article']=$_POST['ref_article'];
                 $array['valeur_article_en_stock']=$_POST['valeur_article_en_stock'];

             }
            $array['id_article']=$_POST['id_article'];
            $array['id_article_en_stock']=$_POST['id_article_en_stock'];
            $array['id_conditionement_article']=$_POST['id_conditionement_article'];
            $array['qnt_article_en_stock']=$_POST['qnt_article_en_stock'];
            $array['min_qnt_article_en_stock']=$_POST['min_qnt_article_en_stock'];
            $array['max_qnt_article_en_stock']=$_POST['max_qnt_article_en_stock'];

            $array['id_conditionement']=$_POST['id_conditionement'];
            $array['qnt_unite']=$_POST['qnt_unite'];
            $array['cout_achat_conditionement_article']=$_POST['cout_achat_conditionement_article'];
            $array['pxa_u_article_en_stock']=$_POST['pxa_u_article_en_stock'];
            $array['pxv_u_conditionement_article']=$_POST['pxv_u_conditionement_article'];
            $array['pxv_bar_conditionement_article']=$_POST['pxv_bar_conditionement_article'];
            $array['pxv_conditionement_article']=$_POST['pxv_conditionement_article'];
            $array['id_unite']=$_POST['id_unite'];
            $arrayTab=$this->flip_row_col_array($array);

            if ($param=='edit'){
                if(isset($_POST['addmethode']) && $_POST['addmethode']==0){


                    for ($i=1;$i<=count($arrayTab);$i++){
                        foreach ($arrayTab as  $value){

                            extract($value);

                            $cndtdb = new Conditionement_articleDB();
                            $astdb = new Article_en_stockDB();
                            $artdb = new ArticleDB();



                            $article= $artdb->getArticle($id_article);

                            $conditionement_articleObject  = new Conditionement_articleEntity();
                            $conditionement_articleObject ->setId($id_conditionement_article);
                            $conditionement_articleObject ->setId_article_en_stock($id_article_en_stock);
                            $conditionement_articleObject ->setId_conditionement($id_conditionement);
                            $conditionement_articleObject ->setQnt_unite($qnt_unite);
                            $conditionement_articleObject ->setPxa_u_article_en_stock($pxa_u_article_en_stock);
                            $conditionement_articleObject ->setCout_achat_conditionement_article($cout_achat_conditionement_article);
                            $conditionement_articleObject ->setPxv_u_conditionement_article($pxv_u_conditionement_article);
                            $conditionement_articleObject ->setPxv_bar_conditionement_article($pxv_bar_conditionement_article);
                            $conditionement_articleObject ->setPxv_conditionement_article($pxv_conditionement_article);
                            $conditionement_articleObject ->setId_unite($id_unite);

                            $cndtdb->updateconditionement_article($conditionement_articleObject );




                            $article_en_stockObject  = new Article_en_stockEntity();
                            $article_en_stockObject ->setId($id_article_en_stock);
                            $article_en_stockObject ->setRef_article($article['ref_article']);
                            $article_en_stockObject ->setId_article($id_article);
                            $article_en_stockObject ->setId_stock($id_stock);
                            $article_en_stockObject ->setId_conditionement_article($id_conditionement_article);
                            $article_en_stockObject ->setQnt_article_en_stock($qnt_article_en_stock);
                            $article_en_stockObject ->setValeur_article_en_stock($valeur_article_en_stock);
                            $article_en_stockObject ->setMin_qnt_article_en_stock($min_qnt_article_en_stock);
                            $article_en_stockObject ->setMax_qnt_article_en_stock($max_qnt_article_en_stock);
                            $ok = $astdb->updatearticle_en_stock($article_en_stockObject );


                        }
                    }


                }

            }
            if ($param=='multiple'){
                if ($rows>0){

                    for ($i=1;$i<=count($arrayTab);$i++){


                        extract($arrayTab[$i-1]);

                        $cndtdb = new Conditionement_articleDB();
                        $astdb = new Article_en_stockDB();
                        $artdb = new ArticleDB();
                        $stkdb = new StockDB();

                        $stock= $stkdb->getStock($id_stock);
                           $nbrarticle= $stock['nbrarticle']+1;
                        $article= $artdb->getArticle($id_article);


                        $article_en_stockObject  = new Article_en_stockEntity();
                        $article_en_stockObject ->setId(0);
                        $article_en_stockObject ->setRef_article($article['ref_article']);
                        $article_en_stockObject ->setId_article($id_article);
                        $article_en_stockObject ->setId_stock($id_stock);
                        $article_en_stockObject ->setQnt_article_en_stock(0);
                        $article_en_stockObject ->setValeur_article_en_stock(0);
                        $article_en_stockObject ->setMin_qnt_article_en_stock($min_qnt_article_en_stock);
                        $article_en_stockObject ->setMax_qnt_article_en_stock($max_qnt_article_en_stock);



                        $id_article_en_stock =0;
                          $ifArticle_en_stockexiste=$astdb->ifArticle_en_stockexiste($article_en_stockObject);
                        if ( $ifArticle_en_stockexiste==0){
                            $id_article_en_stock =$astdb->addArticle_en_stock($article_en_stockObject );

                            if ($id_article_en_stock>0){
                               $stkdb->nbr_article_update($id_stock,$nbrarticle);

                                $conditionement_articleObject  = new Conditionement_articleEntity();
                                $conditionement_articleObject ->setId(0);
                                $conditionement_articleObject ->setId_article_en_stock($id_article_en_stock);
                                $conditionement_articleObject ->setId_conditionement($id_conditionement);
                                $conditionement_articleObject ->setQnt_unite($qnt_unite);
                                $conditionement_articleObject ->setPxa_u_article_en_stock($pxa_u_article_en_stock);
                                $conditionement_articleObject ->setCout_achat_conditionement_article($cout_achat_conditionement_article);
                                $conditionement_articleObject ->setPxv_u_conditionement_article($pxv_u_conditionement_article);
                                $conditionement_articleObject ->setPxv_bar_conditionement_article($pxv_bar_conditionement_article);
                                $conditionement_articleObject ->setPxv_conditionement_article($pxv_conditionement_article);
                                $conditionement_articleObject ->setId_unite($id_unite);
                                $cndtdb->addConditionement_article($conditionement_articleObject);


                            }
                        }





                        // echo $id_stock.'<hr>';
                    }

                }
            }
           $this->edit($id_stock);



    }


    public function updateqnt_en_stock(){
        extract($_POST);

        $qnt=doubleval($qnt_article_en_stock);
            $astdb = new Article_en_stockDB();
            $cndtdb = new Conditionement_articleDB();
            $conditionement_article=$cndtdb->getConditionement_article($id_conditionement_article);
            $article_en_stockObject  = new Article_en_stockEntity();
            $article_en_stockObject ->setId($id_article_en_stock);
            $article_en_stockObject ->setQnt_article_en_stock($qnt);

            $cout=doubleval($conditionement_article['cout_achat_conditionement_article'])*$qnt;
            $valeur=doubleval($conditionement_article['pxv_conditionement_article'])*$qnt;

               $article_en_stockObject ->setValeur_article_en_stock($valeur);
              $ok=$astdb->update_qnt_article_en_stock($article_en_stockObject);


            $returnData = array(
            'cout_achat_total' =>$cout,
            'valeur_article_en_stock' =>$valeur,
            'qnt_article_en_stock' =>$qnt_article_en_stock,
            'status' =>1
            );
            echo json_encode($returnData);

}

    public function  transfer_Article_en_stock($stock)
    {


        $this->db->setTablename("article_en_stock");
            extract($_POST) ;
        // [id_conditionement_article_source] => 25
        // [id_stock_article_source] => 21
        // [pxv_conditionement_article_source] => 160000

        /*$article_en_stock_sourceObject  = new Article_en_stockEntity();
        $article_en_stock_sourceObject ->setId($id_article_en_stock_source);
        $article_en_stock_sourceObject ->setQnt_article_en_stock($qnt_article_en_stock_source);
        $article_en_stock_sourceObject ->setValeur_article_en_stock($valeur_article_en_stock_source);*/


//[valeur_article_en_stock_cible] => Array ( [0] => NaN [1] => NaN )
// [max_qnt_article_en_stock_cible] => Array ( [0] => 20 [1] => 160 )
// [id_conditionement_article_cible] => Array ( [0] => 11 [1] => 24 )
// [pxv_conditionement_article_cible] => Array ( [0] => 16000 [1] => 2000 )
// [qnt_article_en_stock__cible] => Array ( [0] => 30 [1] => 80 )
// [id_article_en_stock_cible] => Array ( [0] => 14 ) [valider] => )
        $array=array();
        $array['id_article_en_stock_cible']=$_POST['id_article_en_stock_cible'];
        $array['valeur_article_en_stock_cible']=$_POST['valeur_article_en_stock_cible'];
        $array['id_conditionement_article_cible']=$_POST['id_conditionement_article_cible'];
        $array['qnt_article_en_stock__cible']=$_POST['qnt_article_en_stock__cible'];
        $array['max_qnt_article_en_stock_cible']=$_POST['max_qnt_article_en_stock_cible'];
        $arrayTab=$this->flip_row_col_array($array);
         $ok=0;
        foreach ($arrayTab as  $value){



                       /* $article_en_stock_cibleObject  =  new Article_en_stockEntity();
                        $article_en_stock_cibleObject ->setId($value['id_article_en_stock_cible']);
                        $article_en_stock_cibleObject ->setQnt_article_en_stock($value['qnt_article_en_stock__cible']);
                        $article_en_stock_cibleObject ->setValeur_article_en_stock($value['valeur_article_en_stock_cible']);
                        $astdb->update_qnt_article_en_stock($article_en_stock_cibleObject);*/
                         $max_qnt_article=($value['qnt_article_en_stock__cible']>$value['max_qnt_article_en_stock_cible'])?$value['qnt_article_en_stock__cible']:$value['max_qnt_article_en_stock_cible'];
                //  print_r($value); echo '<hr>' .$max_qnt_article.'<hr>';

                            $rows = array(
                                'qnt_article_en_stock' => $value['qnt_article_en_stock__cible'],
                                'valeur_article_en_stock' => $value['valeur_article_en_stock_cible'],
                                'max_qnt_article_en_stock' => $max_qnt_article
                            );
                            $condition = array('id' =>$value['id_article_en_stock_cible']);
                             $ok= $this->db->updateTable($rows,array('where'=>$condition));





                    }
                        $rows = array(
                            'qnt_article_en_stock' =>$qnt_article_en_stock_source,
                            'valeur_article_en_stock' => $valeur_article_en_stock_source
                        );
                        $condition = array('id' =>$id_article_en_stock_source);
                        $this->db->updateTable($rows,array('where'=>$condition));

         $this->edit($id_stock_article_source);
    }
    public function get_en_stock()
    {
        extract($_POST);
        /* $id_stock=21;
        $id_article=25;
        $id=19;*/
        $astdb = new Article_en_stockDB();
        $Article_en_stock = $astdb->getArticle_en_stock($id);
        $id_article = $Article_en_stock['id_article'];
        $ls_Article_en_stock = $astdb->listeArticle_en_stockByArticleId($id_article);
        // $this->seache_child($ls_Article_en_stock,$id_article,$Article_en_stock);
        $artstocks1 = array();
        $i_conditionement = array();


        foreach ($ls_Article_en_stock as $srticle_en_stock) {
            if ($srticle_en_stock['id_stock'] != $Article_en_stock['id_stock']) {
                if ($srticle_en_stock['type_stock'] == $Article_en_stock['type_stock']) {

                    $artstocks1[] = $srticle_en_stock;
                    $i_conditionement[] = $srticle_en_stock['id_conditionement'];

                }
            }
        }

        $artstocks2 = array();
        $cpt_conditionement = $Article_en_stock['id_unite'];
        $multiplicateur = 1;
        $qntunite = $Article_en_stock['qnt_unite'];
        if ($Article_en_stock['qnt_article_en_stock'] > 0)
        {

            for ($i = 0; $i < count($artstocks1); $i++) {
                if ($cpt_conditionement == $artstocks1[$i]['id_conditionement']) {
                    $article = array();
                    $article['id_article_en_stock'] = $artstocks1[$i]['id'];
                    $article['id_conditionement_article'] = $artstocks1[$i]['id_conditionement_article'];
                    $article['qnt_article_en_stock'] = $artstocks1[$i]['qnt_article_en_stock'];
                    $article['valeur_article_en_stock'] = $artstocks1[$i]['valeur_article_en_stock'];
                    $article['max_qnt_article_en_stock'] = $artstocks1[$i]['max_qnt_article_en_stock'];
                    $article['id_conditionement'] = $artstocks1[$i]['id_conditionement'];
                    $article['nom_conditionement'] = $artstocks1[$i]['nom_conditionement'];
                    $article['cout_achat_conditionement_article'] = $artstocks1[$i]['cout_achat_conditionement_article'];
                    $article['pxa_u_article_en_stock'] = $artstocks1[$i]['pxa_u_article_en_stock'];
                    $article['pxv_u_conditionement_article'] = $artstocks1[$i]['pxv_u_conditionement_article'];
                    $article['pxv_conditionement_article'] = $artstocks1[$i]['pxv_conditionement_article'];
                    $article['nom_article'] = $artstocks1[$i]['nom_article'];
                    $article['id_unite'] = $artstocks1[$i]['id_unite'];
                    $article['nom_unite_conditionement'] = $artstocks1[$i]['nom_unite_conditionement'];
                    $article['qnt_unite'] = $artstocks1[$i]['qnt_unite'];
                    $article['id_stock'] = $artstocks1[$i]['id_stock'];
                    $article['path_photo'] = $artstocks1[$i]['path_photo'];
                    $article['nom_stock'] = $artstocks1[$i]['nom_stock'];
                    $multiplicateur = $multiplicateur * $qntunite;
                    $qntunite = $artstocks1[$i]['qnt_unite'];
                    $article['multiplicateur'] = $multiplicateur;

                    $artstocks2[] = $article;
                    $cpt_conditionement = $artstocks1[$i]['id_unite'];
                    /* print_r($article);
                     echo '<hr>';*/


                }
            }
    }
          /*foreach ($artstocks2 as $srticle){
              print_r($srticle);
              echo '<hr>';
          }*/
        $returnData = array(
            'ls_en_stock' =>$artstocks2,
            'article_en_stock' =>$Article_en_stock
        );
       echo json_encode($returnData) ;
}

    private function seache_child($ls_Article_en_stock,$id_article,$Article_en_stock){
        $optionstocks=array();
        foreach ($ls_Article_en_stock as $srticle_en_stock){

            if ($srticle_en_stock['id_article']==$id_article && $srticle_en_stock['type_stock']==$Article_en_stock['type_stock']){
                if ($srticle_en_stock['id_conditionement']==$Article_en_stock['id_unite']){

                    // $optionstocks.=' <option value="'.$srticle_en_stock['id_stock'].'">'.$srticle_en_stock['nom_stock'].'</option>';
                    $optionstocks['id_stock']=$srticle_en_stock['id_stock'];
                   echo $optionstocks['nom_stock']=$srticle_en_stock['nom_stock'].'<hr>';
                    $optionstocks['article_stock']=$srticle_en_stock;

                }
            }
        }
        return $optionstocks;
    }







    public function import($id){

        $data["title"] = 'Stock';
        $data["view"] = 'trnsStock';
        $data["curenview"] = 'Mouv Stock';
        $data["vewContent"] = 'managestock';
        $data["vewContenttype"] = 'trans';
        $data["pageheader"] = 'Mouvement de  Stock';
        $data["pageoverview"] = 'Manager le stock';
       $data["active"] = 8;
        $data["mouvement"] = 1;
        $tdb = new StockDB();
        $data["stock"] = $tdb->getStock($id);
        $tdba = new ArticleDB();
        $tdbc = new ConditionementDB();
        $lsarticles  = $tdba->listeArticleByServiceId($data["stock"]['id_service']);
        $lsconditionements =$tdbc->listeConditionement();
        $optionarticles  =$optionconditionements= $optionarticle_en_stocks='';
        foreach ($lsarticles as $article){
            $optionarticles.=' <option value="'.$article['id'].'">'.$article['nom_article'].'</option>';
        }
        foreach ($lsconditionements as $conditionement){
            $optionconditionements.=' <option value="'.$conditionement['id'].'">'.$conditionement['nom_conditionement'].'</option>';
        }
        $data["articles"] =$lsarticles;
        $data["optionarticles"] = strval($optionarticles);
        $data["conditionements"] = $lsconditionements;
        $data["optionconditionements"] = strval($optionconditionements);
        $tdb = new Article_en_stockDB();
         $lsarticle_en_stocks = $tdb->listeArticle_en_stockByStockIdBar($id);
        $data["article_en_stocks"] = $lsarticle_en_stocks;
        foreach ($lsarticle_en_stocks as $article_en_stock ){
            $optionarticle_en_stocks.=' <option value="'.$article_en_stock['id'].'">'.$article_en_stock['nom_article'].'</option>';
        }
        $data["optionarticle_en_stocks"] = strval($optionarticle_en_stocks);
        $data["article_en_stocks_bas"] = $tdb->article_en_stocks_bas($id);
        $data["nbrarticle_stocks_bas"] = count($data["article_en_stocks_bas"]);
        $data["article_en_stocks_finis"] = $tdb->article_en_stocks_finis($id);
        $data["nbrarticle_stocks_finis"] = count($data["article_en_stocks_finis"]);
        $data["id_stock"] = $id;

        $data["notif_stock"] = $data["nbrarticle_stocks_finis"]+ $data["nbrarticle_stocks_bas"];

       return $this->view->load("index/index", $data);
        //return $this->view->load("stockage/stock/transfert/form-elements", $data);
    }

public function inventaire(){

}
public function export(){

}

    private function explodestrtoupper($string){
        $pieces = explode(" ", $string);
        $firstCharacter =strtoupper($string[0]);
        if (count($pieces)>1){
            $firstCharacter ='';
            foreach ($pieces as $value){
                //commandes
                $firstCharacter .= strtoupper($value[0]);
            }
        }
        return $firstCharacter;

    }
    private function flip_row_col_array($array) {
        $out = array();
        foreach ($array as  $rowkey => $row) {
            foreach($row as $colkey => $col){
                $out[$colkey][$rowkey]=$col;
            }
        }
        return $out;
    }
}


            ?>

