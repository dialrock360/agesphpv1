


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
                            <input id="nom_conditionement" class="form-control" type="text" name="nom_conditionement" placeholder="Designation.."  style="display: none" >
                            <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
                            <input class="form-control" type="hidden" name="id" value="0" id="id"/>
                            <input class="form-control" type="hidden" name="nbr_utilisation" value="0" id="nbr_utilisation"/>
                        </div>

                        <span class="lbl"></span>

                    </label>
                </th>
                <th>Frequence d'utilisation</th>
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
                        <a href="{$url_base}Conditionement/index" class=" btn btn-sm btn-default btn-white btn-round" id="refresh"  title="Actualiser">
                            <i class="fa fa-refresh light-grey bigger-150"></i>
                        </a>
                    </div>
                </th>
            </tr>
            </thead>

            <tbody id="myTable">
            {if isset($conditionements)}
                {if $conditionements != null}

                    {foreach from=$conditionements item=obj}
                        <tr id='tr_{$obj["id"]}'>
                            <td>

                                <a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  {$obj["nom_conditionement"]}"><span class="editSpan nom_conditionement "> {$obj["nom_conditionement"]}</span></a>

                                <input class="editInput nom_conditionement form-control input-sm" type="text" name="nom_conditionement" value="{$obj["nom_conditionement"]}" style="display: none;">


                            </td>


                            <td>
                                <span class="editSpan nbr_utilisation "> {$obj["nbr_utilisation"]}</span>
                                <input class="editInput nbr_utilisation form-control input-sm" type="text" name="nbr_utilisation" value="{$obj["nbr_utilisation"]}" readonly style="display: none;">


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
                                {assign var="nbrart" value=$obj["nbr_utilisation"]}

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
                        <td colspan="4">

                            Liste vide
                        </td>
                    </tr>

                {/if}
            {/if}
            </tbody>

        </table>
    </div><!-- /.span -->
</div><!-- /.row -->
