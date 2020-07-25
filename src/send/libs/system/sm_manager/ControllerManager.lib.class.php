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

namespace libs\system\sm_manager;

class ControllerManager
{


    //DataBase settings
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $etat;
    private $connection;
    private $ent_dir;
    private $ent_shema;
    private $mgr_dir;

    public function __construct(){

        require_once 'config/database.php';

        require_once 'Functions.php';

        $this->host = connexion_params()["host"];
        $this->user = connexion_params()["user"];
        $this->pass = connexion_params()["password"];
        $this->dbname = connexion_params()["database_name"];
        $this->ent_dir = glob('src/controller/*');

    }





    function controllers_list(){


        $dbList = array();
        $i=1;

        foreach($this->ent_dir as $filename){
            //Use the is_file function to make sure that it is not a directory.

            $tmptableList = array();
            if((is_file($filename) ) &&  $filename!='src/controller/Welcome.class.php' && $filename!='src/controller/index.html' && $filename!='src/controller/SM_Admin.class.php'){

                $array = explode(".", $filename);
                $entpath= $array[0]; // piece1

                $array2 = explode("/", $entpath);

                $entname= strval(trim($array2[2])); // piece1

                $tableList = array();
                $tableList['id'] = $i;
                $tableList['entpath'] =$filename;
                $tableList['entname'] = $entname;
                $tableList['dbnbratt'] = '';
                $tableList['dbnbrmeth'] = '';
                $dbList[] = $tableList;
                /* print_r ($tableList);

                 echo '<hr/>';
                */
                $i++;
            }
        }
        return $dbList;
    }

