<div class="clearfix">
    <div class="grid2">
        <span class="bigger-175 blue">Nom </span>

        <br />

        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                               <input class="form-control" type="hidden" required  name="id_status" value="{if isset($personne_status)} {$personne_status['id']} {/if}" id="id_status"/>
                            <input class="form-control" type="hidden" name="date_naiss_personne" value="{$date}" id="date_naiss_personne"/>
                            <input class="form-control" type="hidden" name="lieu_naiss_personne" value="" id="lieu_naiss_personne"/>
                            <input class="form-control" type="hidden" name="flag_personne" value="0" id="flag_personne"/>
                            <input class="form-control" type="text" placeholder="raison sociale" required name="nom_personne" value="{if isset($personne)} {$personne['nom_personne']} {/if}" id="nom_personne"/>

															<i class="ace-icon fa fa-user"></i>
														</span>
        </label>
    </div>

    <div class="grid2">
        <span class="bigger-175 blue"> Prenom <small>(facultatif)</small></span>

        <br />
        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                            <input class="form-control" type="text" name="prenom_personne" value="{if isset($personne)} {$personne['prenom_personne']} {/if}" id="prenom_personne"/>
															<i class="ace-icon fa fa-font"></i>
														</span>
        </label>
    </div>
</div>