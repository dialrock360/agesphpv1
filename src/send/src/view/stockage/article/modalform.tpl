
<div id="modal-form" class="modal" tabindex="-1">
    <form method="post" class="form-horizontal" action="{$url_base}Stokage/addArticle/single" enctype="multipart/form-data">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="blue bigger" id="rep">Veuillez remplir les champs du formulaire </h4>

                </div>

                <div class="modal-body">
                    <div class="row">


                        <div class="col-xs-12 col-sm-12">

                            <div class="space-4"></div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group" style="background-color:lavender;">
                                        <label for="id_categorie">Photos</label>


                                        <small>
                                            <div class="btn-group" id="dynamic-image-preview">


                                            </div>

                                        </small>
                                        <input id="file-input" type="file" name="photos[]"  multiple>
                                        <div id="preview"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nom_article">Designation</label>

                                        <div>
                                            <input type="text" id="nom_article" placeholder="nom de l'article" name="nom_article" required/>
                                            <input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>
                                            <input class="form-control" type="hidden" name="id" value="0" id="id"/>
                                            <input class="form-control" type="hidden" name="addmethode" value="0" id="addmethode"/>
                                            <input class="form-control" type="hidden" name="action" value="add" id="action"/>
                                            <input class="form-control" type="hidden" name="type_article" value="simple" id="type_article"/>
                                            <input class="form-control" type="hidden" name="nbrstockage" value="" id="nbrstockage"/>
                                            <input class="form-control" type="hidden" name="tabidstock" value="" id="tabidstock"/>
                                            <input class="form-control" type="hidden" name="flag_article" value="0" id="flag_article"/>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_categorie">Categorie</label>

                                        <div id="dinamic_categorie">
                                            <select class="form-control" name="old_id_categorie" id="old_id_categorie"    >
                                                <option  value="0" > </option>
                                                {foreach from=$categories item=champ}
                                                    <option value="{$champ['id']}">{$champ['nom_categorie']}  </option>
                                                {/foreach}
                                            </select>
                                        </div>

                                        <div id="normal_categorie">



                                            <select class="chosen-select form-control" name="id_categorie" id="id_categorie" data-placeholder="Choisir Categorie..." >
                                                <option  > </option>
                                                {$opticategories}
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group"  style="background-color:lavender;">
                                        <div>
                                            <label for="fiche_technique">Fiche technique</label>

                                            <textarea id="fiche_technique" name="fiche_technique" class="form-control" rows="14"></textarea>
                                        </div>

                                    </div>

                                </div>
                            </div>













                            <div class="space-4"></div>


                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancel
                    </button>

                    <button class="btn btn-sm btn-primary" type="submit" name="valider">
                        <i class="ace-icon fa fa-check"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </form>
</div><!-- PAGE CONTENT ENDS -->