
<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <form method="post" action="{$url_base}Gespro/stetProgramme">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger">Creer un Programme de projets</h4>
                </div>

                <div class="modal-body">

                    {include file='src/view/gestio_projet/programme/input/_input.tpl'}
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancel
                    </button>

                    <button class="btn btn-sm btn-primary">
                        <i class="ace-icon fa fa-check"></i>
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div><!-- PAGE CONTENT ENDS -->