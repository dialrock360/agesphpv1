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
  use src\entities\Produit_cmp as Produit_cmpEntity;
  use src\model\Produit_cmpDB;

  use src\model\DB;

  class Produit_cmp extends Controller{

    /*==================Attribut list=====================*/
             private  $produit_cmp;
             private  $produit_cmpdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->produit_cmp = new Produit_cmpEntity();
                 $this->produit_cmpdb = new Produit_cmpDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("produit_cmp/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $idpcmp){
                    $data["idpcmp"] = $idpcmp;
                    return $this->view->load("produit_cmp/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($idpcmp){
       $this->produit_cmp->setId($id);
       $this->produit_cmp->setIdpcmp($idpcmp);
                    $data["produit_cmp"] = $this->produit_cmp->get();
                    return $this->view->load("produit_cmp/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["produit_cmps"] = $this->produit_cmp->liste();
                    return $this->view->load("produit_cmp/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idpcmp"])) {
                    $this->produit_cmp->setPost($_POST,$_FILES);
                    $ok = $this->produit_cmp->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("produit_cmp/add", $data);
            }else{
                return $this->view->load("produit_cmp/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["idpcmp"])) {
                    $this->produit_cmp->setPost($_POST,$_FILES);
                    $ok = $this->produit_cmp->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("produit_cmp/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($idpcmp){
              //affectation de l'id 
       $this->produit_cmp->setIdpcmp($idpcmp);
            			//Supression
            			$this->produit_cmp->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($idpcmp){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->produit_cmp->setIdpcmp($idpcmp);
                    $data["produit_cmp"] = $this->produit_cmp->get();
            			//chargement de la vue edit.html
                    return $this->view->load("produit_cmp/edit", $data);
                }


                   



               }


            ?>

