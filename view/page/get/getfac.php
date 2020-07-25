<?php

$dburl='../../../model/DB.php';
require_once '../../../classes/classeinclude.php';
require_once '../../../model/include.php';
require_once '../../../model/DB.php';
require_once '../../../assets/web/rooting.php';

//error_reporting(0);
function getfactoperator($sql,$sqltype='get',$returntype='all'){

    $db = new DB();
    $ret =($sqltype='get')? $db->getspecificQuery($sql,$returntype):$db->updatespecificQuery($sql);

    return   $ret;
}

function setselect($nommv){
 $prddb = new Produit();
$optionfacprd  = $prddb->optionProduit('fac');
$optioncmpprd  = $prddb->optionProduit('cmp');
if($nommv=='recu'){
$optionfacprd  = $prddb->optionProduit('rec');
$optioncmpprd  = $prddb->optionProduit('charge');
}

    $ret ='';
	                                    $ret .='<td>';
                                             $ret .='<a href="#"   onClick="getLine()"   class="preview" title="Ajouter des Produits  Commerciaux"><i class="glyphicon glyphicon-plus icon-large"></i></a>';

                                             $ret .='<select multiple class="chosen-select form-control" class="chosen" data-placeholder="Produits Commerciaux"  id="uid" style="width:70%;">';
                                                $ret .=$optionfacprd;
                                             $ret .='</select>';

                                         $ret .='</td>';
                                         $ret .='<td>';
                                             $ret .='<a href="#"   onClick="getCLine()"   class="preview" title="Ajouter des Produits Industriels ou services"><i class="glyphicon glyphicon-plus icon-large"></i></a>';

                                             $ret .='<select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produits Industriels "  id="room" style="width:70%;">';
                                                $ret .=$optioncmpprd;
                                             $ret .='</select>';

                                         $ret .='</td>';

    return   $ret;
}
function feuillecal($MV,$nommv){
    extract($MV);
    ?>
    <div class="table-responsive table-bordered">
        <table class="table">
            <thead id="titleCalcul"  >
            <tr>
                <th>Designation</th>
                <th>Conditionement</th>
                <th>Prix unitaire</th>
                <th>Quantite</th>
                <th>Montant</th>
                <th ><span id="manligneCalcul2" ></span> <!--<a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>-->
                </th>
            </tr>
            </thead>
            <tbody id="manligneCalcul" style="clear:both">
            <?php
            //SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
            //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
            $take='SELECT * FROM v_facture WHERE IDMV="'.$IDMV.'"';
            $countref=getfactoperator($take, 'get', 'all');
            $i=0;
            if($countref != null)
            {
                extract($countref);
                foreach($countref as $ligne)
                {

                    extract($ligne);
                    $desig=($nommv=='facture' || $nommv=='recu')?$DESI:$FDESI;
                    $condist=($nommv=='facture' || $nommv=='recu')?$NOMC:$FCONDIS;

                    ?>


                    <tr>
                        <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php echo  $desig;?>" style="text-align:left;" class="form-control"/><input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Idp_<?php echo $i;?>" value="<?php echo $IDP; ?>"/><input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="<?php echo $IDF; ?>"/><input type="hidden" name="row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" value="<?php echo $i;?>"/></td>
                        <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php echo  $condist;?>" style="text-align:left;" class="form-control" /></td>
                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PU;?>" style="text-align:right;" class="form-control"/></td>
                        <td><input type="number" step="0.5" min="0" max="<?php echo  ($NOMMV=='facture')?$qntstk:'';?>" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="<?php echo $QNT;?>"  style="text-align:right;" class="form-control" /></td>
                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="<?php echo $MTS;?>" style="text-align:right;" class="form-control" /></td>
                        <td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine(<?php echo $i;?>)"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>

                    </tr>
                    <?php
                    $i=$i+1;
                }
            }
            ?>
            </tbody>


            <tfoot>
            <tr>
<?php
 echo  setselect($nommv);
 ?>
               

			  <td>
                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Total HT : </label>

                        <div class="col-sm-7">
                            <input type="text" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />
                        </div>
                    </div>

                </td>
                <td>
                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> TVA (%) : </label>

                        <div class="col-sm-7">
                            <input type="text" id="valTVA_stand" value="0" name="totalht" class="form-control"  />
                        </div>
                    </div>
                </td>


            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input name="ligne"   type="hidden" id="ligne" value="" /></td>
                <td>
                    <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                </td>
                <td></td>
            </tr>
            <tr>

                <td colspan="4">

                    <div class="alert alert-info">
                        <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" value="<?php echo $TVA;?>" required/>
                        <div class="form-group">
                            <input name="lettr" type="text" id="lettrSTAND" value="<?php echo $MTSLTR;?>" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required/>


                        </div>
                        <input name="number"   type="hidden" value="" id="lignenombre" />
                    </div>
                </td>

                <td colspan="2">

                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Total TTC : </label>

                        <div class="col-sm-8">
                            <input type="text" id="valTotalTTC_stand" value="<?php echo $MTSCH;?>"  name="totalttc"   class="form-control"  readonly required />
                        </div>
                    </div>
                </td>
            </tr>
            <tr>

                <td colspan="4">
                    <div class="form-group input-group">

                        <span class="input-group-addon "> Avance</span>
                        <input class="form-control" id="Avance"  name="avance" value="<?php echo $AVANS;?>" onChange="calcul2()"  />
                        <span class="input-group-addon ">Reste :</span>
                        <input class="form-control " id="Reste" value="<?php echo $RESTE;?>" name="reste"  readonly/>

                    </div>
                </td>

                <td colspan="2">
                    <div class="form-group">
                        <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Mode de Payement </label>

                        <div class="col-sm-5">
                            <select  name="reg" class="col-xs-8 col-sm-8"  required>
                                <option value="<?php echo $REG;?>"  checked ><?php echo $REG;?></option>

                                <option value="Esp&egrave;ce">Esp&egrave;ce</option>
                                <option value="Ch&egrave;que">Ch&egrave;que</option>
                                <option value="Mobil Money">Mobil Money</option>

                            </select>
                        </div>
                    </div>
                </td>

            </tr>

            </tfoot>


        </table>
    </div>
    <?php
}