    function get_controller($dbname)
    {


        $dalabase = array();
        foreach($this->controllers_list()  as $cle=>$valeur){
            if ($valeur['dbname']==$dbname)
                $dalabase=$valeur;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }


    function if_entite_exist($dbname)
    {


        $dalabase = 0;
        foreach($this->controllers_list() as $cle=>$valeur){
            if ($valeur['dbname']==$dbname)
                $dalabase=1;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }


//25097970 :150.017

    //methode ou url

    function create_controller($tabelname,$coltable,$idbname=''){
        $dbname=($idbname=='')?$this->dbname:$idbname;
        $fndb= new DatabaseManager();
        $import= $fndb->get_foreign_keyof_table($tabelname,$dbname);
        $idobj= array();
        $tabidobj= $fndb->get_primary_keyof_table($tabelname,$dbname);

        if ($tabidobj!=null){

                // print_r($import) ;
                foreach($tabidobj as $key=>$value){

                    foreach($value as $key2=>$value2){
                        if ($key2=='column_name'){
                            $idobj[]=$value2;
                        }

                    }
                }
            }
        $importattr=array();
        $importab=array();

        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);
        $Object=$varEntity.'Object ';


$oldfile = '<?php'."\n\n".'    /*=================================================='."\n";
$oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
$oldfile .='    ngorsecka@gmail.com'."\n";
$oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
$oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
$oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
$oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
$oldfile .='    ==================================================*/'."\n\n\n\n";

$oldfile .='    /*==================Classe creer par Samane samane_ui_admin le '.date('d-m-Y H:i:s').'=====================*/'."\n";

$oldfile .=" use libs\system\Controller;"."\n";

$oldfile .='  use src\entities\\'.$Entity.' as '.$Entity.'Entity;'."\n";

$oldfile .='  use src\model\\'.$Entity.'DB;'."\n\n";
        if ($import!=null){

            // print_r($import) ;
            foreach($import as $key=>$value){

                foreach($value as $key2=>$value2){
                    if ($key2=='foreign_table'){
                        $importab[]=$value2;
                        $oldfile .='  use src\entities\\'.ucfirst(strtolower($value2)).' as '.ucfirst(strtolower($value2)).'Entity;'."\n";
                        $oldfile .='  use src\model\\'.ucfirst(strtolower($value2)).'DB;'."\n";
                    }

                }
                $oldfile .="\n\n";
            }
            $oldfile .='  class '.ucfirst(strtolower($tabelname)).' extends Controller{'."\n\n";
            if ($importab!=null){
                $oldfile .='    /*==================Attribut list=====================*/'."\n";

                foreach($importab as $key=>$value){
                    $oldfile .='             private  $'.strtolower($value).';'."\n";
                    $oldfile .='             private  $'.strtolower($value).'db;'."\n";
                }
            }


            $oldfile .="\n\n";
            $oldfile .='    /*================== Constructor =====================*/'."\n";

            $oldfile .='              public function __construct()'."\n";
            $oldfile .='                 {'."\n";
            $oldfile .='                        parent::__construct();'."\n";
            if ($importab!=null){

                foreach($importab as $key=>$value){

                    /* echo  '                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'();'."\n";

                     echo " <hr />";*/
                    $oldfile .='                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'Entity();'."\n";
                    $oldfile .='                 $this->'.strtolower($value).'db = new '.ucfirst(strtolower($value)).'DB();'."\n";

                }
            }


            $oldfile .='                 }'."\n\n\n";


        }else{

            $oldfile .='  class '.ucfirst(strtolower($tabelname)).' extends Controller{'."\n\n";
        }



$oldfile .= '            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test'."\n";
$oldfile .= '                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre'."\n";


        $oldfile .='    /*------------------Methode index--------------------=*/'."\n";
           $oldfile .='                '.$this->index_maker($Entity).''."\n";
        $oldfile .='    /*------------------Methode getID--------------------=*/'."\n";
           $oldfile .='                '.$this->getID_maker($Entity).''."\n";
        $oldfile .='    /*------------------Methode get--------------------=*/'."\n";
            $oldfile .='                '.$this->get_maker($Entity,$dbname).''."\n";
        $oldfile .='    /*------------------Methode list--------------------=*/'."\n";
           $oldfile .='                '.$this->list_maker($Entity).''."\n";


        $oldfile .='    /*------------------..............--------------------=*/'."\n";
        $oldfile .='    /*------------------Methode add--------------------=*/'."\n";
           $oldfile .='                '.$this->add_maker($Entity,$coltable,$importab,$idobj).''."\n";
        $oldfile .='    /*------------------Methode update--------------------=*/'."\n";
           $oldfile .='                '.$this->update_maker($Entity,$coltable).''."\n";
        $oldfile .='    /*------------------Methode list--------------------=*/'."\n";
           $oldfile .='                '.$this->delete_maker($Entity,$dbname).''."\n";

        $oldfile .='    /*------------------..............--------------------=*/'."\n";
        $oldfile .='    /*------------------Methode edit--------------------=*/'."\n";
            $oldfile .='                '.$this->edit_maker($Entity,$dbname,$importab).''."\n";



$oldfile .= '                   '."\n\n\n\n";
$oldfile .= '               }'."\n\n\n";
$oldfile .= '            ?>'."\n";


        $txt = $oldfile."\n";

        //$path='src/controller/SM_Admin.class.php';
         $path="src/controller/".ucfirst(strtolower($tabelname)).".class.php";
        //print_r($txt);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
        return '<label class="text-success">Controller  '.$tabelname.' Successfully created </label><span class="text-warning"> Reload Page ! </span>';
    }



    function index_maker($tabelname)
    {
        $varEntity = strtolower($tabelname);
//
        $oldfile = "\n";

        $oldfile .= '                public function index(){'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/index");'."\n";
        $oldfile .= '                }'."\n\n";

        return $oldfile;
    }
    function add_maker($tabelname,$coltable,$import=null,$idobj=null)
    {
        $id= 'id' ;
        if ($idobj!=null){
            $tbid=array();
            foreach($idobj as $key=>$value){
                $tbid[]= strtolower($value) ;
            }

            $id=(count($tbid)>1) ?implode(",", $tbid): $tbid[0];

        }
        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);
        $Object='$'.$varEntity.'Object ';

        $oldfile = "\n";

        $oldfile .= 'public function add(){'."\n";
        $oldfile .= '	//Instanciation du model'."\n";
        $oldfile .= '            $tdb = new '.$Entity.'DB();'."\n";
        $vue2= '                return $this->view->load("'.$varEntity.'/add");'."\n";

        if ($import!=null){
            $oldfile .='    /*==================Foreign list=====================*/'."\n";

            foreach($import as $key=>$value){

                //print_r($value) ;  echo " <hr />";
                 $oldfile .= '                    $data["'.strtolower($value).'s"] = $this->'.strtolower($value).'db->liste'.ucfirst(strtolower($value)).'();'."\n";

            }
            $vue2= '                return $this->view->load("'.$varEntity.'/add", $data);'."\n";
        }

        $oldfile .= '	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)'."\n";
        $oldfile .= '            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html'."\n";
        $oldfile .= '            {'."\n";
        $oldfile .= '                extract($_POST);'."\n";
        $oldfile .= '                $data["ok"] = 0;'."\n";
        $oldfile .= '                if(!empty($'.$coltable[1].')) {'."\n";

        $oldfile .= '                    '.$Object.' = new '.$Entity.'Entity();'."\n";

        foreach($coltable as $key=>$value){

            if (strtolower($value)!=$id){
            $oldfile .= '                    '.$Object.'->set'.ucfirst(strtolower($value)).'($'.$value.');'."\n";

                                         }
        }


        $oldfile .= '                    $ok = $tdb->add'.$Entity.'('.$Object.');'."\n";
        $oldfile .= '                    $data["ok"] = $ok;'."\n";
        $oldfile .= '                }'."\n";
        $oldfile .= '                return $this->view->load("'.$varEntity.'/add", $data);'."\n";
        $oldfile .= '            }else{'."\n";
        $oldfile .= $vue2;
        $oldfile .= '            }'."\n";
        $oldfile .= '        }'."\n\n";

        return $oldfile;
    }

