
<tr>
    <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px"> <tbody>
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

