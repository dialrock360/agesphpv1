<div id="user-profile-1" class="user-profile row">

    <form method="post" name="FormData" action="{$url_base}Logistique/Add/fournisseur" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-10 col-xs-10 col-md-offset-1"  >
        <div class="position-relative">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Formulaire fournisseur</h4>

                    <span class="widget-toolbar">


														<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>


													</span>
                    {if isset($ok)}
                        {if $ok != ""}
                            {if $ok != 0}
                                <div class="alert alert-success">Données ajoutées!</div>
                            {else}
                                <div class="alert alert-danger">Erreur!</div>
                            {/if}
                        {/if}
                    {/if}
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <table class="table table-striped">

                            <tbody>
                            <tr>
                                <td >

                                    {include file='src/view/grh/commercial/input/_fileinput.tpl'}

                                    {include file='src/view/grh/commercial/input/_nominput.tpl'}
                                    {include file='src/view/grh/commercial/input/_natureinput.tpl'}
                                    {include file='src/view/grh/commercial/input/_cniinput.tpl'}

                                </td>
                                <td >
                                    {include file='src/view/grh/commercial/input/_input_cordonees.tpl'}


                                </td>
                            </tr>
                            <tr>

                                <td colspan="3">

                                    <div class="form-group">
                                        <button class="btn btn-app btn-success btn-lg radius-4 pull-right"  type="submit">
                                            <i class="ace-icon fa fa-floppy-o bigger-250"></i>
                                            Enregistrer


                                            <span class="badge badge-transparent">
												<i class="light-red ace-icon fa fa-asterisk"></i>
											</span>
                                        </button>
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
    </form>
</div>