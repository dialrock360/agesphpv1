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

class DatabaseManager
{


    //DataBase settings
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $etat;
    private $connection;
    private $fn;

    public function __construct(){
        require_once 'Functions.php';

        require_once 'config/database.php';

        $this->host = connexion_params()["host"];
        $this->user = connexion_params()["user"];
        $this->pass = connexion_params()["password"];
        $this->dbname = connexion_params()["database_name"];

    }




  public  function database_liste($dbname='')
    {


        $curendb= connexion_params();
        $this->dbname= $curendb['database_name'];

        $dbList = array();
        if ($curendb['etat']=='on') {
            $sql="SHOW DATABASES";
            $link = mysqli_connect($this->host,  $this->user, $this->pass,$this->dbname) or die ('Error connecting to mysql: ' . mysqli_error($link).'\r\n');

            if (!($result=mysqli_query($link,$sql))) {
                printf("Error: %s\n", mysqli_error($link));
            }

            $i=1;
            while($row = mysqli_fetch_array($result))
            {
                if (($row[0]!="information_schema") && ($row[0]!="mysql") && ($row[0]!="performance_schema") && ($row[0]!="phpmyadmin")) {
                    $tableList = array();
                    $tableList['dbid'] = $i;
                    $tableList['dbname'] = $row[0];
                    $link = mysqli_connect('localhost','root','',  $row[0]);
                    $dbcolumn = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);
                    $tableList['dbcolumn'] = $dbcolumn;
                    $tableList['dbnbrcol'] = count($dbcolumn);
                    $dbList[] = $tableList;
                    /* print_r ($tableList);

                    echo '<hr/>';*/
                    $i++;
                }
            }
        }
        return $dbList;
    }
  public  function table_liste($dbname){




        $databases=$this->get_database($dbname);

        //  print_r($databases['dbcolumn']);
// Database configuration


// Create database connection
        $this->connection = mysqli_connect($this->host,  $this->user, $this->pass, $this->dbname) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');

// Check connection
        if ( $this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }


       $table=array();

       /* foreach($databases as $cle=>$valeur){
            if ($cle!='dbcolumn')
            {

                echo $cle.' : '.$valeur.'<br>';
            }
        }*/
$i=0;
        foreach($databases['dbcolumn'] as $cle=>$valeur){

            $colx=$this->get_columns_of_database($this->connection,$dbname,$valeur);
          //  echo  $valeur.' : <br>';
            //$table['tablename']=  $valeur;
            // print_r($colx);

            $row=array();
            $col=array();
            $row['id']=  $i;
            $row['tablename']=  $valeur;
            $row['nbrcol']=  count($colx);

            foreach($colx as $key=>$value){
           //    echo $key.' : '.$value.'<br>';

                $row[]=  $value;

            }

            $table[]=  $row;
            $i++;
            //echo '<hr>';
        }
       // print_r($table);
   return $table;
    }

  public  function table_listepure($dbname=''){




        $databases=($dbname=='')?$this->get_database($this->dbname):$this->get_database($dbname);

        //  print_r($databases['dbcolumn']);
// Database configuration


// Create database connection
        $this->connection = mysqli_connect($this->host,  $this->user, $this->pass, $this->dbname) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');

// Check connection
        if ( $this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }


       $table=array();


        foreach($databases['dbcolumn'] as $cle=>$valeur){

            $colx=$this->get_columns_of_database($this->connection,$this->dbname,$valeur);
          //  echo  $valeur.' : <br>';
            //$table['tablename']=  $valeur;
            // print_r($colx);

            $row=array();
            $row['tablename']=  $valeur;

            foreach($colx as $key=>$value){
           //    echo $key.' : '.$value.'<br>';

                $row[]=  $value;

            }

            $table[]=  $row;
        }
       // print_r($table);
   return $table;
    }

  public  function sheck_database_bakup(){


        $dbList = array();
        $i=1;

        $fileList = glob('src/view/sm-sdmin/database/backup/*');
        foreach($fileList as $filename){
            //Use the is_file function to make sure that it is not a directory.

            $tmptableList = array();
            if((is_file($filename) ) && $filename!='src/view/sm-sdmin/database/backup/ping.txt'){

                $array = explode("/", $filename);
                $dbref= $array[5]; // piece1

                $array2 = explode("-", $dbref);
                $dbname=         $entname= strval(trim($array2[1])); // piece1$array2[1]; // piece1
                //$dbname= $array2[1].'-'.$array2[2].'-'.$array2[3].'-'.$array2[4]; // piece1
                $dbdateql= $array2[2].'-'.$array2[3].'-'.$array2[4]; // piece1

                $array3 = explode(".", $dbdateql);
                $dbdate= $array3[0]; // piece1

                $array4 = explode("-", $dbref);
                $dbid= $array4[0]; // piece1

                $tableList = array();
                $tableList['dbid'] = $dbid;
                $tableList['dbref'] = $dbref;
                $tableList['dbname'] = $dbname;
                $tableList['dbdate'] = $dbdate;
                $tableList['dbcolumn'] = '';
                $tableList['dbnbrcol'] = 'x';
                $dbList[] = $tableList;
                /* print_r ($tableList);

                 echo '<hr/>';
                */
                $i++;
            }
        }
        return $dbList;
    }

    public   function get_database($dbname)
    {


        $database = array();
        foreach($this->database_liste($dbname)  as $cle=>$valeur){
            if ($valeur['dbname']==$dbname)
                $database=$valeur;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $database;
    }

    public   function get_secondcolumn($dbname,$tables,$index=1)
    {

        $coltable=$this->get_columnsTable($tables,$this->get_table($tables,$this->table_listepure($dbname)),true);

        $col = '';
        for($i=0;$i<count($coltable);$i++){
            if ($i==$index)
                $col=$coltable[$i];
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $col;
    }


    public  function if_database_exist($dbname)
    {


        $database = 0;
        foreach($this->database_liste($dbname) as $cle=>$valeur){
            if ($valeur['dbname']==$dbname){
                $database=1;
            }


           // echo $valeur['dbname'].' : '.$dbname.'<br>';
        }

        return $database;
    }


    public  function if_table_exist($tablename)
    {


        $x = 0;
        foreach($this->table_listepure() as $cle=>$valeur){
            if (strtolower($valeur['tablename']) == strtolower($tablename)){
                $x=1;
            }

           // $x=(strtolower($valeur['tablename'] )==strtolower($tablename))?($x+1):0;

            //print_r($valeur);
           // echo '<hr>';

        }
       // echo $x.'<hr>';
        return $x;
    }



    public  function create_or_delete_database($cmd ,$dbname){

        $message = '';
        $ok = 0;
        $repons = array();

// Create connection
        $this->connection = mysqli_connect($this->host,  $this->user, $this->pass) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');

// Check connection
        if ( $this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

// Create database
        $sql =($cmd=='create')? "CREATE DATABASE ".$dbname : "DROP DATABASE ".$dbname;
        if ($this->connection->query($sql) === TRUE) {
            $message= "Database operation successfully";
            $ok=1;
        } else {
            $message= "Error operation database: " .  $this->connection->error;

        }
        $repons[]=$message;
        $repons[]=$ok;

        $this->connection->close();
        return $repons;
    }





    public  function save_database($dbname){
        // echo $dbname;

        return  extract_database($dbname,false);
        //$this->database('database');
    }

    public  function export_database($dbname){
        // echo $dbname;

        return  extract_database($dbname,true);

        //$this->database('database');
    }



    public  function init_database_configuration($db){
        $host = $db["host"];
        $user = $db["user"];
        $pass = $db["password"];
        $etat = $db["etat"];

        //   echo $dbname;
        $oldfile = ' <?php'."\n\n".'    /*=================================================='."\n";
        $oldfile .='    MODELE MVC DEVELOPPE PAR Ngor SECK'."\n";
        $oldfile .='    ngorsecka@gmail.com'."\n";
        $oldfile .='    (+221) 77 - 433 - 97 - 16'."\n";
        $oldfile .='    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR'."\n";
        $oldfile .='    VOUS ETES LIBRE DE TOUTE UTILISATION'."\n";
        $oldfile .='    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com'."\n";
        $oldfile .='    ==================================================*/'."\n\n\n\n";
        $oldfile .='    function connexion_params(){'."\n".'        return array('."\n";
        $oldfile .="           'host' => '".$host."',"."\n";
        $oldfile .="           'user' => '".$user."',"."\n";
        $oldfile .="           'password' => '".$pass."',"."\n";
        $oldfile .="           'database_name' => '".$db["dbname"]."',"."\n";
        $oldfile .="           'etat' => '".$etat."'//metter à on pour demarrer la base"."\n".'    );'."\n".'   }'."\n";
        $oldfile .="\n\n\n".'   ?>'."\n\n\n";
        $txt = $oldfile."\n";
        //print_r($txt);
        $myfile = fopen("config/database.php", "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);
        return  $message = '<label class="text-success">Database  <span class="text-info">'.$db["dbname"].' </span>is Successfully Activated</label>';
    }





    public  function import_database($file){
        $repons = array();
        $ok=1;
        $message = '';
      //  echo $file['dbname'];

                if($this->if_database_exist($file['dbname'])==0)
                {
                   $this->create_or_delete_database('create' ,$file['dbname']);
                   $connect = mysqli_connect($this->host,  $this->user, $this->pass,$file['dbname']);
                    $output = '';
                    $count = 0;

                    $sql = file_get_contents($file['file_data']);

                    if (mysqli_connect_errno()) { // check connection
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




    public  function get_columns_of_database($conn,$dbName,$tbl_name){


// Query to get columns from table
        $query = $conn->query("SELECT COLUMN_NAME , DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$dbName."' AND TABLE_NAME = '".$tbl_name."' ");

        while($row = $query->fetch_assoc()){
            $result[] = $row['COLUMN_NAME'].':'.$row['DATA_TYPE'];
        }

// Array of all column names
        $columnArr = array();
        $columnArr['colname'] = array_column($result, 'COLUMN_NAME');
        $columnArr['datatype'] = array_column($result, 'DATA_TYPE');
        return  $result;

        //$this->database('database');
    }


    public  function get_primary_keyof_table($tbl_name,$idbname=''){
        $dbname=($idbname=='')?$this->dbname:$idbname;

        $conn = mysqli_connect($this->host,  $this->user, $this->pass, $dbname) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');

        $sql = "SELECT k.column_name
                FROM information_schema.table_constraints t
                JOIN information_schema.key_column_usage k
                USING(constraint_name,table_schema,table_name)
                WHERE t.constraint_type='PRIMARY KEY'
                     AND t.table_schema='".$dbname."'
                       AND t.table_name='".$tbl_name."' ";

        $result = array();
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){ $result[] = $row;}

        return  $result;

        //$this->database('database');
    }
    public  function get_table_cols_detail($tbl_name,$idbname=''){

        return  get_table_details($tbl_name,$idbname);
        //$this->database('database');
    }


    public  function if_autoincrement($table_details,$col_name)
    {


        $database = 0;
        foreach($table_details['ids'] as $table){
             if ($table[0]==$col_name && $table[5]=='auto_increment'){
                $database=1;
                 /*print_r($table);
                 echo '<hr>';*/
            }


            // echo $valeur['dbname'].' : '.$dbname.'<br>';
        }

        return $database;
    }

    public function primaryKeys_filter($table_details)
    {

        $coltable=array();
        foreach($table_details as $table){


             $idbj='';
            $i=0;

            if (isset($table[0]) && !is_array($table[0])){
                // print_r($table[$i]);
                $idbj.=$table[0];
            }
            if (isset($table[5]) && !is_array($table[5])){
                // print_r($table[$i]);
                $idbj.=':'.$table[5];
            }

            $coltable[]=$idbj;
        }

/*
        print_r($coltable);
        echo '<hr>';*/
        return $coltable;

    }



    public  function get_foreign_keyof_table($tbl_name,$idbname=''){
        $dbname=($idbname=='')?$this->dbname:$idbname;
        $conn = mysqli_connect($this->host,  $this->user, $this->pass, $dbname) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');
        $sql = "SELECT 
                         column_name, 
                         referenced_table_schema AS foreign_db, 
                         referenced_table_name AS foreign_table, 
                         referenced_column_name  AS foreign_column 
                FROM     information_schema.KEY_COLUMN_USAGE
                WHERE
                         constraint_schema = SCHEMA()
                AND
                         table_name = '".$tbl_name."'
                AND
                         referenced_column_name IS NOT NULL
                ORDER BY
                         column_name";

                $result = array();
        $query = $conn->query($sql);

        while($row = $query->fetch_assoc()){$result[] = $row;}
        return  $result;
    }


    public  function if_column_is_foreignkey($tblname,$colname,$tbl_fk=null,$database='')
    {

        $database=($database=='')?$database:$this->dbname;
        $tbl_fk=($tbl_fk!=null)?$tbl_fk:$this->fk_column_table_maker($this->get_foreign_keyof_table($tblname,$database));
        $ok = 0;
        if ($tbl_fk!=null){

            foreach( $tbl_fk as $cle=>$valeur){
                if ($valeur==$colname){
                    $ok=1;
                }


                // echo $valeur['dbname'].' : '.$dbname.'<br>';
            }
        }

        return $ok;
    }

    public  function fk_column_table_maker($tbl_fk)
    {
        $coltab = array();
        if ($tbl_fk!=null){

            foreach($tbl_fk as $cle=>$valeur){
                foreach($valeur as $key=>$value){
                    if ($key=='column_name'){
                       // echo $valeur.'<br>';
                         $coltab[]=$value;
                    }


                   //  echo $key.' : '.$value.'<br>';
                }

            }
        }

        return $coltab;
    }
    public  function pk_of_foreigntable_maker($tbl_fk)
    {
        $coltab = array();
        if ($tbl_fk!=null){

            foreach($tbl_fk as $cle=>$valeur){
                foreach($valeur as $key=>$value){
                    if ($key=='foreign_column'){
                       // echo $valeur.'<br>';
                         $coltab[]=$value;
                    }


                   //  echo $key.' : '.$value.'<br>';
                }

            }
        }

        return $coltab;
    }

    public  function fk_table_table_maker($tbl_fk)
    {
        $coltab = array();
        if ($tbl_fk!=null){

            foreach($tbl_fk as $cle=>$valeur){
                foreach($valeur as $key=>$value){
                    if ($key=='foreign_table'){
                       // echo $valeur.'<br>';
                         $coltab[]=$value;
                    }


                   //  echo $key.' : '.$value.'<br>';
                }

            }
        }

        return $coltab;
    }

    public  function pk_column_table_maker($tbl_fk)
    {
        $coltab = array();
        if ($tbl_fk!=null){

            foreach($tbl_fk as $cle=>$valeur){
                foreach($valeur as $key=>$value){
                    if ($key=='column_name'){
                       // echo $valeur.'<br>';
                         $coltab[]=$value;
                    }


                   //  echo $key.' : '.$value.'<br>';
                }

            }
        }

        return $coltab;
    }



    public function get_columnsTable($clsname,$table,$nameonly=true)
    {

        $coltable=array();
        if ($table!=null){
        if ($table['tablename']==$clsname){
            $i=0;
            foreach($table as $key=>$value){
                if ($nameonly==true){
                        if ($i!=0){

                            $array = explode(":", $value);
                            $coltable[]= $array[0]; // piece1
                            // echo $key.' => '.$array[0].'<br>';

                        }
                }else{
                        if ($i!=0){

                           //  echo $key.' => '.$value.'<br>';
                            $array = explode(":", $value);
                            $coltable[]= $value; // piece1

                        }
                }
                $i++;
            }
        }
        }
        //print_r($coltable);
        return $coltable;

    }

    public function get_table($clsname,$tablels)
    {


        $thistable=array();
        foreach($tablels as $table){
            if ($table['tablename']==$clsname){

               // $tabelname=$table['tablename'];
                $thistable=$table;

               // $thistable[]=$this->get_columnsTable($tabelname,$table,false);


            }
        }

       // print_r($thistable);
        return $thistable;

    }

    public function filter_table($tablename,$bdname='')
    {
        $bdname=($bdname=='')?$this->dbname:$bdname;
        $tablels =  $this->table_listepure($bdname);
        $thistable=array();
        foreach($tablels as $key=>$obj){
            foreach( $obj as $value){
                if (strtolower($value)==strtolower($tablename)){
                    $thistable=$obj;
                   /* print_r($obj);
                    echo '<hr>';*/
                }
            }
        }
        return $thistable;

    }



    public function columnsTable_filter($tablename,$bdname='')
    {

        $bdname=($bdname=='')?$this->dbname:$bdname;
        $table=$this->filter_table($tablename,$bdname);

        $coltable=array();
        if ($table!=null){
            $i=0;
            foreach($table as $key=>$value){

                if (strtolower($key)!='tablename'){
                    if ($i!=0){
                        /*print_r($key);
                        echo '<hr>';*/
                        $array = explode(":", $value);
                        $coltable[]= $array[0]; // piece1
                        // echo $key.' => '.$array[0].'<br>';

                    }
                }
                $i++;
            }
        }
        //print_r($coltable);
        return $coltable;

    }
































    /**
     * @param false|\mysqli $connection
     */
    public function setConnectionWithDbName($dbname)
    {
        $this->connection = mysqli_connect($this->host,  $this->user, $this->pass,$dbname) or die ('Error connecting to mysql: ' . mysqli_error( $this->connection).'\r\n');
    }

    /**
     * @param false|\mysqli $connection
     */
    public function setingConnectionWithDbName($dbname)
    {
        $conn=array();

        $conn["host"] = $this->host;
        $conn["user"] = $this->user;
        $conn["password"] = $this->pass;
        $conn["dbname"] = $dbname;
        return $conn;

     }

    /**
     * @param false|\mysqli $connection
     */
    public function setConnection( $conn)
    {
        $this->connection =  $conn;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    /**
     * @return mixed
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @param mixed $dbname
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }






}