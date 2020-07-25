


<form action="modeluser.php" method="post" enctype="multipart/form-data" >
	<input type="hidden"  value="<?php echo $log;?>" name="cacher" />
<div class="row">
	
	<div class="col-xs-12 col-lg-6">
		<div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">


			<div class="space-6"></div>
			<p> IDENTIFICATION: </p>


				<fieldset>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
															<i class="ace-icon fa fa-camera"></i>
														</span>
					</label>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="prenom" name="prenom" required/>
															<i class="ace-icon fa fa-font"></i>
														</span>
					</label>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="nom" name="nom" required/>
															<i class="ace-icon fa fa-bold"></i>
														</span>
					</label>

					<label class="block clearfix">
						   <a href="javascript:void(0)" data-toggle="tooltip" title="date de naissance">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" name="daten" />
															<i class="ace-icon fa fa-calendar"></i>

														</span>
							   </a>
					</label>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="cni ou passeport"  name="cni" required/>
															<i class="ace-icon fa fa-barcode"></i>
														</span>
					</label>



				</fieldset>

		</div>
	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->
</span>
		</div>
	</div>

	<div class="col-xs-12 col-lg-6">
		<div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">


			<div class="space-6"></div>
			<p>INFORMATION D'EMBAUCHE: </p>


					<fieldset>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
	Poste
</div>
<div class="col-sm-9">

						   <a href="javascript:void(0)" data-toggle="tooltip" title="Poste">
							   <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="poste" required>
						<option value=""></option>
						<option value="BARMAID">BARMAID</option>
						<option value="CUISINIER">CUISINIER</option>
						<option value="CUISINIERE">CUISINIERE</option>
						<option value="DIRECTREUR">DIRECTREUR</option>
						<option value="DIRECTRICE">DIRECTRICE</option>
						<option value="GARDIEN">GARDIEN</option>
						<option value="MENAGERE">MENAGERE</option>
						<option value="HOTESSE">HOTESSE</option>
						<option value="PATRON">PATRON</option>
						<option value="SERVEUR">SERVEUR</option>
						<option value="SERVEUSE">SERVEUSE</option>
					</select>
							   </a>
</div>
														</span>
					</label>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="number" class="form-control" placeholder="salaire" name="salaire" />
															<i class="ace-icon fa fa-money"></i>
														</span>
					</label>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="tel" class="form-control" placeholder="numero de telephone" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
					</label>
						<label class="block clearfix">
						   <a href="javascript:void(0)" data-toggle="tooltip" title="date d'embauche ">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" name="datem" />
															<i class="ace-icon fa fa-calendar"></i>

														</span>
							   </a>
					</label>
						<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="texte" class="form-control" placeholder="adresse" name="adress" />
															<i class="ace-icon fa fa-map-marker "></i>
														</span>
					</label>

				</fieldset>

		</div>
	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->
</span>
		</div>
	</div>
</div>

	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<div class="row">
			<div class="col-xs-12">
				<div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">


			<div class="space-6"></div>
			<p> ACTIVATION DE COMPTE UTILISATEUR :<strong>  <small>Facultatif</small></strong> </p>

			<fieldset>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
					</label>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="login"  name="login"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
					</label>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="mot de passe" name="passe" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
					</label>

					<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="repeter mot de passe" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
					</label>




				</fieldset>
		</div>

	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->
			</span>
				</div>
			</div>
		</div>

	</div>
	<div class="space-24"></div>

	<div class="clearfix">
		<button type="reset" class="width-30 pull-left btn btn-sm">
			<i class="ace-icon fa fa-refresh"></i>
			<span class="bigger-110">Annuler</span>
		</button>

		<button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="btnsave">
			<span class="bigger-110">Valider</span>

			<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
		</button>
	</div>
</form>
<!--

