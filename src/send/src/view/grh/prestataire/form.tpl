
<div class="{if $status!='prestataire'} hide {/if} " >
    <div id="user-profile-3" class="user-profile row">
        <div class="col-sm-offset-1 col-sm-10">


            <div class="space"></div>

            <form class="form-horizontal">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-16">
                        <li class="active">
                            <a data-toggle="tab" href="#edit-basic">
                                <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                                 Info de Base
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#edit-settings">
                                <i class="purple ace-icon fa fa-phone bigger-125"></i>
                                Contact
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#edit-password">
                                <i class="blue ace-icon fa fa-money bigger-125"></i>
                                Prix service
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content profile-edit-tab-content">

                        {include file='src/view/grh/prestataire/input/_personne.tpl'}
                        {include file='src/view/grh/prestataire/input/_contact.tpl'}
                        {include file='src/view/grh/prestataire/input/_contrat.tpl'}



                    </div>
                </div>

                <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="button">
                            <i class="ace-icon fa fa-check bigger-110"></i>
                            Save
                        </button>

                        &nbsp; &nbsp;
                        <button class="btn" type="reset">
                            <i class="ace-icon fa fa-undo bigger-110"></i>
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div><!-- /.span -->
    </div><!-- /.user-profile -->
</div>