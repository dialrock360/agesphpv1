
<?php

if ($doc== "four") {
	?>
    <div class="row">
        <div class="col-xs-12 col-lg-6">
            <form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
                <input type="hidden"  value="<?php echo $iduser;?>" name="cacher" />
                <input id="origine" type="hidden" value="?file=page/user" name="origine">

                <div class="row">
                    <div class="col-xs-12">
                        <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <input type="hidden" class="form-control  " value="FOURNISSEUR" name="poste" />
                            <input type="hidden" class="form-control" name="statut" value="four" />

                            <div >
                                <div class="table-header">
                                    NOUVEAU FOURNISSEUR
                                </div>
                            </div>


                            <fieldset>
                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
                                                                                    <input type="hidden"  name="oldimg"  value="..." />

															<i class="ace-icon fa fa-camera"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
																											<input type="text"  class="form-control" placeholder="nom complet"  name="nom" onkeyup="fourFunction()" ID="FOUR"  required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="NINEA, cni ou passeport"  name="cni"  />
															<i class="ace-icon fa fa-barcode"></i>
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
															<input type="tel" class="form-control" placeholder="numero de telephone" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                </label>


                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Nature
</div>
<div class="col-sm-9">

    <a href="javascript:void(0)" data-toggle="tooltip" title="Nature">
        <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="sexe" required>
            <option ></option>
            <option value="HOMME">HOMME</option>
            <option value="FEMME">FEMME</option>
            <option value="SOCIETE">SOCIETE</option>
        </select>
    </a>
</div>
														</span>
                                </label>

                            </fieldset>

                           	<input type="hidden" class="form-control" value="..." name="prenom" required/>
                            <input type="hidden" class="form-control" value="0" name="salaire" />
                            <input type="hidden" class="form-control" name="datem" value="<?php echo date("Y/m/d"); ?>" />

                            
                            <input type="hidden" class="form-control" value="..."  name="login"/>

                            <input type="hidden" class="form-control" value="..." name="passe" />
                            <input type="hidden" class="form-control" value="..." name="info" />

                            <input type="hidden" class="form-control" name="daten" value="<?php echo date("Y/m/d"); ?>" />

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Adresse email"  name="email"  />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                            </label>


                        </div>

                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
			</span>
                        </div>
                    </div>
                </div>

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

        </div>

        <div class="col-xs-12 col-lg-6">
            <?php
            include 'tableusers.php';
            ?>
        </div>
    </div>



<?php
}

if ($doc== "cli") {
	?>
    <div class="row">
        <div class="col-xs-12 col-lg-6">

            <form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
                <input type="hidden"  value="<?php echo $iduser;?>" name="cacher" />
                <input id="origine" type="hidden" value="?file=page/user" name="origine">

                <div class="row">
                    <div class="col-xs-12">
                        <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <input type="hidden" class="form-control  " value="FOURNISSEUR" name="poste" />
                            <input type="hidden" class="form-control" name="statut" value="cli" />

                            <div >
                                <div class="table-header">
                                    NOUVEAU CLIENT
                                </div>
                            </div>


                            <fieldset>
                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
                                                                                    <input type="hidden"  name="oldimg"  value="..." />

															<i class="ace-icon fa fa-camera"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
																											<input type="text"  class="form-control" placeholder="nom complet"  name="nom" onkeyup="cliFunction()" ID="CLI" required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="NINEA, cni ou passeport"  name="cni"  />
															<i class="ace-icon fa fa-barcode"></i>
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
															<input type="tel" class="form-control" placeholder="numero de telephone" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                </label>


                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Nature
</div>
<div class="col-sm-9">

    <a href="javascript:void(0)" data-toggle="tooltip" title="Nature">
        <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="sexe" required>
            <option ></option>
            <option value="HOMME">HOMME</option>
            <option value="FEMME">FEMME</option>
            <option value="SOCIETE">SOCIETE</option>
        </select>
    </a>
</div>
														</span>
                                </label>

                            </fieldset>

	                        <input type="hidden" class="form-control" value="..." name="prenom" required/>
                            <input type="hidden" class="form-control" value="0" name="salaire" />
                            <input type="hidden" class="form-control" name="datem" value="<?php echo date("Y/m/d"); ?>" />

                            
                            <input type="hidden" class="form-control" value="..."  name="login"/>

                            <input type="hidden" class="form-control" value="..." name="passe" />
                            <input type="hidden" class="form-control" value="..." name="info" />

                            <input type="hidden" class="form-control" name="daten" value="<?php echo date("Y/m/d"); ?>" />

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Adresse email"  name="email"  />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                            </label>


                        </div>

                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
			</span>
                        </div>
                    </div>
                </div>

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

        </div>

        <div class="col-xs-12 col-lg-6">
            <?php
            include 'tableusers.php';
            ?>
        </div>
    </div>


	<?php
}

