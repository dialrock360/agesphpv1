<div class="row">
    <div class="col-md-8 col-xs-12 col-md-offset-2"  >
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Editer un Programme  {$idprogramme}</h4>

            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <form method="post" action="{$url_base}Programme/update">

                        {include file='src/view/gestio_projet/programme/input/_input.tpl'}

                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    Valider
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="ace-icon fa fa-undo bigger-110"></i>
                                    Annuler
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.span -->

</div><!-- /.row -->
