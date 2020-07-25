 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
 use libs\system\Controller;
  use src\entities\Department as DepartmentEntity;
  use src\model\DepartmentDB;

  use src\model\DB;

  class Department extends Controller{

    /*==================Attribut list=====================*/
             private  $department;
             private  $departmentdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->department = new DepartmentEntity();
                 $this->departmentdb = new DepartmentDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("department/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $iddep){
                    $data["iddep"] = $iddep;
                    return $this->view->load("department/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($iddep){
       $this->department->setId($id);
       $this->department->setIddep($iddep);
                    $data["department"] = $this->department->get();
                    return $this->view->load("department/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["departments"] = $this->department->liste();
                    return $this->view->load("department/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["iddep"])) {
                    $this->department->setPost($_POST,$_FILES);
                    $ok = $this->department->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("department/add", $data);
            }else{
                return $this->view->load("department/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["iddep"])) {
                    $this->department->setPost($_POST,$_FILES);
                    $ok = $this->department->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("department/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($iddep){
              //affectation de l'id 
       $this->department->setIddep($iddep);
            			//Supression
            			$this->department->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($iddep){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->department->setIddep($iddep);
                    $data["department"] = $this->department->get();
            			//chargement de la vue edit.html
                    return $this->view->load("department/edit", $data);
                }


                   



               }


            ?>

