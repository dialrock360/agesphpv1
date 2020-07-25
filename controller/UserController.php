<?php

require_once'../model/bd.php';
require_once'../model/functions.php';
require_once'../model/modeluser.php';
require_once'../model/echotest.php';

if(isset($_POST['btnsave'])){
    require_once'UserExtractor.php';


    if($error==0){

          $result=Saveuser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$passe,$adresse,$email,$tel,$userpic,$cacher);
          if($result==0){

              ?>
              <script>
                  alert('<?php echo $nom." Elements Enregistré avec success !!!"; ?>');
                  window.location.href='../start.php?file=page/user';
              </script>
              <?php
          }else{
              ?>
              <script>
                  alert('<?php echo $result; ?>');
                  window.location.href='../start.php?file=page/user';
              </script>
              <?php
          }
    }else{
        ?>
        <script>
            alert('<?php echo $error; ?>');
            window.location.href='../start.php?file=page/user';
        </script>
        <?php
    }



}

if(isset($_POST['btnupdate'])){
    require_once'UserExtractor.php';
   // echo $origine.'<br>';
  //  echo $statut.'<br>';
   // testechouser($id,$cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info,$cacher);



    if($error==0){

          $result=Mofifuser($id,$cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info);
          if($result==0){

              ?>
              <script>
                  alert('<?php echo $nom." Mis a jour avec success !!!"; ?>');
                  window.location.href='../start.php<?php echo $origine; ?>';
              </script>
              <?php
          }else{
              ?>
              <script>
                  alert('<?php echo $result; ?>');
                  window.location.href='../start.php<?php echo $origine; ?>';
              </script>
              <?php
          }
    }else{
        ?>
        <script>
            alert('<?php echo $error; ?>');
            window.location.href='../start.php<?php echo $origine; ?>';
        </script>
        <?php
    }



}

?>