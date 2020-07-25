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
  use src\entities\Type_conger as Type_congerEntity;
  use src\model\Type_congerDB;

  use src\model\DB;

  class Type_conger extends Controller{

    /*==================Attribut list=====================*/
             private  $type_conger;
             private  $type_congerdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->type_conger = new Type_congerEntity();
                 $this->type_congerdb = new Type_congerDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("type_conger/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("type_conger/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->type_conger->setId($id);
       $this->type_conger->setId($id);
                    $data["type_conger"] = $this->type_conger->get();
                    return $this->view->load("type_conger/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["type_congers"] = $this->type_conger->liste();
                    return $this->view->load("type_conger/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->type_conger->setPost($_POST,$_FILES);
                    $ok = $this->type_conger->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("type_conger/add", $data);
            }else{
                return $this->view->load("type_conger/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->type_conger->setPost($_POST,$_FILES);
                    $ok = $this->type_conger->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("type_conger/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->type_conger->setId($id);
            			//Supression
            			$this->type_conger->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->type_conger->setId($id);
                    $data["type_conger"] = $this->type_conger->get();
            			//chargement de la vue edit.html
                    return $this->view->load("type_conger/edit", $data);
                }


                   



               }


            ?>

