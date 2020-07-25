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
  use src\entities\Conger as CongerEntity;
  use src\model\CongerDB;

  use src\model\DB;

  use src\entities\Salarier as SalarierEntity;
  use src\model\SalarierDB;


  use src\entities\Type_conger as Type_congerEntity;
  use src\model\Type_congerDB;


  class Conger extends Controller{

    /*==================Attribut list=====================*/
             private  $conger;
             private  $congerdb;
   private  $db;

             private  $salarier;
             private  $salarierdb;
             private  $type_conger;
             private  $type_congerdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->conger = new CongerEntity();
                 $this->congerdb = new CongerDB();
                  $this->db = new DB();
                 $this->salarier = new SalarierEntity();
                 $this->salarierdb = new SalarierDB();
                 $this->type_conger = new Type_congerEntity();
                 $this->type_congerdb = new Type_congerDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("conger/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("conger/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->conger->setId($id);
                    $data["conger"] = $this->conger->get();
                    return $this->view->load("conger/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["congers"] = $this->conger->liste();
                    return $this->view->load("conger/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["salariers"] = $this->salarier->liste();
                    $data["type_congers"] = $this->type_conger->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conger->setPost($_POST,$_FILES);
                    $ok = $this->conger->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("conger/add", $data);
            }else{
                return $this->view->load("conger/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["salariers"] = $this->salarier->liste();
                    $data["type_congers"] = $this->type_conger->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->conger->setPost($_POST,$_FILES);
                    $ok = $this->conger->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("conger/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->conger->setId($id);
            			//Supression
            			$this->conger->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["salariers"] = $this->salarier->liste();
                    $data["type_congers"] = $this->type_conger->liste();
    /*=============================================================*/
       $this->conger->setId($id);
                    $data["conger"] = $this->conger->get();
            			//chargement de la vue edit.html
                    return $this->view->load("conger/edit", $data);
                }


                   



               }


            ?>

