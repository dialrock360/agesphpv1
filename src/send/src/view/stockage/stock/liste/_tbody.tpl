
<tbody id="myTable">
{if isset($stocks)}
    {if $stocks != null}

        {foreach from=$stocks item=obj}
            <tr id='tr_{$obj["id"]}'>
                <td>

                    <input type="checkbox" class="checketed" data-emp-id="{$obj["id"]}">


                </td>
                <td>

                    <a href="{$url_base}Stock/edit/{$obj["id"]}"><span class="editSpan nom_stock "> {$obj["nom_stock"]}</span> </a>

                    <input class="editInput nom_stock form-control input-sm" type="text" name="nom_stock" value="{$obj["nom_stock"]}" style="display: none;">


                </td>

                <td>
                    <span class="editSpan type_stock "> {$obj["type_stock"]}</span>
                    <select class="editInput type_stock form-control "   name="type_stock"  style="display: none;">
                        <option value="{$obj['type_stock']}" disabled selected>{$obj["type_stock"]}</option>

                        <option value="Dynamic">Dynamic</option>
                        <option value="Static">Static</option>
                    </select>

                </td>



                <td>
                    <span class="editSpan nbrarticle "> {$obj["nbrarticle"]}</span>
                    <input class="editInput nbrarticle form-control input-sm" type="text" name="nbrarticle" value="{$obj["nbrarticle"]}" readonly style="display: none;">


                </td>
                <td>

                    <span class="editSpan valeur "> {$obj["valeur"]}</span>
                    <input class="editInput valeur form-control input-sm" type="text" name="valeur" value="{$obj["valeur"]}" readonly style="display: none;">


                </td>

                <td>


                    <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round  editBtn" title="Modifier  "><span class="editSpan  ">  <i class="glyphicon glyphicon-edit blue"></i></span></a>

                    <a  href="{$url_base}Stock/edit/{$obj["id"]}" data-toggle="tooltip"  class="btn btn-sm btn-info btn-white btn-round modaledit " title="Manager stock">
                        <i class="glyphicon glyphicon-cog green "></i>

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
                    {assign var="nbrart" value=$obj["nbrarticle"]}

                    {if $nbrart<1}

                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">
                            <i class="glyphicon glyphicon-trash red"></i>

                        </a>
                    {else}
                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-inverse btn-white btn-round  deleteBtndisable deleteBtn" title="impossible de Supprimer">
                            <i class="glyphicon glyphicon-trash black"></i>

                        </a>
                    {/if}

                </td>
            </tr>
        {/foreach}

    {else}
        <tr>
            <td colspan="4">

                Liste vide
            </td>
        </tr>

    {/if}
{/if}
</tbody>