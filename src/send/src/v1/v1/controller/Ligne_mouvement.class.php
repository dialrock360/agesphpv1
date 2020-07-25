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
  use src\entities\Ligne_mouvement as Ligne_mouvementEntity;
  use src\model\Ligne_mouvementDB;

  use src\model\DB;

  use src\entities\Article as ArticleEntity;
  use src\model\ArticleDB;


  use src\entities\Mouvement as MouvementEntity;
  use src\model\MouvementDB;


  class Ligne_mouvement extends Controller{

    /*==================Attribut list=====================*/
             private  $ligne_mouvement;
             private  $ligne_mouvementdb;
   private  $db;

             private  $article;
             private  $articledb;
             private  $mouvement;
             private  $mouvementdb;


    /*================== Constructor =====================*/
              public function __construct()
                 {
                        parent::__construct();
                 $this->ligne_mouvement = new Ligne_mouvementEntity();
                 $this->ligne_mouvementdb = new Ligne_mouvementDB();
                  $this->db = new DB();
                 $this->article = new ArticleEntity();
                 $this->articledb = new ArticleDB();
                 $this->mouvement = new MouvementEntity();
                 $this->mouvementdb = new MouvementDB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("ligne_mouvement/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("ligne_mouvement/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($id){
       $this->ligne_mouvement->setId($id);
       $this->ligne_mouvement->setId($id);
                    $data["ligne_mouvement"] = $this->ligne_mouvement->get();
                    return $this->view->load("ligne_mouvement/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["ligne_mouvements"] = $this->ligne_mouvement->liste();
                    return $this->view->load("ligne_mouvement/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_mouvement->setPost($_POST,$_FILES);
                    $ok = $this->ligne_mouvement->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("ligne_mouvement/add", $data);
            }else{
                return $this->view->load("ligne_mouvement/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
    /*==================Foreign list=====================*/
                    $data["articles"] = $this->article->liste();
                    $data["mouvements"] = $this->mouvement->liste();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["id"])) {
                    $this->ligne_mouvement->setPost($_POST,$_FILES);
                    $ok = $this->ligne_mouvement->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("ligne_mouvement/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //affectation de l'id 
       $this->ligne_mouvement->setId($id);
            			//Supression
            			$this->ligne_mouvement->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($id){
	//initialisation des cle etrangeres
                    $data["articles"] = $this->article->liste();
                    $data["mouvements"] = $this->mouvement->liste();
    /*=============================================================*/
       $this->ligne_mouvement->setId($id);
                    $data["ligne_mouvement"] = $this->ligne_mouvement->get();
            			//chargement de la vue edit.html
                    return $this->view->load("ligne_mouvement/edit", $data);
                }


                   



               }


            ?>

