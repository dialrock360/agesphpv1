<div class="clearfix">
    <div class="grid2">
        <span class="bigger-175 blue">Piece d'identité</span>

        <br />
        <select name="typepiece_personne" class="form-control champ" >
            <option selected value="{$personne['typepiece_personne']}">{if isset($personne)} {$personne['typepiece_personne']}   {/if}</option>
            <option value="CNI">CNI</option>
            <option value="PASSEPORT">PASSEPORT</option>
            <option value="RC">RC</option>
            <option value="Autre">Autre</option>
        </select>
    </div>

    <div class="grid2">
        <span class="bigger-175 blue"> Numero</span>

        <br />
        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
        <input class="form-control" type="text" placeholder="Numero de la piece" name="numpiece_personne" value="{if isset($personne)} {$personne['numpiece_personne']} {/if}" id="numpiece_personne"/>
															<i class="ace-icon fa fa-barcode"></i>
														</span>
        </label>
    </div>
</div>