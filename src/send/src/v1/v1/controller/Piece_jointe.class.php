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
  use src\entities\Piece_jointe as Piece_jointeEntity;
  use src\model\Piece_jointeDB;

  use src\model\DB;

  class Piece_jointe extends Controller{

    /*==================Attribut list=====================*/
             private  $piece_jointe;
             private  $piece_jointedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->piece_jointe = new Piece_jointeEntity();
                 $this->piece_jointedb = new Piece_jointeDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("piece_jointe/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("piece_jointe/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->piece_jointe->setId($id);
       $this->piece_jointe->setId($id);
                    $data["piece_jointe"] = $this->piece_jointe->get();
                    return $this->view->load("piece_jointe/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["piece_jointes"] = $this->piece_jointe->liste();
                    return $this->view->load("piece_jointe/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->piece_jointe->setPost($_POST,$_FILES);
                    $ok = $this->piece_jointe->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("piece_jointe/add", $data);
            }else{
                return $this->view->load("piece_jointe/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->piece_jointe->setPost($_POST,$_FILES);
                    $ok = $this->piece_jointe->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("piece_jointe/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->piece_jointe->setId($id);
            			//Supression
            			$this->piece_jointe->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->piece_jointe->setId($id);
                    $data["piece_jointe"] = $this->piece_jointe->get();
            			//chargement de la vue edit.html
                    return $this->view->load("piece_jointe/edit", $data);
                }


                   



               }


            ?>

