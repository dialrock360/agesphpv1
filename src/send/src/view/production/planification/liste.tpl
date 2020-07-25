
<div class="row">
    <div class="col-xs-12">

        {include file='src/view/production/planification/input/_modal.tpl'}

        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace" />
                        <span class="lbl"></span>
                    </label>
                </th>
                <th>Programme</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th class="hidden-480">Projets</th>
                <th class="hidden-480">Status</th>

                <th>
                    <div class="hidden-sm hidden-xs btn-group">

                        <a href="#modal-form" role="button" class="btn btn-xs btn-primary" title="Ajouter Programme" data-toggle="modal"> <i class="ace-icon fa fa-plus bigger-120"></i></a>

                        <button class="btn btn-xs btn-danger"  title="Supprimer Programme">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                        </button>


                    </div>

                </th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td class="center">
                    <label class="pos-rel">
                        <input type="checkbox" class="ace" />
                        <span class="lbl"></span>
                    </label>
                </td>



                <td>
                    <a href="#">ace.com</a>
                </td>
                <td>Feb 12</td>
                <td>Jan 12</td>
                <td class="hidden-480">10</td>
                <td class="hidden-480">
                    <span class="label label-sm label-warning">Expiring</span>
                </td>

                <td>
                    <div class="hidden-sm hidden-xs btn-group">

                        <a href="{$url_base}Programme/manage/1"  title="Manager Programme" class="btn btn-xs btn-success">  <i class="ace-icon fa fa-cogs bigger-120"></i></a>
                        <a href="{$url_base}Programme/edit/1"  title="Editer Programme" class="btn btn-xs btn-info">  <i class="ace-icon fa fa-pencil bigger-120"></i></a>
                        <a href="{$url_base}Programme/delete/1"  title="Supprimer Programme" class="btn btn-xs btn-danger">  <i class="ace-icon fa fa-trash bigger-120"></i></a>


                    </div>

                </td>
            </tr>

            </tbody>
        </table>
    </div><!-- /.span -->
</div><!-- /.row -->