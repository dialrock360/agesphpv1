<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE MODELE.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/
    use libs\system\Controller;
    class Welcome extends Controller{

        public function __construct(){
            parent::__construct();
        }
        //methode ou url
        public function index(){
			//view


                    $data["vewcontent"] = 'home';
                    return $this->view->load("welcome/index", $data);
        }

        public function explore(){
            //view
            return $this->view->load("mmm/index");

        }
    }
?>