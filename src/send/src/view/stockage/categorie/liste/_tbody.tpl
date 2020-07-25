

<tbody id="myTable">
{if isset($categories)}
    {if $categories != null}

        {foreach from=$categories item=obj}
            <tr id='tr_{$obj["id"]}'>
                <td>

                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  {$obj["nom_categorie"]}"><span class="editSpan nom_categorie "> {$obj["nom_categorie"]}</span></a>

                    <input class="editInput nom_categorie form-control input-sm" type="text" name="nom_categorie" value="{$obj["nom_categorie"]}" style="display: none;">


                </td>

                <td>
                    <span class="editSpan id_famille "> {$obj["nom_famille"]}</span>
                    <select class="editInput id_famille form-control input-sm"  name="id_famille"  style="display: none;">
                        <option value="{$obj['id_famille']}" disabled selected>{$obj["nom_famille"]}</option>
                        {$optifamilles}
                    </select>

                </td>
                <td>
                    <span class="editSpan id_nomenclature_article "> {$obj["ref_nomenclature_article"]}</span>
                    <select class="editInput id_nomenclature_article form-control input-sm"   name="id_nomenclature_article"  style="display: none;">
                        <option value="{$obj['id_nomenclature_article']}" disabled selected>{$obj["nom_nomenclature_article"]}</option>
                        {$optinomenclature_articles}
                    </select>

                </td>

                <td>
                    <a href="{$url_base}Categorie/edit/{$obj["id"]}" title="Consulter  {$obj["nom_categorie"]}"> <span class="editSpan nbr_produit_categorie ">{$obj["nbr_produit_categorie"]}</span></a>
                    <input class="editInput nbr_produit_categorie form-control input-sm" type="text" name="nbr_produit_categorie" value="{$obj["nbr_produit_categorie"]}"  style="display: none;">
                    <input class="editInput valeur_categorie form-control input-sm" type="hidden" name="valeur_categorie" value="{$obj["valeur_categorie"]}" readonly style="display: none;">


                </td>

                <td>

                    <input type="checkbox" class="checketed" data-emp-id="{$obj["id"]}">
                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-info btn-white btn-round  editBtn" title="Supprimer">
                        <i class="glyphicon glyphicon-edit blue"></i>

                    </a>
                    <div class="btn-group btn-group-sm">
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round cancelBtn" title="anuller" style="display: none">
                            <i class="glyphicon glyphicon-remove red"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round saveBtn" title="enregister" style="display: none">
                            <i class="glyphicon glyphicon-floppy-disk green"></i>
                        </a>
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round confirmBtn" title="valider" style="display: none">
                            <i class="glyphicon glyphicon-ok green"></i>
                        </a>
                    </div>
                    {assign var="nbrart" value=$obj["nbr_produit_categorie"]}

                    {if $nbrart<1}

                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">
                            <i class="glyphicon glyphicon-trash red"></i>

                        </a>
                    {else}
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-inverse btn-white btn-round  deleteBtndisable" title="impossible de Supprimer">
                            <i class="glyphicon glyphicon-trash black"></i>

                        </a>
                    {/if}

                </td>
            </tr>
        {/foreach}

    {else}
        <tr>
            <td colspan="5">

                Liste vide
            </td>
        </tr>

    {/if}
{/if}
</tbody>
