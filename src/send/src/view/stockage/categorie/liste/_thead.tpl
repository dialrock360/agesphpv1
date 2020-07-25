


<thead>
<tr>
    <th class="center">

        <label class="pos-rel">
            <div class="row">

                <input id="search" class="form-control" type="text"   placeholder="Designation..">
                <input id="nom_categorie" class="form-control" type="text" name="nom_categorie" placeholder="Designation.."  style="display: none" >
                <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
                <input class="form-control" type="hidden" name="nbr_produit_categorie" value="0" id="nbr_produit_categorie"/>
                <input class="form-control" type="hidden" name="valeur_categorie" value="0" id="valeur_categorie"/>
                <input class="form-control" type="hidden" name="id" value="0" id="id"/>
            </div>

            <span class="lbl"></span>

        </label>
    </th>
    <th>


        <label for="id_famille">Famille d'Articles</label>
        <div style="visibility: hidden; width: 50%;" id="id_famille_wraper">
            <select class="chosen-select form-control" id="id_famille" name="id_famille" data-placeholder="Choisir  une Famille..."  required>
                <option > </option>
                {$optifamilles}
            </select>
        </div>

    </th>
    <th>

        <span id="lblnomenclature">Nomenclature de produit</span>
        <div id="id_nomenclature_wraper" style="visibility: hidden; width: 50%;" >

            <select name="id_nomenclature_article" id="id_nomenclature_article" class="chosen-select form-control"  data-placeholder="Choisir une nomenclature  de produit .."  required >
                <option > </option>
                {foreach from=$nomenclature_articles item=champ}

                    {if $champ['ref_nomenclature_article']== 'B' || $champ['ref_nomenclature_article']== 'SE' || $champ['ref_nomenclature_article']== 'PA' }
                        <option value="{$champ['id']}" style="background-color:{$champ['code_couleur']} ; color: #000000;">{$champ['nom_nomenclature_article']}  </option>
                    {else}
                        <option value="{$champ['id']}" style="background-color:{$champ['code_couleur']} ; color: #ffffff;">{$champ['nom_nomenclature_article']}  </option>

                    {/if}

                {/foreach}
            </select>

        </div>
    </th>
    <th>Nbr Articles</th>
    <th>
        <div class="form-group">

            <button class=" btn btn-sm btn-primary btn-white btn-round"  id="add"  onclick="addfrm()"  type="button">
                <i class="fa fa-plus light-blue bigger-150"></i>
            </button>
            <button class=" btn btn-sm btn-success btn-white btn-round" onclick="add()" id="save" style="display: none" type="button">
                <i class="fa fa-save light-green bigger-150"></i>
            </button>

            <button class="btn btn-sm btn-danger btn-white btn-round" onclick="closefrm()" id="close" style="display: none"  type="button">
                <i class="fa fa-remove light-red bigger-150"></i>
            </button>

            <a href="{$url_base}Categorie/index/{$smarty.session.user.id_service}" class=" btn btn-sm btn-default btn-white btn-round" id="refresh"  title="Actualiser">
                <i class="fa fa-refresh light-grey bigger-150"></i>
            </a>
        </div>
    </th>
</tr>
</thead>