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
  use src\entities\Fiche_de_presense as Fiche_de_presenseEntity;
  use src\model\Fiche_de_presenseDB;

  use src\model\DB;

  class Fiche_de_presense extends Controller{

    /*==================Attribut list=====================*/
             private  $fiche_de_presense;
             private  $fiche_de_presensedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->fiche_de_presense = new Fiche_de_presenseEntity();
                 $this->fiche_de_presensedb = new Fiche_de_presenseDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("fiche_de_presense/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("fiche_de_presense/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->fiche_de_presense->setId($id);
       $this->fiche_de_presense->setId($id);
                    $data["fiche_de_presense"] = $this->fiche_de_presense->get();
                    return $this->view->load("fiche_de_presense/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["fiche_de_presenses"] = $this->fiche_de_presense->liste();
                    return $this->view->load("fiche_de_presense/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_de_presense->setPost($_POST,$_FILES);
                    $ok = $this->fiche_de_presense->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("fiche_de_presense/add", $data);
            }else{
                return $this->view->load("fiche_de_presense/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->fiche_de_presense->setPost($_POST,$_FILES);
                    $ok = $this->fiche_de_presense->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("fiche_de_presense/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->fiche_de_presense->setId($id);
            			//Supression
            			$this->fiche_de_presense->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->fiche_de_presense->setId($id);
                    $data["fiche_de_presense"] = $this->fiche_de_presense->get();
            			//chargement de la vue edit.html
                    return $this->view->load("fiche_de_presense/edit", $data);
                }


                   



               }


            ?>

