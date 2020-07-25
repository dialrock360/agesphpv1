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
  use src\entities\Photo_article as Photo_articleEntity;
  use src\model\Photo_articleDB;

  use src\model\DB;

  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;


  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


  class Photo_article extends Controller{

    /*==================Attribut list=====================*/
             private  $photo_article;
             private  $photo_articledb;
   private  $db;

             private  $article;
             private  $articledb;
             private  $service;
             private  $servicedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->photo_article = new Photo_articleEntity();
                 $this->photo_articledb = new Photo_articleDB();
                  $this->db = new DB();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("photo_article/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("photo_article/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->photo_article->setId($id);
       $this->photo_article->setId($id);
                    $data["photo_article"] = $this->photo_article->get();
                    return $this->view->load("photo_article/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["photo_articles"] = $this->photo_article->liste();
                    return $this->view->load("photo_article/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->photo_article->setPost($_POST,$_FILES);
                    $ok = $this->photo_article->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("photo_article/add", $data);
            }else{
                return $this->view->load("photo_article/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->photo_article->setPost($_POST,$_FILES);
                    $ok = $this->photo_article->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("photo_article/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->photo_article->setId($id);
            			//Supression
            			$this->photo_article->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["articles"] = $this->article->liste();
                    $data["services"] = $this->service->liste();
    /*=============================================================*/
       $this->photo_article->setId($id);
                    $data["photo_article"] = $this->photo_article->get();
            			//chargement de la vue edit.html
                    return $this->view->load("photo_article/edit", $data);
                }


                   



               }


            ?>

