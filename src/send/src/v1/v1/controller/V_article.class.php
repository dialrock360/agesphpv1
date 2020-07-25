 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
 use libs\system\Controller;
  use src\entities\V_article as V_articleEntity;
  use src\model\V_articleDB;

  use src\model\DB;

  class V_article extends Controller{

    /*==================Attribut list=====================*/
             private  $v_article;
             private  $v_articledb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_article = new V_articleEntity();
                 $this->v_articledb = new V_articleDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_article/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_article/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_article->setId($id);
                    $data["v_article"] = $this->v_article->get();
                    return $this->view->load("v_article/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_articles"] = $this->v_article->liste();
                    return $this->view->load("v_article/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_article->setPost($_POST,$_FILES);
                    $ok = $this->v_article->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_article/add", $data);
            }else{
                return $this->view->load("v_article/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_article->setPost($_POST,$_FILES);
                    $ok = $this->v_article->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_article/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_article->setId($id);
            			//Supression
            			$this->v_article->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_article->setId($id);
                    $data["v_article"] = $this->v_article->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_article/edit", $data);
                }


                   



               }


            ?>

