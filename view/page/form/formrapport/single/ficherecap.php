<tr>
    <td colspan="5" rowspan="1">
        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px">
            <tbody> <tr> <td colspan="5" style="text-align:center"> <h1><strong><span style="color:#FFFF00"><span style="background-color:rgb(0, 0, 0)">FICHE RECAPITULATIVE</span></span></strong></h1> </td> </tr> <tr> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>RECETTES</strong></h3> </td> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>DEPENSES</strong></h3> </td> <td style="text-align:center"> <h3><strong></strong></h3> </td> </tr>
            <?php
            //$idcaisse=Show_Caisse("id");
            //                                  $take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'  AND 	NOMMV="'.$vnt.' " AND 	DATE_DEL="'.$date.' "';


            // SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
            //$take='SELECT * FROM etat_compte WHERE IDFA!='.$idcaisse.'  AND 	DATEE="'.$date.' " order by IDFA ';

            // $condition2 = array('DATEE' => $date,'STOCK' => 0);
            //get users from database
            //$tables = $db2->getspecificQuery($take);
            $tables = $etadb->getBarcaisseVetat($date);


            ?>
            <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>

                <tr>
                    <td> <h4><strong><?php echo  Show_FAref('nom',$IDFA);?></strong></h4> </td> <td><?php echo $GAINS;?></td>
                    <td> <h4><strong><?php echo Show_FAref('nom',$IDFA);;?></strong></h4> </td> <td><?php echo $DEPENSE;?></td>

                </tr>
                <?php  $count++; endforeach; else: ?>
                <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
            <?php endif; ?>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td> <td><?php  //echo $charge;?></td> </tr>
            <tr> <td colspan="4" rowspan="1">&nbsp;</td> </tr>

            <tr>
                <?php


                $AsGAINS=$etadb->getVal_Etatcmp('gain',$date);
                $AsDEPENSE=$etadb->getVal_Etatcmp('dep',$date);
                $AsSTOCK=$etadb->getVal_Etatcmp('stock',$date);
                $caisseveil=Show_caiseveil($date);
                $di=$AsGAINS-$AsDEPENSE;
                $caisse=($AsGAINS-$AsDEPENSE)+$caisseveil;
                ?>
                <td><strong>Total Recette</strong></td>
                <td><strong STYLE="color: #0000ff;"><?php echo $AsGAINS;?></strong></td>
                <td><strong>Total D&eacute;pense</strong></td>
                <td><strong STYLE="color: #0000ff;"><?php  ECHO $AsDEPENSE;//echo $depfi; ?></strong></td>
                <td colspan="2">  <strong style="text-align: center;">Caisse</strong>  </td>
            </tr>

            <tr>
                <td colspan="4"> <p>&nbsp;</p> <p>&nbsp;</p> </td>
                <td colspan="2"> <h2><span style="color:#FF0033;"><?php echo  $AsSTOCK;?></span></h2> <p>&nbsp;</p> </td>
            </tr>

            <tr>
                <td colspan="2" rowspan="1"><strong>D&eacute;tails Suplementaires</strong></td>
                <td><strong>Caisse veille</strong></td>
                <td><strong>D.I Journée</strong></td>
                <td><strong>Index SDE</strong></td>
                <td><strong>Index SENELEC</strong></td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
                <td><h3>&nbsp;<?php echo $caisseveil;?></h3></td>
                <td><h3>&nbsp;<?php echo $di;?></h3></td>
                <td><p>&nbsp;</p></td>
                <td> <p>&nbsp;</p>  </td>
            </tr>
            </tbody>

        </table>

    </td>
</tr>



<tr>
    <td colspan="5" rowspan="1">&nbsp;</td>
</tr>

<tr>
    <td colspan="5" rowspan="1">&nbsp;</td>
</tr>