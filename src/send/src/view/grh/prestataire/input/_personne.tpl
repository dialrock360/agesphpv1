<input class="form-control" type="hidden" name="date_naiss_personne" value="{if isset($personne)} {$personne['date_naiss_personne']} {/if}"  id="date_naiss_personne"/>
<input class="form-control" type="hidden" name="lieu_naiss_personne" value="{if isset($personne)} {$personne['lieu_naiss_personne']} {/if}" id="lieu_naiss_personne"/>




<div id="edit-basic" class="tab-pane in active">
    <h4 class="header blue bolder smaller">General</h4>

    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <input type="file" />
        </div>

        <div class="vspace-12-sm"></div>

        <div class="col-xs-12 col-sm-8">
            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Nature</label>

                <div class="col-sm-8">
                     <select name="genre_personne" class="col-xs-12 col-sm-10"  >
                        <option selected value="{$personne['genre_personne']}">{if isset($personne)} {$personne['genre_personne']}   {/if}</option>
                        <option value="Entreprise">Entreprise</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
                <label class="col-sm-4 control-label no-padding-right" for="form-field-first">Nom ou Raison sociale</label>

                <div class="col-sm-8">
                    <input class="form-control" type="text" name="nom_personne" placeholder="Nom"  value="{if isset($personne)} {$personne['nom_personne']} {/if}" id="nom_personne"/>

                    <input class="input-small" name="prenom_personne"  type="hidden" id="prenom_personne" placeholder="First Name" value="{if isset($personne)} {$personne['prenom_personne']} {/if}"  />
                 </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right">Piece d'identification</label>

        <div class="col-sm-9">
            <label class="inline">
                <input name="typepiece_personne" type="radio" value="Autre" class="ace" />
                <span class="lbl middle"> Autre</span>
            </label>
            <label class="inline">
                <input name="typepiece_personne" type="radio" value="CNI" class="ace" />
                <span class="lbl middle"> CNI</span>
            </label>

            &nbsp; &nbsp; &nbsp;
            <label class="inline">
                <input name="typepiece_personne" type="radio" value="PASSEPORT" class="ace" />
                <span class="lbl middle"> PASSEPORT</span>
            </label>

            
            <label class="inline">
                <input name="typepiece_personne" type="radio" value="RC" class="ace" />
                <span class="lbl middle"> REGISTRE DE COMMEERCE</span>
            </label>
        </div>
    </div>

    <div class="space-4"></div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-date">   Numero de la piece</label>

        <div class="col-sm-9">
            <div class="input-medium">
                <div class="input-group">
                    <input class="form-control" type="text" name="numpiece_personne" value="{if isset($personne)} {$personne['numpiece_personne']} {/if}" id="numpiece_personne"/>

                    <span class="input-group-addon">
																				<i class="ace-icon fa fa-barcode"></i>
																			</span>
                </div>
            </div>
        </div>
    </div>


    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-comment">Details du prestataire</label>

        <div class="col-sm-9">
            <textarea id="form-field-comment" name="details_personne"></textarea>
        </div>
    </div>

    <div class="space"></div>
    <h4 class="header blue bolder smaller">Pays d'origine</h4>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-email">Nationalité </label>

        <div class="col-sm-9">
            <input class="form-control" type="text" name="nationalite_personne" value="{if isset($personne)} {$personne['nationalite_personne']} {/if}" id="nationalite_personne"/>

        </div>
    </div>


</div>


