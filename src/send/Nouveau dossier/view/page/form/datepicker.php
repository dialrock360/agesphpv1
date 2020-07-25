


<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Modalit&eacute;
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        Jour: <input type="radio" class="sejour" name="sejour" id="heure" value="h" checked=""onclick="
					$('div#nbrn').slideUp(600);$('div#nbrh').slideDown(600);"/><span class="required">  |  </span>
        Mois: <input type="radio" class="sejour" name="sejour" id="jour" value="j"  onclick="
					$('div#nbrn').slideUp(600);$('div#nbrh').slideUp(600);"/><span class="required">  |  </span>
    </div>
</div>


<div class="col-sm-10">
    <div class="widget-box">
        <div class="widget-header">
            <h4 class="widget-title">Date Du Rapport</h4>

        </div>

        <div class="row">
            <div class="col-xs-8 col-sm-10">
                <div class="input-group">
                    <input class="form-control" id="date" type="date"  />
                    <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                </div>
            </div>
            <div class="col-xs-4 col-sm-2">
                <button type="submit" class="btn btn-info btn-sm  "  name="msavecondis" >
                 Génerer<i class="glyphicon glyphicon-share"></i>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-8 col-sm-10">
                <div class="input-daterange input-group">
                    <h5 class="widget-title">Date Debut</h5>

                    <input type="date" class="input-sm form-control" name="debut" />
                    <span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>
                    <h5 class="widget-title">Date Fin</h5>
                    <input type="date" class="input-sm form-control" name="fin" />
                </div>
            </div>
            <div class="col-xs-4 col-sm-2">
                <hr/>

                <a  href="javascript:void(0)" id="gete"  onmouseover="setline(this)"  class="btn btn-sm btn-info">Génerer<i class="glyphicon glyphicon-share"></i></a>

            </div>
        </div>
    </div>
</div>


<!-- /jQuery Knob -->

