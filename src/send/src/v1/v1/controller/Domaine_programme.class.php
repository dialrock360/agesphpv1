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
  use src\entities\Domaine_programme as Domaine_programmeEntity;
  use src\model\Domaine_programmeDB;

  use src\model\DB;

  class Domaine_programme extends Controller{

    /*==================Attribut list=====================*/
             private  $domaine_programme;
             private  $domaine_programmedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->domaine_programme = new Domaine_programmeEntity();
                 $this->domaine_programmedb = new Domaine_programmeDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("domaine_programme/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("domaine_programme/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->domaine_programme->setId($id);
       $this->domaine_programme->setId($id);
                    $data["domaine_programme"] = $this->domaine_programme->get();
                    return $this->view->load("domaine_programme/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["domaine_programmes"] = $this->domaine_programme->liste();
                    return $this->view->load("domaine_programme/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->domaine_programme->setPost($_POST,$_FILES);
                    $ok = $this->domaine_programme->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("domaine_programme/add", $data);
            }else{
                return $this->view->load("domaine_programme/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->domaine_programme->setPost($_POST,$_FILES);
                    $ok = $this->domaine_programme->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("domaine_programme/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->domaine_programme->setId($id);
            			//Supression
            			$this->domaine_programme->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->domaine_programme->setId($id);
                    $data["domaine_programme"] = $this->domaine_programme->get();
            			//chargement de la vue edit.html
                    return $this->view->load("domaine_programme/edit", $data);
                }


                   



               }


            ?>

