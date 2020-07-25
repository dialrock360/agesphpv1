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
  use src\entities\V_produit as V_produitEntity;
  use src\model\V_produitDB;

  use src\model\DB;

  class V_produit extends Controller{

    /*==================Attribut list=====================*/
             private  $v_produit;
             private  $v_produitdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->v_produit = new V_produitEntity();
                 $this->v_produitdb = new V_produitDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("v_produit/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("v_produit/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->v_produit->setId($id);
                    $data["v_produit"] = $this->v_produit->get();
                    return $this->view->load("v_produit/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["v_produits"] = $this->v_produit->liste();
                    return $this->view->load("v_produit/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_produit->setPost($_POST,$_FILES);
                    $ok = $this->v_produit->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("v_produit/add", $data);
            }else{
                return $this->view->load("v_produit/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->v_produit->setPost($_POST,$_FILES);
                    $ok = $this->v_produit->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("v_produit/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->v_produit->setId($id);
            			//Supression
            			$this->v_produit->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->v_produit->setId($id);
                    $data["v_produit"] = $this->v_produit->get();
            			//chargement de la vue edit.html
                    return $this->view->load("v_produit/edit", $data);
                }


                   



               }


            ?>

