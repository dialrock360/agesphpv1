 <?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
 use libs\system\Controller;
  use src\entities\Categorie as CategorieEntity;
  use src\model\CategorieDB;

  use src\model\DB;

  class Categorie extends Controller{

    /*==================Attribut list=====================*/
             private  $categorie;
             private  $categoriedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->categorie = new CategorieEntity();
                 $this->categoriedb = new CategorieDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("categorie/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $ID_CAT){
                    $data["id_cat"] = $ID_CAT;
                    return $this->view->load("categorie/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($ID_CAT){
       $this->categorie->setId($id);
       $this->categorie->setId_cat($ID_CAT);
                    $data["categorie"] = $this->categorie->get();
                    return $this->view->load("categorie/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["categories"] = $this->categorie->liste();
                    return $this->view->load("categorie/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["ID_CAT"])) {
                    $this->categorie->setPost($_POST,$_FILES);
                    $ok = $this->categorie->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("categorie/add", $data);
            }else{
                return $this->view->load("categorie/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["ID_CAT"])) {
                    $this->categorie->setPost($_POST,$_FILES);
                    $ok = $this->categorie->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("categorie/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($ID_CAT){
              //affectation de l'id 
       $this->categorie->setId_cat($ID_CAT);
            			//Supression
            			$this->categorie->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($ID_CAT){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->categorie->setId_cat($ID_CAT);
                    $data["categorie"] = $this->categorie->get();
            			//chargement de la vue edit.html
                    return $this->view->load("categorie/edit", $data);
                }


                   



               }


            ?>

