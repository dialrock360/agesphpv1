<input class="form-control" type="hidden" name="varurl2" value="{$url_base}" id="varurl2"/>
<input class="form-control" type="hidden" name="ids" value="{$smarty.session.user.id_service}" id="ids"/>
<input  type="hidden" value="{$url_base}Stock" id="varurlx"   />

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <div class="space-6"></div>
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="widget-box transparent">
                    <div class="widget-header widget-header-large">
                        <h3 class="widget-title grey lighter">
                            <i class="ace-icon fa fa-database blue"></i>
                            <span class="blue">{if isset($stock)} {$stock['nom_stock']} {/if}  || </span>
                            Valeur  :
                            <span class="red"> {if isset($stock)} {$stock['valeur']} {/if} Fr</span>
                        </h3>

                        <div class="widget-toolbar no-border invoice-info">
                            <span class="invoice-info-label">Invetaire:</span>
                            <span class="red">#121212</span>

                            <br />
                            <span class="invoice-info-label">Date:</span>
                            <span class="blue">04/04/2014</span>
                        </div>

                        <div class="widget-toolbar hidden-480">
                            <a href="#">
                                <i class="ace-icon fa fa-print"></i>
                            </a>
                        </div>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main padding-24">

                            <div class="col-sm-12">
                                {if isset($notif_stock) && $notif_stock > 0}

                                <h3 class="row header smaller lighter blue">
                                    <span class="col-xs-6"> Notifications de ravitaillement </span><!-- /.col -->

                                </h3>
                                {/if}
                                <div id="accordion" class="accordion-style1 panel-group">

                                    {include file='src/view/stockage/stock/modalform.tpl'}
                                    {include file='src/view/stockage/stock/viewnotifArticle.tpl'}
                                    {include file='src/view/stockage/stock/formarticle_stock.tpl'}
                                    {include file='src/view/stockage/stock/tabarticle_stock.tpl'}

                                </div>
                            </div><!-- /.col -->

                            <div class="hr hr8 hr-double hr-dotted"></div>

                            <div class="row">
                                <div class="col-sm-5 pull-right">
                                    <h4 class="pull-right">
                                        Valeur Total du stock :
                                        <span class="red">{if isset($stock)} {$stock['valeur']} {/if} Fr</span>
                                    </h4>
                                </div>
                                <div class="col-sm-7 pull-left"> Extra Information </div>
                            </div>

                            <div class="space-6"></div>
                            <div class="well">
                                Thank you for choosing Ace Company products.
                                We believe you will be satisfied by our services.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
{literal}
<script>
    var articleOption = '{/literal}{$optionarticles}{literal}';
    var condisOption  = '{/literal}{$optionconditionements}{literal}';
</script>
{/literal}

