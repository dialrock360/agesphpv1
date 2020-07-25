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
  use src\entities\Ligne_producion as Ligne_producionEntity;
  use src\model\Ligne_producionDB;

  use src\model\DB;

  use src\entities\Produit as ProduitEntity;
  use src\model\ProduitDB;


  use src\entities\Tache as TacheEntity;
  use src\model\TacheDB;


  class Ligne_producion extends Controller{

    /*==================Attribut list=====================*/
             private  $ligne_producion;
             private  $ligne_produciondb;
   private  $db;

             private  $produit;
             private  $produitdb;
             private  $tache;
             private  $tachedb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->ligne_producion = new Ligne_producionEntity();
                 $this->ligne_produciondb = new Ligne_producionDB();
                  $this->db = new DB();
                 $this->produit = new ProduitEntity();
                 $this->produitdb = new ProduitDB();
                 $this->tache = new TacheEntity();
                 $this->tachedb = new TacheDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("ligne_producion/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("ligne_producion/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->ligne_producion->setId($id);
       $this->ligne_producion->setId($id);
                    $data["ligne_producion"] = $this->ligne_producion->get();
                    return $this->view->load("ligne_producion/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["ligne_producions"] = $this->ligne_producion->liste();
                    return $this->view->load("ligne_producion/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["produits"] = $this->produit->liste();
                    $data["taches"] = $this->tache->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_producion->setPost($_POST,$_FILES);
                    $ok = $this->ligne_producion->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("ligne_producion/add", $data);
            }else{
                return $this->view->load("ligne_producion/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["produits"] = $this->produit->liste();
                    $data["taches"] = $this->tache->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_producion->setPost($_POST,$_FILES);
                    $ok = $this->ligne_producion->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("ligne_producion/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->ligne_producion->setId($id);
            			//Supression
            			$this->ligne_producion->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["produits"] = $this->produit->liste();
                    $data["taches"] = $this->tache->liste();
    /*=============================================================*/
       $this->ligne_producion->setId($id);
                    $data["ligne_producion"] = $this->ligne_producion->get();
            			//chargement de la vue edit.html
                    return $this->view->load("ligne_producion/edit", $data);
                }


                   



               }


            ?>

