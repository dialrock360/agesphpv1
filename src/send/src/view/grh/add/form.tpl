
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="clearfix">
            <div class="pull-left alert alert-success no-margin alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <i class="ace-icon fa fa-umbrella bigger-120 blue"></i>
                Click on the image below or on profile fields to edit them ...
            </div>

            <div class="pull-right">
                <span class="green middle bolder">Acces Rapide: &nbsp;</span>

                <div class="btn-toolbar inline middle no-margin">
                    <div data-toggle="buttons" class="btn-group no-margin">
                        <label class="btn btn-sm btn-yellow active">
                            <span class="bigger-110">Employee</span>

                            <input type="radio" value="2" />
                        </label>

                        <label class="btn btn-sm btn-yellow">
                            <span class="bigger-110">Prestataire</span>

                            <input type="radio" value="3" />
                        </label>

                        <label class="btn btn-sm btn-yellow">
                            <span class="bigger-110">Stagiaire</span>

                            <input type="radio" value="1" />
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="hr dotted"></div>



        {include file='src/view/grh/employee/form.tpl'}
        {include file='src/view/grh/prestataire/form.tpl'}
        {include file='src/view/grh/stagiaire/form.tpl'}

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->