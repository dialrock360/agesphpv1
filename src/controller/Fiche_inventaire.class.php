 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
 use libs\system\Controller;
  use src\entities\Fiche_inventaire as Fiche_inventaireEntity;
  use src\model\Fiche_inventaireDB;

  use src\model\DB;

  use src\entities\Fiche_inventaire as Fiche_inventaireEntity;
  use src\model\Fiche_inventaireDB;


  class Fiche_inventaire extends Controller{

    /*==================Attribut list=====================*/
             private  $fiche_inventaire;
             private  $fiche_inventairedb;
   private  $db;

             private  $fiche_inventaire;
             private  $fiche_inventairedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->fiche_inventaire = new Fiche_inventaireEntity();
                 $this->fiche_inventairedb = new Fiche_inventaireDB();
                  $this->db = new DB();
                 $this->fiche_inventaire = new Fiche_inventaireEntity();
                 $this->fiche_inventairedb = new Fiche_inventaireDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("fiche_inventaire/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $idl){
                    $data["idl"] = $idl;
                    return $this->view->load("fiche_inventaire/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($idl){
       $this->fiche_inventaire->setId($id);
       $this->fiche_inventaire->setIdl($idl);
                    $data["fiche_inventaire"] = $this->fiche_inventaire->get();
                    return $this->view->load("fiche_inventaire/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["fiche_inventaires"] = $this->fiche_inventaire->liste();
                    return $this->view->load("fiche_inventaire/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["fiche_inventaires"] = $this->fiche_inventaire->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idl"])) {
                    $this->fiche_inventaire->setPost($_POST,$_FILES);
                    $ok = $this->fiche_inventaire->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("fiche_inventaire/add", $data);
            }else{
                return $this->view->load("fiche_inventaire/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["fiche_inventaires"] = $this->fiche_inventaire->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idl"])) {
                    $this->fiche_inventaire->setPost($_POST,$_FILES);
                    $ok = $this->fiche_inventaire->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("fiche_inventaire/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($idl){
              //affectation de l'id 
       $this->fiche_inventaire->setIdl($idl);
            			//Supression
            			$this->fiche_inventaire->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($idl){
	//initialisation des cle etrangeres
                    $data["fiche_inventaires"] = $this->fiche_inventaire->liste();
    /*=============================================================*/
       $this->fiche_inventaire->setIdl($idl);
                    $data["fiche_inventaire"] = $this->fiche_inventaire->get();
            			//chargement de la vue edit.html
                    return $this->view->load("fiche_inventaire/edit", $data);
                }


                   



               }


            ?>

