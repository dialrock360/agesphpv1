 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
 use libs\system\Controller;
  use src\entities\Conditionement_article as Conditionement_articleEntity;
  use src\model\Conditionement_articleDB;

  use src\model\DB;

  use src\entities\Article_en_stock as Article_en_stockEntity;
  use src\model\Article_en_stockDB;


  use src\entities\Conditionement as ConditionementEntity;
  use src\model\ConditionementDB;


  use src\entities\Conditionement as ConditionementEntity;
  use src\model\ConditionementDB;


  class Conditionement_article extends Controller{

    /*==================Attribut list=====================*/
             private  $conditionement_article;
             private  $conditionement_articledb;
   private  $db;

             private  $article_en_stock;
             private  $article_en_stockdb;
             private  $conditionement;
             private  $conditionementdb;
             private  $conditionement;
             private  $conditionementdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->conditionement_article = new Conditionement_articleEntity();
                 $this->conditionement_articledb = new Conditionement_articleDB();
                  $this->db = new DB();
                 $this->article_en_stock = new Article_en_stockEntity();
                 $this->article_en_stockdb = new Article_en_stockDB();
                 $this->conditionement = new ConditionementEntity();
                 $this->conditionementdb = new ConditionementDB();
                 $this->conditionement = new ConditionementEntity();
                 $this->conditionementdb = new ConditionementDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("conditionement_article/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("conditionement_article/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->conditionement_article->setId($id);
       $this->conditionement_article->setId($id);
                    $data["conditionement_article"] = $this->conditionement_article->get();
                    return $this->view->load("conditionement_article/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["conditionement_articles"] = $this->conditionement_article->liste();
                    return $this->view->load("conditionement_article/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["article_en_stocks"] = $this->article_en_stock->liste();
                    $data["conditionements"] = $this->conditionement->liste();
                    $data["conditionements"] = $this->conditionement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conditionement_article->setPost($_POST,$_FILES);
                    $ok = $this->conditionement_article->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("conditionement_article/add", $data);
            }else{
                return $this->view->load("conditionement_article/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["article_en_stocks"] = $this->article_en_stock->liste();
                    $data["conditionements"] = $this->conditionement->liste();
                    $data["conditionements"] = $this->conditionement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conditionement_article->setPost($_POST,$_FILES);
                    $ok = $this->conditionement_article->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("conditionement_article/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->conditionement_article->setId($id);
            			//Supression
            			$this->conditionement_article->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["article_en_stocks"] = $this->article_en_stock->liste();
                    $data["conditionements"] = $this->conditionement->liste();
                    $data["conditionements"] = $this->conditionement->liste();
    /*=============================================================*/
       $this->conditionement_article->setId($id);
                    $data["conditionement_article"] = $this->conditionement_article->get();
            			//chargement de la vue edit.html
                    return $this->view->load("conditionement_article/edit", $data);
                }


                   



               }


            ?>

