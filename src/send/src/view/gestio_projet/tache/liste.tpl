<div class="admin-dashone-data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">

                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true"></th>
                                    <th data-field="id">#</th>
                                    <th data-field="name" data-editable="true">Tache</th>
                                    <th data-field="task" data-editable="true">Progression</th>
                                    <th data-field="date" data-editable="true">Date</th>
                                    <th data-field="date" data-editable="true">Deadline</th>
                                    <th data-field="support">Participants</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="action">
                                        <a href="#modal-form" role="button"  data-toggle="modal"  title="Ajouter Tache" class="btn btn-xs btn-success">  <i class="ace-icon fa fa-plus-circle bigger-120"></i></a>
                                         <a href="{$url_base}Tache/deleteall"  title="Supprimer Taches" class="btn btn-xs btn-danger">  <i class="ace-icon fa fa-trash bigger-120"></i></a>

                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td></td>
                                    <td>1</td>
                                    <td>Web Development</td>
                                    <td>10%</td>
                                    <td>Jul 14, 2018</td>
                                    <td>Jul 14, 2019</td>
                                    <td>
                                        <div class="support-list-img">
                                            <a href="#"><img src="img/notification/1.jpg" alt="" />
                                            </a>
                                            <a href="#"><img src="img/notification/2.jpg" alt="" />
                                            </a>
                                            <a href="#"><img src="img/notification/3.jpg" alt="" />
                                            </a>
                                            <a href="#"><img src="img/notification/4.jpg" alt="" />
                                            </a>
                                            <a href="#"><img src="img/notification/5.jpg" alt="" />
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group project-list-ad">
                                            <span class="label label-sm label-warning">Active</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group project-list-action">
                                            <a href="#modal-task" role="button"  data-toggle="modal"  title="Manager Tache" class="btn btn-xs btn-default">  <i class="ace-icon fa fa-check bigger-120"></i></a>
                                            <a href="#modal-form" role="button"  data-toggle="modal"  title="Editer Tache" class="btn btn-xs btn-info">  <i class="ace-icon fa fa-pencil bigger-120"></i></a>
                                            <a href="{$url_base}Tache/delete/1"  title="Supprimer Tache" class="btn btn-xs btn-danger">  <i class="ace-icon fa fa-trash bigger-120"></i></a>

                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>