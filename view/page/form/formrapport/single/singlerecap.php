

<tr>
    <td colspan="5" rowspan="1">
        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px">
            <tbody>





            <tr>
                <?php


                $AsGAINS=$etadb->getVal_Etatcmp('gain',$cdate);
                $AsDEPENSE=$etadb->getVal_Etatcmp('dep',$cdate);
                $AsSTOCK=$etadb->getVal_Etatcmp('stock',$cdate);
                $caisseveil=Show_caiseveil($cdate);
                $di=$AsGAINS-$AsDEPENSE;
                $caisse=($AsGAINS-$AsDEPENSE)+$caisseveil;
                ?>
                <td><strong STYLE="color: #0000ff;"><?php echo $cdate;?></strong></td>
                <td><strong>Total Recette</strong></td>
                <td><strong STYLE="color: #0000ff;"><?php echo $AsGAINS;?></strong></td>
                <td><strong>Total D&eacute;pense</strong></td>
                <td><strong STYLE="color: #0000ff;"><?php  ECHO $AsDEPENSE;//echo $depfi; ?></strong></td>
                <td><strong>Caisse</strong></td>
                <td><h4  ><span style="color:#FF0033;"><?php echo  $AsSTOCK;?></span></h4></td>

            </tr>



            </tbody>

        </table>

    </td>
</tr>