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
  use src\entities\Categorie as CategorieEntity;
  use src\model\CategorieDB;

  use src\model\DB;

  use src\entities\Famille as FamilleEntity;
  use src\model\FamilleDB;


  use src\entities\Nomenclature_article as Nomenclature_articleEntity;
  use src\model\Nomenclature_articleDB;


  class Categorie extends Controller{

    /*==================Attribut list=====================*/
             private  $categorie;
             private  $categoriedb;
   private  $db;

             private  $famille;
             private  $familledb;
             private  $nomenclature_article;
             private  $nomenclature_articledb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->categorie = new CategorieEntity();
                 $this->categoriedb = new CategorieDB();
                  $this->db = new DB();
                 $this->famille = new FamilleEntity();
                 $this->familledb = new FamilleDB();
                 $this->nomenclature_article = new Nomenclature_articleEntity();
                 $this->nomenclature_articledb = new Nomenclature_articleDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("categorie/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("categorie/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->categorie->setId($id);
       $this->categorie->setId($id);
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
                    $data["familles"] = $this->famille->liste();
                    $data["nomenclature_articles"] = $this->nomenclature_article->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
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
                    $data["familles"] = $this->famille->liste();
                    $data["nomenclature_articles"] = $this->nomenclature_article->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
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
                
            public function delete($id){
              //affectation de l'id 
       $this->categorie->setId($id);
            			//Supression
            			$this->categorie->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["familles"] = $this->famille->liste();
                    $data["nomenclature_articles"] = $this->nomenclature_article->liste();
    /*=============================================================*/
       $this->categorie->setId($id);
                    $data["categorie"] = $this->categorie->get();
            			//chargement de la vue edit.html
                    return $this->view->load("categorie/edit", $data);
                }


                   



               }


            ?>

