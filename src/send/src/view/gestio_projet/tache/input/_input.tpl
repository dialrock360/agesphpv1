<div class="row">
    <div class="col-xs-12 col-sm-5">


        <label for="form-field-select-3">Etiquette</label>
        <input type="color" value="#0000ff" id="etiquette_tache" name="etiquette_tache" placeholder="Couleur Pour les Representation Graphic.."  style="height: 64px;width: 64px;" >
        <input class="form-control" type="hidden" name="etat_tache" value="{if isset($tache)} {$tache['etat_tache']} {/if}"  id="etat_tache"/>
        <div class="space"></div>
        <div class="space-4"></div>
        <div class="form-group">
            <label for="nom_tache">Designation</label>

            <div>
                <input class="form-control" type="text" name="nom_tache" value="{if isset($tache)} {$tache['nom_tache']} {/if}" id="nom_tache"/>
            </div>
        </div>

        <div class="space-4"></div>
        <div>
            <label for="date_tache">
                Date de demarage
            </label>

            <div class="input-group">
                <input class="form-control" type="date" name="date_tache" value="{if isset($tache)} {$tache['date_tache']} {/if}"  id="date_tache"/>

                <span class="input-group-btn">
																	<button class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa fa-calendar bigger-110"></i>

																	</button>
																</span>
            </div>
        </div>


        <div>
            <label for="datefin_programme">
                Date limite de cloture
            </label>

            <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>

                <input class="form-control" type="date" name="datelimit_tache" value="{if isset($tache)} {$tache['datelimit_tache']} {/if}"  id="datefin_programme"/>
            </div>
        </div>

    </div>

    <div class="col-xs-12 col-sm-7" style="background-color: #eae8e8">
        <hr/>


        <div class="form-group">
            <label for="id_responsable">Responsable</label>

            <div>
                <select class="chosen-select" name="id_responsable" id="id_responsable" data-placeholder="Choose a Member...">
                    <option value="">&nbsp;</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="form-field-select-3">Cout </label>

            <div>
                <input class="form-control" type="number" name="cout_tache" value="{if isset($tache)} {$tache['cout_tache']} {/if}"  id="cout_tache"/>

            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label for="form-field-first">Description</label>

            <div>
                <textarea name="info_tache" class="form-control"  rows="3" placeholder="Write Comment..">{if isset($tache)} {$tache['info_tache']} {/if}</textarea>

            </div>
        </div>
    </div>
</div>