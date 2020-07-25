
<p style="margin-left:40px; text-align:right"><strong><?php echo date('l jS \of F Y h:i:s A'); ?></strong></p>

<p style="margin-left:40px">&nbsp;</p>

<address>
    <strong><?php $val='nom';  echo Service_info($val);?></strong><br>
    Phone:   <?php $val='tel';  echo Service_info($val);?><br>
    Email:   <?php $val='email';  echo Service_info($val);?>
</address>

<p>&nbsp;</p>


<h1 style="text-align: center;"><u><span style="color:#000080"><em style="text-align: center; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 2px darkblue;">RAPPORT DU <strong><?php echo dateconverter($datedeb);?></strong> au <strong><?php echo dateconverter($date);?></strong></em> </span></u></h1> <p>&nbsp;</p>

<p>&nbsp;</p>

<div>
    <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:900px">
        <tbody>
        <tr>
            <td>
                <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px">
                    <tbody>
                    </tbody>
                    <tbody>
                    <tr>
                        <td colspan="5">


                            <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:600px">
                                <tbody>
                                <tr>
                                    <td colspan="5" rowspan="1">
                                        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px">
                                            <tbody>
                                            <?
                                            $familledb = new Famille();
                                            $recmtsDEPENSE=$recmtsGAINS=$recmtsSTOCK=0 ;
                                            $listefamilyName=array();
                                            $lstabfamily =array();
                                            $tabfamily =array();
                                            $Idfamcaisse = Show_FAref('id','CAISSE');
                                            $etatcmptls = $etatcmptdb->rangeliste($datedeb,$date,$Idfamcaisse);
                                            $listefamilyName = $familledb->listefamily();
                                            $csv= end($etatcmptls)['STOCK'];

                                            foreach( $listefamilyName as $family ) {
                                                $tabfamily =array();
                                                $tabfamily['idfa']=$family['IDFA'];
                                                $tabfamily['desi']=$family['DESI'];
                                                $dep=$gain=0;
                                                if($etatcmptls > 0) {
                                                    foreach( $etatcmptls as $etatcmpt ) {
                                                        $tables = $etatcmptdb->getBarcaisseVetat($etatcmpt['DATEE']);
                                                        foreach( $tables as $etat ) {
                                                            if($etat['IDFA'] == $family['IDFA']) {
                                                                $dep+=$etat['DEPENSE'];
                                                                $gain+=$etat['GAINS'];
                                                                //echo $etat['GAINS'].' => '.$gain.'<hr>';
                                                            }
                                                        }

                                                    }
                                                }

                                                $tabfamily['dep']=$dep;
                                                $tabfamily['gain']=$gain;

                                                //   echo '<hr><hr><hr>';
                                                $lstabfamily[]=$tabfamily;
                                            }

                                            require_once 'recap.php';

                                            ?>






                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" rowspan="1">&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">

                            <?php
                            require_once 'details.php';

                            ?>

                        </td>
                    </tr>
                    </tbody>
                </table>
                &nbsp;

                <p>&nbsp;</p>

                <p style="text-align:center">Fait &agrave; Sendou le <strong>mardi 28 avril 2020</strong></p>

                <p style="text-align:center">par<br />
                    Mr/Mme. <strong>Martine ( TINA) Mback Yem</strong></p>

                <p>&nbsp;</p>

                <div>
                    <p>&nbsp;</p>

                    <p style="text-align:center"><strong>AUBERGE DE SENDOU</strong> / <strong>NINEA</strong>: 0047759802E1 / <strong>TEL</strong>: 00221338361819 / <strong>EMAIL</strong>: senauberge@gmail.com</p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>









































