

<tbody id="myTable">

{if isset($articles)}
    {if $articles != null}

        {foreach from=$articles item=obj}
            <tr id='tr_{$obj["id"]}'>
                <td>
                    {assign var="photos" value=($obj["path_photo"]=='') ? 'iconimg.png': $obj["path_photo"]}
                    <a href="javascript:void(0)" data-toggle="tooltip" id="path_photo_{$obj["id"]}"  class="editBtn" title="Modifier  {$obj["nom_article"]}"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></a>
                    <span class="editInput path_photo form-control input-sm"  style="display: none;"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></span>



                </td>
                <td>

                    <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  {$obj["nom_article"]}"><span class="editSpan nom_article "> {$obj["nom_article"]}</span></a>

                    <input class="editInput nom_article form-control input-sm" type="text" name="nom_article" value="{$obj["nom_article"]}" style="display: none;">


                </td>

                <td>
                    <span class="editSpan id_categorie "> {$obj["nom_categorie"]}</span>
                    <select class="editInput id_categorie form-control input-sm"  id="id_categorie" name="id_categorie"  style="display: none;">
                        <option value="{$obj['id_categorie']}" disabled selected>{$obj["nom_categorie"]}</option>
                        {$opticategories}
                    </select>

                </td>





                <td>
                    {assign var="nbrstock" value=($obj["nbrstockage"]<=0) ?  'Non':'Stock'}
                    <span class="editSpan nbrstockage "> {if $obj["nbrstockage"]>0}	<b class="text-danger">{$obj["nbrstockage"]}</b>{/if} {$nbrstock}</span>


                </td>

                <td>

                    <input type="checkbox" class="checketed" data-emp-id="{$obj["id"]}">
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form" data-id="{$obj["id"]}" id="getArticle"   class="btn btn-sm btn-info btn-white btn-round  modaledit" title="Supprimer">
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


                    {if $obj["nbrstockage"]<=0}

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