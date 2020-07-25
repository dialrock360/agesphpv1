


<div id="pictures" class="tab-pane">

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="cv_contrat"> CV </label>

        <div class="col-sm-9">
            <input class="form-control" type="file" name="cv_contrat" value="{if isset($contrat)} {$contrat['cv_contrat']} {/if}" id="cv_contrat"/>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-2"> CNI </label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-2" name="pj[]" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-3"> CERTIFICAT D'ETAT CIVIL  </label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-3" name="pj[]" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-3"> CERTIFICAT DE NAISSANCE </label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-3" name="pj[]" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-4"> EXTRAIT CASIER JUDICIAIRE </label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-4" name="pj[]" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-4"> PERMI DE TRAVAIL</label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-4" name="pj[]" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-4"> PERMI DE CONDUIR </label>

        <div class="col-sm-9">
            <input type="file" id="form-field-1-4" name="pj[]" class="form-control" />
        </div>
    </div>
</div><!-- /#pictures -->