    function update_maker($tabelname,$coltable)
    {

        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);
        $Object='$'.$varEntity.'Object ';

        $oldfile = "\n";

        $oldfile .= '		public function update(){'."\n";
        $oldfile .= '			//Instanciation du model'."\n";
        $oldfile .= '            $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .= '            if(isset($_POST["modifier"])){'."\n";
        $oldfile .= '                extract($_POST);'."\n";
        $oldfile .= '                if(!empty($'.strtolower($coltable[1]).')) {'."\n";
        $oldfile .= '                    '.$Object.' = new '.$Entity.'Entity();'."\n";

        foreach($coltable as $key=>$value){

            $oldfile .= '                    '.$Object.'->set'.ucfirst(strtolower($value)).'($'.strtolower($value).');'."\n";

        }
        $oldfile .= '                    $ok = $tdb->update'.$Entity.'('.$Object.');'."\n";
        $oldfile .= '                }'."\n";
        $oldfile .= '            }'."\n";

        $oldfile .= '            return $this->liste();'."\n"; //appel de la methode liste du controller'."\n";
        $oldfile .= '       }'."\n";



        return $oldfile;
    }

    function list_maker($tabelname)
    {
        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);

        $oldfile = "\n";

        $oldfile .= '            public function liste(){'."\n";
        $oldfile .= '                    //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new '.$Entity.'DB();'."\n";

        $oldfile .= '                    $data["'.$varEntity.'s"] = $tdb->liste'.$Entity.'();'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/liste", $data);'."\n";
        $oldfile .= '                }'."\n\n";

