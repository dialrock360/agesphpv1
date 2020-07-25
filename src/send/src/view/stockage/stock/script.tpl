

<input   type="hidden"   value="{$url_base}Stock" id="varurl"/>
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


<script  >

    var varurl=$("#varurl").val();
    function editor(id)
    {

        var id_service = $("#id_service").val();
        var sendInfo = {
            valider: 'edit',
            id: id,
            id_service: id_service
        };

        var uid = id; // get id of clicked row

        $('#dynamic-content').hide(); // hide dive for loader
        $('#modal-loader').show();  // load ajax loader

        $.ajax({
            url: varurl+'/getjs',
            type: 'POST',
            data: sendInfo,
            dataType: 'json'
        })
            .done(function(data){
                console.log(data);
                //SELECT `user_id`, `first_name`, `last_name`, `email`, `position`, `office` FROM `tbl_members` WHERE 1

                $('#id').val(data.id);
                $('#valeur').val(data.valeur);
                $('#id_service').val(data.id_service);
                $('#nom_stock').val(data.nom_stock);
                $('#nbrarticle').val(data.nbrarticle);
            })
            .fail(function(){
                $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
            });
    }

    function closefrm()
    {

        $("#id").val(0);
        $("#valeur").val(0);
        $("#nom_stock").val('');
        $("#nbrarticle").val(0);

        $("#save").slideUp(200);
        $("#nom_stock").slideUp(200);
        $("#type_stock").slideUp(200);
        $("#close").slideUp(200);
        $("#add").slideDown(200);
        $("#refresh").slideDown(200);
        $("#search").slideDown(200);

    }
    function addfrm()
    {
        $("#id").val(0);
        $("#valeur").val(0);
        $("#nom_stock").val('');
        $("#nbrarticle").val(0);

        $("#save").slideDown(200);
        $("#nom_stock").slideDown(200);
        $("#type_stock").slideDown(200);
        $("#close").slideDown(200);
        $("#add").slideUp(200);
        $("#refresh").slideUp(200);
        $("#search").slideUp(200);

    }

    function savestock()
    {

        var id = $("#id").val();
        var valeur = $("#valeur").val();
        var id_service = $("#id_service").val();
        var type_stock = $("#type_stock").val();
        var nom_stock = $("#nom_stock").val();
        var nbrarticle = $("#nbrarticle").val();
        // $("#ok").fadeOut();
        var sendInfo = {
            valider: 'add',
            id: id,
            id_service: id_service,
            nom_stock: nom_stock,
            type_stock: type_stock,
            nbrarticle: nbrarticle,
            valeur:valeur
        };
        // $("#ok").html('<div class="alert alert-success">'+JSON.stringify(sendInfo)+'</div>');


//alert(id);
        if (nom_stock!=''){


            $.ajax({
                type: 'POST',
                url: varurl+'/add',
                data: sendInfo,
                dataType: "json",
                success:function(response){


                   // $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                     if(response.status >0){
                         //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `categorie` WHERE 1
                         //  $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                         var tblRow = '<tr>' +
                             ' <td><input type="checkbox" class="checketed" data-emp-id="'+response.status +'"></td>  ' +

                             ' <td>' +
                             '  <a href="'+varurl+'/edit/'+response.status +'"><span class="editSpan nom_stock "> ' +nom_stock+ '</span> </a> ' +
                             ' <input class="editInput nom_stock form-control input-sm" type="text" name="nom_stock" value="' +nom_stock+ '" style="display: none;"> ' +
                             ' </td> ' +

                             ' <td> ' +
                             '  <span class="editSpan type_stock "> '+type_stock+ '</span>' +
                             '  <select class="editInput id_categorie form-control input-sm"  id="type_stock" name="id_categorie"  style="display: none;">' +
                             '  <option value="'+type_stock+ '" disabled selected>'+type_stock+ '</option> <option value="Dynamic">Dynamic</option> <option value="Static">Static</option>' +
                             ' </select>' +
                             '  </td>' +

                             '<td>' +
                             '<span class="editSpan nbrarticle "> ' +nbrarticle+ '</span> ' +
                             '<input class="editInput nbrarticle form-control input-sm" type="text" name="nbrarticle" value="' +nbrarticle+ '" style="display: none;"> ' +
                             '</td> '+

                             '<td>' +
                             '<span class="editSpan valeur "> ' +valeur+ '</span> ' +
                             '<input class="editInput valeur form-control input-sm" type="text" name="valeur" value="' +valeur+ '" style="display: none;"> ' +
                             '</td> '+

                             '<td>' +
                             '<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round  editBtn" title="Modifier  "><span class="editSpan  ">  <i class="glyphicon glyphicon-edit blue"></i></span></a>' +

                         '<a   href="'+varurl+'/edit/'+response.status +'" data-toggle="tooltip"  class="btn btn-sm btn-info btn-white btn-round modaledit " title="Manager stock">' +
                         '<i class="glyphicon glyphicon-cog green "></i>' +

                         '</a>' +
                         ' <div class="btn-group btn-group-sm">' +
                         ' <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round cancelBtn" title="anuller" style="display: none">' +
                         '  <i class="glyphicon glyphicon-remove red"></i>' +
                         '   </a>' +
                         '  <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round saveBtn" title="enregister" style="display: none">' +
                         '  <i class="glyphicon glyphicon-floppy-disk green"></i>' +
                         '  </a>' +
                         '  <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round confirmBtn" title="valider" style="display: none">' +
                         '   <i class="glyphicon glyphicon-ok green"></i>' +
                         '   </a>' +
                         '  </div>' +
                         '  <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">' +
                         '   <i class="glyphicon glyphicon-trash red"></i>' +

                         '  </a>' +

                             '</tr>';

                         $("#stable").append(tblRow);
                         $("#ok").fadeIn(1000);
                         $("#ok").html('<div class="alert alert-success">Stock ajouté!</div>');
                         $("#ok").fadeOut(7000);
                     }else{
                         $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
                     }
                }
            });
        }


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


        $("#ca").val(parseInt($("#cout_achat_conditionement_article_"+ index).val()));
        $("#cau").val(parseInt($("#pxa_u_article_en_stock_"+ index).val()));
        $("#pv").val(pxv_conditionement_article);
        $("#pvu").val(num);
        var ben = parseFloat(parseInt($("#pxv_conditionement_article_"+ index).val())-parseInt($("#cout_achat_conditionement_article_"+ index).val()));
        var valartstk = parseFloat(parseInt($("#pxv_conditionement_article_"+ index).val())*parseInt($("#qnt_article_en_stock_"+ index).val()));
        $("#valeur_article_en_stock"+ index).val(valartstk.toFixed(2));
        $("#benef").val( ben.toFixed(2));
    }
    $(document).ready(function(){




        $('.saveBtn').on('click',function(){
            var trObj = $(this).closest("tr");
            var IDtmp = $(this).closest("tr").attr('id');
            var inputData = $(this).closest("tr").find(".editInput").serialize();
            var splitid = IDtmp.split('_');
            var ID = splitid[1];


            var id_service = $("#id_service").val();
            // alert(varurl+'/update');

            $.ajax({
                type:'POST',
                url: varurl+'/update',
                dataType: "json",
                data:'modifier=modifier&id='+ID+'&id_service='+id_service+'&'+inputData,
                success:function(response){
                    //$("#ok").html('<div class="alert alert-success">'+response+'</div>');
                    if(response.status ==1){
                        //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `stock` WHERE 1
                        trObj.find(".editSpan.nom_stock").text(response.data.nom_stock);
                        trObj.find(".editSpan.nbrarticle").text(response.data.nbrarticle);
                        trObj.find(".editSpan.valeur").text(response.data.valeur);
                        trObj.find(".editSpan.type_stock").text(response.data.type_stock);

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
            var splitid = IDtmp.split('_');
            var ID = splitid[1];
            var id_service = $("#id_service").val();
            var sendInfo = {
                id: ID,
                id_service: id_service
            };
            //alert(varurl+'/delete');
            $.ajax({
                type:'POST',
                url: varurl+'/delete',
                dataType: "json",
                data:sendInfo,
                success:function(response){
                    // alert(response);

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