$user='dial';



if (isset($_REQUEST['updatecaisse'])) {	
   $mts = intval($_REQUEST['mts']);
 $sql = updCaisse($mts);
    if($sql){
                $returnData='produit modifier avec success.';
    }else{
        $returnData='Problème de mise a jour essayer encore...';

        
    }

    echo $returnData;



}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////PRODUIT ETAT COMPTE////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////DYNAMIC DELETOR////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////DYNAMIC DELETOR////////////////////////////////////////////////////////////////////////////////////////

if (isset($_REQUEST['dltfac'])) {
     $factdb = new Facture();

    $idf = intval($_REQUEST['idf']);
    $idp = intval($_REQUEST['idp']);
    $idmv = intval($_REQUEST['idmv']);
   // $valNAME='nom'; $nommv=Show_Mvmref($valNAME,$idmv);

    $qnt = floatval($_REQUEST['qnt']);
    $mts = floatval($_REQUEST['mts']);



    $sql = $factdb->delFac($idf);




    if($sql>0){
       // echo $idf.' '.$idp.' '.$qnt.' '.$nommv.' '.$mts;
       echo "<i class=\"ace-icon glyphicon glyphicon-ok green\"></i>";
    }else{
        echo "<i class=\"ace-icon glyphicon  glyphicon-remove red\"></i>";
    }
}







////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////IMPRIMANTE////////////////////////////////////////////////////////////////////////////////////////





