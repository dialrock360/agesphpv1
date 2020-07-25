<tr>


    <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <tbody> <tr> <td colspan="5" style="text-align:center">

                    <h1><span style="font-family:times new roman,times,serif"><strong><span style="color:rgb(255, 255, 255)"><span style="background-color:rgb(0, 0, 0)">FICHE DES DEPENSES</span></span></strong></span></h1>
                </td> </tr>




            <tr>
                <?php
                $tt=0;
                $vnt='recu';
                $charge='CHARGES';


                  $chaine=TEST_RANGE_FAM_ACTIVE($vnt,$datedeb,$date);
                $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI` in ('.$chaine.')');
                $countref = $resref->num_rows;
                if($countref > 0) {

                for($i=0;$i<$countref;$i++) {
                $row = $resref->fetch_array();
                extract($row);

                ?>
            <tr> <td colspan="5" style="text-align:center">
                    <h2><span style="color:<?php echo $COLOR;?>;">DEPENSES DE

                            <?php
                            echo ' '.$DESI;

                            $tabdesid[$i]=$DESI;
                            ?>

                                                </span></h2> </td> </tr>
            <tr>
                <td> <h3><strong>Date</strong></h3> </td>
                <td> <h3><strong>Montant</strong></h3> </td>
            </tr>

            <?php
            $ttb=0;
            $vnt='facture';
            //SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
            $take='SELECT * FROM etat_compte WHERE IDFA='.$IDFA.' and DATEE BETWEEN "'.$datedeb.'" AND "'.$date.'"';
            if($result=$base->query($take))
            {



                while($ligne=mysqli_fetch_array($result)) {
                    if($ligne['DEPENSE']>0) {

                        ?>

                        <tr>
                            <td colspan="2"><?php echo dateconverter($ligne['DATEE']); ?></td>
                            <td style="text-align: right;"><span style="font-size:16px"><strong><?php echo $ligne['DEPENSE']; ?></strong></span></td>
                        </tr>
                        <?php
                        $ttb=$ttb+$ligne['DEPENSE'];
                    }}}
            ?>
            <tr> <td> <h3><strong>Total AUBERGE</strong></h3>
                </td> <td>
                    <h3 style="text-align: center;"><strong><span style="color:rgb(0, 255, 255)"><span style="background-color:rgb(0, 0, 0)"><?php echo ' '.convertir($ttb).' '; $tabd[$i]=$ttb;?></span></span></strong></h3>
                </td> <td>
                    <h2 style="text-align: right;"><span style="font-family:times new roman,times,serif"><span style="color:rgb(255, 255, 255)"><strong><span style="background-color:rgb(0, 0, 0)"><?php echo $ttb;?></span></strong></span></span></h2>
                    <h2>&nbsp;</h2> </td>
            </tr>
            <tr> <td colspan="3" rowspan="1">&nbsp;</td> </tr>
            <?php





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











