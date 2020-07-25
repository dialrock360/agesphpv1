<div class="row">
    <div class="col-xs-12">




        <input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
        <input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>


        <!-- PAGE CONTENT BEGINS -->
        <form method="post" name="FormData" action="{$url_base}Article/add_article/multiple" enctype="multipart/form-data">
            <fieldset id="entitie" class="wrapper" >
                <input  type="hidden" name="addmethode" value="2"   />


                <table class="table table-striped table-bordered" id="tbl"> <caption>

                        <a href="{$url_base}Article/liste/{$smarty.session.user.id_service}"  title="Liste des articles">
                            <i class="ace-icon fa fa-hand-o-right green"></i>
                            <i class="fa fa-list light-blue2 bigger-150"></i>

                        </a>
                        <div id="ok" > </div>
                    </caption>

                    <tr>
                        <th>Image article </th>
                        <th>Designation</th>
                        <th>Prix d'achat </th>
                        <th>Prix de vente </th>
                        <th>Prix de vente minimum</th>
                        <th>categorie   </th>
                        <th><button class="btn btn-info pull-right" type="button" onclick="addRow()">Ajouter</button></th>
                    </tr>
                    <tr  id="row0">
                        <td>
                            <input name="photos[]" type="file" multiple=""  />
                        </td>
                        <td>
                            <input type="text" id="nom_article0" placeholder="nom de l'article" name="nom_article[]" />
                            <input class="form-control" type="hidden" name="id_service[]" value="{$smarty.session.user.id_service}" id="id_service0"/>
                            <input class="form-control" type="hidden" name="id[]" value="0" id="id0"/>
                            <input class="form-control" type="hidden" name="type_article[]" value="0" id="type_article0"/>
                            <input class="form-control" type="hidden" name="tabidp" value="" id="tabidp0"/>
                            <input class="form-control" type="hidden" name="tabqnt[]" value="" id="tabqnt0"/>
                            <input class="form-control" type="hidden" name="tabmts[]" value="" id="tabmts0"/>
                            <input class="form-control" type="hidden" name="pxrv[]" value="" id="pxrv0"/>
                            <input class="form-control" type="hidden" name="flag_article[]" value="0" id="flag_article0"/>
                        </td>
                        <td>
                            <input type="number" min="0" id="pxa_article0" placeholder="Prix d'achat de l'article" name="pxa_article[][]" />

                        </td>
                        <td>
                            <input type="number" min="0" id="pxv_article0" placeholder="Prix de vente de l'article" name="pxv_article[]" />

                        </td>
                        <td>
                            <input type="number" min="0" id="pxvbar_article0" placeholder="Prix de vente de l'article" name="pxvbar_article[]" />

                        </td>
                        <td>
                            <select class="chosen-select form-control" id="id_categorie0" name="id_categorie[]" data-placeholder="Choisir Categorie...">
                                <option> </option>
                                {foreach from=$categories item=champ}
                                    <option value="{$champ['id']}">{$champ['nom_categorie']}  </option>
                                {/foreach}
                            </select>
                        </td>
                        <td>

                            <a class="btn btn-app btn-danger btn-xs radius-4 pull-right"  id="btnDelete0" onclick="DeleteRow(0)" value="Supprimer" >
                                <i class="ace-icon fa fa-trash bigger-160"></i>
                            </a>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <hr>

            <div class="form-group">
                <button class="btn btn-app btn-success btn-lg radius-4 pull-left"  type="submit">
                    <i class="ace-icon fa fa-floppy-o bigger-250"></i>
                    Enregistrer


                    <span class="badge badge-transparent">
												<i class="light-red ace-icon fa fa-asterisk"></i>
											</span>
                </button>
                <button class="btn btn-info pull-right" type="button" onclick="addRow()">Ajouter</button>
            </div>
        </form>


    </div><!-- /.col -->
</div><!-- /.row -->

