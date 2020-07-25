

<div class="widget-body">
    <div class="widget-main no-padding">
        <table class="table table-bordered table-striped">
            <thead class="thin-border-bottom">
            <tr>
                <th>
                    <i class="ace-icon fa fa-caret-right blue"></i>Noms
                </th>
                <th>
                    <i class="ace-icon fa fa-caret-right blue"></i>Qnt Articles
                </th>

                <th>
                    <i class="ace-icon fa fa-caret-right blue"></i>Depense
                </th>

                <th>
                    <i class="ace-icon fa fa-caret-right blue"></i>Ventes
                </th>

                <th colspan="2">
                    <i class="ace-icon fa fa-caret-right blue"></i>Taux
                </th>
                <th >
                </th>
            </tr>
            </thead>

            <tbody>
            <?php


            $take="SELECT * FROM FAMILLE WHERE DESI='CAISSE'";
            if($result1=$base->query($take))
            {

                if($ligne1=mysqli_fetch_array($result1))
                {
                    //$color = array("BLEU","#ROUGE", "#NOR","#JAUNE","#GRIE","#VERS");

                    $gainCS=$ligne1['GAINS'];
                    $depCS=$ligne1['DEPENSE'];

                    $take='SELECT * FROM FAMILLE WHERE FLAG=0 ORDER BY DESI';
                    $t=0;
                    $i=0;$x=0;$y=0;
                    if($result=$base->query($take))
                    {

                        while($ligne=mysqli_fetch_array($result))
                        {
                            $GAIN = $ligne['GAINS'];
                            $COLOR = $ligne['COLOR'];
                            $DESI = $ligne['DESI'];
                            $IDFA = $ligne['IDFA'];
                            $DEP = $ligne['DEPENSE'];
                            if ($gainCS!=0){


                                $t1=($GAIN*100)/$gainCS;
                                $t2=round($t1, 1);

                                $tdep=($DEP*100)/$depCS;
                                $t3=round($tdep, 1);

                            }else{
                                $t2=0;
                            }





                            ?>

                            <tr>
                                <td>
                                    <span class="label arrowed arrowed-right" style="background-color: <?php echo $COLOR;?>;"><?php echo $DESI;?></span>

                                </td>

                                <td>
                                    <b class="green"><?php ECHO Count_Art($IDFA) ;?></b>
                                </td>
                                <td>
                                    <b class="red"><?php

                                        $T='-';

                                        $annee=date('Y');
                                        $moi=01;
                                        $jour='01';
                                        $annee=date('Y');
                                        $dateD=$annee.''.$T.''.$moi.''.$T.''.$jour;

                                        $dateIS=$dateD;

                                        $moi=12;
                                        $jour='31';
                                        $dateF=$annee.''.$T.''.$moi.''.$T.''.$jour;
                                        $dateFS=$dateF;
                                        $facture='recu';
                                        echo Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA).' F';

                                        ?></b>

                                </td>
                                <td>
                                    <b class="blue"><?php

                                        $T='-';

                                        $annee=date('Y');
                                        $moi=01;
                                        $jour='01';
                                        $annee=date('Y');
                                        $dateD=$annee.''.$T.''.$moi.''.$T.''.$jour;

                                        $dateIS=$dateD;

                                        $moi=12;
                                        $jour='31';
                                        $dateF=$annee.''.$T.''.$moi.''.$T.''.$jour;
                                        $dateFS=$dateF;
                                        $facture='facture';
                                        echo Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA).' F';



                                        ?></b>

                                </td>

                                <td >
                                    <b class="red"><?php echo $t3.'%';?></b>
                                </td>
                                <td >
                                    <b class="blue"><?php echo $t2.'%';?></b>
                                </td>
                            </tr>

                            <?php
                            $i=$i+1;
                        }
                    }
                }
            }

            ?>


            </tbody>
        </table>
        <div class="hr hr8 hr-double"></div>

        <?php	CA();?>
    </div><!-- /.widget-main -->
</div><!-- /.widget-body -->