if ($doc== "presta") {
	?>
    <div class="row">
        <div class="col-xs-12 col-lg-6">

            <form action="<?php echo $base_url; ?>/controller/UserController.php" method="post" enctype="multipart/form-data" >
                <input type="hidden"  value="<?php echo $iduser;?>" name="cacher" />
                <input id="origine" type="hidden" value="?file=page/user" name="origine">

                <div class="row">
                    <div class="col-xs-12">
                        <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
                    <div class="widget-body">
                        <div class="widget-main">
                            <input type="hidden" class="form-control  " value="PRESTATAIRE" name="poste" />
                            <input type="hidden" class="form-control" name="statut" value="presta" />

                            <div >
                                <div class="table-header">
                                    NOUVEAU PRESTATAIRE DE SERVICE
                                </div>
                            </div>


                            <fieldset>
                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
                                                                                    <input type="hidden"  name="oldimg"  value="..." />

															<i class="ace-icon fa fa-camera"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
																											<input type="text"  class="form-control" placeholder="nom complet"  name="nom" onkeyup="cliFunction()" ID="CLI" required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
                                </label>

                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="NINEA, cni ou passeport"  name="cni"  />
															<i class="ace-icon fa fa-barcode"></i>
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
															<input type="tel" class="form-control" placeholder="numero de telephone" name="tel" />
															<i class="ace-icon fa fa-phone"></i>
														</span>
                                </label>


                                <label class="block clearfix">
														<span class="block input-icon input-icon-right">

<div class="col-sm-3">
    Nature
</div>
<div class="col-sm-9">

    <a href="javascript:void(0)" data-toggle="tooltip" title="Nature">
        <select class="chosen-select form-control" class="chosen" data-placeholder="Choix du Poste " name="sexe" required>
            <option ></option>
            <option value="HOMME">HOMME</option>
            <option value="FEMME">FEMME</option>
            <option value="SOCIETE">SOCIETE</option>
        </select>
    </a>
</div>
														</span>
                                </label>

                            </fieldset>

	                        <input type="hidden" class="form-control" value="..." name="prenom" required/>
                            <input type="hidden" class="form-control" value="0" name="salaire" />
                            <input type="hidden" class="form-control" name="datem" value="<?php echo date("Y/m/d"); ?>" />

                            
                            <input type="hidden" class="form-control" value="..."  name="login"/>

                            <input type="hidden" class="form-control" value="..." name="passe" />

                            <input type="hidden" class="form-control" name="daten" value="<?php echo date("Y/m/d"); ?>" />

                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Adresse email"  name="email"  />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                            </label>
                            <label class="block clearfix">
                                <div class="form-group">
                                  <label for="comment">Services Proposés:</label>
                                  <textarea class="form-control" rows="5" id="info"  name="info" ></textarea>
                                </div>
                            </label>


                        </div>

                    </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
			</span>
                        </div>
                    </div>
                </div>

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

        </div>

        <div class="col-xs-12 col-lg-6">
            <?php
            include 'tableusers.php';
            ?>
        </div>
    </div>


	<?php
}

	?>