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
  use src\entities\Type_contrat as Type_contratEntity;
  use src\model\Type_contratDB;

  use src\model\DB;

  class Type_contrat extends Controller{

    /*==================Attribut list=====================*/
             private  $type_contrat;
             private  $type_contratdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->type_contrat = new Type_contratEntity();
                 $this->type_contratdb = new Type_contratDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("type_contrat/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("type_contrat/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->type_contrat->setId($id);
       $this->type_contrat->setId($id);
                    $data["type_contrat"] = $this->type_contrat->get();
                    return $this->view->load("type_contrat/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["type_contrats"] = $this->type_contrat->liste();
                    return $this->view->load("type_contrat/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->type_contrat->setPost($_POST,$_FILES);
                    $ok = $this->type_contrat->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("type_contrat/add", $data);
            }else{
                return $this->view->load("type_contrat/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->type_contrat->setPost($_POST,$_FILES);
                    $ok = $this->type_contrat->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("type_contrat/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->type_contrat->setId($id);
            			//Supression
            			$this->type_contrat->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->type_contrat->setId($id);
                    $data["type_contrat"] = $this->type_contrat->get();
            			//chargement de la vue edit.html
                    return $this->view->load("type_contrat/edit", $data);
                }


                   



               }


            ?>

