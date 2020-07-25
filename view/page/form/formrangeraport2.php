

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


                                <div class="widget-header">
                                    <h4 class="widget-title">
                                        <h5> Bilan de travail de la Journée du <strong><?php echo $date;
                                                
                                                ?></strong></h5>
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
          <h1><u><span style="color:#000080"><em style="text-align: center; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 2px darkblue;">RAPPORT DU <strong><?php echo dateconverter($datedeb);?></strong> au <strong><?php echo dateconverter($date);?></strong></em> </span></u></h1> <p>&nbsp;</p>
          <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px">


              <tbody>
                  <tr>
                    <td>
                        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px">
                              <tbody>
                                   <tbody>

                          <tr>


                          <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <tbody> <tr> <td colspan="5" style="text-align:center"> <h2><span style=" color: black;text-shadow: 1px 1px 2px white, 0 0 25px blue, 0 0 5px white;">FICHE DES RECETTES</span></h2> </td> </tr>




                                  <tr>
                                       <?php
                                       $tt=0;
                                       $vnt='facture';
                                       $charge='CHARGES';

                                       $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 and  `DESI`!="'.$charge.'"');
                                       $countref = $resref->num_rows;
                                       if($countref > 0) {

                                       for($i=0;$i<$countref;$i++) {
                                       $row = $resref->fetch_array();
                                       extract($row);

                                       ?>
                                              <tr> <td colspan="5" style="text-align:center">
                                                      <h2><span style="color:<?php echo $COLOR;?>;">RECETTE

                                                              <?php
                                                              echo ' '.$DESI;



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

                                          ?>

                                          <tr>
                                                          <td><?php echo dateconverter($ligne['DATEE']); ?></td>
                                                          <td><?php echo $ligne['GAINS']; ?></td>
                                          </tr>
                                          <?php
                                          $ttb=$ttb+$ligne['GAINS'];
                                      }}
                                  ?>
                                  <tr>
                                                <td> <h3><strong>Total</strong></h3>
                                                  </td> <td><strong STYLE="color: #0000ff;"><?php echo $ttb;?></strong></td>
                                              </tr>
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

                          <tr>


                          <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <tbody> <tr> <td colspan="5" style="text-align:center"> <h2><span style=" color: black;text-shadow: 1px 1px 2px white, 0 0 25px blue, 0 0 5px white;">FICHE DES DEPENSES</span></h2> </td> </tr>




                                  <tr>
                                       <?php
                                       $tt=0;
                                       $vnt2='recu';
                                       $resref = $MySQLiconn->query('SELECT * FROM FAMILLE WHERE FLAG=0 ');
                                       $countref = $resref->num_rows;
                                       if($countref > 0) {

                                       for($i=0;$i<$countref;$i++) {
                                       $row = $resref->fetch_array();
                                       extract($row);

                                       ?>
                                              <tr> <td colspan="5" style="text-align:center">
                                                      <h2><span style="color:<?php echo $COLOR;?>;">

                                                              <?php
                                                              echo ' '.$DESI;



                                                              ?>

                                                </span></h2> </td> </tr>
                                              <tr>

                                                  <td> <h3><strong>Date</strong></h3> </td>
                                                  <td> <h3><strong>Montant</strong></h3> </td>
                                              </tr>

                                  <?php
                                  $ttb=0;
                                  //SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
                                  $take='SELECT * FROM etat_compte WHERE IDFA='.$IDFA.' and DATEE BETWEEN "'.$datedeb.'" AND "'.$date.'"';
                                  if($result=$base->query($take))
                                  {

                                      while($ligne=mysqli_fetch_array($result)) {

                                          extract($ligne);
                                          ?>

                                          <tr>
                                                          <td><?php echo dateconverter($ligne['DATEE']); ?></td>
                                                          <td><?php echo $ligne['DEPENSE']; ?></td>
                                          </tr>
                                          <?php
                                          $ttb=$ttb+$ligne['DEPENSE'];
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


                                  }
                                  }
                                  ?>

                                  <tr>
                              <td colspan="5" rowspan="1">&nbsp;</td>
                          </tr>

 <tr> <td colspan="5"> <p>&nbsp;</p> <p>&nbsp;</p> </td> </tr> <tr> <td colspan="5">

                                              <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:700px"> <tbody> <tr> <td colspan="5" style="text-align:center"> <h1><strong><span style="color:#FFFF00"><span style="background-color:rgb(0, 0, 0)">FICHE RECAPITULATIVE</span></span></strong></h1> </td> </tr> <tr> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>RECETTES</strong></h3> </td> <td colspan="2" rowspan="1" style="text-align:center"> <h3><strong>DEPENSES</strong></h3> </td> <td style="text-align:center"> <h3><strong></strong></h3> </td> </tr>
                                                  <?php

                                                  //SELECT * FROM etat_compte WHERE IDFA=1 and DATEE BETWEEN "2018-05-01" AND "2018-05-16" GROUP BY `IDFA`
                                                  // SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
                                                  $db2 = new Db();
                                                  $Query='SELECT * FROM etat_compte WHERE DATEE BETWEEN "'.$datedeb.'" AND "'.$date.'" GROUP BY `IDFA`';
                                                  //get users from database
                                                  $tables = $db2->getspecificQuery($Query);

                                                  //get status message from session
                                                  if(!empty($sessData['status']['msg'])){
                                                      $statusMsg = $sessData['status']['msg'];
                                                      $statusMsgType = $sessData['status']['type'];
                                                      unset($_SESSION['sessData']['status']);
                                                  }
                                                  ?>
                                                  <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>

                                                      <tr>
                                                          <td> <h4><strong><?php echo  Show_FAref('nom',$IDFA);?></strong></h4> </td> <td><?php echo $GAINS;?></td>
                                                          <td> <h4><strong><?php echo Show_FAref('nom',$IDFA);;?></strong></h4> </td> <td><?php echo $DEPENSE;?></td>

                                                          <?php
                                                          $ttd=$ttd+$DEPENSE;
                                                          $ttg=$ttg+$GAINS;
                                                          ?>
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
                                                      <td><strong>Total Recette</strong></td>
                                                      <td><strong STYLE="color: #0000ff;"><?php echo $ttg;?></strong></td>
                                                      <td><strong>Total D&eacute;pense</strong></td>
                                                      <td><strong STYLE="color: #0000ff;"><?php  ECHO $ttd;//echo $depfi; ?></strong></td>
                                                      <td colspan="2">  <strong style="text-align: center;">D.I</strong> <?php echo $di=($ttg-$ttd)+Get_fond();?> </td>
                                                  </tr>

                                                  <tr>
                                                      <td colspan="4"> <p>&nbsp;</p> <p>&nbsp;</p> </td>
                                                      <td colspan="2"> <h2><span style="color:#FF0033;"><?php
                                                              $conclusion=($di>=0)? '<span style="color:#0099FF;"> Bénefice de '.$di.'</span>' : '<span style="color:#FF0033;"> Perte de '.($di*-1).'</span>';
                                                              echo $conclusion;?></h2> <p>&nbsp;</p> </td>
                                                  </tr>

                                                  <tr>
                                                      <td colspan="3" rowspan="1"><strong>D&eacute;tails Suplementaires</strong></td>
                                                      <td><strong>Caisse veille</strong></td>
                                                      <td><strong>Index SDE</strong></td>
                                                      <td><strong>Index SENELEC</strong></td>
                                                  </tr>

                                                  <tr>
                                                      <td colspan="3">&nbsp;</td>
                                                      <td><h3>&nbsp;<?php echo $VSTOCK;?></h3></td>
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