        return $oldfile;
    }

    function get_maker($tabelname,$dbname)
    {
        $params='';
        $fndb= new DatabaseManager();
        $coltable2=  $fndb->get_table_cols_detail(strtolower($tabelname),$dbname);
        $import=  $coltable2;

        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            $param=array();
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );
                if (!empty($id[1])){
                    $param[]='$'.$id[0].'';
                }
                if (empty($id[1])){
                    $param[]='$'.$id[0].'';
                    // echo '<hr>';

                }

            }

            $params=implode( ',' , $param );
        }
        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);

        $oldfile = "\n";
        $oldfile .= '                public function get('.$params.'){'."\n";
        $oldfile .= '                    //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new '.$Entity.'DB();'."\n";

        $oldfile .= '                    $data["'.$varEntity.'"] = $tdb->get'.$Entity.'('.$params.');'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/get", $data);'."\n";
        $oldfile .= '                }'."\n\n";
        return $oldfile;
    }

    function edit_maker($tabelname,$idbname,$import=null)
    {

         $dbname=($idbname=='')?connexion_params()["database_name"]:$idbname;
        $params='';
        $fndb= new DatabaseManager();
        $coltable2=  $fndb->get_table_cols_detail(strtolower($tabelname),$dbname);

        $idtable=  $coltable2['ids'];

       if ($idtable!=null){
            $primaryKeys=$fndb->primaryKeys_filter($idtable);
            $param=array();

            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );
                if (!empty($id[1])){
                    $param[]='$'.$id[0].'';
                }
                if (empty($id[1])){
                    $param[]='$'.$id[0].'';
                    // echo '<hr>';

                }

            }

            $params=implode( ',' , $param );
        }



        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);

        $oldfile = "\n";

        $oldfile .= '            	public function edit('.$params.'){'."\n";

        $oldfile .='                        //Instanciation du model'."\n";
        $oldfile .='                       $tdb = new '.$Entity.'DB();'."\n";

        if ($import!=null){
            $oldfile .='    /*==================Foreign list=====================*/'."\n";

            foreach($import as $key=>$value){

                //print_r($value) ;  echo " <hr />";
                $oldfile .= '                    $data["'.strtolower($value).'s"] = $this->'.strtolower($value).'db->liste'.ucfirst(strtolower($value)).'();'."\n";

            }
            $vue2= '                return $this->view->load("'.$varEntity.'/add", $data);'."\n";
        }
        $oldfile .='            			//Supression'."\n";
        $oldfile .='            			$data["'.$varEntity.'"] = $tdb->get'.$Entity.'('.$params.');'."\n";
        $oldfile .='            			//chargement de la vue edit.html'."\n";
        $oldfile .='                    return $this->view->load("'.$varEntity.'/edit", $data);'."\n";
        $oldfile .= '                   }'."\n\n\n\n";
        return $oldfile;
    }
    function delete_maker($tabelname,$dbname)
    {



        $params='';
        $fndb= new DatabaseManager();
        $coltable2=  $fndb->get_table_cols_detail(strtolower($tabelname),$dbname);

        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            $param=array();
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );
                if (!empty($id[1])){
                    $param[]='$'.$id[0].'';
                }
                if (empty($id[1])){
                    $param[]='$'.$id[0].'';
                    // echo '<hr>';

                }

            }

            $params=implode( ',' , $param );
        }


        $Entity = ucfirst(strtolower($tabelname));

        $oldfile = "\n";

        $oldfile .= '            public function delete('.$params.'){'."\n";
        $oldfile .= '              //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .= '            			//Supression'."\n";
        $oldfile .= '            			$tdb->delete'.$Entity.'('.$params.');'."\n";
        $oldfile .= '            //Retour vers la liste'."\n";
        $oldfile .= '                    return $this->liste();'."\n";
        $oldfile .= '                }'."\n\n";
        return $oldfile;
    }


    function getID_maker($viewname)
    {



        $fndb= new DatabaseManager();
        $coltable2=  $fndb->get_table_cols_detail(strtolower($viewname));

        $getid='id';
        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );


                //  echo '<hr>';
                if (!empty($id[1])){
                    $getid=$id[0];

                }
                if (empty($id[1])){
                     $getid=$id[0];
                   // echo '<hr>';
                    break;
                }
            }
        }
        $varEntity = strtolower($viewname);

        $oldfile = "\n";

        $oldfile .= '                public function getID( $'.$getid.'){'."\n";
        $oldfile .= '                    $data["'.strtolower($getid).'"] = $'.$getid.';'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/get_id", $data);'."\n";
        $oldfile .= '                }'."\n\n";
        return $oldfile;
    }















    function delete_controller($entname)
    {


        $ok= 0;
        foreach($this->controllers_list()  as $cle=>$valeur){
            if ($valeur['entname']==$entname){
                if (file_exists($valeur['entpath'])) {
                    $filename=$valeur['entpath'];
                    if((is_file($filename) ) && $filename!='src/controller/index.html' && $filename!='src/controller/SM_Admin.class.php'&& $filename!='src/controller/Welcome.class.php')
                    {

                        unlink($filename);
                        $ok= 1;
                    }
                }

            }
        }


        return $ok;
    }





    function return_maker($ctrlname,$methodname,$retuntype)
    {
        $ret='';

        if(strtolower($retuntype)=='vue'){
            $ret='return $this->view->load("'.strtolower($ctrlname).'/'.strtolower($methodname).'");';
        }
        if(strtolower($retuntype)=='variable'){
            $ret='$variable="";'."\n\n".'                       return $variable ;';
        }
        if(strtolower($retuntype)=='tableau'){
            $ret='$tab=array();'."\n\n".'                       return $tab ;';
        }
        return $ret;
    }
    function incude_entities_getter($entname)
    {
        $ret=array();

        $entity=strtolower($entname);
        $Entity=ucfirst($entity);

        $ret['use_entitie']='  use src\entities\\'.$Entity.' as '.$Entity.'Entity;'."\n";
        $ret['use_model']='  use src\model\\'.$Entity.'DB;'."\n\n";
        $ret['init_attrib']=' private $'.$entity.';'."\n";
        $ret['declar_entitie']=' private $'.$entity.';'."\n";
        $ret['declar_model']=' private $'.$entity.';'."\n";

        return $ret;
    }

    function incude_entities_maker($entname)
    {
        $ret='';

        if (!empty($entname)){
            $entity=strtolower($entname);
            $Entity=ucfirst($entity);

            $ret .='  use src\entities\\'.$Entity.' as '.$Entity.'Entity;'."\n";
            $ret .='  use src\model\\'.$Entity.'DB;'."\n\n";

        }

        return $ret;
    }

    function declare_entities_maker($entname)
    {
        $ret='';
          if (!empty($entname)){
              $entity=strtolower($entname);
              $ret .='              private $'.$entity.'Object;'."\n";
              $ret .='              private $'.$entity.'Db;'."\n";

          }

        return $ret;
    }
    function init_included_entities_maker($entname)
    {
        $ret='';

        if (!empty($entname)){
            $entity=strtolower($entname);
            $Entity=ucfirst($entity);

            $ret .='                        $this->'.$entity.'Object = new '.$Entity.'Entity();'."\n";
            $ret .='                        $this->'.$entity.'Db = new '.$Entity.'DB();'."\n";

        }

        return $ret;
    }

    function methode_maker($ctrlname,$methode)
    {
//Array ( ['methodename'] => connexion ['paramlist'] => login;pwd ['retuntype'] => Variable ['encaps'] => private )
        $tbparam=array();
        $i=0;
        foreach(explode(";", $methode['paramlist']) as $key=>$value){
            if($value!='---'){
                $tbparam[]="$".$value;
                $i++;
            }

        }
        $param='';
        $param='vue';

        if ($i>0){
            $param=implode(",", $tbparam);
        }

        $methodes = "\n";
        $methodes .='             '.$methode['encaps'].' function '.strtolower($methode['methodename']).'('.$param.')'."\n";
        $methodes .='                 {'."\n";

        $methodes .='      '.$this->return_maker($ctrlname,$methode['methodename'],$methode['retuntype']).'           '."\n";

        $methodes .='                 }'."\n\n";
        return $methodes;
    }

    function parar_maker($paramlist)
    {
        $param='';
        $tbparam=array();
        if ($paramlist!='---'){
            foreach(explode(";", $paramlist) as $key=>$value){
                $tbparam[]="$".$value;

            }
            $param=implode ( ',', $tbparam ) ;
        }
        return $param;
    }
    function post_methode_maker($ctrlname,$methode)
    {

          $methodename=$methode['methodename'];
      //  echo "<br />";
          $paramlist=$methode['paramlist'];
      //  echo "<br />";
          $retuntype=$methode['retuntype'];
       // echo "<br />";
          $encaps=$methode['encaps'];
     //   echo "<br />";

        $methodes='';

          $startmethodes=''.$encaps.' function '.strtolower($methodename).'('.$this->parar_maker($paramlist).'){';

          $returnmethodes=$this->return_maker($ctrlname,strtolower($methodename),$retuntype);

        $methodes = "\n";
        $methodes .='             '.$startmethodes."\n";


        $methodes .='                        '.$returnmethodes.'           '."\n";

        $methodes .='                 }'."\n\n";
        return $methodes;
    }




    function init_controller($tabelname){


        $Entity = ucfirst(strtolower($tabelname));
        $varEntity = strtolower($tabelname);
        $Object=$varEntity.'Object ';



        $oldfile = '<?php'."\n\n".'    /*=================================================='."\n";
        $oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
        $oldfile .='    ngorsecka@gmail.com'."\n";
        $oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
        $oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
        $oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
        $oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
        $oldfile .='    ==================================================*/'."\n\n\n\n";
        $oldfile .='     namespace src\controllers;'."\n";
        $oldfile .='    /*==================Classe creer par Samane samane_ui_admin le '.date('d-m-Y H:i:s').'=====================*/'."\n";

        $oldfile .=" use libs\system\Controller;"."\n";

        $oldfile .='  use src\entities\\'.$Entity.' as '.$Entity.'Entity;'."\n";

        $oldfile .='  use src\model\\'.$Entity.'DB;'."\n\n";

        $oldfile .= '            class '.$Entity.' extends Controller{'."\n";
        $oldfile .= '                public function __construct(){'."\n";
        $oldfile .= '                    parent::__construct();'."\n";
        $oldfile .= '                    //Appel du model grace au systeme autoloading'."\n";
        $oldfile .= '                }'."\n\n";

        $oldfile .= '            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test'."\n";
        $oldfile .= '                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre'."\n";
        $oldfile .= '                public function index(){'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/index");'."\n";
        $oldfile .= '                }'."\n\n";

        $oldfile .= '                public function getID($id){'."\n";
        $oldfile .= '                    $data["id"] = $id;'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/get_id", $data);'."\n";
        $oldfile .= '                }'."\n\n";

        $oldfile .= '                public function get($id){'."\n";
        $oldfile .= '                    //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new TestDB();'."\n";

        $oldfile .= '                    $data["'.$varEntity.'"] = $tdb->get'.$Entity.'($id);'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/get", $data);'."\n";
        $oldfile .= '                }'."\n\n";
        $oldfile .= '            public function liste(){'."\n";
        $oldfile .= '                    //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new TestDB();'."\n";

        $oldfile .= '                    $data["'.$varEntity.'s"] = $tdb->liste'.$Entity.'();'."\n";

        $oldfile .= '                    return $this->view->load("'.$varEntity.'/liste", $data);'."\n";
        $oldfile .= '                }'."\n\n";


        $oldfile .= 'public function add(){'."\n";
        $oldfile .= '	//Instanciation du model'."\n";
        $oldfile .= '            $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .= '	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)'."\n";
        $oldfile .= '            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html'."\n";
        $oldfile .= '            {'."\n";
        $oldfile .= '                extract($_POST);'."\n";
        $oldfile .= '                $data["ok"] = 0;'."\n";
        $oldfile .= '                if(!empty('.$coltable[0].') && !empty('.$coltable[1].')) {'."\n";

        $oldfile .= '                    '.$Object.' = new '.$Entity.'Entity();'."\n";

        foreach($coltable as $key=>$value){

            $oldfile .= '                    '.$Object.'->set'.ucfirst(strtolower($value)).'('.$value.');'."\n";

        }


        $oldfile .= '                    $ok = $tdb->add'.$Entity.'('.$Object.');'."\n";
        $oldfile .= '                    $data["ok"] = $ok;'."\n";
        $oldfile .= '                }'."\n";
        $oldfile .= '                return $this->view->load("'.$varEntity.'/add", $data);'."\n";
        $oldfile .= '            }else{'."\n";
        $oldfile .= '                return $this->view->load("'.$varEntity.'/add");'."\n";
        $oldfile .= '            }'."\n";
        $oldfile .= '        }'."\n\n";



        $oldfile .= '		public function update(){'."\n";
        $oldfile .= '			//Instanciation du model'."\n";
        $oldfile .= '            $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .= '            if(isset($_POST["modifier"])){'."\n";
        $oldfile .= '                extract($_POST);'."\n";
        $oldfile .= '                if(!empty($id) && !empty('.strtolower($coltable[0]).') && !empty('.strtolower($coltable[1]).')) {'."\n";
        $oldfile .= '                    '.$Object.' = new '.$Entity.'Entity();'."\n";

        foreach($coltable as $key=>$value){

            $oldfile .= '                    '.$Object.'->set'.ucfirst(strtolower($value)).'('.strtolower($value).');'."\n";

        }
        $oldfile .= '                    $ok = $tdb->update'.$Entity.'('.$Object.');'."\n";
        $oldfile .= '                }'."\n";
        $oldfile .= '            }'."\n";

        $oldfile .= '            return $this->liste();'."\n"; //appel de la methode liste du controller'."\n";
        $oldfile .= '       }'."\n";




        $oldfile .= '            public function delete($id){'."\n";
        $oldfile .= '              //Instanciation du model'."\n";
        $oldfile .= '                    $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .= '            			//Supression'."\n";
        $oldfile .= '            			$tdb->delete'.$Entity.'($id);'."\n";
        $oldfile .= '            //Retour vers la liste'."\n";
        $oldfile .= '                    return $this->liste();'."\n";
        $oldfile .= '                }'."\n\n";

        $oldfile .= '            	public function edit($id){'."\n";

        $oldfile .='                        //Instanciation du model'."\n";
        $oldfile .='                       $tdb = new '.$Entity.'DB();'."\n";
        $oldfile .='            			//Supression'."\n";
        $oldfile .='            			$data["'.$varEntity.'"] = $tdb->get'.$Entity.'($id);'."\n";
        $oldfile .='            			//chargement de la vue edit.html'."\n";
        $oldfile .='                    return $this->view->load("'.$varEntity.'/edit", $data);'."\n";
        $oldfile .= '                   }'."\n\n\n\n";
        $oldfile .= '               }'."\n\n\n";
        $oldfile .= '            ?>'."\n";


        $txt = $oldfile."\n";

        //$path='src/controller/SM_Admin.class.php';
        $path="src/controller/".ucfirst(strtolower($tabelname)).".class.php";
        //print_r($txt);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
        return '<label class="text-success">Controller  '.$tabelname.' Successfully created </label><span class="text-warning"> Reload Page ! </span>';

    }


    function post_create_controller($crtname,$import,$tablemetods){


        $Entity = ucfirst(strtolower($crtname));
        $varEntity = strtolower($crtname);



        $oldfile = '<?php'."\n\n".'    /*=================================================='."\n";
        $oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
        $oldfile .='    ngorsecka@gmail.com'."\n";
        $oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
        $oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
        $oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
        $oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
        $oldfile .='    ==================================================*/'."\n\n\n\n";
        $oldfile .='     use libs\system\Controller;'."\n";
        $oldfile .='    /*==================Classe creer par Samane samane_ui_admin le '.date('d-m-Y H:i:s').'=====================*/'."\n";

        $oldfile .= '               '."\n\n\n";
        $incude_entitiestab = explode(";", $import);
        foreach($incude_entitiestab as $key=>$value){
            $oldfile .= $this->incude_entities_maker($value);
        }

        $oldfile .= ' class '.$Entity.' extends Controller{'."\n";

        foreach($incude_entitiestab as $key=>$value){
            $oldfile .= $this->declare_entities_maker($value);
        }
        $oldfile .= '               '."\n\n\n";
        $oldfile .= '              public function __construct(){'."\n";
        $oldfile .= '                    parent::__construct();'."\n";
        foreach($incude_entitiestab as $key=>$value){
            $oldfile .= $this->init_included_entities_maker($value);
        }
        $oldfile .= '                    //Appel du model grace au systeme autoloading'."\n";
        $oldfile .= '                    }'."\n\n";

        $oldfile .= '            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test'."\n";
        $oldfile .= '                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre'."\n";


        foreach($tablemetods as $key=>$value){
            //print_r($value) ;echo "<hr />";
            $oldfile .= $this->post_methode_maker($Entity,$value);
        }

        $oldfile .= '               '."\n\n\n\n\n\n\n\n\n";
        $oldfile .= '               }'."\n\n\n";
        $oldfile .= '            ?>'."\n";


        $txt = $oldfile."\n";

        //$path='src/controller/SM_Admin.class.php';
        $path="src/controller/".ucfirst(strtolower($Entity)).".class.php";
        //print_r($txt);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
        return '<label class="text-success">Controller  '.$Entity.' Successfully created </label><span class="text-warning"> Reload Page ! </span>';

    }










    function controler_methode_filter($array) {
        $ctrlObject=array();
        foreach($array as $key=>$value){
            if ($key=='methodename' || $key=='paramlist' ||$key=='retuntype' || $key=='encaps'){

                $tabi=array();

                foreach($value as $key2=>$value2){
                    /*if ($key=='methodename' ||$key=='retuntype' || $key=='encaps'){

                        echo $key2.' => '.$value2.'<br>';
                    }*/
                    $value3=$value2;
                    if ($key=='paramlist'  ){
                        $value3='---';

                        if(!empty($value2)){
                            $value3=$value2;
                        }
                    }
                    $tabi[]=$value3;
                    // echo $key2.' => '.$value3.'<br>';

                    //  echo $i++;
                }

                $ctrlObject["".$key.""]= $tabi;

            }
        }
        //print_r($this->flip_row_col_array($ctrlObject));

        return  flip_row_col_array($ctrlObject);
    }







}