<script  >
    var varurl2=$("#varurl2").val();
    var ids=$("#ids").val();
    function getcategories(selector) {
        //line added for the var that will have the result
        var result = null;
        var chnData = '';
        var gridArrayData = [];

        $.ajax({
            type: 'GET',
            url: varurl2+'Categorie/liste2/'+$("#ids").val(),
            dataType: "json",
            //line added to get ajax response in sync
            async: false,
            success: function(data) {
                var i=1;
                $.each(data, function (index, value) {
                    // console.log(i);
                    if (value["id"]!=''){
                        b=(i<data.length)?';':'';


                        chnData += (selector=='option')?'<option value="'+value["id"]+'">'+value["nom_categorie"]+'</option>':''+value["id"]+':'+value["nom_categorie"]+b;
                        //chnData  +=''+value["id"]+':'+value["nom_categorie"]+b;
                        i++;
                        // console.log(chnData);

                    }

                    // value:"FE:FedEx;IN:InTime;Gm:Games;TN:TNT;Prt:PRINTER;AR:ARAMEX"
                    gridArrayData.push({
                        id: value["id"],
                        nom_categorie: value["nom_categorie"] ,
                        id_famille:  value["id_famille"],
                        nom_famille:  value["nom_famille"]
                    });

                    result = (selector=='tab')?gridArrayData:chnData;

                });
            },
            error: function() {
                alert('Error occured'+varurl2+'Categorie/liste2/'+$("#ids").val());
            }
        });
        //line added to return ajax response
        return result;
    }
    function addRow()
    {

        var table = document.getElementById("tbl"); //get the table
        var rowcount = table.rows.length; //get no. of rows in the table
//append the controls in the row
        var selechd='<select class="chosen-select form-control" id="id_categorie' + rowcount + '" name="id_categorie[]" data-placeholder="Choisir Categorie...">';
        var option=getcategories('option');
        var tblRow ='<tr id="row' + rowcount + '">' +
            '<td>' +
            '<input name="photos[]" type="file" multiple=""  />' +
            '</td>' +
            '<td>' +
            '<input type="text" id="nom_article' + rowcount + '" placeholder="nom de l\'article" name="nom_article[]" />' +
            '<input class="form-control" type="hidden" name="id_service[]" value="'+ids+'" id="id_service' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="id[]" value="0" id="id' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="type_article[]" value="0" id="type_article' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="tabidp" value="" id="tabidp' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="tabqnt[]" value="" id="tabqnt' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="tabmts[]" value="" id="tabmts' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="pxrv[]" value="" id="pxrv' + rowcount + '"/>' +
            '<input class="form-control" type="hidden" name="flag_article[]" value="0" id="flag_article' + rowcount + '"/>' +
            '</td>' +
            '<td>' +
            '<input type="number" min="0" id="pxa_article' + rowcount + '" placeholder="Prix d\'achat de l\'article" name="pxa_article[][]" />' +

            '</td>' +
            '<td>' +
            '<input type="number" min="0" id="pxv_article' + rowcount + '" placeholder="Prix de vente de l\'article" name="pxv_article[]" />' +

            '</td>' +
            '<td>' +
            '<input type="number" min="0" id="pxvbar_article' + rowcount + '" placeholder="Prix de vente de l\'article" name="pxvbar_article[]" />' +

            '</td>' +
            '<td>' +selechd +
            '<option> </option>' +option+

            '</select>' +
            '</td>' +
            '<td>' +

            '<a class="btn btn-app btn-danger btn-xs radius-4 pull-right"  id="btnDelete' + rowcount + '" onclick="DeleteRow(' + rowcount + ')" value="Supprimer" >' +
            '<i class="ace-icon fa fa-trash bigger-160"></i>' +
            '</a>' +
            '</td>' +
            '</tr>' ;



//append the row to the table.
        $("#tbl").append(tblRow);
    }

    function DeleteRow(id)
    {
        $("#row" + id).remove();
    }
</script>
