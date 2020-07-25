<?php


require_once'../model/include.php';
 require_once '../model/DB.php';

if(isset($_GET['nommv']) && !empty($_GET['nommv'])){
    extract($_GET);

    $target='?file=page/recu/table';

    $mouv= explode('?',$nommv);
    $nommv= $mouv[0];
      $id=explode('=',$mouv[1])[1];
    if($nommv=='facture'){
         $target='?file=page/facture/table';

    }

    $del = fldeletemouv($id);
   $sms=($del == 1)?"Elements Supprimer Avec Success ...":"Supressions Impossible !! ";
    ?>
    <script>
        alert('<?php echo $sms; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
}

if(isset($_GET['cibleetat']) && !empty($_GET['cibleetat'])){
    extract($_GET);

    $target='?file=page/caisse';

      $mouv= explode('?',$cibleetat);
    $cibleetat= $mouv[0];
      $id=explode('=',$mouv[1])[1];
  
  $sql = "DELETE FROM `etat_compte` WHERE DATEE='".$id."' ";
										   $db = new DB();
										   $del =$db->updatespecificQuery($sql);
    
   $sms=($del == 1)?"Elements Supprimer Avec Success ...":"Supressions Impossible !! ";
    ?>
    <script>
        alert('<?php echo $sms; ?>');
        window.location.href='../start.php<?php echo $target; ?>';
    </script>
    <?php
 
}
