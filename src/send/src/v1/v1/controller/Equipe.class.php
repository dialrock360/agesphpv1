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
  use src\entities\Equipe as EquipeEntity;
  use src\model\EquipeDB;

  use src\model\DB;

  class Equipe extends Controller{

    /*==================Attribut list=====================*/
             private  $equipe;
             private  $equipedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->equipe = new EquipeEntity();
                 $this->equipedb = new EquipeDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("equipe/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("equipe/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->equipe->setId($id);
       $this->equipe->setId($id);
                    $data["equipe"] = $this->equipe->get();
                    return $this->view->load("equipe/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["equipes"] = $this->equipe->liste();
                    return $this->view->load("equipe/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe->setPost($_POST,$_FILES);
                    $ok = $this->equipe->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("equipe/add", $data);
            }else{
                return $this->view->load("equipe/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe->setPost($_POST,$_FILES);
                    $ok = $this->equipe->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("equipe/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->equipe->setId($id);
            			//Supression
            			$this->equipe->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->equipe->setId($id);
                    $data["equipe"] = $this->equipe->get();
            			//chargement de la vue edit.html
                    return $this->view->load("equipe/edit", $data);
                }


                   



               }


            ?>

