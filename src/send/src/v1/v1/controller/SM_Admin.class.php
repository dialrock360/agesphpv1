<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16

    PERFECTIONNEZ PAR PIERRE YEM MBACK
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 - 79
    AUTEUR DU MODUL UI SAMANE MANAGER

    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE MODELE.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/

    use libs\system\Controller;
    use libs\system\sm_manager\DatabaseManager;
    use libs\system\sm_manager\EntitieManager;
    use libs\system\sm_manager\ControllerManager;
    use libs\system\sm_manager\ModelManager;
    use libs\system\sm_manager\ViewManager;

    require_once 'config/database.php';
    class SM_Admin extends Controller{
        private $vue;
        private $curendbname;
        private $curentdatabase;
        private $fndb;
        private $fnent;
        private $fnmd;
        private $fvw;
        private $fctrt;

        public function __construct(){
            parent::__construct();

            $this->curendbname= connexion_params()["database_name"];
            $this->curentdatabase= connexion_params();
            $this->fndb= new DatabaseManager();
            $this->fnent=new EntitieManager();
            $this->fctrt=new ControllerManager();
            $this->fnmd=new ModelManager();
            $this->fvw=new ViewManager();
        }
        //methode ou url
        public function index(){
            $data['active']=1;
            $data['view']='Accueil';
            $data['activedb']=  $this->curendbname;

			//view
            return $this->view->load("sm-sdmin/index",$data);

        }

        public function home(){
            //view
            return $this->view->load("welcome/sm-sdmin");

        }

        //methode ou url
        public function database($param){
            $data['activedb']=  $this->curendbname;
            $data['activedb']=  $this->curendbname;
            $data['view']='Database';
            $data['active']=2;

            $this->fndb= new DatabaseManager();
            $data['databases'] =  $this->fndb->database_liste();
            $data['lostdatabases'] = $this->fndb->sheck_database_bakup();
            $data['tatabasename'] = '';
            $data['curentdatabase']=$this->curentdatabase;
            $data['curentdatabase']=$this->curentdatabase;
            $data['ok']='';
            $this->vue="sm-sdmin/database/database";
            //view


            $data['ok']=($param=='satabase')?'':$param;


            $curendatabasename=connexion_params()["database_name"];

            $data['testcurendatabasename']=ucfirst(strtolower($curendatabasename));




            //view
          return $this->view->load($this->vue,$data);
        }

        //methode ou url
        public function vue($param){
            $data['activedb']=  $this->curendbname;
            $data['view']='View';
            $data['active']=6;

            $data['vues']='';
            $data['ok']='';
            //view

            $this->fvw=new ViewManager();
            $this->fndb= new DatabaseManager();
            $this->fnent= new EntitieManager();
            $data['databases'] =  $this->fndb->database_liste();
            $this->vue="sm-sdmin/vue/vue";
            $array_values='';
            $data['views']=$this->fvw->views_list();

            $data['ok']=($param=='vue')?'':$param;


            $curendatabasename=connexion_params()["database_name"];



            $data['tables'] =  $this->fnent->entities_list();
            $data['databases'] =  $this->fndb->database_liste();



            if(isset($_POST['editer']))//'valider' est le name du champs submit du formulaire add.html
            {
                $this->vue="sm-sdmin/vue/edit";
            }


            $this->fvw->updat_view_welcome(true);

          //  echo "There were $filecount files";
          //print_r( $data['views']);

            //view
          return $this->view->load($this->vue,$data);
        }
        public function edit_vue($param){
            $data['activedb']=  $this->curendbname;
            $data['view']='View';
            $data['active']=6;

            $data['vues']='';
            $data['vuename']=$param;
            $data['ok']='';
            //view

            $this->fvw=new ViewManager();
            $this->vue="sm-sdmin/vue/edit";

            $data['files']=$this->fvw->list_files_view($param);

            //print_r ( $data['view']);


           return $this->view->load($this->vue,$data);
        }

        //methode ou url
        public function modele($param){
            $data['activedb']=  $this->curendbname;
            $data['view']='Models';
            $data['active']=5;
            $this->fnmd=new ModelManager();
            $this->fndb= new DatabaseManager();
            $data['databases'] =  $this->fndb->database_liste();
            $this->vue="sm-sdmin/modele/modele";
            $array_values='';
            $data['models']=$this->fnmd->modeles_list();

            $data['ok']=($param=='modele')?'':$param;


            $curendatabasename=connexion_params()["database_name"];



            $data['tables'] =  $this->fndb->table_liste($curendatabasename);
            $data['databases'] =  $this->fndb->database_liste();
            //print_r($data['modeles']);


            //view
           return $this->view->load($this->vue,$data);

        }

        //methode ou url
        public function entite($param){
            $data['activedb']=  $this->curendbname;
            $data['view']='Entities';
            $data['active']=4;
            $this->fnent=new EntitieManager();
            $this->fndb= new DatabaseManager();
            $data['databases'] =  $this->fndb->database_liste();
            $this->vue="sm-sdmin/entite/entite";
            $array_values='';
            $data['entities']=$this->fnent->entities_list();

            $data['ok']=($param=='entite')?'':$param;


            $curendatabasename=connexion_params()["database_name"];



            $data['tables'] =  $this->fndb->table_liste($curendatabasename);
            $data['databases'] =  $this->fndb->database_liste();


			//view
            return $this->view->load($this->vue,$data);

        }

        public function chechker(){
            $ok=0;
            $sms= '<label class="text-danger">Error</label>';

            if($_POST["addmethode"]==1)
            {

                if (isset($_POST["curendatabase"]) && $_POST["curendatabase"]=='yes'){

                    echo '1';

                }else{
                    if (isset($_POST["databasename"]) && $_POST["databasename"]!=''){

                        echo '2';
                    }else{
                        echo $sms= '<label class="text-danger">Veillez Faire un choix svp</label>';
                    }


                }
            }

            return $sms;
        }



        //methode ou url
        public function controlleur($param){
            $data['activedb']=  $this->curendbname;
            $data['view']='Controller';
            $data['active']=3;


            $this->fndb= new DatabaseManager();
            $this->fnent=new EntitieManager();
            $this->fctrt=new ControllerManager();

            $curendatabasename=connexion_params()["database_name"];

            $data['ok']='';

            $data['tables'] =  $this->fndb->table_liste($curendatabasename);
            $array_values='';
            $data['controllers']=$this->fctrt->controllers_list();
            //print_r($data['controllers']) ;

            $this->vue="sm-sdmin/controlleur/controlleur";
            $data['ok']=($param=='controlleur')?'':$param;
            $this->fnnt=new EntitieManager();
            $data['entities']=$this->fnent->entities_list();

            $data['databases'] =  $this->fndb->database_liste();
            //echo connexion_params()['user'];

              return $this->view->load($this->vue, $data);



        }



        function manage_database($param)
        {
             $ok='';
             $dbtarget=$this->curendbname;
             $docrud=false;
             $this->fndb= new DatabaseManager();
             $this->fvw= new ViewManager();
             $this->fnmd= new ModelManager();
             $this->fnent= new EntitieManager();
             $this->fctrt= new ControllerManager();

            if(isset($_POST['valider']))//'valider' est le name du champs submit du formulaire add.html
            {
               // print_r($_POST);
                if($param=='add')
                {

                    $file=array();
                    $file["dbname"]='';
                    $file["file_data"]='';

                    $ok='<label class="text-danger">Error </label>';


                    if($_FILES["database"]["name"] != '')
                    {

                        $array = explode(".", $_FILES["database"]["name"]);
                        $dbname= $array[0]; // piece1
                        $extension = end($array);
                        $file_data = $_FILES["database"]["tmp_name"];
                        if($extension != 'sql')
                        {

                            $ok = '<label class="text-danger">Fichier non valide</label>';
                        }else{

                            $file["dbname"]=$dbname;
                            $file["file_data"]=$file_data;
                            $rep = $this->fndb->import_database($file);
                            if ($rep[0]>0){
                                $ok=$rep[1];

                                $dbtarget=$dbname;
                                if(isset($_POST['usedb']) && $_POST['usedb']=='yes')//'valider' est le name du champs submit du formulaire add.html
                                {

                                    $db=array();
                                    $db["host"] = connexion_params()["host"];
                                    $db["user"] = connexion_params()["user"];
                                    $db["password"] = connexion_params()["password"];
                                    $db["dbname"] =$dbtarget;
                                    $db["etat"] ='on';
                                    $this->fndb->init_database_configuration($db);
                                    $this->curentdatabase=$db;
                                }
                            }


                        }
                    }
                    else
                    {
                        $ok = '<label class="text-danger">Veuillez sélectionner un fichier SQL</label>';
                    }


                }
                if($param=='config')
                {

                    extract($_POST);
                    $this->fndb= new DatabaseManager();
                    $db=array();
                    $db["host"] = $host;
                    $db["user"] = $user;
                    $db["password"] = $password;
                    $db["dbname"] =$dbname;
                    $db["etat"] =$etat;
                    $dbtarget=$dbname;
                    $this->fndb->init_database_configuration($db);
                    $ok='<label class="text-success">Base de données  '.$dbname.' Configurée avec succès "<span class="text-warning"> Rafraîchir la page ! </span>" </label>';
                    if(isset($_POST['switchcrud']))//'valider' est le name du champs submit du formulaire add.html
                    {


                        //print_r($_POST);
                        $data['ok'] = 0;
                        if(!empty($dbname)) {
                            $this->fndb=new DatabaseManager();
                            $this->fctrt=new ControllerManager();
                            $tabls=$this->fndb->table_listepure($dbname);
                            $tablename=$tabls;
                            $objet=($_POST['switchcrud']==1)?'Crés':'Vidés';
                            $i=0;
                            //   echo $databasename;
                            if ($_POST['switchcrud']==1 && $_POST['crud']=='yes'){
                                $i=$this->createCrud($dbname);
                            }
                            if ($_POST['switchcrud']==2 && $_POST['clearcrud']=='yes'){


                                $i=$this->dropCrud();
                            }




                           if ($i>0){

                                $data['ok']= '<label class="text-success">'.$i.'CRUD '.$objet.' avec succès </label><span class="text-warning"> Rafraîchir la page ! </span>';
                                return $this->database( $data['ok']);
                            }

                        }




                    }

                }

            }
          return $this->database($ok);
        }

        function generate_controller($tablename)
        {


            $data['ok']='<label class="text-danger">Il y a une erreur dans le Controller Generator</label>';
            if ($tablename!='nulle'){

                $coltable2= $this->fndb->get_table_details(strtolower($tablename));

                $data['ok']=$this->fctrt->create_controller($tablename,$coltable2);
                return $this->controlleur($data['ok']);
            }

            if(isset($_POST['importer']))//'valider' est le name du champs submit du formulaire add.html
            {

                extract($_POST);

                if($_POST['importer']=='Generer')//'valider' est le name du champs submit du formulaire add.html
                {

                    $dbsename = ($addmethode==1)?strtolower($_POST ['otherdatabasename']):strtolower($curendatabasename);
                    //print_r($_POST);
                    $data['ok'] = 0;
                    if(!empty($dbsename)) {
                        $this->fndb=new DatabaseManager();
                        $this->fctrt=new ControllerManager();
                        $tabls=$this->fndb->table_listepure($dbsename);


                        //   echo $databasename;

                        $i=0;
                        foreach($tabls as $ctrl){
                          //  echo $ctrl ['tablename'].'<br>';

                            $tablename = $ctrl ['tablename'];
                            $coltable2= $this->fndb->get_table_details($tablename);

                            $data['ok']=$this->fctrt->create_controller($tablename,$coltable2);
                            $i++;
                           // $coltable=$this->fndb->get_columnsTable($tablename,$ctrl,true);
                           // $this->fctrt->create_controller(strval($tablename),$coltable);
                            // $this->add_class($tablename,$tablels,'controller');

                            //print_r($coltable);
                            // echo '<hr>';
                        }
                        if ($i>0){
                            $data['ok']= '<label class="text-success">'.$i.'Contrôleurs créés avec succès </label><span class="text-warning"> Rafraîchir la page ! </span>';
                           return $this->controlleur( $data['ok']);
                        }

                    }
                   return $this->controlleur('controlleur');
                }

                if($_POST['importer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $tablename=$_POST['ctrlnames'];
                    foreach(explode(";", $tablename) as $ctrlname){
                        /* print_r($tablename);
                         echo  '<br>';*/
                        //   $this->remouv_class($ctrname,'controller');
                        //echo $tablename. '<br>';

                        $coltable2= $this->fndb->get_table_details(strtolower($ctrlname));

                        $this->fctrt->create_controller($ctrlname,$coltable2);
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.' Contrôleurs créés avec succès</label>';

                }

            }
            if (isset($_POST["valider"])){
                extract($_POST);
                $input = array();
                $input['classe'] = $_POST["crtname"];
                //   print_r($_POST) ;


                if($_POST["addmethode"]==2)
                {
                    $crtname = $_POST["crtname"];
                    //echo "<br />";
                    $import = implode ( ";" ,$_POST["import"]) ;
                    //echo "<br />";
                    $tablemetods=$this->fctrt->controler_methode_filter($_POST);

                    $data['ok']=$this->fctrt->post_create_controller($crtname,$import,$tablemetods);
                    return $this->controlleur($data['ok']);
                }
                //print_r($tabmethod);
                //  echo " <hr />";
                // print_r($tabattrib);




            }
        }

        function generate_entitie($tablename)
        {


            $data['ok']='<label class="text-danger">Il y a une erreur dans le Controller Generator</label>';
            if ($tablename!='nulle'){

                $coltable2= $this->fndb->get_table_details(strtolower($tablename));

                $data['ok']=$this->fnent->create_entitie($tablename,$coltable2);
                return $this->entite('<label class="text-success">Entité  '.$tablename.' créée avec succès </label>');
            }

            if(isset($_POST['importer']))//'valider' est le name du champs submit du formulaire add.html
            {

                extract($_POST);

                if($_POST['importer']=='Generer')//'valider' est le name du champs submit du formulaire add.html
                {

                    $dbsename = ($addmethode==1)?strtolower($_POST ['otherdatabasename']):strtolower($curendatabasename);
                    //print_r($_POST);
                    $data['ok'] = 0;
                    if(!empty($dbsename)) {
                        $this->fndb=new DatabaseManager();
                        $this->fnent=new EntitieManager();
                        $tabls=$this->fndb->table_listepure($dbsename);


                        //   echo $databasename;

                        $i=0;
                        foreach($tabls as $ctrl){
                            //  echo $ctrl ['tablename'].'<br>';

                            $tablename = $ctrl ['tablename'];
                            $coltable2= $this->fndb->get_table_details($tablename);


                            $data['ok']=$this->fnent->create_entitie($tablename,$coltable2);
                            $i++;
                            // $coltable=$this->fndb->get_columnsTable($tablename,$ctrl,true);
                            // $this->fctrt->create_controller(strval($tablename),$coltable);
                            // $this->add_class($tablename,$tablels,'controller');

                            //print_r($coltable);
                            // echo '<hr>';
                        }
                        if ($i>0){
                            $data['ok']= '<label class="text-success">'.$i.'Entitées créés avec succès </label><span class="text-warning"> Rafraîchir la page ! </span>';
                            return $this->entite( $data['ok']);
                        }

                    }
                    return $this->entite('entite');
                }

                if($_POST['importer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $tablename=$_POST['entnames'];
                    foreach(explode(";", $tablename) as $entname){

                        $coltable2= $this->fndb->get_table_details(strtolower($tablename));

                        $data['ok']=$this->fnent->create_entitie($entname,$coltable2);
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.'Entitées créées avec succès</label>';

                }

            }
            if (isset($_POST["valider"])){
                //extract($_POST);
                // $input = array();
                $entname = ucfirst(strtolower($_POST["crtname"]));
                // echo " <br />";
                $import = implode ( ";" ,$_POST["import"]) ;
                $tabattrib=$this->fnent->entitie_atrib_filter($_POST);
                // echo " <hr />";
                //   print_r($entitie_atrib_filter) ;
                // echo " <hr />";

                // $this->fnent->post_create_entitie($entname,$tabattrib,$import);
                return $this->entite($this->fnent->post_create_entitie($entname,$tabattrib,$import));

            }
        }



        function generate_model($tablename)
        {

            $this->fndb= new DatabaseManager();
            $this->fnmd= new ModelManager();
            $tablels =  $this->fndb->table_listepure();
            if ($tablename!='nulle'){
                $ok= $this->fnmd->create_model($tablename);
               return $this->modele('<label class="text-success">Model '.$tablename.' créé avec succès </label>');
            }
            if(isset($_POST['charger'])){

                extract($_POST);
                $i=0;

                $sms= '<label class="text-danger">Veillez faire un choix svp!</label>';


                $otherdatabase=(isset($_POST["otherdatabasename"]) && $_POST["otherdatabasename"]!='')?$_POST["otherdatabasename"]: $this->curendbname;
                $curendb=(isset($_POST["use_curendatabase"]) && $_POST["use_curendatabase"]=='yes' && $_POST["addmethode"]==0)?$this->curendbname: $otherdatabase;
                // $curendb=(isset($_POST["curendatabasename"]) && isset($_POST["use_curendatabase"]))?$_POST["curendatabasename"]:$this->curendbname;
                $databasename=($_POST["addmethode"]==0)?$curendb:$otherdatabase;

                if ($databasename!=''){
                    $tabls=$this->fndb->table_listepure($databasename);


                        //echo $databasename;

                    $this->fnmd=new ModelManager();

                    foreach($tabls as $entitie){


                        $coltable=$this->fndb->get_columnsTable($entitie["tablename"],$entitie,true);
                     // echo $entitie["tablename"]. '<br>';
                      // print_r($coltable);
                      // $this->fnmd->create_model(strval($entitie["tablename"]),$coltable,$databasename);
                        $this->fnmd->create_model(strval($entitie["tablename"]),$databasename);
                         $i++;
                       // echo  '<hr>';
                    }
                    $sms= ($i>0)?'<label class="text-success">'.$i.' Models créées avec succès</label><span class="text-warning"> Rafraîchir la page ! </span>':$sms;


                }
                  $this->modele($sms);
            }


            if(isset($_POST['importer']) && $_POST['importer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
            {
                $i=0;
                $tablename=$_POST['entnames'];
                foreach(explode(";", $tablename) as $modelname){
                  //  $this->add_class($modelname,$tablels,'modele',1);
                    $this->fnmd->create_model(strval($modelname));
                    $i++;
                }
                echo '<label class="text-success">'.$i.' Models créés avec succès </label>';

            }

        }


        function generate_vue($tablename)
        {


            $sms='<label class="text-danger">Il y a une erreur dans le Controller Generator</label>';

            if ($tablename!='nulle'){
                $data['ok']=$this->fvw->create_view($tablename,$this->curendbname,'crud', 0);
                return $this->vue('<label class="text-success">Vue  '.$tablename.' créée avec succès </label>');
            }

            if(isset($_POST['importer']))//'valider' est le name du champs submit du formulaire add.html
            {

                extract($_POST);

                if($_POST['importer']=='Generer')//'valider' est le name du champs submit du formulaire add.html
                {

                    $dbsename = ($addmethode==1)?strtolower($_POST ['otherdatabasename']):strtolower($curendatabasename);
                    //print_r($_POST);
                    $data['ok'] = 0;
                    $sms= '<label class="text-danger">Veillez faire un choix svp!</label>';
                    if(!empty($dbsename)) {
                        $this->fndb=new DatabaseManager();
                        $this->fnent=new EntitieManager();
                        $tabls=$this->fndb->table_listepure($dbsename);


                        //   echo $databasename;

                        $i=0;
                        foreach($tabls as $ctrl){
                            //  echo $ctrl ['tablename'].'<br>';

                            $tablename = $ctrl ['tablename'];


                            $sms=$this->fvw->create_view($tablename,$dbsename,'crud', 0);
                            $i++;

                        }
                        if ($i>0){
                            $sms= '<label class="text-success">'.$i.'Vue(s) créé(s) avec succès </label><span class="text-warning"> Rafraîchir la page ! </span>';
                        }

                    }
                    return $this->vue($sms);
                }

                if($_POST['importer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $tablename=$_POST['entnames'];
                    foreach(explode(";", $tablename) as $entname){



                         $this->fvw->create_view($tablename,$entname,'crud', 0);
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.'Vue(s) créé(s) avec succès </label>';

                }

            }

        }




        private function createCrud($dbname=''){
            $i=0;
            $databasename=($dbname=='')?$this->curendbname:$dbname;
            $this->fndb=new DatabaseManager();
            $this->fctrt=new ControllerManager();
            $tabls=$this->fndb->table_listepure($databasename);
            foreach($tabls as $ctrl){
                $tablename=$ctrl ['tablename'];
                $coltable2= $this->fndb->get_table_details(strtolower($tablename));
                $this->fnent->create_entitie($tablename,$coltable2);
                $this->fnmd->create_model(strval($tablename),$dbname);
                $this->fctrt->create_controller($tablename,$coltable2);
                $this->fvw->create_view($tablename,$this->curendbname,'crud', 0);
                $i++;
            }
            return $i;
        }
        private function dropCrud(){


            $lscontroller=$this->fctrt->controllers_list();
            $lsentitie=$this->fnent->entities_list();
            $lsmodele=$this->fnmd->modeles_list();
            $lsvue=$this->fvw->views_list();
             $x=0;
            $this->fndb= new DatabaseManager();
            $this->fctrt=new ControllerManager();
            $this->fnent=new EntitieManager();
            $this->fnmd=new ModelManager();
            $this->fvw=new ViewManager();

            for ($i=0;$i<max(count($lsvue), count($lscontroller), count($lsmodele), count($lsentitie));$i++){
                if (array_key_exists($i,$lsentitie))
                {
                    $clsname=$lsentitie[$i]['entpath'];
                    $this->fnent->delete_entitie(strval($clsname));
                }
                if (array_key_exists($i,$lsmodele))
                {
                    $clsname=$lsmodele[$i]['entpath'] ;
                    $this->fnmd->delete_modele(strval($clsname));
                }
                if (array_key_exists($i,$lscontroller))
                {
                    $clsname=$lscontroller[$i]['entpath'] ;
                    $this->fctrt->delete_controller(strval($clsname));
                }
                if (array_key_exists($i,$lsvue))
                {
                    $clsname=$lsvue[$i]['entpath'] ;
                    $this->fvw->delete_view(strval($clsname));
                }
               $x++;
            }

              return $x;
        }





        function delete_database()
        {
            $dbname= (isset($_POST['Supprimer']) && !empty($_POST['dbname']))?$_POST['dbname']:'';
            $dbused = '<label class="text-danger">La Base de données  ' . $dbname . '  est actuellement active ! </label>';
            $ret= ($dbname=='')?'<label class="text-danger">ERROR EMPTY DBNAME !!! </label>':$dbused;
            $this->fndb= new DatabaseManager();

            if ($dbname!='') {
                if (strtolower($dbname)!= strtolower(connexion_params()['database_name'])) {
                    $this->fndb->save_database(strtolower($dbname));
                    $ok = $this->fndb->create_or_delete_database('drop', strtolower($dbname));
                    if ($ok[1] == 1) {
                        $ret = '<label class="text-success">Base de données  ' . $dbname . ' Supprimée avec succès</label>';

                    } else {

                        $ret = '<label class="text-danger">ERROR ' . $ok[0].' !!! </label>';


                    }
                }
            }
            return $this->database($ret);


        }
        function delete_controller($ctrname)
        {

            if(isset($_POST['supprimer'])){
                $ctrname='';
                if($_POST['supprimer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $ctrname=$_POST['ctrlnames'];
                    foreach(explode(";", $ctrname) as $tablename){
                        /* print_r($tablename);
                         echo  '<br>';*/
                      //   $this->remouv_class($ctrname,'controller');
                        //echo $tablename. '<br>';
                        $this->remouv_class($tablename,'controller');
                        $i++;
                    }
                      echo '<label class="text-success">'.$i.' Contrôleurs supprimés avec succès</label>';

                }
            }
            if($ctrname!=''){

               $this->remouv_class($ctrname,'controller');

                return $this->controlleur('<label class="text-success">Contrôleur supprimé  avec succès</label>');
            }

        }

        function delete_entitie($ctrname)
        {




            if(isset($_POST['supprimer'])){
                $ctrname='';
                if($_POST['supprimer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $ctrname=$_POST['ctrlnames'];
                    foreach(explode(";", $ctrname) as $tablename){
                        /* print_r($tablename);
                         echo  '<br>';*/
                        //   $this->remouv_class($ctrname,'controller');
                        //echo $tablename. '<br>';
                        $this->remouv_class($tablename,'entitie');
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.' Entités  supprimés avec succès</label>';

                }
            }


            if($ctrname!=''){

                $data['ok']=$this->remouv_class($ctrname,'entitie');

                return $this->entite('entite');
            }


        }

        function delete_model($ctrname)
        {




            if(isset($_POST['supprimer'])){
                $ctrname='';
                if($_POST['supprimer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $ctrname=$_POST['ctrlnames'];
                    foreach(explode(";", $ctrname) as $tablename){
                        /* print_r($tablename);
                         echo  '<br>';*/
                        //   $this->remouv_class($ctrname,'controller');
                        //echo $tablename. '<br>';
                        $this->remouv_class($tablename,'modele');
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.' Models  supprimés avec succès</label>';

                }
            }


            if($ctrname!=''){

                $data['ok']=$this->remouv_class($ctrname,'modele');

                return $this->modele('modele');
            }


        }



        function delete_vue($ctrname)
        {




            if(isset($_POST['supprimer'])){
                $ctrname='';
                if($_POST['supprimer']=='ajax')//'valider' est le name du champs submit du formulaire add.html
                {
                    $i=0;
                    $ctrname=$_POST['ctrlnames'];
                    foreach(explode(";", $ctrname) as $tablename){
                        /* print_r($tablename);
                         echo  '<br>';*/
                        //   $this->remouv_class($ctrname,'controller');
                        //echo $tablename. '<br>';
                        $this->remouv_class($tablename,'vue');
                        $i++;
                    }
                    echo '<label class="text-success">'.$i.' Vue  supprimés avec succès</label>';


                }
            }


            if($ctrname!=''){

                $data['ok']=$this->remouv_class($ctrname,'vue');


                return $this->vue('<label class="text-success"> Vue  '.$ctrname.' supprimés avec succès</label>');
            }


        }


        //methode pivate

       private function add_class($clsname,$tablelist,$domaine,$nameonly)
        {


           // $curendatabasename=connexion_params()["database_name"];
            //$tables =  $this->fndb->table_liste($curendatabasename);

            $entname='';
            $tablel=$this->fndb->get_table($clsname,$tablelist);
            $coltable=$this->fndb->get_columnsTable($clsname,$tablel,true);
            //echo $clsname.'<br>';
            // $cpt=count($coltable);
         // print_r($coltable);
          /// echo '<hr>';

         return ($domaine=='entitie')?$this->fnent->create_entitie($clsname,$coltable,null,$nameonly):(
           ($domaine=='modele')?$this->fnmd->create_model(strval($clsname),$coltable):(
            ($domaine=='controller' && count($coltable)>0)?$this->fctrt->create_controller(strval($clsname),$coltable):0));

        }



       private function remouv_class($clsname,$domaine)
        {

            $this->fndb= new DatabaseManager();
            $this->fctrt=new ControllerManager();
            $this->fnent=new EntitieManager();
            $this->fnmd=new ModelManager();
            $this->fvw=new ViewManager();


            return ($domaine=='entitie')?$this->fnent->delete_entitie(strval($clsname)):(
            ($domaine=='modele')?$this->fnmd->delete_modele(strval($clsname)):(
            ($domaine=='controller')?$this->fctrt->delete_controller(strval($clsname)):(
            ($domaine=='vue')?$this->fvw->delete_view(strval($clsname)):0
            )

            ));

        }









        function use_database($dbname){



            $this->fndb= new DatabaseManager();
            $db=array();
            $db["host"] = connexion_params()["host"];
            $db["user"] = connexion_params()["user"];
            $db["password"] = connexion_params()["password"];
            $db["dbname"] =$dbname;
            $db["etat"] ='on';

            $ok =   $this->fndb->init_database_configuration($db);
            //  print_r($ok);

            return $this->database($ok);
            //$this->database('database');
        }


        function crud_database($dbname){


            $this->fndb= new DatabaseManager();


            $databases=$this->fndb->get_database($dbname);

        //  print_r($databases['dbcolumn']);
// Database configuration

            $dbHost = connexion_params()["host"];
            $dbUsername  = connexion_params()["user"];
            $dbPassword = connexion_params()["password"];
            $dbName  = $dbname;

// Create database connection
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }


            $this->fndb= new DatabaseManager();



            foreach($databases as $cle=>$valeur){
                if ($cle!='dbcolumn')
                {

                    echo $cle.' : '.$valeur.'<br>';
                }
            }

            foreach($databases['dbcolumn'] as $cle=>$valeur){

                $colx=$this->fndb->get_columns_of_database($db,$dbname,$valeur);
                echo  $valeur.' : <br>';
                print_r($colx);
                echo '<br>';
                foreach($colx as $key=>$value){

                    echo $key.' : '.$value.'<br>';
                }
                echo '<hr>';
            }

           // print_r($colx);
            //$this->database('database');
        }

        function restor_database($dbpath)
        {


            $this->fndb= new DatabaseManager();
            //echo $this->fndb->if_database_exist($dbname).'<br>';
            // echo $db.'<hr>';
            $ok=array();
            $data['ok']='';
            $array = explode("-", $dbpath);
            $dbname= $array[1]; // piece1
            if( $this->fndb->if_database_exist($dbname)==1){
                echo $dbname;
               $this->fndb->save_database($dbname);
                $this->fndb->create_or_delete_database('delete',$dbname);
            }

            $file["dbname"]=$dbname;
            $file["file_data"]='src/view/sm-sdmin/database/backup/'.$dbpath;

            $ok =  $this->fndb->import_database($file,false);
            //  print_r($ok);

        return $this->database($ok[1]);


        }


        function restor_database2($db){

            $this->fndb= new DatabaseManager();
           // echo $db.'<hr>';
            $ok=array();
           $data['ok']='';
           $array = explode("-", $db);
             $dbname= $array[1]; // piece1
           if( $this->fndb->if_database_exist($dbname)){
             // echo $dbname;
              $this->fndb->save_database($dbname);
              $this->fndb->create_or_delete_database('delete',$dbname);
           }
            $file=array();


            $file["dbname"]=$dbname;
            $file["file_data"]='src/view/sm-sdmin/database/backup/'.$db;

            $ok =  $this->fndb->import_database($file,false);
        //  print_r($ok);

          $this->database($ok[1]);
        }


    }
?>