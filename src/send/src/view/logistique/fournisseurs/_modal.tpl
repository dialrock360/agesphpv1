<div id="modal-form" class="modal" tabindex="-1">
    <form method="post" name="FormData" action="{$url_base}Logistique/Add/fournisseur" enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Nouveau Fournisseur</h4>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        {include file='src/view/grh/commercial/input/_fileinput.tpl'}

                        {include file='src/view/grh/commercial/input/_input_person.tpl'}

                    </div>
                    <div class="col-sm-8 col-md-8">


                        {include file='src/view/grh/commercial/input/_input_cordonees.tpl'}
                        <div class="space-6"></div>
                        <label for="typepiece_personne">Piece d'identité </label>
                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
											    <select name="typepiece_personne" class="form-control champ" >
            <option selected value="{$personne['typepiece_personne']}">{if isset($personne)} {$personne['typepiece_personne']}   {/if}</option>
            <option value="CNI">CNI</option>
            <option value="PASSEPORT">PASSEPORT</option>
            <option value="RC">RC</option>
            <option value="Autre">Autre</option>
        </select>

														</span>
                        </label>

                        <label for="numpiece_personne">Numéro</label>

                        <label class="block clearfix">
														<span class="block input-icon input-icon-right">
        <input class="form-control" type="text" placeholder="Numero de la piece" name="numpiece_personne" value="{if isset($personne)} {$personne['numpiece_personne']} {/if}" id="numpiece_personne"/>
															<i class="ace-icon fa fa-barcode"></i>
														</span>
                        </label>

                    </div>
                </div>




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
    </form>
</div>
