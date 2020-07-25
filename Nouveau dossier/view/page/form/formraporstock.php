

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
                                        <h5> Bilan de travail de la Journée du <strong><?php echo $date;?></strong></h5>
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
          <h1><u><span style="color:#000080"><strong style="text-align: center; color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 2px darkblue;">ETAT DES STOCK DU <?php echo dateconverter($date);?></strong></span></u></h1> <p>&nbsp;</p>
          <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px">


              <tbody>
                  <tr>
                    <td>
                        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px">
                              <tbody>
                                   <tbody>







                                     <tr>
                               <td colspan="5"> <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:1000px"> <tbody> <tr> <td colspan="5" style="text-align:center"> <h2><span style=" color: black;text-shadow: 1px 1px 2px white, 0 0 25px blue, 0 0 5px white;">STOCK</span></h2> </td> </tr>
                                       <?php

                                       //SELECT `idc`, `nomc`, `desi`, `img`, `idp`, `idcp`, `pxa`, `pxv`, `qnt`, `flag`,
                                       // `idcat`, `idfam`, `nomcat`, `achat`, `vente`, `COMPT`,
                                       // `idfa`, `fdesi`, `COLOR` FROM `v_prd_details` WHERE 1
                                       //load and initialize database class

                                       $db = new Db();
                                       $condition = array('flag' => 0,'achat' => 1,'COMPT' => 1);
                                       //get users from database
                                       $tables = $db->getRows('v_prd_details',array('where'=>$condition,'group_by'=>'idfam desc'));

                                       //get status message from session
                                       if(!empty($sessData['status']['msg'])){
                                           $statusMsg = $sessData['status']['msg'];
                                           $statusMsgType = $sessData['status']['type'];
                                           unset($_SESSION['sessData']['status']);
                                       }
                                       ?>
                                       <tr>
                                          <td> <h3><strong>D&eacute;signation</strong></h3> </td>
                                          <td> <h3><strong>Conditionnement</strong></h3> </td>
                                          <td> <h3><strong>Quantit&eacute;</strong></h3> </td>
                                      </tr>

                                       <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>

                                           <tr>
                                                  <td><?php $val='desi';echo Show_Prodref($val,$idp); ?></td>
                                                  <td><?php echo $nomc;?></td>
                                                  <td><?php echo $qnt;?></td>


                                              </tr>
                                           <?php  $count++; endforeach; else: ?>
                                           <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
                                       <?php endif; ?>

                                      </tbody>
                                  </table>
                              </td>
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
