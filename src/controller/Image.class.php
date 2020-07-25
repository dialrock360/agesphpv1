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
  use src\entities\Image as ImageEntity;
  use src\model\ImageDB;

  use src\model\DB;

  class Image extends Controller{

    /*==================Attribut list=====================*/
             private  $image;
             private  $imagedb;
   private  $db;

              public function __construct()
                 {
                        parent::__construct();
                 $this->image = new ImageEntity();
                 $this->imagedb = new ImageDB();
                 $this->db = new DB();
                 }


            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("image/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $IDIMG){
                    $data["idimg"] = $IDIMG;
                    return $this->view->load("image/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
            public function get($IDIMG){
       $this->image->setId($id);
       $this->image->setIdimg($IDIMG);
                    $data["image"] = $this->image->get();
                    return $this->view->load("image/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    $data["images"] = $this->image->liste();
                    return $this->view->load("image/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDIMG"])) {
                    $this->image->setPost($_POST,$_FILES);
                    $ok = $this->image->insert();
                    $data["ok"] = $ok;
                }
                return $this->view->load("image/add", $data);
            }else{
                return $this->view->load("image/add", $data);
            }
        }


    /*------------------Methode update--------------------=*/
                
public function update(){
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                $data["ok"] = 0;
                if(isset($_POST["IDIMG"])) {
                    $this->image->setPost($_POST,$_FILES);
                    $ok = $this->image->update();
                    $data["ok"] = $ok;
                }
            return $this->liste();
            }else{
                return $this->view->load("image/add", $data);
            }
        }


    /*------------------Methode list--------------------=*/
                
            public function delete($IDIMG){
              //affectation de l'id 
       $this->image->setIdimg($IDIMG);
            			//Supression
            			$this->image->delete();
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            public function edit($IDIMG){
	//initialisation des cle etrangeres
    /*=============================================================*/
       $this->image->setIdimg($IDIMG);
                    $data["image"] = $this->image->get();
            			//chargement de la vue edit.html
                    return $this->view->load("image/edit", $data);
                }


                   



               }


            ?>

