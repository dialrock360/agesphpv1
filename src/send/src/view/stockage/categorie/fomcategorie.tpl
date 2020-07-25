
{literal}
<script>
    var famillesOption = '{/literal}{$optifamilles}{literal}';
</script>
{/literal}


<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <table id="stable" class="table  table-bordered table-hover">
            <caption>
                <div id="ok" > </div>
            </caption>
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
                                 <select class="editInput id_famille form-control input-sm"  id="id_famille" name="id_famille"  style="display: none;">
                                     <option value="{$obj['id_famille']}" disabled selected>{$obj["nom_famille"]}</option>
                                     {$optifamilles}
                                </select>

                            </td>

                            <td>
                                <a href="{$url_base}Categorie/edit/{$obj["id"]}" title="Consulter  {$obj["nom_categorie"]}"> <span class="label label-sm label-default"><span class="editSpan nbr_produit_categorie ">{$obj["nbr_produit_categorie"]}</span></span> </a>
                                <input class="editInput nbr_produit_categorie form-control input-sm" type="text" name="nbr_produit_categorie" value="{$obj["nbr_produit_categorie"]}" readonly style="display: none;">
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

        </table>
    </div><!-- /.span -->
</div><!-- /.row -->






