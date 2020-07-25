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
  use src\entities\Test as TestEntity;
  use src\model\TestDB;

  use src\model\DB;

  class Test extends Controller{

    /*==================Attribut list=====================*/
             private  $test;
             private  $testdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->test = new TestEntity();
                 $this->testdb = new TestDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("test/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("test/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->test->setId($id);
       $this->test->setId($id);
                    $data["test"] = $this->test->get();
                    return $this->view->load("test/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["tests"] = $this->test->liste();
                    return $this->view->load("test/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->test->setPost($_POST,$_FILES);
                    $ok = $this->test->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("test/add", $data);
            }else{
                return $this->view->load("test/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->test->setPost($_POST,$_FILES);
                    $ok = $this->test->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("test/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->test->setId($id);
            			//Supression
            			$this->test->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->test->setId($id);
                    $data["test"] = $this->test->get();
            			//chargement de la vue edit.html
                    return $this->view->load("test/edit", $data);
                }


                   



               }


            ?>

