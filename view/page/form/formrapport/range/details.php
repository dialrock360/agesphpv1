<tr>
    <td>
        <table border="1" cellpadding="1" cellspacing="1" style="width:1000px">
            <tbody>
            <tr>
                <td colspan="4">
                    <h1 style="text-align: center;"><u><strong><span style="color:#0000FF">&nbsp;Details des flux</span></strong></u></h1>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">&nbsp;<strong>DATE</strong></td>
                <td style="text-align: center;"><strong>RECETTE</strong></td>
                <td style="text-align: center;"><strong>DEPENSE</strong></td>
                <td style="text-align: center;"><strong>LIBELLE</strong></td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>

            <?php
            $countref = $etatcmptls;
            if($countref > 0) {
                $i = 0;
                $cptf = 0;

                foreach( $countref as $row ) {

                    extract($row);
                    $tables = $etatcmptdb->getBarcaisseVetat($DATEE);
                    $tmpolistefamilyName = array();
                    // print_r($row);
                    //  echo '<hr>';
                    foreach( $tables as $rows ) {
                        // print_r($rows);
                        // echo '<hr>';

                        ?>
                        <tr>
                            <?php
                            $date=date_create($rows['DATEE']);
                            ?>
                            <td ><?php echo date_format($date,"d M");?></td>
                            <td style="text-align: right;"><strong><?php echo $rows['GAINS'];?></td>
                            <td style="text-align: right;"><strong><?php echo $rows['DEPENSE'];?></td>
                            <td style="text-align: left;"><?php echo Show_FAref('nom',$rows['IDFA']);?></td>
                        </tr>
                        <?php
                        $caissev= $rows['STOCK'];
                    }

                    ?>









                    <tr>
                        <td style="text-align: right;"><span style="color:#B22222"><strong><?php echo $DATEE;?></strong></span></td>
                        <td style="text-align: right;"><span style="color:#B22222"><strong><?php echo $GAINS;?></strong></span></td>
                        <td style="text-align: right;"><strong><span style="color:#B22222"><?php echo $DEPENSE;?></span></strong></td>
                        <?php $difv= $GAINS-$DEPENSE;?>
                        <td style="text-align: right;">
                            <?php if($difv > 0) {
                                ?>
                                <strong>D.I Journ&eacute;e: <span style="color:#008000"><?php echo $difv;?></span></strong>

                            <?php } ?>
                            <?php if($difv < 0) {
                                ?>
                                <strong>D.I Journ&eacute;e: <span style="color:#B22222"><?php echo $difv;?></span></strong>

                            <?php } ?>

                            <strong> || Caisse Veille: <span style="color:#0000ff"><?php echo $STOCK;?></span></strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">_________________________________________________________________________________________________________________________________________________________</td>
                    </tr>




                    <?php
                }
            }
            ?>


            </tbody>
        </table>

    </td>
</tr>