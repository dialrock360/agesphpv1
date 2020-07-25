
<div class="row">
    <div class="col-xs-12">


        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Modalit&eacute;
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                Jour: <input type="radio"   name="sejour" value="1" onclick="
					$('div#moi').slideUp(600);$('div#jour').slideDown(600);"/><span class="required">        |        </span>
                Mois: <input type="radio" name="sejour" value="2" onclick="$('div#jour').slideUp(600);$('div#moi').slideDown(600);"/>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Date Du Rapport</h4>

                </div>
                <div id="jour">
                    <form action="<?php echo $base_url; ?>/controller/PubController.php" method="post" >

                        <div class="row">
                            <div class="col-xs-8 col-sm-10">
                                <div class="input-group">
                                    <input class="form-control" type="hidden"  name="type" value="1" />
                                    <input class="form-control" id="date" type="date" name="date"  />
                                    <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-2">
                                <input type="submit" name="btnsave" value="Génerer"  class="btn btn-info btn-sm  "  >
                            </div>
                        </div>
                    </form>

                </div>
                <div id="moi" style="display: none;" id="moi">
                    <form action="<?php echo $base_url; ?>/controller/PubController.php" method="post" >

                        <div class="row">
                            <div class="col-xs-8 col-sm-10">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="input-daterange input-group">
                                            <h5 class="widget-title">Date Debut</h5>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6">
                                        <div class="input-daterange input-group">
                                            <h5 class="widget-title">Date Fin</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-10">
                                <div class=" input-group">
                                    <input class="form-control" type="hidden"  name="type" value="2" />

                                    <input type="date" class="input-sm form-control" name="debut" />
                                    <span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>
                                    <input type="date" class="input-sm form-control" name="fin" />
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-2">
                                <input type="submit" name="btnsave" value="Génerer"  class="btn btn-info btn-sm  "  >

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>







    </div>
</div>
