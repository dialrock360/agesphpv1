<?php

$imgFile = $_FILES['img']['name'];
$tmp_dir = $_FILES['img']['tmp_name'];
$imgSize = $_FILES['img']['size'];
//$target_dir = "assets/images/avatars/";\public\img\faces
$upload_dir = 'public/img/faces/'; // upload directory
$target_file = $upload_dir . basename($imgFile);
$img=Img($imgFile,$tmp_dir,$imgSize,$upload_dir);

$id=$_POST['id'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$daten=$_POST['date'];
$tel=$_POST['tel'];
$genre=$_POST['genre'];

?>