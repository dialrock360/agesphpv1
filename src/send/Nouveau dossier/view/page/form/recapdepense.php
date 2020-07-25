
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
 $tabdesid[$i]=$DESI;
                ?>
          

            <?php
            $ttb=0;
            $vnt='facture';
            //SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
            $take='SELECT * FROM etat_compte WHERE IDFA='.$IDFA.' and DATEE BETWEEN "'.$datedeb.'" AND "'.$date.'"';
            if($result=$base->query($take))
            {



                while($ligne=mysqli_fetch_array($result)) {
                    if($ligne['DEPENSE']>0) {
                       $ttb=$ttb+$ligne['DEPENSE'];
         
                        
                    }}}
					
           $tabd[$i]=$ttb;



            }
            }
            ?>

       











