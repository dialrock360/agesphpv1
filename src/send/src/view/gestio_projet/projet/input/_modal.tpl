
<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Nouveau Project</h4>
            </div>

            <div class="modal-body">
                <input class="form-control" type="hidden" name="id_programme" value="{if isset($projet)} {$projet['id_programme']} {/if}" id="id_programme"/>

                {include file='src/view/gestio_projet/projet/input/_input.tpl'}

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
    </div>
</div><!-- PAGE CONTENT ENDS -->