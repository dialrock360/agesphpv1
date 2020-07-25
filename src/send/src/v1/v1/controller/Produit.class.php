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
  use src\entities\Produit as ProduitEntity;
  use src\model\ProduitDB;

  use src\model\DB;

  class Produit extends Controller{

    /*==================Attribut list=====================*/
             private  $produit;
             private  $produitdb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->produit = new ProduitEntity();
                 $this->produitdb = new ProduitDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("produit/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("produit/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->produit->setId($id);
       $this->produit->setId($id);
                    $data["produit"] = $this->produit->get();
                    return $this->view->load("produit/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["produits"] = $this->produit->liste();
                    return $this->view->load("produit/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->produit->setPost($_POST,$_FILES);
                    $ok = $this->produit->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("produit/add", $data);
            }else{
                return $this->view->load("produit/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->produit->setPost($_POST,$_FILES);
                    $ok = $this->produit->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("produit/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->produit->setId($id);
            			//Supression
            			$this->produit->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->produit->setId($id);
                    $data["produit"] = $this->produit->get();
            			//chargement de la vue edit.html
                    return $this->view->load("produit/edit", $data);
                }


                   



               }


            ?>

