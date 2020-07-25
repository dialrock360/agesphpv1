<tr>
    <td colspan="6">
        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px">
            <tbody>
            <tr>
                <td colspan="8" style="text-align: center;">
                    <h1><span style="font-size:36px"><span style="font-family:times new roman,times,serif"><strong><span style="color:rgb(255, 255, 0)"><span style="background-color:rgb(0, 0, 0)">FICHE RECAPITULATIVE</span></span></strong></span></span>
                </td>
            </tr>
            <tr>
                <td colspan="8" style="text-align: center;">
                    <table border="1" cellpadding="1" cellspacing="1" style="width:800px">
                        <thead>
                        <tr>
                            <th colspan="2" scope="col">
                                <h3><strong>RECETTES</strong></h3>
                            </th>
                            <th colspan="2" scope="col"> <h3><strong>DEPENSES</strong></h3> </th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        for($i=0;$i<Count_Fam();$i++)
                        {
                            ?>

                            <tr>

                                <td style="text-align: left;"><strong><?php echo   $tabdesig[$i];   ?></strong></td>
                                <td style="text-align: left;"> <h2><?php echo   $tabg[$i];$ttcg=$ttcg+$tabg[$i];?></h2> </td>

                                <td style="text-align: left;"><strong><?php echo   $tabdesid[$i];?></strong></td>
                                <td style="text-align: left;"> <h2><?php echo   $tabd[$i]; $ttcd=$ttcd+$tabd[$i];?></h2> </td>
                                <?php
                                //$ttd=$ttd+$tabd;
                                $ttg=$ttg+$tabg[$i];
                                ?>
                            </tr>
                        <?php  }; ?>
                        <tr>
                            <td colspan="4" style="text-align: left;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: left;"><strong>Total Recette</strong></td>
                            <td><?php echo   $ttcg;   ?>&nbsp;</td>
                            <td style="text-align: left;"><strong>Total D&eacute;pense</strong></td>
                            <td><?php echo   $ttcd;   ?>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h3><span style="color:rgb(47, 79, 79)"><strong>Total Des Entrées</strong></span></h3>
                </td>
                <td colspan="4" style="text-align: center;">
                    <h3><span style="font-size:16px"><span style="font-family:comic sans ms,cursive"><span style="color:rgb(0, 128, 0)"><?php echo   convertir($ttcg);   ?>&nbsp;</span></span></span></h3>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h3><span style="color:rgb(128, 0, 0)"><strong>Total Des Sorties</strong></span></h3>
                </td>
                <td colspan="4" style="text-align: center;">
                    <h3><span style="font-size:16px"><span style="font-family:comic sans ms,cursive"><span style="color:rgb(255, 0, 0)"><?php echo   convertir($ttcd);   ?>&nbsp;</span></span></span></h3>
                </td>
            </tr>
            <tr>
                <td colspan="6" rowspan="1">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1"><span style="color:rgb(0, 0, 0)"><strong>DIFFERENSE R-D</strong></span></td>
                <td>
                    <h2><span style="color:rgb(0, 0, 128)"><?php echo   $difttc=$ttcg- $ttcd;?></span></h2>
                </td>
                <td>
                    <h3><span style="color:rgb(255, 255, 255)"><span style="font-family:comic sans ms,cursive"><span style="background-color:rgb(0, 0, 0)"><?php echo   convertir($difttc);?>   </span></span></span></h3>
                </td>
            </tr>
            <tr> <td colspan="3">&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td> <td>&nbsp;</td> </tr>
            <tr>
                <td colspan="3" rowspan="1"><span style="color:rgb(0, 0, 128)"><strong>D&eacute;tails Suplementaires</strong></span></td>
                <td><span style="color:rgb(0, 0, 128)"><strong>Caisse veille</strong></span></td>
                <td><span style="color:rgb(0, 0, 128)"><strong>TOTAL FACTURE SDE</strong></span></td>
                <td><span style="color:rgb(0, 0, 128)"><strong>TOTAL FACTURE SENELEC</strong></span></td>
            </tr>
            <tr>
                <td colspan="3">&nbsp;</td>
                <td>
                    <h3 style="text-align: center;"><strong><?php echo   Show_caiseveil($date);?></strong></h3>
                </td>
                <td> <p>&nbsp;</p> </td>
                <td> <p>&nbsp;</p> </td>
            </tr>
            </tbody>
        </table>
    </td>
</tr>