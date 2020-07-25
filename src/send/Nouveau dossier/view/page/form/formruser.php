

<form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
	<input type="hidden"  value="<?php echo $iduser;?>" name="cacher" />
<div class="row">


	<input type="hidden" class="form-control" name="statut" value="user" />
	<div class="col-xs-12 col-lg-6" >
        <div class="row">
            <div class="col-xm-12">
            <div class="thumbnail" style="width: 95%; margin-left: 5%;border-radius:30px 0px 30px 0px;box-shadow: 10px 10px 5px grey;">
                <div class="form-group" >
                    <div class="col-xs-12">
                        <input type="file" id="id-input-file-3" name="img" />
                        <input type="hidden"  name="oldimg"  value="..." />
                        <input id="origine" type="hidden" value="?file=page/user" name="origine">

                    </div>
                </div>
                <div class="caption">
                    <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">


                            <div class="space-6"></div>
                            <p> - </p>


                            <fieldset >

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
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Née le
</div>
<div class="col-sm-9">

    <a href="javascript:void(0)" data-toggle="tooltip" title="date de naissance">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" name="daten" />
															<i class="ace-icon fa fa-birthday-cake"></i>

														</span>
    </a>
</div>
														</span>
                                </label>


                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Genre
</div>
<div class="col-sm-9">
    <a href="javascript:void(0)" data-toggle="tooltip" title="genre">
        <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="sexe" required>
            <option ></option>
            <option value="HOMME">HOMME</option>
            <option value="FEMME">FEMME</option>
        </select>
    </a>
</div>
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
        </div>
	</div>

	<div class="col-xs-12 col-lg-6">
		<div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">


			<div class="space-6"></div>
			<p style=" color: white;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;">INFORMATION D'EMBAUCHE: </p>


					<fieldset>


                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-2">
    Date
</div>
<div class="col-sm-10">
    <a href="javascript:void(0)" data-toggle="tooltip" title="date d'embauche ">
														<span class="block input-icon input-icon-right">
															<input type="date" class="form-control" name="datem" />
															<i class="ace-icon fa fa-calendar"></i>

														</span>
    </a>

</div>
														</span>
                        </label>
					<label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-2">
	Poste
</div>
<div class="col-sm-10">

<?php
                     include 'view/page/form/formposte.php';
                    ?>
						
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
														<span class="block input-icon input-icon-right">
															<input type="texte" class="form-control" placeholder="adresse" name="adress" />
															<i class="ace-icon fa fa-map-marker "></i>
														</span>
					</label>

                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" name="email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
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




