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
  use src\entities\Sous_rubrique as Sous_rubriqueEntity;
  use src\model\Sous_rubriqueDB;

  use src\model\DB;

  use src\entities\Rubrique as RubriqueEntity;
  use src\model\RubriqueDB;


  class Sous_rubrique extends Controller{

    /*==================Attribut list=====================*/
             private  $sous_rubrique;
             private  $sous_rubriquedb;
   private  $db;

             private  $rubrique;
             private  $rubriquedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->sous_rubrique = new Sous_rubriqueEntity();
                 $this->sous_rubriquedb = new Sous_rubriqueDB();
                  $this->db = new DB();
                 $this->rubrique = new RubriqueEntity();
                 $this->rubriquedb = new RubriqueDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("sous_rubrique/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("sous_rubrique/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->sous_rubrique->setId($id);
       $this->sous_rubrique->setId($id);
                    $data["sous_rubrique"] = $this->sous_rubrique->get();
                    return $this->view->load("sous_rubrique/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["sous_rubriques"] = $this->sous_rubrique->liste();
                    return $this->view->load("sous_rubrique/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["rubriques"] = $this->rubrique->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->sous_rubrique->setPost($_POST,$_FILES);
                    $ok = $this->sous_rubrique->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("sous_rubrique/add", $data);
            }else{
                return $this->view->load("sous_rubrique/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["rubriques"] = $this->rubrique->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->sous_rubrique->setPost($_POST,$_FILES);
                    $ok = $this->sous_rubrique->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("sous_rubrique/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->sous_rubrique->setId($id);
            			//Supression
            			$this->sous_rubrique->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["rubriques"] = $this->rubrique->liste();
    /*=============================================================*/
       $this->sous_rubrique->setId($id);
                    $data["sous_rubrique"] = $this->sous_rubrique->get();
            			//chargement de la vue edit.html
                    return $this->view->load("sous_rubrique/edit", $data);
                }


                   



               }


            ?>