<script>
    var varurl=$("#varurl").val();
    var articles=$("#articles").val();

    function addRow()
    {


        var rows =parseInt($("#nbrline").val());
        var rowcount =rows + 1;
        //append the controls in the row
        var tblRow = '<div class="row" id="row_'+ rowcount +' "><div class="col-md-12 "><div class="widget-box"><div class="widget-header">' +
                                                    '<h4 class="widget-title">Article N ' + rowcount + '</h4>' +

                                                    '<div class="widget-toolbar"><a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i>' +
                                                        '</a> <a href="#" data-action="close"><i class="ace-icon fa fa-times"></i></a>' +
                                                   '</div></div><div class="widget-body"><div class="widget-main">' +





            '<div class="row"   >' +

                '  <div class="col-md-4">' +
                                            ' <div class="widget-box">' +
                                                ' <div class="widget-header">' +
                                                    ' <h4 class="widget-title">Article  en Stock</h4>' +
                                                ' </div>' +

                                                ' <div class="widget-body">' +
                                                  '   <div class="widget-main">' +
                                                        ' <div class="form-group">' +
                                                          '   <label for="id_article_' + rowcount + '">Article</label>' +
                                                          '   <select class="chosen-select form-control" id="id_article_' + rowcount + '" name="id_article[]" data-placeholder="Choisir Article..." required><option> </option>' +

                                                               articleOption+
                                                           '  </select>' +
                                                        ' </div>' +
                                                        ' <div class="form-group">' +
                                                          '   <label  for="pu_article_en_stock_' + rowcount + '"> Cout d\'achat </label>' +
                                                           '  <input type="number" min="0" onblur="setCoutAchat(' + rowcount + ')" id="pu_article_en_stock_' + rowcount + '" class="form-control" placeholder="Prix de vente unitaire"  value="0" name="pu_article_en_stock[]" />' +

                                                       '  </div>' +
                                                  '   </div>' +
                                               '  </div>' +
                                            ' </div>' +
                                        ' </div>' +


            '  <div class="col-md-4">' +
                                            ' <div class="widget-box">' +
                                                ' <div class="widget-header">' +
                                                    ' <h4 class="widget-title">Conditionement</h4>' +
                                                ' </div>' +

                                                ' <div class="widget-body">' +
                                                  '   <div class="widget-main">' +
                                                        ' <div class="form-group">' +
                                                          '   <label for="id_conditionement_' + rowcount + '">Conditionement</label>' +
                                                          '   <select class="chosen-select form-control" id="id_conditionement_' + rowcount + '" name="id_conditionement[]" data-placeholder="Choisir conditionement..." required><option> </option>' +

                                                              condisOption+
                                                           '  </select>' +
                                                        ' </div>' +
                                                            '<div  >' +
                                                            '<div class="row">' +
                                                            '<div class="col-xs-3">' +
                                                            '<div>' +
                                                            '<label  for="qnt_unite_1"> Qnt unités </label>' +
                                                            '<input type="number" min="0" id="qnt_unite_' + rowcount + '" class="input-small"  onblur="setCoutAchat(' + rowcount + ')"  placeholder="Nombre d\'unite"  value="1" name="qnt_unite[]" />' +

                                                            '</div>' +
                                                            '</div>' +

                                                            '<div class="col-xs-5">' +
                                                            '<div>' +

                                                            '<label  for="id_unite_1"> Nature d\'unités</label>' +
                                                            '<select class="chosen-select form-control" id="id_unite_1" name="id_unite[]" data-placeholder="Choisir Nature d\'unités..." required><option> </option>' +

                                                            condisOption+
                                                            ' </select>' +
                                                            ' </div>' +
                                                            '</div>' +


                                                            '   <div class="col-xs-4">' +
                                                            '   <div>' +
                                                            '   <label  for="qnt_unite_' + rowcount + '"> Prix d\'unités </label>' +
                                                            '  <input type="number" min="0" id="prix_unite_' + rowcount + '" class="input-small" readonly   value="0" name="prix_unite[]" />' +

                                                            ' </div>' +
                                                            ' </div>' +

                                                            ' </div>' +

                                                            '</div> ' +

            '   </div>' +
                                               '  </div>' +
                                            ' </div>' +
                                        ' </div>' +



            '  <div class="col-md-4">' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Quantité en Stock </h4>' +
            ' </div>' +

            ' <div class="widget-body">' +
            '   <div class="widget-main">' +

                        '<div class="form-group">' +
                        '<label  for="qnt_article_en_stock_' + rowcount + '"> Quantité en Stock </label>' +
                        '<input type="number" readonly  min="0" id="qnt_article_en_stock' + rowcount + '" placeholder="Quantité en Stock"  value="0" name="qnt_article_en_stock[]" />' +

                        '</div>' +
                        '<div class="row">' +
                        ' <div class="col-md-6">' +
                        '<div>' +
                        '<div class="form-group">' +
                        '<label  for="min_qnt_article_en_stock_' + rowcount + '">Min Qnt</label>' +
                        '<input type="number" min="0" id="min_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité en Stock"  class="input-small"  value="1" name="min_qnt_article_en_stock[]" />' +

                        '</div>' +
                        '</div>' +
                        '</div>' +

                        '<div class="col-md-6 ">' +
                        '<div>' +
                        '<div class="form-group">' +
                        '<label  for="max_qnt_article_en_stock_' + rowcount + '"> Max Qnt </label>' +
                        '<input type="number" min="0" id="max_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité Maximal en Stock"   class="input-small" name="max_qnt_article_en_stock[]" />' +

                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
            '   </div>' +
            '  </div>' +
            ' </div>' +
            ' </div>' +





                                        '<!--  <div class="col-md-1">' +


                                            '  <a class="btn btn-app btn-danger btn-xs radius-4 pull-right"  id="btnDelete_1" onclick="DeleteRow(1)" value="Supprimer" >' +
                                            '      <i class="ace-icon fa fa-trash bigger-160"></i>' +
                                            '  </a>' +
                                        '  </div> -->' +

            '</div></div></div></div></div>' ;







        var submitRow ='<tr id="row_0"><td colspan="2"> </td><td  colspan="2"><div class="form-group">' +
            '    <button class="btn btn-success pull-right" type="submit"  value="valider">Enregistrer</button>' +
            ' </div></td></tr>'  ;

        //append the row to the table.
        $("#fomart").prepend(tblRow);
        //  $("#tbl").append(submitRow);
      $("#nbrline").val(rowcount);
    }
    function DeleteRow(id)
    {
         var rows=$("#nbrline").val()-1;
        $("#row_" + id).remove();
        var crow=(rows<=0)?0:rows;
        $("#nbrline").val(crow);
    }

    function setCoutAchat(index)
    {
         var qnt_unite=parseInt($("#qnt_unite_"+ index).val());
        // alert(qnt_unite);
         var pu_article_en_stock=parseInt($("#pu_article_en_stock_"+ index).val());
         var prix_unite=parseInt($("#prix_unite_"+ index).val());
         var numb = parseFloat(pu_article_en_stock/qnt_unite);
         var num = numb.toFixed(2);
     //    alert(pu_article_en_stock+' ff '+qnt_unite+' == '+num)
        $("#prix_unite_"+ index).val(num);

    }

    function setCoutAchat1() {
        var myqnt=parseInt($("#myqnt").val());
        // alert(qnt_unite);
        var pustock=parseInt($("#mypustock").val());
        var numb = parseFloat(pustock/myqnt);
        var num = numb.toFixed(2);
        //    alert(pu_article_en_stock+' ff '+qnt_unite+' == '+num)
        $("#mypu").val(num);
    }











    function addRow2()
    {

        var table = document.getElementById("tbl"); //get the table
        var rowcount = table.rows.length; //get no. of rows in the table
        //append the controls in the row
        var tblRow = '<tr id="row_' + rowcount + '">' +
            ' <td class="col-md-4">  <label for="id_article_1">Article</label>' +
            ' <select class="chosen-select form-control" id="id_article_' + rowcount + '" name="id_article[]" data-placeholder="Choisir Article..."> ' +
              articleOption+
            '</select></div>' +
            '<div class="form-group">' +
            '<label  for="pu_article_en_stock_1"> Cout d\'achat </label>' +
            '<input type="number" min="0" id="pu_article_en_stock_' + rowcount + '" class="form-control" placeholder="Prix de vente unitaire"  value="0" name="pu_article_en_stock[]" />' +
            ' </div>' +
            '</td> ' +

     '<td class="col-md-4">' +

         '<div class="form-group">' +
             '<label for="id_conditionement_1">Conditionement</label>' +
             '<select class="chosen-select form-control" id="id_conditionement_' + rowcount + '" name="id_conditionement[]" data-placeholder="Choisir conditionement...">' +
              condisOption+
             '</select>' +

         '</div>' +


                '<div  >' +
                                                '<div class="row">' +
                                                    '<div class="col-xs-3 ">' +
                                                        '<div>' +
                                                            '<label  for="qnt_unite_1"> Nbr unités </label>' +
                                                            '<input type="number" min="0" id="qnt_unite_1" class="input-small" placeholder="Nombre d\'unite"  value="1" name="qnt_unite[]" />' +

                                                        '</div>' +
                                                    '</div>' +

                                                    '<div class="col-xs-5 ">' +
                                                        '<div>' +

                                                            '<label  for="id_unite_1"> Nature d\'unités</label>' +
                                                            '<select class="chosen-select form-control" id="id_unite_1" name="id_unite[]" data-placeholder="Choisir Nature d\'unités...">' +

                                                                  condisOption+
                                                           ' </select>' +
                                                       ' </div>' +
                                                    '</div>' +

                                                                         '   <div class="col-xs-4">' +
                                                                                                     '   <div>' +
                                                                                                         '  <a href="javascript:void(0)" onclick="setCoutAchat(' + rowcount + ')" > <label  for="prix_unite_' + rowcount + '"> Prix d\'unités </label> </a>' +
                                                                                                          '  <input type="number" min="0" id="prix_unite_' + rowcount + '" onmouseover="setCoutAchat(' + rowcount + ')" class="input-small" placeholder="Prix achat unitaire"  value="0" name="prix_unite[]" />' +

                                                                                                       ' </div>' +
                                                                                                   ' </div>' +

                                               ' </div>' +

                                            '</div> ' +



     '</td>' +



    '<td class="col-md-3">' +
        '<div class="form-group">' +
            '<label  for="qnt_article_en_stock_1"> Quantité en Stock </label>' +
            '<input type="number" readonly  min="0" id="qnt_article_en_stock_1" placeholder="Quantité en Stock"  value="0" name="qnt_article_en_stock[]" />' +

        '</div>' +
        '<div class="row">' +
           ' <div class="col-md-6">' +
                '<div>' +
                    '<div class="form-group">' +
                        '<label  for="min_qnt_article_en_stock_1">Min Qnt</label>' +
                        '<input type="number" min="0" id="min_qnt_article_en_stock_1" placeholder="Quantité en Stock"  class="input-small"  value="1" name="min_qnt_article_en_stock[]" />' +

                    '</div>' +
                '</div>' +
            '</div>' +

            '<div class="col-md-6 ">' +
                '<div>' +
                    '<div class="form-group">' +
                        '<label  for="max_qnt_article_en_stock_1"> Max Qnt </label>' +
                        '<input type="number" min="0" id="max_qnt_article_en_stock_1" placeholder="Quantité Maximal en Stock"   class="input-small" name="max_qnt_article_en_stock[]" />' +

                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>' +


   ' </td>' +



     ' <td class="col-md-2">' +

        '  <a class="btn btn-app btn-danger btn-xs radius-4 pull-right"  id="btnDelete_' + rowcount + '" onclick="DeleteRow(' + rowcount + ')" value="Supprimer" >' +
          '    <i class="ace-icon fa fa-trash bigger-160"></i>' +
        '  </a>' +
    '  </td>' +
 ' </tr>'



        var submitRow ='<tr id="row_0"><td colspan="2"> </td><td  colspan="2"><div class="form-group">' +
                                                '    <button class="btn btn-success pull-right" type="submit"  value="valider">Enregistrer</button>' +
                                       ' </div></td></tr>'  ;

        //append the row to the table.
        $("#tbl").append(tblRow);
      //  $("#tbl").append(submitRow);
    }

    function DeleteRow2(id)
    {
        $("#row_" + id).remove();
    }



    function getOption(selector,route) {
        //line added for the var that will have the result
        //SELECT `id`, `id_article`, `id_conditionement`, `qnt_unite` FROM `conditionement_article` WHERE 1
        //SELECT `id`, `id_article`, `id_stock`, `id_conditionement_article`, `pu_article_en_stock`, `qnt_article_en_stock`, `min_qnt_article_en_stock`, `max_qnt_article_en_stock` FROM `article_en_stock` WHERE 1

        /*  var chnData = '';
          var curl  =(route=='article')?varurl2+'Article/liste2/'+$("#ids").val():((route=='conditionement')?varurl2+'Conditionement/liste2/':((route=='conditionement_article')?varurl2+'Conditionement_article/liste2/':varurl2+'Article_en_stock/liste2/))));
          var selectobtion = ' <option  > </option>';*/

        var gridArrayData = [];
        var result = null;
        /* $.ajax({
             type: 'GET',
             url: curl,
             dataType: "json",
             //line added to get ajax response in sync
             async: false,
             success: function(data) {
                 var i=1;
                 $.each(data, function (index, value) {
                     // console.log(i);
                     if (value["id"]!=''){
                         b=(i<data.length)?';':'';


                         if (route=='article'){
                             chnData  +=''+value["id"]+':'+value["nom_article"]+b;
                             selectobtion  +='<option value="'+value["id"]+'">'+value["nom_article"]+'</option>';
                         }
                         if (route=='conditionement'){
                             chnData  +=''+value["id"]+':'+value["nom_conditionement"]+b;
                             selectobtion  +='<option value="'+value["id"]+'">'+value["nom_conditionement"]+'</option>';
                         }
                             if (route=='conditionement_article'){
                                 chnData  +=''+value["id"]+':'+value["qnt_unite"]+b;
                             selectobtion  +='<option value="'+value["id"]+'">'+value["qnt_unite"]+'</option>';
                             }
                                 if (route=='article_en_stock'){
                                     chnData  +=''+value["id"]+':'+value["pu_article_en_stock "]+b;
                                 selectobtion  +='<option value="'+value["id"]+'">'+value["pu_article_en_stock"]+'</option>';
                                 }

                                     i++;
                         // console.log(chnData);

                     }

                     // value:"FE:FedEx;IN:InTime;Gm:Games;TN:TNT;Prt:PRINTER;AR:ARAMEX"

                     if (route=='article'){
                         gridArrayData.push({
                             id: value["id"],
                             id_service: value["id_service"] ,
                             id_categorie: value["id_categorie"] ,
                             nom_article:  value["nom_article"],
                             pxa_article:  value["pxa_article"],
                             pxv_article:  value["pxv_article"],
                             pxvbar_article:  value["pxvbar_article"],
                             type_article:  value["type_article"],
                             tabidp:  value["tabidp"],
                             tabqnt:  value["tabqnt"],
                             tabmts:  value["tabmts"],
                             pxrv:  value["pxrv"],
                             nbrstockage:  value["nbrstockage"],
                             tabidstock:  value["tabidstock"],
                             id_famille:  value["id_famille"],
                             nom_categorie:  value["nom_categorie"],
                             nbr_produit_categorie:  value["nbr_produit_categorie"],
                             path_photo:  value["path_photo"]
                         });
                     }
                     if (route=='conditionement'){
                         gridArrayData.push({
                             id: value["id"],
                             nom_conditionement: value["nom_conditionement"] ,
                             nbr_utilisation:  value["nbr_utilisation"]
                         });
                     }

                     result = (selector=='tab')?gridArrayData:((selector=='option')?selectobtion:chnData);


                 });
             },
             error: function() {
                 alert('Error occured');
             }
         });*/
        //line added to return ajax response
        return result;

    }

</script>