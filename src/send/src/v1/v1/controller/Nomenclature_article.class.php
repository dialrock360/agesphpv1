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
  use src\entities\Nomenclature_article as Nomenclature_articleEntity;
  use src\model\Nomenclature_articleDB;

  use src\model\DB;

  class Nomenclature_article extends Controller{

    /*==================Attribut list=====================*/
             private  $nomenclature_article;
             private  $nomenclature_articledb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->nomenclature_article = new Nomenclature_articleEntity();
                 $this->nomenclature_articledb = new Nomenclature_articleDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("nomenclature_article/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("nomenclature_article/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->nomenclature_article->setId($id);
       $this->nomenclature_article->setId($id);
                    $data["nomenclature_article"] = $this->nomenclature_article->get();
                    return $this->view->load("nomenclature_article/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["nomenclature_articles"] = $this->nomenclature_article->liste();
                    return $this->view->load("nomenclature_article/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->nomenclature_article->setPost($_POST,$_FILES);
                    $ok = $this->nomenclature_article->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("nomenclature_article/add", $data);
            }else{
                return $this->view->load("nomenclature_article/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->nomenclature_article->setPost($_POST,$_FILES);
                    $ok = $this->nomenclature_article->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("nomenclature_article/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->nomenclature_article->setId($id);
            			//Supression
            			$this->nomenclature_article->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->nomenclature_article->setId($id);
                    $data["nomenclature_article"] = $this->nomenclature_article->get();
            			//chargement de la vue edit.html
                    return $this->view->load("nomenclature_article/edit", $data);
                }


                   



               }


            ?>

