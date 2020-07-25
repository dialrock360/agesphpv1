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
  use src\entities\Equipe_dequipe as Equipe_dequipeEntity;
  use src\model\Equipe_dequipeDB;

  use src\model\DB;

  class Equipe_dequipe extends Controller{

    /*==================Attribut list=====================*/
             private  $equipe_dequipe;
             private  $equipe_dequipedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->equipe_dequipe = new Equipe_dequipeEntity();
                 $this->equipe_dequipedb = new Equipe_dequipeDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("equipe_dequipe/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("equipe_dequipe/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->equipe_dequipe->setId($id);
                    $data["equipe_dequipe"] = $this->equipe_dequipe->get();
                    return $this->view->load("equipe_dequipe/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["equipe_dequipes"] = $this->equipe_dequipe->liste();
                    return $this->view->load("equipe_dequipe/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe_dequipe->setPost($_POST,$_FILES);
                    $ok = $this->equipe_dequipe->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("equipe_dequipe/add", $data);
            }else{
                return $this->view->load("equipe_dequipe/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->equipe_dequipe->setPost($_POST,$_FILES);
                    $ok = $this->equipe_dequipe->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("equipe_dequipe/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->equipe_dequipe->setId($id);
            			//Supression
            			$this->equipe_dequipe->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->equipe_dequipe->setId($id);
                    $data["equipe_dequipe"] = $this->equipe_dequipe->get();
            			//chargement de la vue edit.html
                    return $this->view->load("equipe_dequipe/edit", $data);
                }


                   



               }


            ?>

