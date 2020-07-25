<tr>
    <td colspan="5">

        <table border="1" cellpadding="1" cellspacing="1" style="width:800px">
            <tbody>
            <tr>
                <td colspan="5">
                    <p style="text-align: center;"><span style="color:#4B0082"><span style="font-size:28px"><em><u><strong>FICHE RECAPITULATIVE</strong></u></em></span></span></p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">&nbsp;</td>
                <td colspan="2" style="text-align: center;"><span style="color:#008000"><span style="font-size:14px"><strong>RECETTES</strong></span></span></td>
                <td colspan="2" style="text-align: center;"><span style="font-size:14px"><strong><span style="color:#B22222">DEPENSES</span></strong></span></td>
            </tr>
            <tr>
                <td><span style="color:#000000"><strong>CATEGORIES</strong></span></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <?php




            if(count($lstabfamily) > 0) {
                $i = 0;
                $cptf = 0;
                $ttdep=$ttgain=0;
                foreach( $lstabfamily as $family ) {
                    // print_r($row['DESI']);
                    // echo '<hr>';
                    ?>
                    <tr>
                        <td><h4><strong><?php echo $family['desi'];?></strong></h4></td>
                        <td colspan="2"  style="text-align: center;"><?php $ttgain+=$family['gain']; echo $family['gain'];?></td>
                        <td colspan="2"  style="text-align: center;"><?php  $ttdep+=$family['dep'];  echo $family['dep'];?></td>
                    </tr>

                    <?php
                }


            }
            ?>



            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>TOTAL</strong></td>
                <td colspan="2" style="text-align: right;"><span style="color:#008000"><span style="font-size:16px"><strong><?php echo $ttgain;?></strong></span></span></td>
                <td colspan="2" style="text-align: right;"><span style="color:#FF0000"><span style="font-size:16px"><strong><?php echo $ttdep;?></strong></span></span></td>
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>CAISSE DE VEILLE</strong></td>
                <td colspan="4" rowspan="1" style="text-align: right;"><span style="color:#4B0082"><strong><span style="font-size:18px"><?php echo $csv; $tdi=($csv+$ttgain)-$ttdep;?></span></strong></span></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="4" style="text-align: right;">&nbsp;</td>
            </tr>
            <tr>
                <td><strong>DIFFERENCE&nbsp;</strong></td>
                <td colspan="4" rowspan="1" style="text-align: right;"><span style="color:#FF0000"><strong><span style="font-size:20px">

                                                        <?php if($tdi > 0) {
                                                            ?>
                                                            <strong>  <span style="color:#008000"><?php echo $tdi;?></span></strong>

                                                        <?php } ?>
                                <?php if($tdi < 0) {
                                    ?>
                                    <strong>  <span style="color:#B22222"><?php echo $tdi;?></span></strong>

                                <?php } ?>

                                                    </span></strong></span></td>
            </tr>
            </tbody>
        </table>

    </td>
</tr>
