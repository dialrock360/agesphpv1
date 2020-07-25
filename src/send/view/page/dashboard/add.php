<style>
    /* styles de base si JS est activé */
    .js .input-file-container {
        position: relative;
        width: 225px;
    }
    .js .input-file-trigger {
        display: block;
        padding: 14px 45px;
        background: #39D2B4;
        color: #fff;
        font-size: 1em;
        transition: all .4s;

        box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, .2);
        height: 235px;
        cursor: pointer;
    }
    .js .input-file {
        position: absolute;
        top: 0; left: 0;
        width: 225px;
        padding: 14px 0;
        opacity: 0;
        cursor: pointer;
    }

    /* quelques styles d'interactions */
    .js .input-file:hover + .input-file-trigger,
    .js .input-file:focus + .input-file-trigger,
    .js .input-file-trigger:hover,
    .js .input-file-trigger:focus {
        background: #34495E;
        color: #39D2B4;
    }

    /* styles du retour visuel */
    .file-return {
        margin: 0;
    }
    .file-return:not(:empty) {
        margin: 1em 0;
    }
    .js .file-return {
        font-style: italic;
        font-size: .9em;
        font-weight: bold;
    }
    /* on complète l'information d'un contenu textuel
       uniquement lorsque le paragraphe n'est pas vide */
    .js .file-return:not(:empty):before {
        content: "Selected file: ";
        font-style: normal;
        font-weight: normal;
    }


    .info h1 { color: #ffffff; font-family: 'Lato', sans-serif; font-size: 54px; font-weight: 300; line-height: 58px; margin: 0 0 58px; }


   .info p { color: #adb7bd; font-family: 'Lucida Sans', Arial, sans-serif; font-size: 16px; line-height: 26px; text-indent: 30px; margin: 0; }


    .info  a { color: #fe921f; text-decoration: underline; }


    .info  a:hover { color: #ffffff }


    .date { background: #fe921f; color: #ffffff; display: inline-block; font-family: 'Lato', sans-serif; font-size: 12px; font-weight: bold; line-height: 12px; letter-spacing: 1px; margin: 0 0 30px; padding: 10px 15px 8px; text-transform: uppercase; }
</style>

<div class="row">
    <div class="col-md-10" style="margin-left: 3%;">
        <div class="card">
            <div class="header">
                <h4 class="title"><i class="fa fa-home bigger-110"></i> &nbsp; Enregistrez Votre Entreprise&nbsp;</h4>

            </div>
            <div class="content">
                <div class="content">
                    <form action="<?php echo $base_url; ?>/controller/ServiceController.php" method="post" enctype="multipart/form-data" >


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
	LOGO DE MON ENTREPRISE
</div>
<div class="col-sm-6">
	<span class="block input-icon input-icon-right">
															<input type="file" class="form-control" value="..." name="img" />
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

								<input type="text"  class="form-control" placeholder="Nom Complet"  name="nom"  required/>

															<i class="ace-icon fa fa-bold"></i>
														</span>
																				 </a>
					</label>

					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Suite des initiales de plusieurs mots employée comme abréviation ">

														<span class="block input-icon input-icon-right">

								<input type="text"  class="form-control" placeholder="sigle exp: ONU,ACECNA,DRH,ONG..."  name="sigle"  required/>

															<i class="ace-icon fa fa-exclamation-circle"></i>
														</span>
																				 </a>
					</label>



					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Email de  l'Entreprise ">

														<span class="block input-icon input-icon-right">


								<input type="email"  class="form-control" placeholder="Adresse Email"  name="email"  />


															<i class="ace-icon fa fa-envelope"></i>
														</span>
																				 </a>
					</label>

					<label class="block clearfix">
																			 <a href="javascript:void(0)" data-toggle="tooltip" title="Numero NINEA">

														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="NINEA"  name="ninea" required  />
															<i class="ace-icon fa fa-barcode"></i>
														</span>
																				 </a>
					</label>

						<label class="block clearfix">
													 <a href="javascript:void(0)" data-toggle="tooltip" title="Adresse">

														<span class="block input-icon input-icon-right">
															<input type="texte" class="form-control" placeholder="SIEGE SOCLIAL" name="adress" />
															<i class="ace-icon fa fa-map-marker "></i>
														</span>
														 </a>
					</label>

					<label class="block clearfix">
						 <a href="javascript:void(0)" data-toggle="tooltip" title="Telephone">
														<span class="block input-icon input-icon-right">


															<input type="text" class="form-control" placeholder="les numeros de telephone" name="tel" required />
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
                                                        <option ></option>
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
                                                        <option ></option>

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

                                                        <input  name="ca" class="form-control input-mask-phone" type="text" id="form-field-mask-2" required/>
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

                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="addservice">
                                <span class="bigger-110">Valider</span>

                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

</div>

<?php

include 'info.php';

?>