<form action="modeluser.php" method="post" enctype="multipart/form-data" >
	<input type="hidden"  value="<?php //echo $log;?>" name="cacher" />

	<div class="modal-body no-padding">



		<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
			<thead>
			<tr>
				<th>IDENTIFIER</th>
				<th>EMPLOYER </th>

			</tr>
			</thead>
			<tbody>
			<tr>

				<td>

					<label for="form-field-select-2">Prenom *</label><br/>
					<input type="text" class="form-control" placeholder="PRENOM"  name="prenom" required /><br/>
					<label for="form-field-select-3">Nom *</label><br/>
					<input type="text" class="form-control"  placeholder="NOM"   name="nom" required/><br/>
					<label for="form-field-select-4">Nee le:</label><br/>
					<div class="input-group">

						<input class="form-control date-picker" id="id-date-picker-4" type="text" data-date-format="dd-mm-yyyy" name="daten" required/>
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
					</div>
					<div>
						<label for="form-field-select-1">Sexe *</label>

						<select class="form-control" id="form-field-select-1" name="sexe" required>
							<option value=""></option>
							<option value="HOMME">HOMME</option>
							<option value="FEMME">FEMME</option>
						</select>
					</div>

				</td>

				<td>
					<label for="form-field-select-1">POSTE *</label>
					<select class="form-control" id="form-field-select-1" name="poste" required>
						<option value=""></option>
						<option value="BARMAID">BARMAID</option>
						<option value="CUISINIER">CUISINIER</option>
						<option value="CUISINIERE">CUISINIERE</option>
						<option value="DIRECTREUR">DIRECTREUR</option>
						<option value="DIRECTRICE">DIRECTRICE</option>
						<option value="GARDIEN">GARDIEN</option>
						<option value="MENAGERE">MENAGERE</option>
						<option value="PATRON">PATRON</option>
						<option value="SERVEUR">SERVEUR</option>
						<option value="SERVEUSE">SERVEUSE</option>
					</select>
					<br/>
					<label for="form-field-select-1">SALAIRE </label><br/>
					<input type="number" class="form-control"  placeholder="0000"  name="salaire"/>
					<br/>
					<label for="form-field-select-1">TEL *</label><br/>
					<input type="tel" class="form-control"  placeholder="77777777"  name="tel" required/>
					<br/>
					<label for="form-field-select-1">DATE D'EMBAUCHE</label><br/>
					<div class="input-group">

						<input class="form-control date-picker" id="id-date-picker-5" type="text" data-date-format="dd-mm-yyyy" name="datem" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
					</div>

					<br/>
					<label for="form-field-select-1">ADRESSE *</label><br/>
					<input type="text" class="form-control"  placeholder="ADRESSE"  name="adress" required/>

				</td>
				<td>
					<div class="widget-box">
						<div class="widget-header">
							<h4 class="widget-title">
								COMPTE </h4>
							(facultatif)

													<span class="widget-toolbar">

														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</span>
						</div>

						<div class="widget-body">
							<div class="widget-main">

								<label for="form-field-select-1">LOGIN</label><br/>
								<input type="text" class="form-control" placeholder="LOGIN"  name="login" /><br/>
								<label for="form-field-select-1">MOT DE PASSE</label><br/>
								<input type="password" class="form-control"  name="passe" />
								<br/>
								<label for="form-field-select-1">CONFIRMER PASSE</label><br/>
								<input type="password" class="form-control"  name="cpasse" />
								<br/>
								<label for="form-field-select-1">EMAIL</label><br/>
								<input type="email" class="form-control"  placeholder="EMAIL@.com" name="email" />

							</div>
						</div>
					</div>

				</td>



			</tr>
			<tr>
				<td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
						<label for="cni">CNI:</label>
						<input type="text" class="form-small"  placeholder="CNI"   name="cni" required/>

						<span class="glyphicon glyphicon-save btn-success "></span> &nbsp; Valider
					</button>

				</td>

			</tr>
			</tbody>

		</table>





	</div>



</form>

-->




