

<style>
    #Afour{
        display: none;
    }
</style>




<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>




            <form >

                <div class="panel panel-warning">
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="alert alert-info">

                            <div class="widget-box">

                                fac
                                <div class="widget-header">
                                    <h4 class="widget-title">
                                        <h5> Bilan de travail de la Journée du <strong><?php echo dateconverter($date);?></strong></h5>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <textarea name="conten"  required>
                                            <p style="margin-left:40px; text-align:right">
                                                <strong><?php echo $fdate;?></strong>
                                            </p> <div>
                                                <p style="margin-left:40px">
                                                <address>
                                                    <strong><?php $val='nom';  echo Service_info($val);?></strong><br>
                                                    Phone:   <?php $val='tel';  echo Service_info($val);?><br>
                                                    Email:   <?php $val='email';  echo Service_info($val);?>
                                                </address>
                                                </p>
                                                <h1><u><span style="color:#000080"><strong style="text-align: center; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 2px darkblue;">RAPPORT DU <?php echo dateconverter($date);?></strong></span></u></h1> <p>&nbsp;</p>
                                                <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:900px">


                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px">
                                                                <tbody>
                                                                <tbody>

                                                                <tr>


                                                                    <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px"> <tbody> <tr> <td colspan="5" style="text-align:center">

                                                                                    <h2><span style="color:rgb(255, 255, 255)"><span style="font-family:times new roman,times,serif"><strong><span style="background-color:rgb(0, 0, 0)">FICHE DES RECETTES</span></strong></span></span></h2>



                                                                                </td> </tr>




                                                                            <tr>
                                                                                <?php
                                                                                $tt=0;
                                                                                $vnt='facture';
                                                                                $charge='CHARGES';
                                                                                // $chaine=TEST_FAM_ACTIVE($vnt,$date);

                                                                                //$chaine = $famdb->listenamesfamactive('facture',$date);
                                                                                //$resref ='SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI` in ('.$chaine.')';
                                                                                // $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI` not in ("'.$charge.'","'.$patron.'")');
                                                                                $countref = $famdb->listefamactive('facture',$date);

                                                                                if($countref != null) {
                                                                                $i=0;
                                                                                foreach($countref as $row ) {
                                                                                extract($row);
                                                                                if($NOMF != '') {
                                                                                ?>
                                                                            <tr>
                                                                                <td colspan="5" style="text-align:center">
                                                                                    <h2><span style="color:<?php echo $COLOR;?>"><span style="background-color:rgb(105, 105, 105)">RECETTE
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
                                                                                $take=$facdb->listefactureactive($IDFA,$vnt,$date);
                                                                                if($take != null)
                                                                                {
                                                                                $y=0;

                                                                                foreach($take as $ligne ) {

                                                                                extract($ligne);
                                                                                ?>

                                                                            <tr>
                                                                                <td><?php echo $DESI; ?></td>
                                                                                <td><?php  echo $NOMC;?></td>
                                                                                <td><?php echo $PU;?></td>
                                                                                <td><?php echo $QNT;?></td>
                                                                                <td><strong><?php echo $MTS;
                                                                                        $tabid[$y]=$IDP;
                                                                                        $tabqntV[$y]=$QNT;
                                                                                        $tabqntT[$y]=$QNTSTK;
                                                                                        ?></strong></td>





                                                                                <td style="text-align: right;"><span style="color:rgb(255, 0, 0)"><span style="font-size:22px"><strong><span style="font-family:georgia,serif"><?php  echo  $etastkdb->getEstkbyfacture($IDF)['QNT_AV']; ?></span></strong></span></span>&nbsp; &nbsp;</td>
                                                                                <td style="text-align: right;"><span style="color:rgb(0, 0, 255)"><span style="font-size:24px"><strong><?php  echo  $etastkdb->getEstkbyfacture($IDF)['QNT_APR']; ?></strong></span></span></td>




                                                                            </tr>
                                                                            <?php
                                                                            $ttb=$ttb+$MTS;
                                                                            $y++;
                                                                            }
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

                                                                                ?>
                                                                            <tr>
                                                                                <td colspan="5" style="text-align:center"> <h2><span style="color:<?php echo $COLOR;?>"><span style="background-color:rgb(105, 105, 105)">
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

                                                                                <?php if($catdb->getcatcmptabilisable($IDFA) >0){  ?>

                                                                                    <td> <h3><strong>Stock Avant-ACHAT&nbsp;&nbsp;</strong></h3> </td> <td> <h3><strong>Stock Apres-ACHAT</strong></h3> </td>
                                                                                <?php } ?>

                                                                            </tr>

                                                                            <?php
                                                                            $ttb=0;
                                                                            //SELECT `IDF`, `idmvf`, `idpf`, `PU`, `QNT`, `MTS`, `ROW`, `FDESI`, `FCONDIS`,
                                                                            // `IDMV`, `idumv`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`,
                                                                            // `flagm`, `IDP`, `idcp`, `idcatp`, `libele`, `PHOTO`, `PRIXA`, `PRIXV`, `qnti`, `FTECH`, `flagp`,
                                                                            // `IDC`, `NOMC`, `FLAG`,
                                                                            // `ID_CAT`, `idfamille`, `NOM_CAT`, `ACHAT`, `VENTE`, `COMPT`, `flagct`,
                                                                            // `IDFA`, `DESI`, `COLOR`, `flagfa` FROM `v_facture` WHERE 1
                                                                            //$take='SELECT * FROM v_facture WHERE IDFA='.$IDFA.'  AND 	NOMMV="'.$vnt2.' " AND 	DATE_DEL="'.$date.' "';
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
                                                                            }
                                                                            }
                                                                            ?>

                                                                            <tr>
                                                                                <td colspan="5" rowspan="1">&nbsp;</td>
                                                                            </tr>

                                                                            <tr> <td colspan="5"> <p>&nbsp;</p> <p>&nbsp;</p> </td> </tr> <tr> <td colspan="5">

                                                                                    <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px"> <tbody> <tr> <td colspan="5" style="text-align:center"> <h1><strong><span style="color:#FFFF00"><span style="background-color:rgb(0, 0, 0)">FICHE RECAPITULATIVE</span></span></strong></h1> </td> </tr> <tr> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>RECETTES</strong></h3> </td> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>DEPENSES</strong></h3> </td> <td style="text-align:center"> <h3><strong></strong></h3> </td> </tr>
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


                                                                            <tr> <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px"> <tbody>
                                                                                        <tr> <td colspan="5" style="text-align:center">
                                                                                                <h2><span style="color:rgb(0, 255, 255)"><span style="background-color:rgb(0, 0, 0)">FICHE DES STOCK</span></span></h2>

                                                                                            </td> </tr>

                                                                                        <tr>
                                                                                            <th> <h3><strong>D&eacute;signation</strong></h3> </th>
                                                                                            <th> <h3><strong>Conditionnement</strong></h3> </th>
                                                                                            <th> <h3><strong>Prix Unitaire</strong></h3> </th>
                                                                                            <th> <h3><strong>Quantit&eacute;</strong></h3> </th>
                                                                                        </tr>

                                                                                        <?php

                                                                                        $aht='recu';
                                                                                        $ttd=0;
                                                                                        //SELECT `idc`, `nomc`, `desi`, `img`, `idp`, `idcp`, `pxa`, `pxv`, `qnt`, `flag`, `idcat`, `idfam`, `nomcat`, `achat`, `vente`, `COMPT`, `idfa`, `fdesi`, `COLOR` FROM `v_prd_details` WHERE 1
                                                                                        $take= $prddb->listeprdstk();
                                                                                        if($take!=null)
                                                                                        {

                                                                                            foreach($take as $ligne2) {

                                                                                                extract($ligne2);

                                                                                                if($QNT>0)
                                                                                                {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><?php  echo $DESI; ?></td>
                                                                                                        <td><?php  echo $NOMC  ; ?></td>
                                                                                                        <td><?php echo $PRIXA;?></td>
                                                                                                        <td><?php echo $QNT;?></td>


                                                                                                    </tr>
                                                                                                    <?php

                                                                                                    $ttd=$ttd+$MTS;
                                                                                                }
                                                                                            }}
                                                                                        ?>
                                                                                        <tr> <td colspan="5" style="text-align:center">
                                                                                                <h2><span style="color:rgb(204, 51, 0)"><span style="background-color:rgb(184, 184, 184)">PRODUITS EN RUPTURES DE STOCK</span></span></h2>

                                                                                            </td> </tr>
                                                                                        <tr>
                                                                                            <td> <h3><strong>D&eacute;signation</strong></h3> </td>
                                                                                            <td> <h3><strong>Conditionnement</strong></h3> </td>
                                                                                            <td> <h3><strong>Prix Unitaire</strong></h3> </td>
                                                                                            <td> <h3><strong>Quantit&eacute;</strong></h3> </td>
                                                                                        </tr>
                                                                                        <?php

                                                                                        if($take!=null)
                                                                                        {

                                                                                            foreach($take as $ligne2) {

                                                                                                extract($ligne2);

                                                                                                if($QNT<=0)
                                                                                                {
                                                                                                    ?>
                                                                                                    <tr>
                                                                                                        <td><span style="color:rgb(204, 51, 0)"><?php  echo $DESI; ?></span></td>
                                                                                                        <td><?php  echo $NOMC  ; ?></td>
                                                                                                        <td><?php echo $PRIXA;?></td>
                                                                                                        <td><span style="color:rgb(204, 51, 0)"><?php echo $QNT;?></span></td>


                                                                                                    </tr>
                                                                                                    <?php

                                                                                                }
                                                                                            }}
                                                                                        ?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>




                                                                            </tbody>
                                                                            </tbody>

                                                                        </table>

                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>

                                                            &nbsp; <p>&nbsp;</p> <p style="text-align:center">Fait à Sendou le <strong><?php echo dateconverter($fdate);?></strong> </p>

                                                            <p style="text-align:center">par <br> Mr/Mme. <strong><?php echo $prenomuser.' '.$nomser;?></strong></p>
                                            </div>
                                            <p>&nbsp;</p>
                                            <div>
                                                <p>&nbsp;</p> <p style="text-align:center">
                                                    <strong style="color: red;"><?php $val='nom';  echo Service_info($val);?></strong> / <strong><small>NINEA</small></strong>:   <?php $val='cni';  echo Service_info($val);?> / <strong><small>TEL</small></strong>:   <?php $val='tel';  echo Service_info($val);?> / <strong><small>EMAIL</small></strong>:   <?php $val='email';  echo Service_info($val);?>
                                                </p>
                                            </div>
                                        </textarea >
                                        <script language="JavaScript" type="text/javascript">

                                            CKEDITOR.replace( 'conten', {
                                                toolbar : 'Standard',
                                                uiColor: '#E8F3FF',
                                                height:500,

                                            });
                                        </script>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>




















