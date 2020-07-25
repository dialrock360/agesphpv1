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