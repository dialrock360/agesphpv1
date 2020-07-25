




<div class="row">
    <div class="col-sm-8"  >
        <div class="row">
            <div class="col-lg-4">
                <div class="login-input-head">
                    <p>Nom du project</p>
                </div>
            </div>
            <div class="col-lg-8">

                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                <input class="form-control" type="text" name="nom_projet" value="{if isset($projet)} {$projet['nom_projet']} {/if}" id="nom_projet"/>
															<i class="ace-icon glyphicon glyphicon-font"></i>
														</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="login-input-head">
                    <p>Cout du project</p>
                </div>
            </div>
            <div class="col-lg-8">

                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                <input class="form-control" type="text" name="cout_projet" value="{if isset($projet)} {$projet['cout_projet']} {/if}" id="cout_projet"/>
															<i class="ace-icon fa fa-money orange"></i>
														</span>
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="login-input-head">
                    <p>Valeur du project  </p>
                </div>
            </div>
            <div class="col-lg-8">

                <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                                        <label> (ce que le projet rapportera)</label>

                                                <input class="form-control" type="text" name="valeur_projet" value="{if isset($projet)} {$projet['valeur_projet']} {/if}" id="valeur_projet"/>
															<i class="ace-icon fa fa-money green"></i>
														</span>
                </label>
            </div>
        </div>


        <div>
            <label for="date_projet">
                Date de demarage
                <small class="text-success">99/99/9999</small>
            </label>

            <div class="input-group">
                <input class="form-control" type="date" name="date_projet" value="{if isset($programme)} {$programme['date_projet']} {/if}"  id="date_projet"/>

                <span class="input-group-btn">
																	<button class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa fa-calendar bigger-110"></i>

																	</button>
																</span>
            </div>
        </div>

        <div>
            <label for="datefin_projet">
                Date de cloture
                <small class="text-warning">(999) 999-9999</small>
            </label>

            <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>

                <input class="form-control" type="date" name="datefin_projet" value="{if isset($programme)} {$programme['datefin_projet']} {/if}"  id="datefin_projet"/>
            </div>
        </div>
    </div>
    <div class="col-sm-4"  >
        <div class="row">
            <div class="col-lg-12">
                <p> Description du Projet</p>
                <textarea class="form-control" cols="30" rows="10"></textarea>
            </div>

        </div>

    </div>
</div>