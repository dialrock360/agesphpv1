 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:06=====================*/
 use libs\system\Controller;
  use src\entities\Article_en_stock as Article_en_stockEntity;
  use src\model\Article_en_stockDB;

  use src\model\DB;

  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;


  use src\entities\Stock as StockEntity;
  use src\model\StockDB;


  class Article_en_stock extends Controller{

    /*==================Attribut list=====================*/
             private  $article_en_stock;
             private  $article_en_stockdb;
   private  $db;

             private  $article;
             private  $articledb;
             private  $stock;
             private  $stockdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->article_en_stock = new Article_en_stockEntity();
                 $this->article_en_stockdb = new Article_en_stockDB();
                  $this->db = new DB();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                 $this->stock = new StockEntity();
                 $this->stockdb = new StockDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("article_en_stock/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("article_en_stock/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->article_en_stock->setId($id);
       $this->article_en_stock->setId($id);
                    $data["article_en_stock"] = $this->article_en_stock->get();
                    return $this->view->load("article_en_stock/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["article_en_stocks"] = $this->article_en_stock->liste();
                    return $this->view->load("article_en_stock/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["stocks"] = $this->stock->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->article_en_stock->setPost($_POST,$_FILES);
                    $ok = $this->article_en_stock->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("article_en_stock/add", $data);
            }else{
                return $this->view->load("article_en_stock/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["stocks"] = $this->stock->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->article_en_stock->setPost($_POST,$_FILES);
                    $ok = $this->article_en_stock->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("article_en_stock/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->article_en_stock->setId($id);
            			//Supression
            			$this->article_en_stock->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["articles"] = $this->article->liste();
                    $data["stocks"] = $this->stock->liste();
    /*=============================================================*/
       $this->article_en_stock->setId($id);
                    $data["article_en_stock"] = $this->article_en_stock->get();
            			//chargement de la vue edit.html
                    return $this->view->load("article_en_stock/edit", $data);
                }


                   



               }


            ?>

