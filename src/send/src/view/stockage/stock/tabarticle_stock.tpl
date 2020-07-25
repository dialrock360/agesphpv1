
<div class="row">
    <div class="col-md-12 ">
        <div>
            <div>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="center">#</th>
                        <th>Article</th>
                        <th class="hidden-xs">Conditionement</th>
                        <th class="hidden-480">Quantite</th>
                        <th>Valeur</th>
                        <th class="hidden-480">Reserve</th>
                        <th  > </th>
                    </tr>
                    </thead>

                    <tbody id="myTable">
                    {if isset($article_en_stocks)}
                        {if $article_en_stocks != null}

                            {foreach from=$article_en_stocks item=obj}
                                <tr id='tr_{$obj["id"]}'>
                                    <td class="center">
                                        {assign var="photos" value=($obj["path_photo"]=='') ? 'iconimg.png': $obj["path_photo"]}

                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-form" data-id="{$obj["id"]}" id="getArticle"   class="btn btn-sm btn-info btn-white btn-round " title="Supprimer">


                                        <img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/>
                                        </a>
                                        <span class="editInput path_photo form-control input-sm"  style="display: none;"><img src="{$url_base}public/assets/images/gallery/{$photos}" class="msg-photo" alt="{$obj["nom_article"]}" height="32" width="32"/></span>


                                    </td>
                                    <td>
                                        <a href="{$url_base}Stock/editarticle/{$obj["id"]}"><span class="editSpan nom_article "> {$obj["nom_article"]}</span></a>



                                    </td>

                                    <td>
                                        <span class="editSpan nom_conditionement "> {$obj["nom_conditionement"]}</span>


                                    </td>
                                    <td>


                                        <span class="editSpan pu_article_en_stock "> {$obj["pu_article_en_stock"]}</span>


                                    </td>
                                    <td>


                                        <span class="editSpan qnt_article_en_stock "> {$obj["qnt_article_en_stock"]}</span>
                                        <input class="editInput qnt_article_en_stock form-control input-sm" type="text" name="qnt_article_en_stock" value="{$obj["qnt_article_en_stock"]}" readonly style="display: none;">


                                    </td>

                                    <td>


                                         <span class="editSpan mts_article_en_stock "> {$obj["mts_article_en_stock"]}</span>
                                        <input class="editInput mts_article_en_stock form-control input-sm" type="text" name="mts_article_en_stock" value="{$obj["mts_article_en_stock"]}"   style="display: none;">

                                    </td>

                                    <td>

                                        {assign var="minqnt" value=$obj["min_qnt_article_en_stock"]}
                                        {assign var="qnt" value=$obj["qnt_article_en_stock"]}
                                        {assign var="valeur_p" value=100}
                                        {assign var="p" value=0}
                                        {if $qnt>0}
                                            {$p = ($qnt/$minqnt) * $valeur_p}
                                            {if $p>50}
                                            <span class="label label-sm label-success">{$p}%</span>
                                            {/if}
                                            {if $p<50 && $p<15}
                                            <span class="label label-sm label-warning">{$p}%</span>
                                            {/if}
                                            {if $p==50}
                                            <span class="label label-sm label-info">{$p}%</span>   <
                                            {/if}
                                        {/if}
                                    {if $qnt==0}
                                         <span class="label label-sm label-danger">{$qnt}%</span>
                                    {/if}



                                    </td>
                                    <td>

                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-info btn-white btn-round  transferBtn" title="Transferer">
                                            <i class="fa  fa-exchange blue"></i>

                                        </a>
                                    {if $qnt<1}

                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">
                                            <i class="glyphicon glyphicon-trash red"></i>

                                        </a>
                                    {else}
                                        <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-inverse btn-white btn-round  deleteBtndisable" title="impossible de Supprimer">
                                            <i class="glyphicon glyphicon-trash black"></i>

                                        </a>
                                    {/if}
                                    </td>
                                </tr>
                            {/foreach}

                        {else}
                            <tr>
                                <td colspan="6">

                                    Liste vide
                                </td>
                            </tr>

                        {/if}
                    {/if}
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<script>



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

        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('.alldeleteBtn').on('click',function(){
            var post_arr = [];
            $('#recordsTable input[type=checkbox]').each(function() {
                if (jQuery(this).is(":checked")) {
                    var id = this.id;
                    var splitid = id.split('_');
                    var postid = splitid[1];

                    post_arr.push(postid);

                }
            });

            if(post_arr.length > 0){

                $(this).closest("tr").find(".alldeleteBtn").hide();
                $(this).closest("tr").find(".alledit").hide();
                $(this).closest("tr").find(".checkall").hide();
                $(this).closest("tr").find("#addPrd").hide();
                $(this).closest("tr").find(".allcancelBtn").show();
                $(this).closest("tr").find(".allconfirmBtn").show();
            }


        });



        $('.allcancelBtn').on('click',function(){
            $(this).closest("tr").find(".allcancelBtn").hide();
            $(this).closest("tr").find(".allconfirmBtn").hide();
            $(this).closest("tr").find(".alldeleteBtn").show();
            $(this).closest("tr").find(".alledit").show();
            $(this).closest("tr").find(".checkall").show();
            $(this).closest("tr").find("#addPrd").show();
        });
        $("#Allpcheck").click(function () {
            $(".checketed").prop('checked', $(this).prop('checked'));

        });

        $('.allconfirmBtn').on('click',function(){

            var post_arr = [];
            $('#recordsTable input[type=checkbox]').each(function() {
                if (jQuery(this).is(":checked")) {
                    var id = this.id;
                    var splitid = id.split('_');
                    var postid = splitid[1];

                    post_arr.push(postid);

                }
            });
            var trObj = $(this).closest("tr");
            var x = document.getElementById("tabinfo");
            var t=x.defaultValue;

            alert(post_arr+'   ---'+t);

            if(post_arr.length > 0){

                // AJAX Request
                $.ajax({
                    url: 'view/page/get/deletor.php',
                    type: 'POST',
                    data: { post_id: post_arr,bdinfo: t},
                    success: function(response){
                        $.each(post_arr, function( i,l ){
                            $("#tr_"+l).remove();
                            trObj.find(".allcancelBtn").hide();
                            trObj.find(".allconfirmBtn").hide();
                            trObj.find(".checkall").show();
                            trObj.find(".alledit").show();
                            trObj.find(".alldeleteBtn").show();
                            trObj.find(".addDPrd").show();
                        });

                    }
                });
            }
        });




        $('.editBtn').on('click',function(){

            //hide edit span
            $(this).closest("tr").find(".editSpan").hide();


            //show edit input
            $(this).closest("tr").find(".editInput").show();

            //show edit input
            $(this).closest("tr").find(".cancelBtn").show();
            //hide delete button
            $(this).closest("tr").find(".deleteBtn").hide();
            $(this).closest("tr").find(".modaledit").hide();
            $(this).closest("tr").find(".checketed").hide();

            //hide edit button
            $(this).closest("tr").find(".editBtn").hide();

            //show edit button
            $(this).closest("tr").find(".saveBtn").show();

        });

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

        $('.deleteBtn').on('click',function(){
            //show edit input
            alert(1);
            /*
            $(this).closest("tr").find(".cancelBtn").show();

            //hide edit button
            $(this).closest("tr").find(".editBtn").hide();
            //hide delete button
            $(this).closest("tr").find(".deleteBtn").hide();
            $(this).closest("tr").find(".modaledit").hide();
            $(this).closest("tr").find(".checketed").hide();

            //show confirm button
            $(this).closest("tr").find(".confirmBtn").show();*/

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

        $('.cancelBtn').on('click',function(){
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');
            //hide edit span
            $(this).closest("tr").find(".editSpan").show();


            //show edit input
            $(this).closest("tr").find(".editInput").hide();

            //show edit input
            $(this).closest("tr").find(".cancelBtn").hide();

            trObj.find(".confirmBtn").hide();
            //hide delete button
            trObj.find(".checketed").show();
            trObj.find(".modaledit").show();
            trObj.find(".deleteBtn").show();

            //hide edit button
            $(this).closest("tr").find(".editBtn").show();

            //show edit button
            $(this).closest("tr").find(".saveBtn").hide();
        });

    });

</script>