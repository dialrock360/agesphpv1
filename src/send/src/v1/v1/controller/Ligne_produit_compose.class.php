 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
 use libs\system\Controller;
  use src\entities\Ligne_produit_compose as Ligne_produit_composeEntity;
  use src\model\Ligne_produit_composeDB;

  use src\model\DB;

  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;


  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;


  class Ligne_produit_compose extends Controller{

    /*==================Attribut list=====================*/
             private  $ligne_produit_compose;
             private  $ligne_produit_composedb;
   private  $db;

             private  $article;
             private  $articledb;
             private  $article;
             private  $articledb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->ligne_produit_compose = new Ligne_produit_composeEntity();
                 $this->ligne_produit_composedb = new Ligne_produit_composeDB();
                  $this->db = new DB();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("ligne_produit_compose/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("ligne_produit_compose/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->ligne_produit_compose->setId($id);
       $this->ligne_produit_compose->setId($id);
                    $data["ligne_produit_compose"] = $this->ligne_produit_compose->get();
                    return $this->view->load("ligne_produit_compose/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["ligne_produit_composes"] = $this->ligne_produit_compose->liste();
                    return $this->view->load("ligne_produit_compose/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["articles"] = $this->article->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_produit_compose->setPost($_POST,$_FILES);
                    $ok = $this->ligne_produit_compose->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("ligne_produit_compose/add", $data);
            }else{
                return $this->view->load("ligne_produit_compose/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["articles"] = $this->article->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_produit_compose->setPost($_POST,$_FILES);
                    $ok = $this->ligne_produit_compose->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("ligne_produit_compose/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->ligne_produit_compose->setId($id);
            			//Supression
            			$this->ligne_produit_compose->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["articles"] = $this->article->liste();
                    $data["articles"] = $this->article->liste();
    /*=============================================================*/
       $this->ligne_produit_compose->setId($id);
                    $data["ligne_produit_compose"] = $this->ligne_produit_compose->get();
            			//chargement de la vue edit.html
                    return $this->view->load("ligne_produit_compose/edit", $data);
                }


                   



               }


            ?>

