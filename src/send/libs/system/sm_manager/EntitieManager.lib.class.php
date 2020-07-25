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

class EntitieManager
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

        $this->host = connexion_params()["host"];
        $this->user = connexion_params()["user"];
        $this->pass = connexion_params()["password"];
        $this->dbname = connexion_params()["database_name"];
        $this->ent_dir = glob('src/entities/*');
        $this->ent_shema = glob('src/model/entitie_shema/*');
        $this->mgr_dir = glob('src/entities/migrations/*');

    }





    function entities_list(){


        $dbList = array();
        $i=1;

        foreach($this->ent_dir as $filename){
            //Use the is_file function to make sure that it is not a directory.

            $tmptableList = array();
            if((is_file($filename) ) && $filename!='src/entities/index.html'){

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

    function get_entitie($dbname)
    {


        $dalabase = array();
        foreach($this->entities_list()  as $cle=>$valeur){
            if ($valeur['dbname']==$dbname)
                $dalabase=$valeur;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }


    function if_entite_exist($dbname)
    {


        $dalabase = 0;
        foreach($this->entities_list() as $cle=>$valeur){
            if ($valeur['dbname']==$dbname)
                $dalabase=1;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }



    //methode ou url

   public function create_entitie($entname,$tabattrib,$tabmethod=null,$nameonly=0,$getter=true,$setter=true){
       /* $shemafile = 'src/model/entitiesshema/ent_shema.json';

        $contentsh = "\n";           // Some simple example content.

        if (file_exists($shemafile)) {
            file_put_contents($shemafile, $contentsh);     // Save our content to the file.
        } else {
            $myfile = fopen($contentsh, "w") or die("Unable to open file!");
        }*/
        $message = '';
        $ok = 1;
       $Entity = ucfirst(strtolower($entname));
       $varEntity = strtolower($entname);
        $repons = array();
        if ($entname!='src'){
        //   echo $dbname;
        $oldfile = '<?php'."\n\n".'    /*=================================================='."\n";
        $oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
        $oldfile .='    ngorsecka@gmail.com'."\n";
        $oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
        $oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
        $oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
        $oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
        $oldfile .='    ==================================================*/'."\n\n\n\n";
        $oldfile .='     namespace src\entities;'."\n";
        $oldfile .='    /*==================Classe creer par Samane samane_ui_admin le '.date('d-m-Y H:i:s').'=====================*/'."\n";
        $oldfile .='        class '.ucfirst($Entity).''."\n";
        $oldfile .='            {'."\n\n";
        $oldfile .='    /*==================Attribut list=====================*/'."\n";

        $oldfile .='                '.$this->attribut_maker($tabattrib,$nameonly).''."\n\n";

            $fndb= new DatabaseManager();
            $import= $fndb->get_foreign_keyof_table($entname);
            $importattr=array();
            $importab=array();
            if ($import!=null){

               // print_r($import) ;
                foreach($import as $key=>$value){

                    foreach($value as $key2=>$value2){
                        if ($key2=='column_name'){
                            $importattr[]=$value2;
                            //$oldfile .='             private  $'.strtolower($value2).';'."\n";
                        }
                        if ($key2=='foreign_table'){
                            $importab[]=$value2;
                            $oldfile .='             private  $'.strtolower($value2).';'."\n";
                        }

                    }

                   // echo " <hr />";
                }


                $oldfile .="\n\n";
                $oldfile .='    /*================== Constructor =====================*/'."\n";

                $oldfile .='              public function __construct()'."\n";
                $oldfile .='                 {'."\n";
                if ($importab!=null){

                    foreach($importab as $key=>$value){

                        /* echo  '                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'();'."\n";

                         echo " <hr />";*/
                       $oldfile .='                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'();'."\n";

                    }
                }


                $oldfile .='                 }'."\n\n\n";


            }
            if ($setter==true){

                $oldfile .='    /*==================Getter list=====================*/'."\n";
                $oldfile .='                '.$this->getter_maker($tabattrib,$nameonly).''."\n";
            }

            if ($importab!=null){

                foreach($importab as $key=>$value){

                    $oldfile .='             public function get'. ucfirst(strtolower($value)).'()'."\n";
                    $oldfile .='                 {'."\n";
                    $oldfile .='                     return $this->'.strtolower($value).';'."\n";
                    $oldfile .='                 }'."\n";
                }
                $oldfile .='     '."\n\n";
            }

        if ($getter==true){

            $oldfile .='    /*==================Setter list=====================*/'."\n";
            $oldfile .='                '.$this->setter_maker($tabattrib,$nameonly).''."\n\n";
        }
            if ($importab!=null){

                foreach($importab as $key=>$valeur){

                    $oldfile .='             public function set'.ucfirst(strtolower($valeur)).'($'.strtolower($valeur).')'."\n";
                    $oldfile .='                 {'."\n";
                    $oldfile .='                      $this->'.strtolower($valeur).' = $'.strtolower($valeur).';'."\n";
                    $oldfile .='                 }'."\n\n";
                }
                $oldfile .='     '."\n\n";
            }
        $oldfile .='    /*==================Methode list=====================*/'."\n";
         if ($tabmethod!=null){

             $oldfile .='                '.$this->methode_maker($tabmethod,$nameonly).''."\n";
         }


        $oldfile .="           }"."\n".'  '."\n".'   '."\n";
        $oldfile .="\n\n\n".'   ?>'."\n\n\n";
        $txt = $oldfile."\n";
        $path="src/entities/".$Entity.".php";
        //print_r($txt);
         $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);


        }
        return '<label class="text-success">Enntities  '.$entname.' Successfully created </label>';
    }

    //methode ou url

   public function post_create_entitie($entname,$tabattrib,$import=''){
/*
      print_r($entname) ;
       echo " <hr />";
      print_r($tabattrib) ;
       echo " <hr />";
      print_r($import) ;
       echo " <hr />";
*/
       $Entity = ucfirst(strtolower($entname));

        if ($entname!='src'){
            $importattr=array();
        $oldfile = '<?php'."\n\n".'    /*=================================================='."\n";
        $oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
        $oldfile .='    ngorsecka@gmail.com'."\n";
        $oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
        $oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
        $oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
        $oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
        $oldfile .='    ==================================================*/'."\n\n\n\n";
        $oldfile .='     namespace src\entities;'."\n";
        $oldfile .='    /*==================Classe creer par Samane samane_ui_admin le '.date('d-m-Y H:i:s').'=====================*/'."\n";
        $oldfile .='        class '.ucfirst($Entity).''."\n";
        $oldfile .='            {'."\n\n";





            $oldfile .='    /*==================Attribut list=====================*/'."\n";
            foreach($tabattrib as $key=>$value){
                $oldfile .='                '.$this->attribut_maker($value,2);
            }

            if ($import!=''){

                $incude_entitiestab = explode(";", $import);

                foreach($incude_entitiestab as $key=>$value){
                    $importattr[]=$value;
                   // print_r($value) ;
                   // echo '                   private  $'.strtolower($value).';'."\n";
                $oldfile .='             private  $'.strtolower($value).';'."\n";
                  //  echo " <hr />";
                }


                $oldfile .="\n\n";
                $oldfile .='    /*================== Constructor =====================*/'."\n";

                $oldfile .='              public function __construct()'."\n";
                $oldfile .='                 {'."\n";
                foreach($incude_entitiestab as $key=>$value){

                   /* echo  '                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'();'."\n";

                    echo " <hr />";*/
                    $oldfile .='                 $this->'.strtolower($value).' = new '.ucfirst(strtolower($value)).'();'."\n";
                }


                $oldfile .='                 }'."\n\n\n";


            }


        $oldfile .='    /*==================Methode list=====================*/'."\n";

            $oldfile .='    /*==================Getter list=====================*/'."\n";
            foreach($tabattrib as $key=>$value){
                $oldfile .='                '.$this->getter_maker($value,2).''."\n\n";
            }
            if ($import!='' && count($importattr)>0){

                foreach($importattr as $key=>$value){

                    $oldfile .='             public function get'. ucfirst(strtolower($value)).'()'."\n";
                    $oldfile .='                 {'."\n";
                    $oldfile .='                     return $this->'.strtolower($value).';'."\n";
                    $oldfile .='                 }'."\n";
                }
                $oldfile .='     '."\n\n";
            }
            $oldfile .='    /*==================Setter list=====================*/'."\n";
            foreach($tabattrib as $key=>$value){
                $oldfile .='                '.$this->setter_maker($value,2).''."\n\n";
            }


            if ($import!='' && count($importattr)>0){

                foreach($importattr as $key=>$valeur){

                    $oldfile .='             public function set'.ucfirst(strtolower($valeur)).'($'.strtolower($valeur).')'."\n";
                    $oldfile .='                 {'."\n";
                    $oldfile .='                      $this->'.strtolower($valeur).' = $'.strtolower($valeur).';'."\n";
                    $oldfile .='                 }'."\n\n";
                }
                $oldfile .='     '."\n\n";
            }

            $oldfile .='    /*==================Methode list=====================*/'."\n";
            foreach($tabattrib as $key=>$value){
                $oldfile .='                '.$this->methode_maker($value,2).''."\n\n";
            }




        $oldfile .="           }"."\n".'  '."\n".'   '."\n";
        $oldfile .="\n\n\n".'   ?>'."\n\n\n";
        $txt = $oldfile."\n";
        $path="src/entities/".$Entity.".php";
        //print_r($txt);
         $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);



        }
        return '<label class="text-success">Entités  '.$entname.' créée avec succès </label>';
    }




    function getter_maker($tabelmt,$nameonly=0)
    {


         $getters = "\n";
        if ($nameonly==0){
            for($i=0;$i<count($tabelmt);$i++){
                $array = explode("-", $tabelmt[$i]);
                $encaps= $array[0]; // piece1
                $getter= $array[1]; // piece1
                $getters .='             public function get'.ucfirst(strtolower($getter)).'()'."\n";
                $getters .='                 {'."\n";
                $getters .='                     return $this->'.strtolower($getter).';'."\n";
                $getters .='                 }'."\n\n";
            }
        }

        if ($nameonly==2){
            $tabatr=array();
            if ($tabelmt['element']=='attribut'){
                $tabatr[]=$tabelmt;

                foreach($tabatr as $attribut){
                     $getters .='             public function get'.ucfirst(strtolower($attribut['elmname'])).'()'."\n";

                    $getters .='                 {'."\n";
                    $getters .='                     return $this->'.strtolower($attribut['elmname']).';'."\n";

                    $getters .='                 }'."\n\n";
                }
                //  echo " <hr />";

            }

        }
        if ($nameonly==1){
            //  print_r($nameonly);
            foreach($tabelmt as $cle=>$valeur){
                $attrb='             private  $'.strtolower($valeur).';';
                //   echo '<br>';
                $getters .='             public function get'. ucfirst(strtolower($valeur)).'()'."\n";
                $getters .='                 {'."\n";
                $getters .='                     return $this->'.strtolower($valeur).';'."\n";
                $getters .='                 }'."\n\n";
            }

        }
        return $getters;
    }

    function attribut_maker($tabelattrib,$nameonly=0)
    {

        $attrib = "\n";
        if ($nameonly==0){
            for($i=0;$i<count($tabelattrib);$i++){
                $array = explode("-", $tabelattrib[$i]);
                $encaps= $array[0]; // piece1
                $elmname= $array[1]; // piece1

                $attrib .='             '.strtolower($encaps).' $'.strtolower($elmname).';'."\n";
            }

        }

        if ($nameonly==2){

            $tabatr=array();
                if ($tabelattrib['element']=='attribut'){
                  //  print_r($tabelattrib);
                    $tabatr[]=$tabelattrib;

                    foreach($tabatr as $attribut){
                $attrib .='             '.strtolower($attribut['encaps']).' $'.strtolower($attribut['elmname']) .' ;'."\n";
                            //echo " <br />";
                     }
                   //  echo " <hr />";

                }

        }
        if ($nameonly==1){
          //  print_r($nameonly);
            foreach($tabelattrib as $cle=>$valeur){
                 $attrb='             private  $'.strtolower($valeur).';';
            //   echo '<br>';
                $attrib .=$attrb."\n";
               // echo $cle.' => '.$valeur.'<br>';

              //  $attrib .='             '.strtolower($encaps).' $'.strtolower($elmname).';'."\n";
            }

        }

        return $attrib;
    }

    function setter_maker($tabelmt,$nameonly=0)
    {


        $setters = "\n";
        if ($nameonly==0){
            for($i=0;$i<count($tabelmt);$i++){

                $array = explode("-", $tabelmt[$i]);
                $encaps= $array[0]; // piece1
                $setter= $array[1]; // piece1

                $setters .='             public function set'.ucfirst(strtolower($setter)).'($'.strtolower($setter).')'."\n";
                $setters .='                 {'."\n";
                $setters .='                      $this->'.strtolower($setter).' = $'.strtolower($setter).';'."\n";
                $setters .='                 }'."\n\n";
            }
        }
        if ($nameonly==2){
            $tabatr=array();
            if ($tabelmt['element']=='attribut'){
                $tabatr[]=$tabelmt;

                foreach($tabatr as $attribut){
                    $setters .='             public function set'.ucfirst(strtolower($attribut['elmname'])).'($'.strtolower($attribut['elmname']).')'."\n";

                    $setters .='                 {'."\n";
                    $setters .='                      $this->'.strtolower($attribut['elmname']).' = $'.strtolower($attribut['elmname']).';'."\n";

                    $setters .='                 }'."\n\n";
                }
                //  echo " <hr />";

            }

        }
        if ($nameonly==1){

            foreach($tabelmt as $cle=>$valeur){
                //   echo '<br>';

                $setters .='             public function set'.ucfirst(strtolower($valeur)).'($'.strtolower($valeur).')'."\n";
                $setters .='                 {'."\n";
                $setters .='                      $this->'.strtolower($valeur).' = $'.strtolower($valeur).';'."\n";
                $setters .='                 }'."\n\n";
            }
        }

        return $setters;
    }
    function methode_maker($tabelmt,$nameonly=0)
    {


         $methodes = "\n";
        if ($nameonly==0){
            for($i=0;$i<count($tabelmt);$i++){
                $array = explode("-", $tabelmt[$i]);
                $encaps= $array[0]; // piece1
                $attrib= $array[1]; // piece1
                $methodes .='             '.$encaps.' function '.ucfirst($attrib).'()'."\n";
                $methodes .='                 {'."\n";

                $methodes .='                 }'."\n\n";
            }
        }

        if ($nameonly==2){
            $tabatr=array();
            if ($tabelmt['element']=='methode'){
                $tabatr[]=$tabelmt;

                foreach($tabatr as $attribut){
                    $methodes .='             '.strtolower($attribut['encaps']).' function '.ucfirst($attribut['elmname']).'()'."\n";
                    $methodes .='                 {'."\n";

                    $methodes .='                 }'."\n\n";
                }
                //  echo " <hr />";

            }

        }
        if ($nameonly==0){

            foreach($tabelmt as $cle=>$valeur){
                $attrb='             private  $'.strtolower($valeur).';';
                //   echo '<br>';

                $methodes .='            public function '.ucfirst(strtolower($valeur)).'()'."\n";
                $methodes .='                 {'."\n";

                $methodes .='                 }'."\n\n";
            }
        }
        return $methodes;
    }


    function delete_entitie($entname)
    {


        $ok= 0;
        foreach($this->entities_list()  as $cle=>$valeur){


            if ($valeur['entname']===$entname){
                if (file_exists($valeur['entpath'])) {
                  //  echo $valeur['entname'].' : '.$entname.'<br>';
                    unlink($valeur['entpath']);
                }
                $dalabase=$valeur;
            }
        }


        return $ok;
    }








 /*

    function extract_entitie($file){
        $repons = array();
        $ok=1;
        $message = '';
        $this->fndb= new DatabaseFonctions();
        if($this->fndb->if_dalabase_exist($file['dbname'])==0)
        {
            $this->create_or_delete_database('create' ,$file['dbname']);
            $connect = mysqli_connect($this->host,  $this->user, $this->pass,$file['dbname']);
            $output = '';
            $count = 0;

            $sql = file_get_contents($file['file_data']);

            if (mysqli_connect_errno()) {
                // check connection
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            // execute multi query

            if ($connect->multi_query($sql)) {
                //  echo "success";
                $ok =1;
            } else {
                // echo "error";
                $ok =0;
                $count =1;
            }

            if($count > 0)
            {
                $message = '<label class="text-danger">There is an error in Database Import</label>';
            }
            else
            {
                $message = '<label class="text-success">Database Successfully Imported</label>';
            }
        }
        else
        {
            $message = '<label class="text-danger">This Database already exist !!</label>';
        }
        $repons[]=$ok;
        $repons[]=$message;
        return $repons;
    }


 */
    function entitie_atrib_filter($array) {
        $ctrlObject=array();
        foreach($array as $key=>$value){
            if ($key=='attribut' || $key=='elmname'|| $key=='element' || $key=='encaps'){

                $tabi=array();

                foreach($value as $key2=>$value2){


                    $tabi[]=$value2;
                    // echo $key2.' => '.$value2.'<br>';

                    //  echo $i++;
                }

                $ctrlObject["".$key.""]= $tabi;

            }
        }
        //print_r($this->flip_row_col_array($ctrlObject));

        return  flip_row_col_array($ctrlObject);
    }












































}