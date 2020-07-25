<form method="post"  action="{$url_base}Categorie/posupdate" >

<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="id_service" value="{$smarty.session.user.id_service}" id="id_service"/>


<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="space-6"></div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-large">
                        <h3 class="widget-title grey lighter">

                            <input class="form-control" type="hidden" name="nbr_produit_categorie" value="{if isset($nbr_produit_categorie)} {$nbr_produit_categorie} {/if}" id="nbr_produit_categorie"/>
                            <input class="form-control" type="hidden" name="id" value="{if isset($categorie)} {$categorie['id']} {/if}" id="id"/>
                            <input class="form-control" type="hidden" name="valeur_categorie" value="{if isset($categorie)} {$categorie['valeur_categorie']} {/if}" id="valeur_categorie"/>


                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="nom_categorie"><i class="menu-icon glyphicon glyphicon-th-list"></i></label>

                                <div class="col-sm-9">
                                    <input class="input-sm" type="text"  name="nom_categorie" value="{if isset($categorie)} {$categorie['nom_categorie']} {/if}" id="nom_categorie" onblur="getval();" placeholder=".input-sm" />

                                </div>
                            </div>

                        </h3>

                        <div class="widget-toolbar no-border invoice-info">
                            <div class="form-group">
                                <label for="form-field-select-1"> Famille:</label>
                                <select class="chosen-select  form-control input-sm"  id="id_famille" name="id_famille"  onchange="getval();" >
                                    <option value="{if isset($categorie)} {$categorie['id_famille']} {/if}" disabled selected>{if isset($categorie)} {$categorie['nom_famille']} {/if}</option>
                                    {$optifamilles}
                                </select>
                            </div>
                        </div>

                        <div class="widget-toolbar hidden-480">
                            <a href="#">
                                <i class="menu-icon glyphicon glyphicon-th-large"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-24">

                            <div id="ok" class="center">

                            </div>
                            <div class="col-sm-12">

                                <div id="accordion" class="accordion-style1 panel-group">

                                    {include file='src/view/stockage/categorie/tabarticle_categorie.tpl'}

                                </div>
                            </div><!-- /.col -->

                            <div class="hr hr8 hr-double hr-dotted"></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-app btn-success btn-lg radius-4 pull-left"  type="submit">
            <i class="ace-icon fa fa-floppy-o bigger-250"></i>
            Enregistrer


            <span class="badge badge-transparent">
												<i class="light-red ace-icon fa fa-asterisk"></i>
											</span>
        </button
        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
</form>

<script>
    var varurl2=$("#varurl2").val();


    function getval()
    {
        var id_service=$("#id_service").val();
        var varurl2=$("#varurl2").val();
        var id=$("#id").val();
        var nbr_produit_categorie=$("#nbr_produit_categorie").val();
        var nom_categorie=$("#nom_categorie").val();
        var id_famille=$("#id_famille").val();
        var valeur_categorie=$("#valeur_categorie").val();
      //  $("#ok").html(id+' nom_categorie => '+nom_categorie+' id_service => '+id_service+' id_famille => '+id_famille+' nbr produit  => '+nbr_produit_categorie);
      // $("#ok").html(id+' nom_categorie => '+nom_categorie+' id_service => '+id_service+' id_famille => '+id_famille+' nbr_produit_categorie => '+nbr_produit_categorie+' val => '+valeur_categorie);
        $("#ok").fadeOut();
        var sendInfo = {
            id: id,
            nbr_produit_categorie: nbr_produit_categorie,
            id_service: id_service,
            nom_categorie: nom_categorie,
            id_famille: id_famille,
            valeur_categorie: valeur_categorie,
            modifier: 'modifier'
        };
        // $("#ok").fadeOut(500);


            $.ajax({
                url: varurl2+'/Categorie/update',
                type: 'POST',
                data: sendInfo,
                dataType: 'json'
            })
                .done(function(data){
                    $("#ok").fadeIn(500);
                    $("#ok").html('<div class="alert alert-success">Mise a jour reussi !</div>');

                    $("#ok").fadeOut(7000);

                })
                .fail(function(e){
                    $("#ok").fadeIn(500);
                    $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
                    $("#ok").fadeOut(710000);
                    console.log(e);
                });
    }

</script>