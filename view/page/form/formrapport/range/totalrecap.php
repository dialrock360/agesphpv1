

<?php
//$idcaisse=Show_Caisse("id");
//                                  $take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'  AND 	NOMMV="'.$vnt.' " AND 	DATE_DEL="'.$date.' "';


// SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
//$take='SELECT * FROM etat_compte WHERE IDFA!='.$idcaisse.'  AND 	DATEE="'.$date.' " order by IDFA ';

// $condition2 = array('DATEE' => $date,'STOCK' => 0);
//get users from database
//$tables = $db2->getspecificQuery($take);

$recmtsDEPENSE=$recmtsGAINS=$recmtsSTOCK=0 ;
$listefamilyName=array();
$Idfamcaisse = Show_FAref('id','CAISSE');
$countref = $etatcmptdb->rangeliste($datedeb,$date,$Idfamcaisse);
if($countref > 0) {$i=0;
    $cptf= 0;
    foreach( $countref as $row ) {

        extract($row);
        $tables = $etadb->getBarcaisseVetat($DATEE);
        $tmpolistefamilyName=array();
        if($cptf== 0) {
            //$listefamilyName[ ]=  Show_FAref('nom',$IDFA);


            ?>
            <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                <?php
                $desiName=array();
                $desiName['desi']=  Show_FAref('nom',$IDFA);
                $desiName['gain']= $GAINS  ;
                $desiName['dep']=  $DEPENSE;

                $listefamilyName[]=  $desiName;
                ?>


                <?php  $count++; endforeach; else: ?>

            <?php endif; ?>
        <?php } else{?>


            <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                <?php
                $desiName=array();
                $desiName['desi']=  Show_FAref('nom',$IDFA);
                $desiName['gain']= $GAINS  ;
                $desiName['dep']=  $DEPENSE;

                $tmpolistefamilyName[]=  $desiName;


                ?>


                <?php  $count++; endforeach; else: ?>

            <?php endif;

            for($i=0; $i<count($tmpolistefamilyName); $i++) {
                    $x=0;
                foreach( $tmpolistefamilyName[$i] as $key=>$valu) {

                   // echo $key.': '.$listefamilyName[$i]['desi'].' => '.$valu.'<br>';
                      /*if ($valu == $listefamilyName[$i]['desi']){

                          echo count($tmpolistefamilyName[$i]).': '.$key.' => '.$valu.'<br>';
                      }

                        if ($valu == $listefamilyName[$i]['gain']){

                            echo count($tmpolistefamilyName[$i]).': '.$key.' => '.$valu.'<br>';
                        }

                        if ($valu == $listefamilyName[$i]['dep']){

                            echo count($tmpolistefamilyName[$i]).': '.$key.' => '.$valu.'<br>';
                        }*/
                    $x++;
                }


                print_r($tmpolistefamilyName[$i]);
                echo '<hr>';
            }

            ?>

        <?php } ?>
        <tr>
            <td>  </td>
            <td>  </td>

        </tr>






        <?php
        $cptf++;
    }
}

?>
<?php  foreach( $listefamilyName as $row ) { extract($row); ?>
    <?php
    ?>
    <tr>
        <td> <h4><strong><?php echo  $desi;?></strong></h4> </td> <td><?php echo $gain;?></td>
        <td> <h4><strong><?php echo $desi;?></strong></h4> </td> <td><?php echo $dep;?></td>

    </tr>

    <?php  }

$listefamily = $famdb->liste();
$tabidfa=array();
$tabdesig=array();
$tabgain=array();
$tabdep=array();
$tabidfag=array();
$tabidfad=array();
$tthtdep=0;
$tthtgain=0;
$cpt=0;

// print_r($listefamily);echo '<hr/>';
//require_once "recaprecette.php";

//require_once "recapdepense.php";
require_once "ficherecap.php";
?>
<?php
// $idcaisse=Show_Caisse("id");
//require_once "ficherecette.php";
?>
<?php
// require_once "fichedepense.php";
?>
