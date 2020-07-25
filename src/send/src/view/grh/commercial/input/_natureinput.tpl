<div class="clearfix">
    <div class="grid2">
        <span class="bigger-175 blue"> Nature</span>
        <br />
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
    </div>

    <div class="grid2">
        <span class="bigger-175 blue"> Nationalité</span>

        <br />
        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
                            <input class="form-control" type="text" name="nationalite_personne" value="{if isset($personne)} {$personne['nationalite_personne']} {/if}" id="nationalite_personne"/>
															<i class="ace-icon fa fa-flag"></i>
														</span>
        </label>
    </div>
</div>