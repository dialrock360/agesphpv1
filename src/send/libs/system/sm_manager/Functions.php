<?php




require_once 'config/database.php';

function extract_database($db,$download=false)
{
    $host= connexion_params()["host"];
    $user=connexion_params()["user"];
    $pass=connexion_params()["password"];
    $dbname=$db;
    $date = date('d-m-Y H:i:s');
    $ref = date('dmYHis');

    $tables=false; $backup_name=false;

    set_time_limit(3000); $mysqli = new mysqli($host,$user,$pass,$dbname); $mysqli->select_db($dbname); $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('SHOW TABLES'); while($row = $queryTables->fetch_row()) { $target_tables[] = $row[0]; }	if($tables !== false) { $target_tables = array_intersect( $target_tables, $tables); }
    $content = "SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";\r\nSET time_zone = \"+00:00\";\r\n\r\n\r\n/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\r\n/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\r\n/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\r\n/*!40101 SET NAMES utf8 */;\r\n--\r\n-- Database: `".$dbname."`\r\n--\r\n\r\n\r\n";
    foreach($target_tables as $table){
        if (empty($table)){ continue; }

        $result	= $mysqli->query('SELECT * FROM `'.$table.'`');  	$fields_amount=$result->field_count;  $rows_num=$mysqli->affected_rows; 	$res = $mysqli->query('SHOW CREATE TABLE '.$table);	$TableMLine=$res->fetch_row();

        $content .= "\n\n".$TableMLine[1].";\n\n";   $TableMLine[1]=str_ireplace('CREATE TABLE `','CREATE TABLE IF NOT EXISTS `',$TableMLine[1]);
        for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) {
            while($row = $result->fetch_row())	{ //when started (and every after 100 command cycle):
                if ($st_counter%100 == 0 || $st_counter == 0 )	{$content .= "\nINSERT INTO ".$table." VALUES";}
                $content .= "\n(";    for($j=0; $j<$fields_amount; $j++){ $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); if (isset($row[$j])){$content .= '"'.$row[$j].'"' ;}  else{$content .= '""';}	   if ($j<($fields_amount-1)){$content.= ',';}   }        $content .=")";
                //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) {$content .= ";";} else {$content .= ",";}	$st_counter=$st_counter+1;
            }
        } $content .="\n\n\n";
    }
    $content .= "\r\n\r\n/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\r\n/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\r\n/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
    $backup_name = $ref.'-'.$dbname.'-'.$date.'.sql';
    ob_get_clean();
    $directory='src/view/sm-sdmin/database/backup';

    if($download==true)
    {
        header('Content-Type: application/octet-stream');  header("Content-Transfer-Encoding: Binary");  header('Content-Length: '. (function_exists('mb_strlen') ? mb_strlen($content, '8bit'): strlen($content)) );    header("Content-disposition: attachment; filename=\"".$backup_name."\"");

    }else{

        if (file_exists('src/view/sm-sdmin/database/backup/ping.txt')) {
            $file = $directory.'/'.$backup_name;
            // Ouvre un fichier pour lire un contenu existant
            //   $current = file_get_contents($file);
            // Ajoute une personne
            $current = $content." \n";
            // Écrit le résultat dans le fichier
            file_put_contents($file, $current);
        }
    }
    return $content; exit;
}


function flip_row_col_array($array) {
    $out = array();
    foreach ($array as  $rowkey => $row) {
        foreach($row as $colkey => $col){
            $out[$colkey][$rowkey]=$col;
        }
    }
    return $out;
}


  function get_table_details($tbl_name,$idbname=''){
    $dbname=($idbname=='')?connexion_params()["database_name"]:$idbname;

    $host= connexion_params()["host"];
    $user=connexion_params()["user"];
    $pass=connexion_params()["password"];


    $ids=null;
    $item=null;
    $ret=null;
    set_time_limit(3000);
    $mysqli = new mysqli($host,$user,$pass,$dbname);
    $mysqli->select_db($dbname);
    $mysqli->query("SET NAMES 'utf8'");
    $queryTables = $mysqli->query('DESCRIBE '.$tbl_name.'');

    while($rows = $queryTables->fetch_row()) {
       // echo "id: " . $row["Field"]. " - Key: " . $row["Key"]. "  - Extra: " . $row["Extra"]. "<br>";

        if (isset($rows[3]) && $rows[3]=='PRI'){
            $ids[]=$rows;

        }else{

            $item[]=$rows;
        }

    }

      $ret['ids']=$ids;
      $ret['items']=$item;

     /* print_r($ret);
      echo '<hr>';*/

      return $ret;
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}
function mathDatatipe($string,$type='num')
{




    $patternemail ="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
    $pattern0399 ="/^[varchar]+\([0-399]+\)$/i";
    $patternP400 ="/^[varchar]+\([400-10000]+\)$/i";
    $patternnum  ="/int|decimal|double|numeric|float|real/i";
    $patternbin  ="/bit|binary|blob/i";
    $patterntext  ="/text|tinytext|longtext|mediumtext/i";
    $patternbool ="/bool|boolean|enum|set/i";
    $patterndate ="/date|timestamp|year|datetime/i";
    $pattern=($type=='num')?$patternnum:(
    ($type=='bin')?$patternbin:(
    ($type=='text')?$patterntext:(
    ($type=='bool')?$patternbool:(
    ($type=='date')?$patterndate:(
    ($type=='p400')?$patternP400:(
    ($type=='p399')?$pattern0399:(
    ($type=='email')?$patternemail:""
    )
    )
    )
    )
    )

    ));

    if ($type=='p400' || $type=='p399'){
        if (startsWith ($string, 'varchar')){

            $var1 =  substr($string,7);
            $var2 =  substr("$var1",1);
            $val =   (substr($var2,0,3));
            if ($val<399){
                if ($type=='p399'){
                    return true;
                }
            }else{

                if ($type=='p400'){
                    return true;
                }
            }

            //echo $val."<br>";
        }
    }else{
        if (preg_match($pattern, $string)) {
            // echo '<hr>'.$string.'<hr>';
            return true;
        }
    }



    return false;
}