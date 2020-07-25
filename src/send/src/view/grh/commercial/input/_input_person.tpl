<fieldset>


    <label for="nom_personne">Nom ou raison sociale </label>
    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                                                               <input class="form-control" type="hidden" required  name="id_status" value="{if isset($personne_status)} {$personne_status['id']} {/if}" id="id_status"/>
                            <input class="form-control" type="hidden" name="date_naiss_personne" value="{$date}" id="date_naiss_personne"/>
                            <input class="form-control" type="hidden" name="lieu_naiss_personne" value="" id="lieu_naiss_personne"/>
                            <input class="form-control" type="hidden" name="flag_personne" value="0" id="flag_personne"/>
                            <input class="form-control" type="text" required name="nom_personne" value="{if isset($personne)} {$personne['nom_personne']} {/if}" id="nom_personne"/>

															<i class="ace-icon fa fa-user"></i>
														</span>
    </label>

    <div class="space-6"></div>
    <label for="nom_personne">Prenom (facultatif)</label>
    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                            <input class="form-control" type="text" name="prenom_personne" value="{if isset($personne)} {$personne['prenom_personne']} {/if}" id="prenom_personne"/>
															<i class="ace-icon fa fa-font"></i>
														</span>
    </label>
    <div class="space-6"></div>
    <label for="nom_personne">Nationalité (facultatif)</label>
    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                            <input class="form-control" type="text" name="nationalite_personne" value="{if isset($personne)} {$personne['nationalite_personne']} {/if}" id="nationalite_personne"/>
															<i class="ace-icon fa fa-flag"></i>
														</span>
    </label>
    <div class="space-6"></div>
    <label for="nom_personne">Nature </label>
    <label class="block clearfix">
														<span class="block input-icon input-icon-right">
														    <select name="genre_personne" class="form-control champ" required>
                                <option selected value="{$personne['genre_personne']}">{if isset($personne)} {$personne['genre_personne']}   {/if}</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Entreprise">Entreprise</option>
                            </select>
															<i class="ace-icon fa fa-female"></i>
															<i class="ace-icon fa fa-male"></i>
														</span>
    </label>

</fieldset>