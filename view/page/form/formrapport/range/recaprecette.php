
                <?php
                $tt=0;
                $vnt='facture';
                $charge='CHARGES';

					/*echo $chaine;
                  $chaine=TEST_RANGE_FAM_ACTIVE($vnt,$datedeb,$date);
                $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI` in ('.$chaine.')');
                $countref = $resref->num_rows;*/
                $countref = $famdb->listefamactive('facture',$date);
              //  echo count($countref);echo '<hr>';

                if($listefamily > 0) {$i=0;
                foreach( $listefamily as $row ) {
                    if($row['IDFA']!='' && $row['IDFA']!=0 && strtolower($row['DESI'])!='caisse') {

                        extract($row);
                  /* print_r($row['IDFA']);
                    echo '<br>';/*/
                    $ttb=0;
                    $vnt='facture';
                /* echo   $take='SELECT * FROM etat_compte WHERE IDFA='.$IDFA.' and DATEE BETWEEN "'.$datedeb.'" AND "'.$date.'"';
                 echo '<hr/>';*/
                    $facture= new Facture();
                    $result = $facture->sumMtsbyfam($row['IDFA'],$vnt,$datedeb,$date);
                     //print_r($result);
                     //   echo '<br>';


                        if($result['GAIN']>0) {

                            $tabdesig[]=$DESI;
                            $tabidfag[]=$IDFA;
                            $tabgain[]=$result['GAIN'];
                            $tthtgain=$tthtgain+$result['GAIN'];
                        }else{

                            $tabdesig[]='';
                            $tabidfag[]=$IDFA;
                            $tabgain[]='';
                        }

                    /* foreach( $result as $etat) {
                        //print_r($etat);echo '<hr/>';
                         if($etat['GAINS']>0) {


                            $ttb=$ttb+$etat['GAINS'];
                        }
                    }*/


                        $cpt++;}


            //SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1

                    }

                }

            ?>

            