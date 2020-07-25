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
  use src\entities\Caisse as CaisseEntity;
  use src\model\CaisseDB;

  use src\model\DB;

  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


  class Caisse extends Controller{

    /*==================Attribut list=====================*/
             private  $caisse;
             private  $caissedb;
   private  $db;

             private  $service;
             private  $servicedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->caisse = new CaisseEntity();
                 $this->caissedb = new CaisseDB();
                  $this->db = new DB();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("caisse/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("caisse/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->caisse->setId($id);
       $this->caisse->setId($id);
                    $data["caisse"] = $this->caisse->get();
                    return $this->view->load("caisse/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["caisses"] = $this->caisse->liste();
                    return $this->view->load("caisse/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->caisse->setPost($_POST,$_FILES);
                    $ok = $this->caisse->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("caisse/add", $data);
            }else{
                return $this->view->load("caisse/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["services"] = $this->service->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->caisse->setPost($_POST,$_FILES);
                    $ok = $this->caisse->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("caisse/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->caisse->setId($id);
            			//Supression
            			$this->caisse->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["services"] = $this->service->liste();
    /*=============================================================*/
       $this->caisse->setId($id);
                    $data["caisse"] = $this->caisse->get();
            			//chargement de la vue edit.html
                    return $this->view->load("caisse/edit", $data);
                }


                   



               }


            ?>

