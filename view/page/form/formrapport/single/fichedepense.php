<tr>


    <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px"> <tbody> <tr> <td colspan="5" style="text-align:center">

                    <h2><span style="color:rgb(255, 255, 255)"><span style="font-family:times new roman,times,serif"><strong><span style="background-color:rgb(0, 0, 0)">FICHE DES DEPENSES</span></strong></span></span></h2>



                </td> </tr>




            <tr>
                <?php
                $tt=0;
                $vnt2='recu';
                //$chaine=TEST_FAM_ACTIVE($vnt2,$date);
                // $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI` in ('.$chaine.')');
                $countref = $famdb->listefamactive('recu',$date);
                if($countref != null) {
                $i=0;
                foreach($countref as $row ) {
                extract($row);
                if($NOMF != '') {
                ?>
            <tr>
                <td colspan="5" style="text-align:center">
                    <h2><span style="color:<?php echo $COLOR;?>"><span style="background-color:rgb(105, 105, 105)">
<?php
echo ' '.$NOMF;



?>

</span></span></h2> </td>
            </tr>


            <tr>
                <td> <h3><strong>D&eacute;signation</strong></h3> </td>
                <td> <h3><strong>Conditionnement</strong></h3> </td>
                <td> <h3><strong>Prix Unitaire</strong></h3> </td>
                <td> <h3><strong>Quantit&eacute;</strong></h3> </td>
                <td> <h3><strong>Montant</strong></h3> </td>
                <td> <h3><strong>Stock Initial&nbsp;&nbsp;</strong></h3> </td> <td> <h3><strong>Stock du jour</strong></h3> </td>

                <?php
                $ttb=0;
                $vnt='facture';
                //SELECT `IDF`, `idmvf`, `idpf`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`,
                // `IDMV`, `idumv`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`,
                // `flagm`, `IDP`, `idcp`, `idcatp`, `libele`, `PHOTO`, `PRIXA`, `PRIXV`, `qnti`, `FTECH`, `flagp`,
                // `IDC`, `NOMC`, `FLAG`,
                // `ID_CAT`, `idfamille`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flagct`,
                // `IDFA`, `DESI`, `COLOR`, `flagfa` FROM `v_facture` WHERE 1
                // $take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'  AND 	NOMMV="'.$vnt.' " AND 	DATE_DEL="'.$date.' "';
                $take=$facdb->listefactureactive($IDFA,$vnt2,$date);
                if($take != null)
                {


                foreach($take as $ligne ) {
                extract($ligne);

                if($NOMF != '') {
                ?>

            <tr>
                <td><?php echo $DESI; ?></td>
                <td><?php  echo $NOMC;?></td>
                <td><?php echo $PU;?></td>
                <td><?php echo $QNT;?></td>
                <td><strong><?php echo $MTS;?></strong></td>

                <?php if($COMPT>0){  ?>
                    <td style="text-align: right;"><span style="color:rgb(255, 0, 0)"><span style="font-size:22px"><strong><span style="font-family:georgia,serif"><?php  echo  $etastkdb->getEstkbyfacture($IDF)['QNT_AV']; ?>  <?php echo $COMPT;?></span></strong></span></span>&nbsp; &nbsp;</td>
                    <td style="text-align: right;"><span style="color:rgb(0, 0, 255)"><span style="font-size:24px"><strong><?php  echo  $etastkdb->getEstkbyfacture($IDF)['QNT_APR']; ?></strong></span></span></td>
                <?php } ?>





            </tr>
            <?php
            $ttb=$ttb+$MTS;
            }}
            ?>
            <tr>
                <td colspan="3" rowspan="1">&nbsp;</td> <td> <h3><strong>Total</strong></h3>
                </td> <td><strong STYLE="color: #0000ff;"><?php echo $ttb;?></strong></td>
            </tr>
            <?php



            $tdesi[$i]=$DESI;
            $tidfa[$i]=$IDFA;
            $tmts[$i]=$ttb;
            $i++;

            }
            ?>
            <tr>
                <td colspan="3" rowspan="1">&nbsp;</td> <td> <h3><strong>Total</strong></h3>
                </td> <td><strong STYLE="color: #0000ff;"><?php echo $ttb;?></strong></td>
            </tr>
            <?php



            $tdesi[$i]=$NOMF;
            $tidfa[$i]=$IDFA;
            $tmts[$i]=$ttb;
            $i++;

            }
            }
            }
            ?>

            <tr>
                <td colspan="5" rowspan="1">&nbsp;</td>
            </tr>


            </tbody>
            </tbody>

        </table>

    </td>
</tr>