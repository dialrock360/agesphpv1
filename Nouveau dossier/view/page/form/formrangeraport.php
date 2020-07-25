

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
          <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px">


              <tbody>
                  <tr>
                    <td>
                        <table align="center" border="1" cellpadding="1" cellspacing="1" style="width:800px">
                              <tbody>
                                   <tbody>
								   
                                 <?php
								  require_once "recaprecette.php";
								  require_once "recapdepense.php";
								  require_once "ficherecap.php";
								  ?>
                             <?php
                             $idcaisse=Show_Caisse("id");
                             require_once "ficherecette.php";
                             ?>
                             <?php
                             require_once "fichedepense.php";
                             ?>

                         


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
