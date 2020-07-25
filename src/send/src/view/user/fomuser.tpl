


<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
            <tr>
                <th class="center">
                    <label class="pos-rel">
                        <div class="row">
                            <input id="myInput" class="form-control" type="text" name="nom_stock" value="Designation..">
                            <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
                        </div>

                        <span class="lbl"></span>

                    </label>
                </th>
                <th>Nbr Articles</th>
                <th>Valeur</th>
                <th>
                    <div class="form-group">
                        <button class=" btn btn-sm btn-success btn-white btn-round" type="button">
                            <i class="fa fa-save light-green bigger-150"></i>
                        </button>


                        <button class="btn btn-sm btn-danger btn-white btn-round" type="button">
                            <i class="fa fa-remove light-red bigger-150"></i>
                        </button>

                        <button class="btn btn-sm btn-primary btn-white btn-round" type="button">
                            <i class="fa fa-plus light-blue bigger-150"></i>
                        </button>
                    </div>
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>
                    <button class=" btn btn-sm btn-primary btn-white btn-round" type="button">
                        <i class="fa fa-edit light-blue bigger-110"></i>
                    </button>


                    <button class="btn btn-sm btn-danger btn-white btn-round" type="button">
                        <i class="fa fa-trash light-red bigger-110"></i>
                    </button>


                </td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@mail.com</td>
                <td>
                    <button class=" btn btn-sm btn-primary btn-white btn-round" type="button">
                        <i class="fa fa-edit light-blue bigger-110"></i>
                    </button>


                    <button class="btn btn-sm btn-danger btn-white btn-round" type="button">
                        <i class="fa fa-trash light-red bigger-110"></i>
                    </button>


                </td>
            </tr>
            </tbody>

        </table>
    </div><!-- /.span -->
</div><!-- /.row -->