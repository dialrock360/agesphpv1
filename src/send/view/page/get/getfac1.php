<?php
require_once '../../model/bd.php';
require_once '../../model/functionsTest.php';
require_once '../../model/functionsPrd.php';
require_once '../../model/functionsfac.php';
require_once '../../model/functionsuser.php';
require_once "../../model/functions.php";

//error_reporting(0);



$user='dial';



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////IMPRIMANTE////////////////////////////////////////////////////////////////////////////////////////





if (isset($_REQUEST['idpr'])) {
    $idpr = intval($_REQUEST['idpr']);
    $resref = $MySQLiconn->query("SELECT * FROM MOUVEMENT WHERE IDMV='$idpr'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        if($row=$resref->fetch_array())
        {
            extract($row);
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
                    $take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
                    if($result=$base->query($take))
                    {

                        while($ligne=mysqli_fetch_array($result))
                        {

                            extract($ligne);
                            ?>

                            <tr>
                                <td>
                                    <a href="#"><?php echo $FDESI; ?></a>                                                            </td>
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
                                            $take='SELECT * FROM FACTURE WHERE FLAG=0 AND IDMV="'.$IDMV.'"';
                                            if($result=$base->query($take))
                                            {

                                                while($ligne=mysqli_fetch_array($result)) {

                                                    extract($ligne);
                                                    ?>
                                                    <tr>
                                                        <td><?php $val='desi';echo Show_Prodref($val,$IDP); ?></td>
                                                        <td><?php echo $PU;?></td>
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
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_REQUEST['idp'])) {
//SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1

	$id = intval($_REQUEST['idp']);


	$query = "SELECT * FROM MOUVEMENT WHERE IDMV=:id";
	$stmt = $DBcon->prepare( $query );
	$stmt->execute(array(':id'=>$id));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);
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
							$take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
							if($result=$base->query($take))
							{

								while($ligne=mysqli_fetch_array($result))
								{

									extract($ligne);
									?>
									<input type="hidden" name="idm_<?php echo $i;?>" id="conten" value="<?php echo $IDF;?>"    >


                                    <tr>


                                        <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$IDP);  ?>" style="text-align:left;" class="form-control"/>
                                            <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Id_<?php echo $i;?>" value="<?php echo $IDP;?>"   required >
                                            <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="<?php echo $IDF;?>"   required >
                                            <input type="hidden" class="form-control" value="<?php echo $i;?>" name="Champ2Row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" />

                                        </td>
                                        <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($IDP);?>" style="text-align:left;" class="form-control" />
                                        </td>
                                        <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PU;?>" style="text-align:right;" class="form-control"/></td>
                                        <td><input type="number" min="1" max="<?php $val='qnt';echo Show_Prodref($val,$IDP);?>"  step="0.5" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="<?php echo $QNT;?>"  style="text-align:right;" class="form-control" /></td>
                                        <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="<?php echo $MTS;?>" style="text-align:right;" class="form-control" /></td>
                                        <td><input type="button" value="Suppr."  onclick="suprLinemd(<?php echo $i;?>)" class="INPUTFACT" /></td>
                                        </td>

                                    </tr>

									<?php
									$i=$i+1;
								}}
							?>
							<hr/>
							</tbody>


							<tfoot>
							<tr>

                                <td>
                                    <a href="#"   onClick="MgetLine()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                    <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produit "  id="uid" style="width:110%;">
                                        <optgroup label="BAR ET RESTAURATION"><?php    $val='facture';   Select_Prd($val);?></optgroup>
                                    </select>

                                </td>

                                <td>
                                    <a href="#"   onClick="getRoom()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                    <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Hébergements "  id="room" style="width:110%;"><option> </option><?php    $val='chambre';   Select_Prd($val);?></select>

                                </td>
								<td></td>
								<td></td>
								<td> Total HT :<input name="totalht" id="valTotalHT_stand" value="<?php echo $TOTALHT;?>" type="text"></td>
								<td>TVA (%) : <input  id="valTVA_stand" value="0" type="text"><label id="valTVALABEL" style="color: #FF0000;font-size:11px;"></td>



							</tr>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td><input name="ligne"   type="hidden" id="nbrl" /></td>
								<td><input onClick="monCalculmd()" style="margin-left:7px; width:136px; height:22px; text-align:center;" value="Calculer" type="button" id="BING" ></td>
								<td></td>
							</tr>
							<tr>

								<td colspan="3">


									<input name="number"   type="hidden" value="" id="lignenombre" />
								</td>
								<td>Valeur TVA :<input name="tva" type="text" id="valueTVARETURN2"    value="<?php echo $TVA;?>" readonly="true" required/></td>

								<td>Total TTC :<input name="totalttc" id="valTotalTTC_stand" value="<?php echo $MTSCH;?>" type="text"></td>
							</tr>
							<tr>

								<td colspan="4">
									<div class="form-group input-group">

										<span class="input-group-addon "> Avance</span>
										<input class="form-control" id="Avance"  name="avance" value="<?php echo $AVANS;?>" onChange="calcul2()"  />
										<span class="input-group-addon ">Reste :</span>
										<input class="form-control " id="Reste" value="<?php echo $RESTE;?>" name="reste" readonly/>

									</div>
								</td>

								<td>
									<select class="chosen" data-placeholder="Choix du Payement " name="reg" required>

										<option value="<?php echo $REG;?>"><?php echo $REG;?></option>
										<option value="Esp&egrave;ce">Esp&egrave;ce</option>
										<option value="Ch&egrave;que">Ch&egrave;que</option>
										<option value="Virement banquaire">Virement banquaire</option>

									</select>
								</td>
								<td></td>

							</tr>

							</tfoot>

						</table>
					</div>
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
								$take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
								if($result=$base->query($take))
								{

									while($ligne=mysqli_fetch_array($result))
									{

										extract($ligne);
										?>
										<input type="hidden" name="idm_<?php echo $i;?>" id="conten" value="<?php echo $IDF;?>"    >


                                        <tr>


                                            <td><input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php $val='desi';echo Show_Prodref($val,$IDP);  ?>" style="text-align:left;" class="form-control"/>
                                                <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Id_<?php echo $i;?>" value="<?php echo $IDP;?>"   required >
                                                <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="<?php echo $IDF;?>"   required >
                                                <input type="hidden" class="form-control" value="<?php echo $i;?>" name="Champ2Row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" />

                                            </td>
                                            <td><input type="text" name="condis_<?php echo $i;?>" id="Champ2Condis_<?php echo $i;?>" value="<?php SousSelect_Condisref($IDP);?>" style="text-align:left;" class="form-control" />
                                            </td>
                                            <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PU;?>" style="text-align:right;" class="form-control"/></td>
                                            <td><input type="number" step="0.01" min="0" max="" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="<?php echo $QNT;?>"  style="text-align:right;" class="form-control" /></td>
                                            <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="<?php echo $MTS;?>" style="text-align:right;" class="form-control" /></td>
                                            <td><input type="button" value="Suppr."  onclick="suprLinemd(<?php echo $i;?>)" class="INPUTFACT" /></td>


                                        </tr>

										<?php
										$i=$i+1;
									}}
								?>
								<hr/>
								</tbody>


								<tfoot>
								<tr>
									<td>

                                        <a href="#"   onClick="MgetLine()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

										<select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix du Produit "  id="uid" style="width: 110%;"><option> </option><?php    $val='rec';   Select_Prd($val);?></select>


									</td>

                                    <td>
                                        <a href="#"   onClick="MgetRoom()"   class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                        <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Hébergements "  id="room" style="width: 110%;" ><option> </option><?php    $val='charge';   Select_Prd($val);?></select>

                                    </td>
									<td></td>
									<td></td>
									<td> Total HT :<input name="totalht" id="valTotalHT_stand" value="<?php echo $TOTALHT;?>" type="text"></td>
									<td>TVA (%) : <input  id="valTVA_stand" value="0" type="text"><label id="valTVALABEL" style="color: #FF0000;font-size:11px;"></td>



								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><input name="ligne"   type="hidden" id="nbrl" /></td>
									<td><input onClick="monCalculmd()" style="margin-left:7px; width:136px; height:22px; text-align:center;" value="Calculer" type="button" id="BING" ></td>
									<td></td>
								</tr>
								<tr>

									<td colspan="3">


										<input name="number"   type="hidden" value="" id="lignenombre" />
									</td>
									<td>Valeur TVA :<input name="tva" type="text" id="valueTVARETURN2"    value="<?php echo $TVA;?>" readonly="true" required/></td>

									<td>Total TTC :<input name="totalttc" id="valTotalTTC_stand" value="<?php echo $MTSCH;?>" type="text"></td>
								</tr>
								<tr>

									<td colspan="4">
										<div class="form-group input-group">

											<span class="input-group-addon "> Avance</span>
											<input class="form-control" id="Avance"  name="avance" value="<?php echo $AVANS;?>" onChange="calcul2()"  />
											<span class="input-group-addon ">Reste :</span>
											<input class="form-control " id="Reste" value="<?php echo $RESTE;?>" name="reste" readonly/>

										</div>
									</td>

									<td>
										<select class="chosen" data-placeholder="Choix du Payement " name="reg" required>

											<option value="<?php echo $REG;?>"><?php echo $REG;?></option>
											<option value="Esp&egrave;ce">Esp&egrave;ce</option>
											<option value="Ch&egrave;que">Ch&egrave;que</option>
											<option value="Virement banquaire">Virement banquaire</option>

										</select>
									</td>
									<td></td>

								</tr>

								</tfoot>

							</table>
						</div>
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

                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <thead id="titleCalcul"  >
                                <tr>
                                    <th>Designation</th>
                                    <th>Conditionement</th>
                                    <th>P.U</th>
                                    <th>Qnte</th>
                                    <th>Montant</th>
                                    <th ><span id="manligneCalcul2" ></span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="manligneCalcul" style="clear:both">

                                <?php
                                //SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
                                //SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
                                $take='SELECT * FROM FACTURE WHERE FLAG=0 AND IDMV="'.$IDMV.'"';
                                if($result=$base->query($take))
                                {

                                    while($ligne=mysqli_fetch_array($result))
                                    {

                                        extract($ligne);
                                        ?>


                                        <tr>

                                            <td>
                                                <input type="text" name="nom_<?php echo $i;?>" id="Champ2Design_<?php echo $i;?>" value="<?php echo $FDESI;?>" style="text-align:left;" class="form-control" />
                                                <input type="hidden" name="idp_<?php echo $i;?>" id="Champ2Id_<?php echo $i;?>" value="0"   required >
                                                <input type="hidden" name="idfac_<?php echo $i;?>" id="Champ2Idf_<?php echo $i;?>" value="<?php echo $IDF;?>"   required >
                                                <input type="hidden" name="idfa_<?php echo $i;?>" id="Champ2Idfa_<?php echo $i;?>" value="0"   required >
                                                <input type="hidden" class="form-control" value="<?php echo $i;?>" name="Champ2Row_<?php echo $i;?>" id="Champ2Row_<?php echo $i;?>" />
                                            </td>
                                            <td><input type="text" name="condis_<?php echo $i;?>"id="Champ2Condis_<?php echo $i;?>" value="<?php echo $FCONDIS;?>" style="text-align:left;" class="form-control" /></td>
                                            <td><input type="text" name="prix_<?php echo $i;?>" id="Champ2TarifHT_<?php echo $i;?>" value="<?php echo $PU;?>"  style="text-align:right;" class="form-control" /></td>
                                            <td><input type="text" name="qnte_<?php echo $i;?>" id="Champ2Qte_<?php echo $i;?>" value="<?php echo $QNT;?>"  style="text-align:right;" class="form-control" /></td>
                                            <td><input type="text" name="ptotal_<?php echo $i;?>" id="Champ2Result_<?php echo $i;?>" value="<?php echo $MTS;?>" style="text-align:right;" class="form-control" /></td>
                                            <td>
                                                <input type="button" value="Suppr." onclick="suprLinemd(<?php echo $i;?>)" class="INPUTFACT" />
                                            </td>



                                        </tr>
                                        <?php
                                        $i=$i+1;
                                    }}
                                ?>
                                <hr/>
                                </tbody>


                                <tfoot>
                                <tr>
                                    <td>
                                        <input type="button" value="Ajouter" onclick="ajoutLine()" class="INPUTFACT" />
                                    </td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> Total HT :<input name="totalht" id="valTotalHT_stand" value="<?php  echo $TOTALHT;?>" type="text"></td>
                                    <td>TVA (%) : <input  id="valTVA_stand" value="<?php  echo $TVA;?>" type="text"><label id="valTVALABEL" style="color: #FF0000;font-size:11px;"></td>



                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><input name="ligne"   type="hidden" id="nbrl" value="<?php echo $i;?>"/></td></td>
                                    <td><input onClick="monCalcul()" class="btn btn-primary" value="Calculer" type="button" id="BING" ></td>
                                    <td></td>
                                </tr>
                                <tr>

                                    <td colspan="4">

                                        <div class="alert alert-info">
                                            <input name="tva" type="hidden" id="valueTVARETURN2"    readonly="true" />

                                            <input name="lettr" type="text" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " id="lettrSTAND" />
                                            <input name="number"   type="hidden" value="" id="lignenombre" />
                                        </div>
                                    </td>

                                    <td>Total TTC :<input name="totalttc" id="valTotalTTC_stand" value="<?php  echo $MTSCH;?>" type="text"></td>
                                    <td></td>
                                </tr>
                                <tr>

                                    <td colspan="4">
                                        <input type="hidden" name="avance" value="0"   required >
                                        <input type="hidden" name="reste" value="0"   required >


                                    </td>

                                    <td>
                                        <input type="hidden" name="reg" value="0"   required >

                                    </td>
                                    <td></td>

                                </tr>

                                </tfoot>

                            </table>
                        </div>
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

}




?>
