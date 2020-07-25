
<div id="edit-password" class="tab-pane">
    <div class="space-10"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass1">Service presté</label>

        <div class="col-sm-9">
            <input class="form-control" type="text" name="metier" value="{if isset($contrat)} {$contrat['metier']} {/if}" id="metier"/>

        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Nature du contrat</label>

        <div class="col-sm-9">
            <input class="form-control" type="text" name="statut_contrat" value="{if isset($contrat)} {$contrat['statut_contrat']} {/if}" id="statut_contrat"/>

        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Date de debut du contrat</label>

        <div class="col-sm-9">
            <input class="form-control" type="date" name="datedebut" value="{if isset($contrat)} {$contrat['datedebut']} {/if}"  id="datedebut"/>

        </div>
    </div>
    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Date de fin du contrat</label>

        <div class="col-sm-9">
            <input class="form-control" type="date" name="datefin" value="{if isset($contrat)} {$contrat['datefin']} {/if}"  id="datefin"/>

        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-pass2">Conditions et paiement</label>

        <div class="col-sm-9">
             <textarea id="form-field-comment" rows="5" name="avantages_contrat">{if isset($contrat)} {$contrat['avantages_contrat']} {/if}</textarea>
        </div>
    </div>
</div>