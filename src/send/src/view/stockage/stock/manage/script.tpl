

<input   type="hidden"   value="{$url_base}Article_en_stock" id="varurl"/>
<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{$url_base}public/assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{$url_base}public/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->


<script src="{$url_base}public/assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<![endif]-->
<script src="{$url_base}public/assets/js/jquery-ui.custom.min.js"></script>
<!-- ace scripts -->
<script src="{$url_base}public/assets/js/ace-elements.min.js"></script>
<script src="{$url_base}public/assets/js/ace.min.js"></script>


<script src="{$url_base}src/view/index/indexjs.js"></script>

{literal}
<script>
    var articleOption = '{/literal}{$optionarticles}{literal}';
    var condisOption  = '{/literal}{$optionconditionements}{literal}';
</script>
{/literal}

<script>

    var varurl=$("#varurl").val();
    var varurl2=$("#varurl2").val();
    var varurlx=$("#varurlx").val();
    var articles=$("#articles").val();

    function addRow1()
    {


        var rows =parseInt($("#nbrline").val());
        var rowcount =rows + 1;

      $("#rows").val(rowcount);
        //append the controls in the row
        var tblRow = '<div class="row" id="row_'+ rowcount +' "><div class="col-md-12 "><div class="widget-box"><div class="widget-header">' +
            '<h4 class="widget-title">Article N ' + rowcount + '</h4>' +

            '<div class="widget-toolbar"><a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i>' +
            '</a> <a href="#" data-action="close"><i class="ace-icon fa fa-times"></i></a>' +
            '</div></div><div class="widget-body"><div class="widget-main">' +





            '<div class="row"   >' +

            '  <div class="col-md-3">' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Infos Article</h4>' +
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
            '   <label  for="cout_achat_conditionement_article_' + rowcount + '"> Cout d\'achat </label>' +
            '  <input type="number" min="0" onblur="setCoutAchat(' + rowcount + ')" id="cout_achat_conditionement_article_' + rowcount + '" class="form-control" placeholder="Prix de vente unitaire"  value="0" name="cout_achat_conditionement_article[]" />' +

            '  </div>' +
            '   </div>' +
            '  </div>' +
            ' </div>' +
            ' </div>' +


            '  <div class="col-md-3">' +
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
            '   <label  for="qnt_unite_' + rowcount + '"> Cout de l\'unités </label>' +
            '  <input type="number" min="0" id="pxa_u_article_en_stock_' + rowcount + '" class="input-small" readonly   value="0" name="pxa_u_article_en_stock[]" />' +

            ' </div>' +
            ' </div>' +

            ' </div>' +

            '</div> ' +

            '   </div>' +
            '  </div>' +
            ' </div>' +
            ' </div>' +

           ' <div class="col-md-4">' +

       ' <div class="widget-box">' +
       ' <div class="widget-header">' +
       ' <h4 class="widget-title">Conditions de ventes</h4>' +
   ' </div>' +

   ' <div class="widget-body">' +
       ' <div class="widget-main">' +


       ' <div class="form-group">' +
       ' <label class="control-label">Prix de vente global</label>' +
   ' <input class="form-control" type="number"  min="0" value="0" name="pxv_conditionement_article[]" id="pxv_conditionement_article_' + rowcount + '""/>' +
       ' </div>' +
       ' <div class="row">' +
       ' <div class="col-md-6">' +
       ' <div>' +
       ' <div class="form-group">' +
       ' <label  for="pxv_u_conditionement_article">Prix de vente unité</label>' +
   ' <input type="number" min="0" id="pxv_u_conditionement_article_' + rowcount + '"" placeholder="Pxv u"  class="form-control"  value="0" name="pxv_u_conditionement_article[]" />' +

       ' </div>' +
       ' </div>' +
       ' </div>' +

       ' <div class="col-md-6 ">' +
       ' <div>' +
       ' <div class="form-group">' +
       ' <label  for="pxv_bar_conditionement_article">Bareme de vente</label>' +
   ' <input type="number" min="0" id="pxv_bar_conditionement_article_' + rowcount + '"" placeholder="Pxv limite"  value="0"  class="form-control" name="pxv_bar_conditionement_article[]" />' +

       ' </div>' +
       ' </div>' +
       ' </div>' +
       ' </div>' +


       ' </div>' +
       ' </div>' +
       ' </div>' +
       ' </div>' +


            '  <div class="col-md-2">' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Quantité en Stock </h4>' +
            ' </div>' +

            ' <div class="widget-body">' +
            '   <div class="widget-main">' +

            '<div class="form-group">' +
            '<label  for="qnt_article_en_stock_' + rowcount + '"> Quantité en Stock </label>' +
            '<input type="number" readonly  min="0" id="qnt_article_en_stock' + rowcount + '" placeholder="Quantité en Stock" class="form-control"  value="0" name="qnt_article_en_stock[]" />' +

            '</div>' +
            '<div class="row">' +
            ' <div class="col-md-6">' +
            '<div>' +
            '<div class="form-group">' +
            '<label  for="min_qnt_article_en_stock_' + rowcount + '">Min Qnt</label>' +
            '<input type="number" min="0" id="min_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité en Stock"  class="form-control"  value="1" name="min_qnt_article_en_stock[]" />' +

            '</div>' +
            '</div>' +
            '</div>' +

            '<div class="col-md-6 ">' +
            '<div>' +
            '<div class="form-group">' +
            '<label  for="max_qnt_article_en_stock_' + rowcount + '"> Max Qnt </label>' +
            '<input type="number" min="0" id="max_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité Maximal en Stock"  class="form-control"  name="max_qnt_article_en_stock[]" />' +

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

    function addRow()
    {
        //alert(11);
        var table = document.getElementById("tbl"); //get the table
        var rowcount = table.rows.length; //get no. of rows in the table
        //append the controls in the row

        $("#rows").val(rowcount+1);

        var tblRow = '<tr id="row_' + rowcount + '"> ' +
            '<td>' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Infos Article N '+ rowcount + '</h4>' +
            '<input  type="hidden" readonly name="valeur_article_en_stock[]"  value="0" id="valeur_article_en_stock_0"/>' +
            '<input  type="hidden" readonly name="ref_article[]"  value="" id="ref_article_0"/>' +
            '<input  type="hidden" readonly name="id_article_en_stock[]"  value="0" id="id_article_en_stock_0"/>' +
            '<input  type="hidden" readonly name="id_conditionement_article[]"  value="0" id="id_conditionement_article_0"/>' +
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
            '   <label  for="cout_achat_conditionement_article_' + rowcount + '"> Cout d\'achat </label>' +
            '  <input type="number" min="0" onblur="setCoutAchat(' + rowcount + ')" step="0.001" id="cout_achat_conditionement_article_' + rowcount + '" class="form-control" placeholder="Prix de vente unitaire"  value="0" name="cout_achat_conditionement_article[]" />' +

            '  </div>' +
            '   </div>' +
            '  </div>' +
            ' </div>' +
            '</td>' +

            '<td>' +
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
            '<input type="number" min="0" id="qnt_unite_' + rowcount + '" step="0.001" class="input-small"  onblur="setCoutAchat(' + rowcount + ')"  placeholder="Nombre d\'unite"  value="1" name="qnt_unite[]" />' +

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
            '   <label  for="qnt_unite_' + rowcount + '"> Cout de l\'unité </label>' +
            '  <input type="number" min="0" id="pxa_u_article_en_stock_' + rowcount + '" step="0.001" class="input-small" readonly   value="0" name="pxa_u_article_en_stock[]" />' +

            ' </div>' +
            ' </div>' +

            ' </div>' +

            '</div> ' +

            '   </div>' +
            '  </div>' +
            ' </div>' +
            '</td>' +

            '<td>' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Conditions de ventes</h4>  <span   id="alertvnt_' + rowcount + '"> </span>' +
            ' </div>' +

            ' <div class="widget-body">' +
            ' <div class="widget-main">' +


            ' <div class="form-group">' +
            ' <label class="control-label">Prix de vente global</label>' +
            ' <input class="form-control" type="number"  min="0" value="0" name="pxv_conditionement_article[]" step="0.001"  onblur="setPrixvente(' + rowcount + ')"  id="pxv_conditionement_article_' + rowcount + '""/>' +
            ' </div>' +
            ' <div class="row">' +
            ' <div class="col-md-6">' +
            ' <div>' +
            ' <div class="form-group">' +
            ' <label  for="pxv_u_conditionement_article">Prix de vente u</label>' +
            ' <input type="number" min="0" id="pxv_u_conditionement_article_' + rowcount + '"  step="0.001"  readonly placeholder="Pxv u"  class="form-control"  value="0" name="pxv_u_conditionement_article[]" />' +

            ' </div>' +
            ' </div>' +
            ' </div>' +

            ' <div class="col-md-6 ">' +
            ' <div>' +
            ' <div class="form-group">' +
            ' <label  for="pxv_bar_conditionement_article">Bareme de vente</label>' +
            ' <input type="number" min="0" id="pxv_bar_conditionement_article_' + rowcount + '" step="0.001"   onblur="setPrixvente(' + rowcount + ')"  placeholder="Pxv limite"  value="0"  class="form-control" name="pxv_bar_conditionement_article[]" />' +

            ' </div>' +
            ' </div>' +
            ' </div>' +
            ' </div>' +


            ' </div>' +
            ' </div>' +
            ' </div>' +
            '</td>' +

            '<td>' +
            ' <div class="widget-box">' +
            ' <div class="widget-header">' +
            ' <h4 class="widget-title">Quantité en Stock </h4>' +
            ' </div>' +

            ' <div class="widget-body">' +
            '   <div class="widget-main">' +

            '<div class="form-group">' +
            '<label  for="qnt_article_en_stock_' + rowcount + '"> Quantité en Stock </label>' +
            '<input type="number" readonly  min="0" step="0.001"   id="qnt_article_en_stock' + rowcount + '" placeholder="Quantité en Stock" class="form-control"  value="0" name="qnt_article_en_stock[]" />' +

            '</div>' +
            '<div class="row">' +
            ' <div class="col-md-6">' +
            '<div>' +
            '<div class="form-group">' +
            '<label  for="min_qnt_article_en_stock_' + rowcount + '">Min Qnt</label>' +
            '<input type="number" min="0"  step="0.001"   id="min_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité en Stock"  class="form-control"  value="1" name="min_qnt_article_en_stock[]" />' +

            '</div>' +
            '</div>' +
            '</div>' +

            '<div class="col-md-6 ">' +
            '<div>' +
            '<div class="form-group">' +
            '<label  for="max_qnt_article_en_stock_' + rowcount + '"> Max Qnt </label>' +
            '<input type="number" min="0"  step="0.001"   id="max_qnt_article_en_stock_' + rowcount + '" placeholder="Quantité Maximal en Stock"  class="form-control"  name="max_qnt_article_en_stock[]" />' +

            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '   </div>' +
            '  </div>' +
            '</td>' +

            '<td> ' +
            ' <button class="btn btn-danger pull-right" type="button" id="btnDelete_1" onclick="DeleteRow(' + rowcount + ')"><i class="ace-icon fa fa-trash  bigger-110 icon-only"></i></button>' +

        '<hr/>' +

        '<button class="btn btn-info pull-right" type="button" onclick="addRow()"><i class="ace-icon fa fa-plus  bigger-110 icon-only"></i></button>' +

            ' </td> ' +
            '</tr>';

        //append the row to the table.
        $("#tbl").append(tblRow);
    }
    function DeleteRow(id)
    {
        var rows=$("#rows").val()-1;


        $("#row_" + id).remove();
        var crow=(rows<=0)?0:rows;
        $("#nbrline").val(crow);
        $("#rows").val(crow);
    }

    function addArticlestk()
    {
        $("#formartstk").toggle();


    }

    function setCoutAchat(index)
    {
        var qnt_unite=parseInt($("#qnt_unite_"+ index).val());
        var cout_achat_conditionement_article=parseInt($("#cout_achat_conditionement_article_"+ index).val());
        var numb = parseFloat(cout_achat_conditionement_article/qnt_unite);
        var num = numb.toFixed(2);
        $("#pxa_u_article_en_stock_"+ index).val(num);
    }
    function setPrixvente(index)
    {
        var qnt_unite=parseInt($("#qnt_unite_"+ index).val());
        var pxv_conditionement_article=parseInt($("#pxv_conditionement_article_"+ index).val());
        var numb = parseFloat(pxv_conditionement_article/qnt_unite);
        var num =0;
        if (pxv_conditionement_article<=parseInt($("#cout_achat_conditionement_article_"+ index).val())){
            $("#alertvnt_"+ index).html('<label class="label label-danger" id="infoert_0">Prix de vente doit etre superieur au cout d\'achat</label>');
            $("#pxv_conditionement_article_"+ index).val(num);
        }
        if (pxv_conditionement_article>parseInt($("#cout_achat_conditionement_article_"+ index).val())){
            num = numb.toFixed(2);
            $("#alertvnt_"+ index).html('');

        }

        $("#pxv_u_conditionement_article_"+ index).val(num);
        $("#pxv_bar_conditionement_article_"+ index).val(parseInt($("#pxa_u_article_en_stock_"+ index).val()));
    }

    function setCoutAchat1()
    {
        var myqnt=parseInt($("#myqnt").val());
        // alert(qnt_unite);
        var pustock=parseInt($("#mypustock").val());
        var numb = parseFloat(pustock/myqnt);
        var num = numb.toFixed(2);
        //    alert(cout_achat_conditionement_article+' ff '+qnt_unite+' == '+num)
        $("#mypu").val(num);
    }

    function unSetTransfer(index)
    {

        var qnt_trans_cible  = parseFloat($("#qnt_trans_"+index).val());
        var qnt_depot_cible  = parseFloat($("#qnt_depot_"+index).val());
        var qnt_article_en_stock_source = parseFloat($("#qnt_article_en_stock").val());
        var qnt_article_en_stock_cible  = parseFloat($("#qnt_article_en_stock_"+index).val());
        var pxv_conditionement_article_source   = parseFloat($("#pxv_conditionement_article").val());
        var pxv_conditionement_article_cible  = parseFloat($("#pxv_conditionement_article_"+index).val());
        var curentqnt_source =qnt_trans_cible+qnt_article_en_stock_source;
        var curentqnt_cible =qnt_article_en_stock_cible-qnt_depot_cible;

        $("#qnt_article_en_stock").val(curentqnt_source);
        $("#lbvaleur_article_en_stock").html(curentqnt_source*pxv_conditionement_article_source);
        $("#valeur_article_en_stock").val(curentqnt_source*pxv_conditionement_article_source);
        $("#qnt_article_en_stock_"+index).val(curentqnt_cible);
        var valeur_final = curentqnt_cible*pxv_conditionement_article_cible;
        $("#valeur_article_en_stock_"+index).val(valeur_final);
        $("#qnt_trans").val(0);
        $("#qnt_trans_"+index).val(0);
        $("#qnt_depot_"+index).val(0);

    }
    function setTransfer()
    {

        var index=$("#cible").val();
        var id_article_en_stock_source=parseInt($("#id_article_en_stock").val());
        var id_article_en_stock_cible=parseInt($("#id_article_en_stock_"+index).val());
        var qnt_article_en_stock_source = parseFloat($("#qnt_article_en_stock").val());
        var qnt_article_en_stock_cible  = parseFloat($("#qnt_article_en_stock_"+index).val());
        var max_qnt_article_en_stock_cible  = parseInt($("#max_qnt_article_en_stock_"+index).val());
        var multiplicateur  = parseFloat($("#multiplicateur_"+index).val());
        var qnt_trans_cible  = parseFloat($("#qnt_trans_"+index).val());
        var qnt_depot_cible  = parseFloat($("#qnt_depot_"+index).val());
        var pxv_conditionement_article_source   = parseFloat($("#pxv_conditionement_article").val());
        var pxv_conditionement_article_cible  = parseFloat($("#pxv_conditionement_article_"+index).val());
        var qnt_trans  = parseFloat($("#qnt_trans").val());
        var qnt_source  = qnt_article_en_stock_source-qnt_trans;
        var id_stock_article  = $("#id_stock_article").val();
        var qnt_cible = qnt_trans*multiplicateur;
        var qnt_final = qnt_article_en_stock_cible+qnt_cible;
        if(qnt_trans>0 && index>=0){
          /*
                $("#ok").html('<div class="alert alert-success">'+index+
                ' ids= '+id_article_en_stock_source +' idc= '+id_article_en_stock_cible +'' +
                ' qnts= '+qnt_article_en_stock_source +' qntc= '+qnt_article_en_stock_cible +'' +
                ' MXqntc= '+max_qnt_article_en_stock_cible +' const= '+multiplicateur +'' +
                ' qnt_source= '+qnt_source +' qnt_cible= '+qnt_cible +'' +
                ' qnt_final= '+qnt_final +'  cible= '+id_stock_article +'' +
                ' </div>');
         */
            qnt_depot_cible+=qnt_cible;
            qnt_trans_cible+=qnt_trans;
            $("#qnt_trans").val(0);
            $("#qnt_article_en_stock").val(qnt_source);
            $("#lbvaleur_article_en_stock").html(qnt_source*pxv_conditionement_article_source);
            $("#valeur_article_en_stock").val(qnt_source*pxv_conditionement_article_source);
            $("#qnt_trans_"+index).val(qnt_trans_cible);
            $("#qnt_depot_"+index).val(qnt_depot_cible);
            $("#qnt_article_en_stock_"+index).val(qnt_final);
            var valeur_final = qnt_final*pxv_conditionement_article_cible;
            $("#valeur_article_en_stock_"+index).val(valeur_final);

        }

       /* if(qnt_trans>0 && qnt_cible<=max_qnt_article_en_stock_cible){
            $("#qnt_article_en_stock_"+index).val(qnt_cible);
            $("#qnt_article_en_stock").val(qnt_source);
        }*/
    }

    function checkTransfer(index)
    {
        $("#cible").val(index);
    }

    $(document).ready(function(){
        $(document).on('click', '#addArticle', function(e){
            $('#old_id_categorie').html(''); // hide dynamic div
            $("#dinamic_categorie").hide();
            $("#normal_categorie").show();
            $('#id').val(0); // hide dynamic div
            $('#dynamic-image-preview').html('');    // hide ajax loader
            $('#nom_article').val('');
            $('#pxa_article').val(0);
            $('#pxv_article').val(0);
            $('#pxvbar_article').val(0);
            $('#type_article').val(1);
            $('#tabidp').val('');
            $('#tabqnt').val('');
            $('#tabmts').val('');
            $('#pxrv').val('');
            $('#flag_article').val(0);
            $('#addmethode').val(1);
            $('#old_id_categorie').val(0);    // hide ajax loader
        });

        $(document).on('click', '.modaledit', function(e){

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row
           // $('.modal-title').html(uid);
            $('#dynamic-content').hide(); // hide dive for loader
            $('#modal-loader').show();  // load ajax loader
            var id_stock = $('#id_stock').val();  // load ajax loader

            var  urlllx = varurlx+'/get_en_stock';
            var sendInfo = {
                id: uid,
                id_stock: id_stock
            };
            $.ajax({
                url: urlllx,
                type: 'POST',
                data: sendInfo,
                dataType: 'json'
            })
                .done(function(data){
                    console.log(data);
                    //SELECT `user_id`, `first_name`, `last_name`, `email`, `position`, `office` FROM `tbl_members` WHERE 1
                    $('#dynamic-content').hide(); // hide dynamic div
                    $('#dynamic-content').show(); // show dynamic div
                  /*
                   ``, ``, `id_article`, `id_stock`, ``,
                   ``, `min_qnt_article_en_stock`, `max_qnt_article_en_stock`,
                    ``, ``, ``,
                    ``, ``, `pxv_bar_conditionement_article`,
                     ``, `id_conditionement`, ``, `id_unite`, `nom_unite_conditionement`,
                      ``, `id_service`, `nom_stock`, `type_stock`, `path_photo`, `master`
                   */
                   $('#path_article').html(' <img width="64" height="64" alt="150x150" src="'+varurl2+'public/assets/images/gallery/'+data.article_en_stock.path_photo+'" />');
                   $('#ref_article').html(data.article_en_stock.ref_article);
                  $('#nom_article').html(data.article_en_stock.nom_article);
                    $('#id_article_en_stock').val(data.article_en_stock.id);
                    $('#lbvaleur_article_en_stock').html(data.article_en_stock.valeur_article_en_stock);
                    $('#valeur_article_en_stock').val(data.article_en_stock.valeur_article_en_stock);
                    $('#cout_achat_conditionement_article').html(data.article_en_stock.cout_achat_conditionement_article);
                    $('#pxv_u_conditionement_article').html(data.article_en_stock.pxv_u_conditionement_article);
                    $('#lbpxv_conditionement_article').html(data.article_en_stock.pxv_conditionement_article);
                    $('#pxv_conditionement_article').val(data.article_en_stock.pxv_conditionement_article);
                    $('#pxa_u_article_en_stock').html(data.article_en_stock.pxa_u_article_en_stock);
                    $('#nom_conditionement').html(data.article_en_stock.nom_conditionement);
                    $('#lbnom_conditionement').html(data.article_en_stock.nom_conditionement);
                    $('#nom_unite_conditionement').html(data.article_en_stock.nom_unite_conditionement);
                    $('#lbqnt_article_en_stock').html(data.article_en_stock.qnt_article_en_stock);

                    $('#qnt_article_en_stock').val(data.article_en_stock.qnt_article_en_stock);
                    $('#id_conditionement_article').val(data.article_en_stock.id_conditionement_article);
                    $('#id_stock_article').val(data.article_en_stock.id_stock);

                    var i=0;
                    $('#dinnamic-add').html('<div class="form-group"> <label class="control-label">Quantite a transferer</label><input type="number" min="0" max="'+data.article_en_stock.qnt_article_en_stock+'" step="0.001" id="qnt_trans"   value="0"  class="form-control"   /> </div><hr>');
                 // $("#dynamic-content").html('<div class="alert alert-success">'+JSON.stringify(data.ls_en_stock)+'</div>');

                    $('#dinamic-part2').html(''); // hide dynamic div
                    $.each(data.ls_en_stock , function (index, article_en_stock){
                        console.log(index + ' : ' + article_en_stock);
                          i++;
                        var part3=    '        <div class="widget-box box-shadow">' +
                        '  <div class="widget-header">' +
                            '     <h4 class="widget-title">'+
                        '                                    <label>' +
                        '                                        <input   onclick="checkTransfer('+index+')" id="id_article_en_stock_'+index+'" value="'+article_en_stock.id_article_en_stock+'" type="radio" class="ace input-lg" />' +
                        '                                        <span class="lbl bigger-120"  id="nom_article_0">'+article_en_stock.nom_article+' <b>'+article_en_stock.nom_conditionement+'  <b></span>' +
                        '                                    </label>' +

                         '  <input   type="hidden" id="id_article_en_stock_cible_'+index+'" name="id_article_en_stock_cible[]"  value="'+article_en_stock.id_article_en_stock+'" />   ' +
                         '  <input   type="hidden" id="valeur_article_en_stock_'+index+'" name="valeur_article_en_stock_cible[]"  value="'+article_en_stock.valeur_article_en_stock+'" />   ' +
                        '   <input   type="hidden" id="max_qnt_article_en_stock_'+index+'"  name="max_qnt_article_en_stock_cible[]" value="'+article_en_stock.max_qnt_article_en_stock+'" />   ' +
                        '   <input   type="hidden" id="id_conditionement_article_'+index+'"  name="id_conditionement_article_cible[]" value="'+article_en_stock.id_conditionement_article+'" />   ' +
                        '  <input   type="hidden" id="pxv_conditionement_article_'+index+'"   name="pxv_conditionement_article_cible[]" value="'+article_en_stock.pxv_conditionement_article+'"  />   ' +
                        '  <input   type="hidden" id="multiplicateur_'+index+'"  value="'+article_en_stock.multiplicateur+'"  />   ' +
                        '  <input   type="hidden" id="qnt_trans_'+index+'" value="0"  />   ' +
                        '  <input   type="hidden" id="qnt_depot_'+index+'" value="0"  />   ' +
                            '</h4>' +
                        '  </div>' +

                        '  <div class="widget-body">' +
                        '    <div class="widget-main">' +
                        '      <div class="row">' +
                        '     <div class="col-md-4">' +
                        '     <img class="card-img-top" width="32" height="32" src="'+varurl2+'public/assets/images/gallery/'+article_en_stock.path_photo+'" alt="Card image cap">' +
                        '  <h6 class="text-red"> '+article_en_stock.nom_stock+' </h6>' +

                        '     </div>' +
                        '    <div class="col-md-8">' +
                        ' <p class="card-text"><small class="text-muted">1 '+data.article_en_stock.nom_conditionement+' = '+article_en_stock.multiplicateur+'  '+article_en_stock.nom_conditionement+' </small></p>' +
                        ' <p class="card-text"><small class="text-muted">1 '+article_en_stock.nom_conditionement+' = '+article_en_stock.qnt_unite+'  '+article_en_stock.nom_unite_conditionement+'</small></p>' +
                        ' <p class="card-text"><small class="text-muted">Valeur : '+article_en_stock.valeur_article_en_stock+'</small></p>' +
                        ' <p class="card-text"><small class="text-muted"><input class="form-control" type="text" name="qnt_article_en_stock__cible[]"  id="qnt_article_en_stock_'+index+'" value="'+article_en_stock.qnt_article_en_stock+' "  readonly/></p>' +

                        ' </div>' +
                        ' </div>' +
                        ' <div class="d-flex justify-content-between align-items-center">' +
                        '     <div class="btn-group">' +
                        '                                                <a  href="javascript:void(0)" class="btn btn-sm btn-white btn-default" onclick="unSetTransfer('+index+')" >' +
                        '                                                    <i class="ace-icon fa fa-undo bigger-230"></i>' +
                        '                                                </a>' +
                        '     </div>' +

                        '  </div>' +
                        '  </div>' +
                        ' </div>' +
                        ' </div>' ;

                        $('#dinamic-part2').append(part3); // hide dynamic div
                    });

                    $('#inbr_stock_cible').val(i);
                    $('#modal-loader').hide();    // hide ajax loader
                })
                .fail(function(){
                    $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                });

        });





        $('.saveBtn').on('click',function(){
            var trObj = $(this).closest("tr");
            var IDtmp = $(this).closest("tr").attr('id');
            var inputData = $(this).closest("tr").find(".editInput").serialize();
            var splitid = IDtmp.split('_');
            var ID = splitid[1];

            var id_service = $("#id_service").val();
            var  urlllx = varurlx+'/updateqnt_en_stock';
           // alert(urlllx);
           //  $("#ok").html('<div class="alert alert-success">'+JSON.stringify(inputData)+'</div>');
            $.ajax({
                type:'POST',
                url: urlllx,
                dataType: "json",
                data:'modifier=modifier&id='+ID+'&'+inputData,
                success:function(response){


                  //   $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                     if(response.status ==1){
                        //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `categorie` WHERE 1
                       //  $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                        trObj.find(".editSpan.qnt_article_en_stock").text(response.qnt_article_en_stock);
                        trObj.find(".editSpan.cout_achat_total").text(response.cout_achat_total);
                        trObj.find(".editSpan.valeur_article_en_stock").text(response.valeur_article_en_stock);
                        trObj.find(".editInput").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".saveBtn").hide();
                        trObj.find(".editSpan").show();
                        trObj.find(".editBtn").show();
                        trObj.find(".checketed").show();
                        trObj.find(".modaledit").show();
                        trObj.find(".deleteBtn").show();
                    }else{
                        $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
                    }
                }
            });

        });


        $('.confirmBtn').on('click',function(){
            var trObj = $(this).closest("tr");
            var IDtmp = $(this).closest("tr").attr('id');
            var inputData = $(this).closest("tr").find(".editInput").serialize();
            var splitid = IDtmp.split('_');
            var ID = splitid[1];
            var id_conditionement_article = $("#id_conditionement_article").val();
            var id_stock = $("#id_stock").val();
            var sendInfo = {
                id: ID,
                inputData: inputData,
                id_stock: id_stock
            };

           // alert(varurl+'/delete');
             $.ajax({
                 type:'POST',
                 url: varurl+'/delete',
                 dataType: "json",
                 data:'id_stock='+id_stock+'&id='+ID+'&'+inputData,
                 success:function(response){
                     // alert(response);
                    // $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                      if(response ==1){
                         trObj.remove();
                     }else{
                         trObj.find(".confirmBtn").hide();
                         trObj.find(".deleteBtn").show();
                         alert(response.msg);
                     }
                 }
             });
        });



    });
</script>
