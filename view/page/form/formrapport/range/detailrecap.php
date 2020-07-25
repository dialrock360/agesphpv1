
<?php
$mtsDEPENSE=$mtsGAINS=$mtsSTOCK=0 ;


$Idfamcaisse = Show_FAref('id','CAISSE');
$countref = $etatcmptdb->rangeliste($datedeb,$date,$Idfamcaisse);
if($countref > 0) {$i=0;
    foreach( $countref as $row ) {
        extract($row);
        ?>
        <tr>


            <?php



            ?>
            <td><strong STYLE="color: #0000ff;"><?php echo $DATEE;?></strong></td>
            <td><strong>Total Recette</strong></td>
            <td><strong STYLE="color: #0000ff;"><?php  $mtsGAINS=$mtsGAINS+$GAINS; echo $GAINS;?></strong></td>
            <td><strong>Total D&eacute;pense</strong></td>
            <td><strong STYLE="color: #0000ff;"><?php  $mtsDEPENSE=$mtsDEPENSE+$DEPENSE; ECHO $DEPENSE;//echo $depfi; ?></strong></td>
            <td><strong>Caisse</strong></td>
            <td><h4  ><span style="color:#FF0033;"><?php $mtsSTOCK=$STOCK; echo  $STOCK;?></span></h4></td>

        </tr>

        <?php
    }
}
//require_once "formrapport/range/totalrecap.php";
?>


<tr>


    <?php



    ?>
    <td> </td>
    <td><strong> RECETTE TOTAL</strong></td>
    <td><strong STYLE="color: #0000ff;"><?php  echo $mtsGAINS+$mtsSTOCK;?></strong></td>
    <td><strong>DEPENSE TOTAL</strong></td>
    <td><strong STYLE="color: #0000ff;"><?php   ECHO $mtsDEPENSE;//echo $depfi; ?></strong></td>
    <td><strong>Caisse Veille</strong></td>
    <td><h4  ><span style="color:#FF0033;"><?php   echo  $mtsSTOCK;?></span></h4></td>

</tr>
