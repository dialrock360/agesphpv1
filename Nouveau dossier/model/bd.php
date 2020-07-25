<?php




$base = mysqli_connect('localhost','root','','senbd') or die('Conection Rat�e: PB de BD');//conection � la bd


/*$server='localhost';
$logbd = 'root';
$erata= 'Conection Ratée: PB de Base de donné';
$bd = 'orthobd';
try{
$base= new PDO("mysql:host=$server;bdname=$bd",$logbd,'');
$base-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo  'Conection ok!';
}
    catch(PDOExeption $e){
echo  'Conection Ratée: PB de Base de donné :'.$e->getMessage();
}
*/
?>

<?php
/*$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'senbd';

try{
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
*/

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'senbd';

try{
    $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}


?>
<?php



$db_host = "localhost";
$db_name = "senbd";
$db_user = "root";
$db_pass = "";

try{

    $db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
    $db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>


<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "senbd";

$MySQLiconn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);

if($MySQLiconn->connect_errno)
{
    die("ERROR : -> ".$MySQLiconn->connect_error);
}
?>

<?php
$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "senbd";

try {
    $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
    //$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex){
    die($ex->getMessage());
}



?>