if (isset($_REQUEST['idpr'])) {
    $idpr = intval($_REQUEST['idpr']);
    $resref =  "SELECT * FROM mouvement WHERE IDMV='$idpr'" ;
      $countref=getfactoperator($resref, 'get', 'single');
    if($countref !=null)
    {

            extract($countref);
            if($NOMMV=='proforma'){
                ?>

                <div class="input-prepend">



		<textarea name="contenP">
			<div >

                <p><?php $val='nom';echo Service_info($val);?>.<br /> Phone: <?php $val='tel';echo Service_info($val);?><br /> Email: <?php $val='email';echo Service_info($val);?></p> <p style="text-align:right">
                    <strong>Date</strong> :&nbsp;<u> <?php
                        $sdate = new DateTime();
                        $fdate = $sdate->format('d-m-Y');
                        echo $fdate;
                        ?></u><br />
                    <strong>Client</strong> : <?php $val='nom';echo User_info($val,$IDU);?><br /> Phone: <?php $val='tel';echo User_info($val,$IDU);?><br /> &agrave; Email: <?php $val='email';echo User_info($val,$IDU);?></p> <p style="text-align: center;">FACTURE PROFORMA N&deg; <strong><?php echo 'F'.$IDMV.'-'.date('m').''.date('W');?></strong></p>
                <table align="center" border="1" cellpadding="1" cellspacing="1" dir="ltr" style="width:500px">
                    <thead> <tr> <th scope="col">Designation</th> <th scope="col">Emballage</th> <th scope="col">PU</th> <th scope="col">Quantit&eacute;</th> <th scope="col">PT</th> </tr> </thead>
                    <tbody>
                    <?php
                    //SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
                    //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
                    $take='SELECT * FROM facture WHERE IDMV="'.$IDMV.'"';

               
                   $countref=getfactoperator($take, 'get', 'all');
                if($countref != null)  
                    {

                          foreach($countref as $ligne)
                        {

                            extract($ligne);
                            ?>

                            <tr>
                                <td><a href="#"><?php echo $FDESI; ?></a>                                                            </td>
                                <td><?php echo $FCONDIS; ?></td>
                                <td><?php echo $PU; ?></td>
                                <td><?php echo $QNT; ?></td>
                                <td><?php echo $MTS; ?></td>
                            </tr>

                        <?php
                        }}
                    ?>
                    <tr><td colspan="4" rowspan="1" style="text-align: right;">Total</td> <td><?php echo $MTSCH;?></td> </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p> <p style="text-align: center;">TOTAL H.T.V.A. : <?php echo $MTSCH;?><br /> T.V.A.: <?php echo $MTSCH;?><br /> NET A PAYER : <?php echo $MTSCH;?></p>
                <p><strong><u>Conditions</u></strong></p>
                <p>
                    <?php echo $CONTEN;?>
                </p>
                <p style="text-align: right;"><strong>Le fournisseur</strong></p> <p>&nbsp;</p>
            </div>
		</textarea>
                    <script language="JavaScript" type="text/javascript">

                        CKEDITOR.replace( 'contenP', {
                            toolbar : 'Standard',
                            uiColor: '#E8F3FF',
                            height:500,

                        });
                    </script>
                </div>


            <?php

            }
            if($NOMMV=='demande'){
                ?>

                <div class="input-prepend">



		<textarea name="contenD">
			<?php echo $CONTEN;?>
		</textarea>
                    <script language="JavaScript" type="text/javascript">

                        CKEDITOR.replace( 'contenD', {
                            toolbar : 'Standard',
                            uiColor: '#E8F3FF',
                            height:500,

                        });
                    </script>
                </div>


            <?php

            }
            if($NOMMV=='facture' || $NOMMV=='recu'){
                ?>

                <section class="invoice">
                    <div class="row">
                        <div class="col-xs-12">
                            <img src="assets/images/avatars/<?php $val='logo';  echo Service_info($val);?>"class="fa" alt="<?php $val='nom';  echo Service_info($val);?>" />

                            <h4><span class="red"><?php $val='nom';  echo Service_info($val);?></span></h4>
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="printepage.php?idmv=<?php echo $IDMV;?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimer</a>

                                </div>
                            </div>

                            <div class="row invoice-info">
                                <?php
                                if($NOMMV=='facture'){
                                    ?>

                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong><?php $val='nom';  echo Service_info($val);?></strong><br><br>
                                            Adresse :<?php $val='adres';  echo Service_info($val);?><br>
                                            NINEA:   <?php $val='cni';  echo Service_info($val);?><br>
                                            Phone:   <?php $val='tel';  echo Service_info($val);?><br>
                                            Email:   <?php $val='emeil';  echo Service_info($val);?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        Client
                                        <address>
                                            <strong><?php $val='nom'; echo User_info($val,$IDU);?></strong><br>
                                            Adresse:<?php $val='adres'; echo User_info($val,$IDU);?><br>
                                            Phone: <?php $val='tel'; echo User_info($val,$IDU);?><br>
                                            Email: <?php $val='email'; echo User_info($val,$IDU);?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b> Facture : <?php echo 'F'.$IDMV.'-'.date('m').''.date('W');?><br>
                                        </b><br>
                                        <br>
                                        <b>Date Du : </b> <?php echo $DATE_DEL;?><br>
                                        <b>Montant : </b> <?php echo $MTSCH;?><br>
                                        <b> <?php echo $MTSLTR;?></b>
                                    </div>
                                <?php
                                }
                                if( $NOMMV=='recu'){
                                    ?>
                                    <div class="col-sm-4 invoice-col">
                                        Fournisseur
                                        <address>
                                            <strong><?php $val='nom'; echo User_info($val,$IDU);?></strong><br>
                                            Adresse:<?php $val='adres'; echo User_info($val,$IDU);?><br>
                                            NINEA:   <?php $val='cni';  echo User_info($val,$IDU);?><br>
                                            Phone: <?php $val='tel'; echo User_info($val,$IDU);?><br>
                                            Email: <?php $val='email'; echo User_info($val,$IDU);?>
                                        </address>
                                    </div>

                                    <!-- /.col -->

                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong><?php $val='nom';  echo Service_info($val);?></strong><br><br>
                                            NINEA:   <?php $val='cni';  echo Service_info($val);?><br>
                                            Phone:   <?php $val='tel';  echo Service_info($val);?><br>
                                        </address>
                                    </div>
                                    <!-- /.col -->

                                    <div class="col-sm-4 invoice-col">
                                        <b> Reçu : <?php echo 'F'.$IDMV.'-'.date('m').''.date('W');?><br>
                                        </b><br>
                                        <br>
                                        <b>Date Du : </b> <?php echo $DATE_DEL;?><br>
                                        <b>Montant : </b> <?php echo $MTSCH;?><br>
                                        <b> <?php echo $MTSLTR;?></b>
                                    </div>
                                    <!-- /.col -->
                                <?php
                                }
                                ?>

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <span class="lbl">Produit</span>
                                                    </label>
                                                </th>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <span class="lbl">P.U</span>
                                                    </label>
                                                </th>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <span class="lbl">Qnt</span>
                                                    </label>
                                                </th>
                                                <th class="center">
                                                    <label class="pos-rel">
                                                        <span class="lbl">Mts</span>
                                                    </label>
                                                </th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $take='SELECT * FROM v_facture WHERE  IDMV="'.$IDMV.'"';
                                           $countref=getfactoperator($take, 'get', 'all');
                if($countref != null)  
                                            {

                                                  foreach($countref as $ligne) {

                                                    extract($ligne);
                                                    ?>
                                                    <tr>
                                                        <td><?php $val='desi';echo $DESI; ?></td>
                                                        <td><?php  echo $NOMC;
                                                            ?></td>
                                                        <td><?php echo $QNT;?></td>
                                                        <td><?php echo $MTS;?></td>
                                                    </tr>
                                                <?php
                                                }}
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        <p class="lead">
                                            <?php
                                            if ($RESTE==0){
                                                echo 'Payer Comptant !';
                                            }else{
                                                echo 'Anance'.$AVANS.'<br/>';
                                                echo 'Reste'.$RESTE.'<br/>';
                                            }

                                            ?>

                                        </p>

                                        Methode de Payement :<b> <?php echo $REG;?></b>

                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                        </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                        <p class="lead">Fait le
                                            <?php
                                            $sdate = new DateTime();
                                            $fdate = $sdate->format('d-m-Y');
                                            echo $fdate;
                                            ?>
                                        </p>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Total Ht:</th>
                                                    <td><?php echo $TOTALHT.' f' ;?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tva</th>
                                                    <td><?php echo $TVA.' f' ;?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Httc:</th>
                                                    <td><?php echo $MTSCH.' f';?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->

                            </div>
                        </div>
                    </div>
                </section>
            <?php
            }



    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_REQUEST['idpf'])) {

    ?>
    <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >
        <?php
        //SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `mouvement` WHERE 1

        $id = intval($_REQUEST['idpf']);


        $query = "SELECT * FROM mouvement WHERE IDMV= ".$id;

        $countref=prdoperator($query, 'get', 'single');
        extract($countref);
        ?>
        <input type="hidden" name="nom" id="nom" value="<?php $val='nom'; echo User_info($val,$IDU);?>"    >
        <input type="hidden" name="cni" id="cni" value="<?php $val='cni'; echo User_info($val,$IDU);?>"    >
        <input type="hidden" name="tel" id="tel" value="<?php $val='tel'; echo User_info($val,$IDU);?>"    >
        <input type="hidden" name="cacher" id="cacher" value="<?php  echo $CACHER;?>"    >
        <input type="hidden" name="statut" id="statut" value="<?php $val='statut'; echo User_info($val,$IDU);?>"    >
        <input type="hidden" name="option" id="option" value="1"    >
        <input type="hidden" name="conten" id="option" value="..."    >
        <?php
        $i=0;
        if($NOMMV=='facture'){
            ?>


            <div class="row">

                <input type="hidden" name="type" id="type" value="facture"   required >
                <input type="hidden" name="conten" id="conten" value=" "    >

                <div class="col-sm-3">


                </div>
                <div class="col-sm-9">
                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">FACTURE N&deg;
	<input type="text" name="idF" value="<?php  echo $IDMV;?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                    </h4>
                    <div class="widget-body">
                        <div class="widget-main">
                            <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px">
                                <tbody>
                                <tr>
                                    <th scope="row">Date:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" value="<?php  echo $DATE_DEL;?>" name="date" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Client:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 <select class="chosen-select form-control" class="chosen" name="idacom" style="border: none;" required>
<?php Select_Cliref($IDU);?>
<?php  Select_Cli();?>
					</select>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Objet:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" value="<?php  echo $OBJET;?>" name="objet" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:ghostwhite;">

                            <?php feuillecal($countref,$NOMMV); ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php


        }
        if($NOMMV=='recu'){
            ?>


            <div class="row">

                <input type="hidden" name="type" id="type" value="recu"   required >
                <input type="hidden" name="conten" id="conten" value=" "    >

                <div class="col-sm-3">


                </div>
                <div class="col-sm-9">
                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">RECU N&deg;
	<input type="text" name="idF" value="<?php  echo $IDMV;?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                    </h4>
                    <div class="widget-body">
                        <div class="widget-main">
                            <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px">
                                <tbody>
                                <tr>
                                    <th scope="row">Date:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" value="<?php  echo $DATE_DEL;?>" name="date" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Fournisseur:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 <select class="chosen-select form-control" class="chosen" name="idacom" style="border: none;" required>
<?php Select_Fourref($IDU);?>
<?php  Select_Four();?>
					</select>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Objet:</th>
                                    <td>
                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" value="<?php  echo $OBJET;?>" name="objet" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12" style="background-color:ghostwhite;">
                            <?php feuillecal($countref,$NOMMV); ?>

                        </div>
                    </div>
                </div>
            </div>

            <?php


        }
        if($NOMMV=='proforma'){
            ?>


            <div class="row">

                <div class="widget-box">
                    <div class="widget-header">


													<span class="widget-toolbar">
														<a href="#" data-action="settings">
                                                            <i class="ace-icon fa fa-cog"></i>
                                                        </a>

														<a href="#" data-action="reload">
                                                            <i class="ace-icon fa fa-refresh"></i>
                                                        </a>

														<a href="#" data-action="collapse">
                                                            <i class="ace-icon fa fa-chevron-up"></i>
                                                        </a>

													</span>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">

                                <input type="hidden" name="type" value="proforma"   required >
                                <input type="hidden" name="conten" id="conten" value=" "    >

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="input-group-addon fpro">Condition</span>


                                        <div >
                                                                <textarea style="width: 100%;" name="contenMP" class="wysiwyg-editor" id="editor1">
                                                                   <?php     //$cont = htmlspecialchars_decode($CONTEN);
                                                                   echo $CONTEN;?>
                                                                </textarea>
                                            <script language="JavaScript" type="text/javascript">

                                                CKEDITOR.replace( 'contenMP', {
                                                    toolbar : 'Basic',
                                                    uiColor: '#E8F3FF',
                                                    height:200,

                                                });
                                            </script>


                                        </div>
                                    </div>

                                </div>
                                <div class="col	-sm-5">
                                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">FACTURE N&deg;
    <input type="text" name="idF" value="<?php  echo $IDMV;?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                                    </h4>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Date:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" value="<?php  echo $DATE_DEL;?>" name="date" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Client:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 <select class="chosen-select form-control" class="chosen" name="idacom" style="border: none;" required>
                                                                 <?php Select_Cliref($IDU);?>
                                                                 <?php  Select_Cli();?>
                                                             </select>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Objet:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" value="<?php  echo $OBJET;?>" name="objet" style="border: none;" required/>
															<i class="ace-icon fa  fa-comment"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12" style="background-color:ghostwhite;">

                            <?php feuillecal($countref,$NOMMV); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php


        }
        if($NOMMV=='demande'){

            ?>


            <div class="row">

                <div class="widget-box">
                    <div class="widget-header">


													<span class="widget-toolbar">
														<a href="#" data-action="settings">
                                                            <i class="ace-icon fa fa-cog"></i>
                                                        </a>

														<a href="#" data-action="reload">
                                                            <i class="ace-icon fa fa-refresh"></i>
                                                        </a>

														<a href="#" data-action="collapse">
                                                            <i class="ace-icon fa fa-chevron-up"></i>
                                                        </a>

													</span>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="row">

                                <input type="hidden" name="type" value="demande"   required >


                                <div class="col	-sm-5">
                                    <h4 class="widget-title">

<span class="add-on" style=" font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;">FACTURE N&deg;
    <input type="text" name="idF" value="<?php  echo $IDMV;?>" id="INCREMENT"  readonly="true" style="width:30%;opacity:0.5; height:10px;" >
                                    </h4>
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Date:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" value="<?php  echo $DATE_DEL;?>" name="date" style="border: none;" required/>
															<i class="ace-icon fa fa-calendar"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Client:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															 <select class="chosen-select form-control" class="chosen" name="idacom" style="border: none;" required>
                                                                 <?php Select_Cliref($IDU);?>
                                                                 <?php  Select_Cli();?>
                                                             </select>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Objet:</th>
                                                    <td>
                                                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" value="<?php  echo $OBJET;?>" name="objet" style="border: none;" required/>
															<i class="ace-icon fa  fa-comment"></i>
														</span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="container-fluid">
                    <div class="row">
                        <div class="input-prepend">



		<textarea name="contenM">
			<?php echo $CONTEN;?>
		</textarea>
                            <script language="JavaScript" type="text/javascript">

                                CKEDITOR.replace( 'contenM', {
                                    toolbar : 'Standard',
                                    uiColor: '#E8F3FF',
                                    height:500,

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>

            <?php


        }


        ?>
        <div class="clearfix">
            <button type="button" class="width-30 pull-left btn btn-sm" data-dismiss="modal">
                <i class="ace-icon fa fa-refresh"></i>
                <span class="bigger-110">Fermer</span>
            </button>

            <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="update" value="Enregistrer" onClick="monCalcul()">
                <span class="bigger-110">Enregistrer</span>

                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
            </button>
        </div>
    </form>
    <?php

}







?>
