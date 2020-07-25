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
  use src\entities\Rubrique as RubriqueEntity;
  use src\model\RubriqueDB;

  use src\model\DB;

  use src\entities\Service as ServiceEntity;
  use src\model\ServiceDB;


  class Rubrique extends Controller{

    /*==================Attribut list=====================*/
             private  $rubrique;
             private  $rubriquedb;
   private  $db;

             private  $service;
             private  $servicedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->rubrique = new RubriqueEntity();
                 $this->rubriquedb = new RubriqueDB();
                  $this->db = new DB();
                 $this->service = new ServiceEntity();
                 $this->servicedb = new ServiceDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("rubrique/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("rubrique/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->rubrique->setId($id);
       $this->rubrique->setId($id);
                    $data["rubrique"] = $this->rubrique->get();
                    return $this->view->load("rubrique/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["rubriques"] = $this->rubrique->liste();
                    return $this->view->load("rubrique/liste", $data);
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
                    $this->rubrique->setPost($_POST,$_FILES);
                    $ok = $this->rubrique->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("rubrique/add", $data);
            }else{
                return $this->view->load("rubrique/add", $data);
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
                    $this->rubrique->setPost($_POST,$_FILES);
                    $ok = $this->rubrique->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("rubrique/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->rubrique->setId($id);
            			//Supression
            			$this->rubrique->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["services"] = $this->service->liste();
    /*=============================================================*/
       $this->rubrique->setId($id);
                    $data["rubrique"] = $this->rubrique->get();
            			//chargement de la vue edit.html
                    return $this->view->load("rubrique/edit", $data);
                }


                   



               }


            ?>

