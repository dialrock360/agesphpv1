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
  use src\entities\Status as StatusEntity;
  use src\model\StatusDB;

  use src\model\DB;

  class Status extends Controller{

    /*==================Attribut list=====================*/
             private  $status;
             private  $statusdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->status = new StatusEntity();
                 $this->statusdb = new StatusDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("status/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("status/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->status->setId($id);
       $this->status->setId($id);
                    $data["status"] = $this->status->get();
                    return $this->view->load("status/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["statuss"] = $this->status->liste();
                    return $this->view->load("status/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->status->setPost($_POST,$_FILES);
                    $ok = $this->status->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("status/add", $data);
            }else{
                return $this->view->load("status/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->status->setPost($_POST,$_FILES);
                    $ok = $this->status->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("status/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->status->setId($id);
            			//Supression
            			$this->status->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->status->setId($id);
                    $data["status"] = $this->status->get();
            			//chargement de la vue edit.html
                    return $this->view->load("status/edit", $data);
                }


                   



               }


            ?>

