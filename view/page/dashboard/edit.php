
<div class="modal-body">
    <div class="row">
        <div class="col-xs-12">
            <?php

            $query = "SELECT * FROM `service` ";
            $stmt = $db_con->prepare( $query );
            $stmt->execute();
            if($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);

            }
            ?>
            <form action="<?php echo $base_url; ?>/controller/ServiceController.php" method="post" enctype="multipart/form-data" >
                <input type="hidden"  value="1" name="id" />

                <div class="row">
                    <div class="col-sm-10" style="background-color:#F0FFFF; margin-left: 10%;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
			<span>
				<div id="signup-box" class="signup-box widget-box no-border">
	<div class="widget-body">
		<div class="widget-main">

				<div >
								<div class="table-header">

									<label class="block clearfix">
						<div class="col-sm-6">
LOGO DE MON ENTREPRISE <img id="myImg"  src="assets/images/avatars/<?php echo $logo;?>"  width="32" height="32"></div>
<div class="col-sm-6">
	<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" placeholder="photo" name="img" />
															<i class="ace-icon fa fa-camera"></i>
														</span>
	</div>

					</label>
								</div>
							</div>


				<fieldset>


					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Nom de l'Entreprise ">

														<span class="block input-icon input-icon-right">

								<input type="text"  class="form-control" value="<?php echo $nom; ?>"  name="nom"  required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
																				 </a>
					</label>

					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Suite des initiales de plusieurs mots employée comme abréviation ">

														<span class="block input-icon input-icon-right">

								<input type="text"  class="form-control" value="<?php echo $sigle; ?>"  name="sigle"  required/>
								<input type="hidden"  class="form-control" value="<?php echo $logo; ?>"  name="oldimg"  required/>

															<i class="ace-icon fa fa-exclamation-circle"></i>
														</span>
																				 </a>
					</label>


					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Email de  l'Entreprise ">

														<span class="block input-icon input-icon-right">


								<input type="email"  class="form-control" value="<?php echo $email; ?>"  name="email"  />


															<i class="ace-icon fa fa-envelope"></i>
														</span>
																				 </a>
					</label>

					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Numero NINEA">

														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" value="<?php echo $ninea; ?>"  name="ninea" required  />
															<i class="ace-icon fa fa-barcode"></i>
														</span>
																				 </a>
					</label>

						<label class="block clearfix">
													 <a href="javascript:void(0)" data-toggle="tooltip" title="Adresse">

														<span class="block input-icon input-icon-right">
															<input type="texte" class="form-control" value="<?php echo $adress; ?>" name="adress" />
															<i class="ace-icon fa fa-map-marker "></i>
														</span>
														 </a>
					</label>

					<label class="block clearfix">
						 <a href="javascript:void(0)" data-toggle="tooltip" title="Telephone">
														<span class="block input-icon input-icon-right">


															<input type="text" class="form-control" value="<?php echo $tel; ?>" name="tel" required />
															<i class="ace-icon fa fa-phone"></i>
														</span>
							 </a>
					</label>


                    </label>

				</fieldset>


		</div>

	</div><!-- /.widget-body -->
</div><!-- /.signup-box -->
			</span>
                                    <label class="block clearfix">


                                        <div>
                                            <label for="form-field-select-2">Secteur économique</label>

                                            <br />


                                            <select name="secteur_E" class="chosen-select form-control"  id="form-field-select-2" style="width: 80%; display: inline-block"  required>
                                                <option value="<?php echo $secteur_E; ?>" ><?php echo $secteur_E; ?></option>
                                                <option value="Secteur primaire">Secteur primaire</option>
                                                <option value="Secteur secondaire">Secteur secondaire</option>
                                                <option value="Secteur tertiaire">Secteur tertiaire</option>

                                            </select>

                                            <a  data-target="#right-menu" data-toggle="modal" type="button">
                                                <i data-icon1="fa-plus" data-icon2="fa-minus" class="ace-icon fa fa-info-circle bigger-110 icon-only"></i>
                                            </a>



                                        </div>


                                    </label>

                                    <label class="block clearfix">


                                        <div>
                                            <label for="form-field-select-2">Type d'entreprise</label>

                                            <br />
                                            <select name="type" class="chosen-select form-control" id="form-field-select-2" style="width: 80%; display: inline-block" required>
                                                <option value="<?php echo $type; ?>"><?php echo $type; ?></option>

                                                <optgroup label="Petite et moyenne entreprise">
                                                    <option value="PE">Petite entreprise</option>
                                                    <option value="ME">Moyenne entreprise</option>
                                                </optgroup>
                                                <option value="Micro-entreprise">Micro-entreprise</option>
                                                <option value="TPE">Très petite entreprise </option>
                                                <option value="GE">Grande entreprise </option>
                                                <option value="GPRE">Groupe d'entreprises</option>
                                                <option value="EE">Entreprise étendue</option>

                                            </select>
                                            <a  data-target="#right-menu2" data-toggle="modal" type="button">
                                                <i data-icon1="fa-plus" data-icon2="fa-minus" class="ace-icon fa fa-info-circle bigger-110 icon-only"></i>
                                            </a>

                                        </div>

                                    </label>



                                    <label class="block clearfix">
                                        <div>
                                            <label for="form-field-mask-2">
                                                Chiffre D'Afaire
                                            </label>

                                            <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-money"></i>
																</span>

                                                <input  name="ca" value="<?php echo $ca; ?>" class="form-control input-mask-phone" type="text" id="form-field-mask-2" required/>
                                            </div>
                                        </div>
                                    </label>



                                    <label class="block clearfix">
                                        <div>
                                                                      <span class="pull-left inline" id="radio-group">
                                        <span class="grey">theme:</span>

                                        <span class="btn-toolbar inline middle no-margin">
                                            <label class="btn btn-xs btn-primary active">

                                                    bleu
                                                    <input type="radio" value="bleu" name="theme" onclick="check('theme,bleu')" />
                                                </label>

                                                <label class="btn btn-xs btn-Light">
                                                    gris
                                                    <input type="radio" value="gris" name="theme" onclick="check('theme,gris')" />
                                                </label>

                                                <label class="btn btn-xs btn-grey">
                                                    noire
                                                    <input type="radio" value="noire" name="theme" onclick="check('theme,noire')"/>
                                                </label>

                                                <label class="btn btn-xs btn-pink">
                                                    rose
                                                    <input type="radio" value="rose" name="theme"  onclick="check('theme,rose')" />
                                                </label>
                                        </span>
                                    </span>
                                        </div>
                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Annuler</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="updateservice">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>

            </form>

          <?php

            ?>


        </div>

    </div>
</div>