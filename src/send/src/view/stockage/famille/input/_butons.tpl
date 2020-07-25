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
    <a href="{$url_base}Famille/index/{$smarty.session.user.id_service}" class=" btn btn-sm btn-default btn-white btn-round" id="refresh"  title="Actualiser">
        <i class="fa fa-refresh light-grey bigger-150"></i>
    </a>
</div>