
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <input class="form-control" type="hidden" name="id" value="{if isset($programme)} {$programme['id']} {/if}"  id="id"/>
        <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
        <input class="form-control" type="hidden" name="etat_programme" value="{if isset($programme)} {$programme['etat_programme']} {/if}"  id="etat_programme"/>
        <input class="form-control" type="hidden" name="flag_programme" value="{if isset($programme)} {$programme['flag_programme']} {/if}"  id="flag_programme"/>

        <div>
            <label for="nom_programme">
                Nom du programme
            </label>

            <div class="input-group">

                <input class="form-control input-mask-date" type="text" id="nom_programme" name="nom_programme"  value="{if isset($programme)} {$programme['nom_programme']} {/if}" id="nom_programme"/>

                <span class="input-group-btn">
																	<button class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa  fa-tachometer bigger-110"></i>

																	</button>
																</span>
            </div>
        </div>    <div>
            <label for="nom_programme">
                Domaine
            </label>

            <select name="domaine_programme_id"  class="form-control" >
                <option selected disabled>--Choisir domaine --</option>
                {foreach from=$domaine_programmes item=champ}
                    <option value="{$champ['id']}">{$champ['nom_domaine_programme']}  </option>
                {/foreach}
            </select>
        </div>

        <hr />
        <div>
            <label for="date_programme">
                Date de demarage
                <small class="text-success">99/99/9999</small>
            </label>

            <div class="input-group">
                <input class="form-control" type="date" name="date_programme" value="{if isset($programme)} {$programme['date_programme']} {/if}"  id="date_programme"/>

                <span class="input-group-btn">
																	<button class="btn btn-sm btn-default" type="button">
																		<i class="ace-icon fa fa-calendar bigger-110"></i>

																	</button>
																</span>
            </div>
        </div>

        <hr />
        <div>
            <label for="datefin_programme">
                Date de cloture
                <small class="text-warning">(999) 999-9999</small>
            </label>

            <div class="input-group">
																<span class="input-group-addon">
																	<i class="ace-icon fa fa-calendar"></i>
																</span>

                <input class="form-control" type="date" name="datefin_programme" value="{if isset($programme)} {$programme['datefin_programme']} {/if}"  id="datefin_programme"/>
            </div>
        </div>


        <hr />
        <div>
            <label for="form-field-mask-4">
                Nombre de projets
                <small class="text-info">~9.99 ~9.99 999</small>
            </label>

            <div>
                <input class="form-control" type="number" readonly name="nbr_projet_programme" value="{if isset($programme)} {$programme['nbr_projet_programme']} {/if}" id="nbr_projet_programme"/>

            </div>
        </div>


    </div>
</div>