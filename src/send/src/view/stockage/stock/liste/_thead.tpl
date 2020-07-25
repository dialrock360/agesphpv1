
<thead>
<tr>
    <th><input type="checkbox" class="Allpcheck"  ></th>
    <th class="center">
        <label class="pos-rel">
            <div class="row">

                <input id="search" class="form-control" type="text"   placeholder="Designation..">
                <input id="nom_stock" class="form-control" type="text" name="nom_stock" placeholder="Designation.."  style="display: none" >
                <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
                <input class="form-control" type="hidden" name="nbrarticle" value="0" id="nbrarticle"/>
                <input class="form-control" type="hidden" name="valeur" value="0" id="valeur"/>
                <input class="form-control" type="hidden" name="id" value="0" id="id"/>
            </div>

            <span class="lbl"></span>

        </label>
    </th>
    <th>
        <span class="lbltypestock">Type de stock</span>

        <select class="chosen-select" data-placeholder="Choose a stock type..." name="type_stock" id="type_stock" style="display: none" required>
            <option value="">&nbsp;</option>
            <option value="Dynamic">Dynamic</option>
            <option value="Static">Static</option>
        </select>
    </th>
    <th>Nbr Articles</th>
    <th>Valeur</th>
    <th>
        <div class="form-group">

            <button class=" btn btn-sm btn-primary btn-white btn-round"  id="add"  onclick="addfrm()"  type="button">
                <i class="fa fa-plus light-blue bigger-150"></i>
            </button>
            <button class=" btn btn-sm btn-success btn-white btn-round" onclick="savestock()" id="save" style="display: none" type="button">
                <i class="fa fa-save light-green bigger-150"></i>
            </button>

            <button class="btn btn-sm btn-danger btn-white btn-round" onclick="closefrm()" id="close" style="display: none"  type="button">
                <i class="fa fa-remove light-red bigger-150"></i>
            </button>
            <a href="{$url_base}Stock/index/{$smarty.session.user.id_service}" class=" btn btn-sm btn-default btn-white btn-round" id="refresh"  title="Actualiser">
                <i class="fa fa-refresh light-grey bigger-150"></i>
            </a>
        </div>
    </th>
</tr>
</thead>
