<tbody id="myTable">
{foreach from=$programmes item=obj}
    <tr>
        <td></td>
        <td>{$obj["id"]}</td>
        <td>{$obj["nom_programme"]}</td>
        <td>{$obj["nbr_projet_programme"]}</td>
        <td>{$obj["date_programme"]}</td>
        <td>{$obj["datefin_programme"]}</td>
        <th data-field="Progression" data-editable="true">0</th>
        <td>     <span class="label label-sm label-warning">{$obj["etat_programme"]}</span></td>
        <td>
            <div class="hidden-sm hidden-xs btn-group">

                <a href="{$url_base}Gespro/programmemanager/{$obj["id"]}"  title="Manager Programme" class="btn btn-xs btn-success">  <i class="ace-icon fa fa-cogs bigger-120"></i></a>
                <a href="{$url_base}Programme/edit/1"  title="Editer Programme" class="btn btn-xs btn-info">  <i class="ace-icon fa fa-pencil bigger-120"></i></a>
                <a href="{$url_base}Programme/delete/1"  title="Supprimer Programme" class="btn btn-xs btn-danger">  <i class="ace-icon fa fa-trash bigger-120"></i></a>


            </div>

        </td>
    </tr>
{/foreach}
</tbody>

