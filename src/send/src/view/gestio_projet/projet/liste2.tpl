<div class="admin-dashone-data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                {include file='src/view/gestio_projet/projet/input/_modal.tpl'}

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
                                    <th data-field="project" data-editable="true">Project</th>
                                    <th data-field="programme"  >Programme</th>
                                    <th data-field="cout" data-editable="true">Cout</th>
                                    <th data-field="complete">Chef</th>
                                    <th data-field="date" data-editable="true">Date</th>
                                    <th data-field="Deadline" data-editable="true">Deadline</th>
                                    <th data-field="Progression" data-editable="true">Progression</th>
                                    <th data-field="status">Status</th>
                                    <th data-field="action">
                                        <a href="#modal-form" role="button" class="btn btn-xs btn-primary" title="Ajouter Programme" data-toggle="modal"> <i class="ace-icon fa fa-plus bigger-120"></i></a>

                                        <button class="btn btn-xs btn-danger"  title="Supprimer Programme">
                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                        </button>
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td></td>
                                    <td>1</td>
                                    <td>Web Development</td>
                                    <td>Web Ltd.</td>
                                    <td>1000000</td>

                                    <td>Alber</td>

                                    <td>Jul 14, 2018</td>
                                    <td>Jul 14, 2019</td>
                                    <td>10%</td>
                                    <td>
                                        <div class="btn-group project-list-ad">
                                            <span class="label label-sm label-warning">Active</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group project-list-action">
                                            <a href="{$url_base}Projet/manage/1"  title="Manager Projet" class="btn btn-white btn-action btn-xs">  <i class="ace-icon fa fa-check bigger-120 orange" ></i> View</a>
                                            <a href="#"   href="#modal-form" role="button" title="Editer Projet"class="btn btn-white btn-xs">  <i class="ace-icon fa fa-pencil bigger-120 blue"></i> Edit</a>
                                            <a href="{$url_base}Projet/delete/1"  title="Supprimer Projet" class="btn btn-default btn-xs">  <i class="ace-icon fa fa-trash bigger-120 red"> Delete</i></a>
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