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
  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;

  use src\model\DB;

  use src\entities\Catalogue as CatalogueEntity;
  use src\model\CatalogueDB;


  use src\entities\Categorie as CategorieEntity;
  use src\model\CategorieDB;


  class Article extends Controller{

    /*==================Attribut list=====================*/
             private  $article;
             private  $articledb;
   private  $db;

             private  $catalogue;
             private  $cataloguedb;
             private  $categorie;
             private  $categoriedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                  $this->db = new DB();
                 $this->catalogue = new CatalogueEntity();
                 $this->cataloguedb = new CatalogueDB();
                 $this->categorie = new CategorieEntity();
                 $this->categoriedb = new CategorieDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("article/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("article/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->article->setId($id);
       $this->article->setId($id);
                    $data["article"] = $this->article->get();
                    return $this->view->load("article/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["articles"] = $this->article->liste();
                    return $this->view->load("article/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["catalogues"] = $this->catalogue->liste();
                    $data["categories"] = $this->categorie->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->article->setPost($_POST,$_FILES);
                    $ok = $this->article->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("article/add", $data);
            }else{
                return $this->view->load("article/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["catalogues"] = $this->catalogue->liste();
                    $data["categories"] = $this->categorie->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->article->setPost($_POST,$_FILES);
                    $ok = $this->article->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("article/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->article->setId($id);
            			//Supression
            			$this->article->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["catalogues"] = $this->catalogue->liste();
                    $data["categories"] = $this->categorie->liste();
    /*=============================================================*/
       $this->article->setId($id);
                    $data["article"] = $this->article->get();
            			//chargement de la vue edit.html
                    return $this->view->load("article/edit", $data);
                }


                   



               }


            ?>

