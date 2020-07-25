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
  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;

  use src\model\DB;

  class Service extends Controller{

    /*==================Attribut list=====================*/
             private  $service;
             private  $servicedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("service/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("service/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->service->setId($id);
       $this->service->setId($id);
                    $data["service"] = $this->service->get();
                    return $this->view->load("service/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["services"] = $this->service->liste();
                    return $this->view->load("service/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->service->setPost($_POST,$_FILES);
                    $ok = $this->service->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("service/add", $data);
            }else{
                return $this->view->load("service/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->service->setPost($_POST,$_FILES);
                    $ok = $this->service->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("service/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->service->setId($id);
            			//Supression
            			$this->service->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->service->setId($id);
                    $data["service"] = $this->service->get();
            			//chargement de la vue edit.html
                    return $this->view->load("service/edit", $data);
                }


                   



               }


            ?>

