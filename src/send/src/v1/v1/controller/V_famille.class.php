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
  use src\entities\V_famille as V_familleEntity;
  use src\model\V_familleDB;

  use src\model\DB;

  class V_famille extends Controller{

    /*==================Attribut list=====================*/
             private  $v_famille;
             private  $v_familledb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_famille = new V_familleEntity();
                 $this->v_familledb = new V_familleDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_famille/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_famille/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_famille->setId($id);
                    $data["v_famille"] = $this->v_famille->get();
                    return $this->view->load("v_famille/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_familles"] = $this->v_famille->liste();
                    return $this->view->load("v_famille/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_famille->setPost($_POST,$_FILES);
                    $ok = $this->v_famille->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_famille/add", $data);
            }else{
                return $this->view->load("v_famille/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_famille->setPost($_POST,$_FILES);
                    $ok = $this->v_famille->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_famille/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_famille->setId($id);
            			//Supression
            			$this->v_famille->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_famille->setId($id);
                    $data["v_famille"] = $this->v_famille->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_famille/edit", $data);
                }


                   



               }


            ?>

