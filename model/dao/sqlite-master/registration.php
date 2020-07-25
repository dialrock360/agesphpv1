<?php

require_once 'MyDB.php';
session_start();

    
   if (isset($_POST["add"])){
   	extract($_POST);
   //   if(!empty($name)&& !empty($username)&& !empty($email)&& !empty($pwd)){file:///home/d/Public/PROJET_PHP/htdocs/test/PHP-SQLITE-registration-login-form-master/registration.php

             
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

  // $sql ="INSERT INTO USERS (ID,NAME,USERNAME,MAIL,PASSWORD)"."\n"."VALUES ('".$_GET["add"]."', '".$_POST["name"]."', '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["pwd"]."');";
    $sql ="INSERT INTO USERS VALUES (NULL, '".$name."', '".$username."', '".$email."', '".$pwd."')";



    $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Successeful Registration!\n";
   }
   $db->close(); 
  //}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

  <a  href="login.php" class="btn btn-primary active">Log in</a>
<div class="container">
  <h2>Sign Up now!</h2>
  <form role="form" method="post" action="registration.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email"  name="email"  placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd"  name="pwd"  placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default"  name="add">Submit</button>
  </form>
</div>

</body>
</html>

