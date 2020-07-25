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
    $(document).on('click', '#getArticle', function(e){

        e.preventDefault();

        var uid = $(this).data('id'); // get id of clicked row

        $('#dynamic-content').hide(); // hide dive for loader
        $('#modal-loader').show();  // load ajax loader

        $.ajax({
            type: 'GET',
            url: varurl+'/get2/'+uid,
            dataType: "json",
        })
            .done(function(data){
                console.log(data);
                //$('#dinamic_categorie').html(getcategories('option'));
                var selectobtion = '<option value="'+data.id_categorie+'">'+data.nom_categorie+'</option>';

                $('#old_id_categorie').prepend(selectobtion); // hide dynamic div
                //  $("#normal_categorie").css("visibility", "hidden");
                $("#normal_categorie").hide();
                $("#dinamic_categorie").show();
                $('#id').val(data.id); // hide dynamic div
                $('#nom_article').val(data.nom_article);
                $('#pxa_article').val(data.pxa_article);
                $('#pxv_article').val(data.pxv_article);
                $('#pxvbar_article').val(data.pxvbar_article);
                $('#type_article').val(data.type_article);
                $('#tabidp').val(data.tabidp);
                $('#tabqnt').val(data.tabqnt);
                $('#tabmts').val(data.tabmts);
                $('#pxrv').val(data.pxrv);
                $('#flag_article').val(data.flag_article);
                $('#addmethode').val(0);
                $('#old_id_categorie').val(data.id_categorie);    // hide ajax loader
                // $('#dynamic-image-preview').html(data.photo_article.length);    // hide ajax loader
                if (data.photo_article!=null){
                    $('#dynamic-image-preview').html('');    // hide ajax loader
                    $.each(data.photo_article, function (index, value) {
                        //  path=value["path_photo"];

                        if (value["master"]==1){
                            //  $('#dynamic-image-preview').append('<img src="'+varurl2+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+data.nom_article+'" height="32" width="32"/>' );    // hide ajax loader
                            $('#dynamic-image-preview').append('<a href="#"  id="id_'+value["id"]+'" >  <span class="btn btn-info active"><img src="'+varurl2+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+data.nom_article+'" height="32" width="32"/></span></a>' );    // hide ajax loader

                        }else {
                            //$('#dynamic-image-preview').append(mastercombo);    // hide ajax loader
                            $('#dynamic-image-preview').append('<span id="rm_'+value["id"]+'"><a href="#"  id="id_'+value["id"]+'" onclick="setmarter('+value["id"]+')" >  <span class="btn btn-white"><img src="'+varurl2+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+data.nom_article+'" height="32" width="32"/></span></a><a href="javascript:void(0)" class="btn btn-white btn-xs btn-danger"  onclick="delimg('+value["id"]+')" ><span class="glyphicon glyphicon-remove"></span></a></span>' );    // hide ajax loader


                        }

                    });
                    $('#dynamic-image-preview').append('<hr/>');
                    // $('#dynamic-image-preview').html(path);    // hide ajax loader
                }
                $('#modal-loader').hide();    // hide ajax loader
            })
            .fail(function(){
                //  $("#id_categorie").prepend("<option value='' selected='selected'>ss</option>");
                $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> '+varurl+'/get2/'+uid+' Something went wrong, Please try again...');
            });

    });




    $('.saveBtn').on('click',function(){
        var trObj = $(this).closest("tr");
        var IDtmp = $(this).closest("tr").attr('id');
        var inputData = $(this).closest("tr").find(".editInput").serialize();
        var splitid = IDtmp.split('_');
        var ID = splitid[1];

        var id_service = $("#id_service").val();
        // alert(varurl+'/update');
        // $("#ok").html('<div class="alert alert-success">'+JSON.stringify(inputData)+'</div>');
        $.ajax({
            type:'POST',
            url: varurl+'/update',
            dataType: "json",
            data:'modifier=modifier&id='+ID+'&'+inputData,
            success:function(response){


                //  $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                if(response.status ==1){
                    //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `categorie` WHERE 1
                    //$("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                    trObj.find(".editSpan.nom_article").text(response.data.nom_article);
                    trObj.find(".editSpan.id_categorie").text(response.data.nom_categorie);
                    trObj.find(".editSpan.pxa_article").text(response.data.pxa_article);
                    trObj.find(".editSpan.pxv_article").text(response.data.pxv_article);
                    trObj.find(".editSpan.pxvbar_article").text(response.data.pxvbar_article);

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
       alert(varurl+'/delete');
       /* $.ajax({
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
        });*/
    });



});
