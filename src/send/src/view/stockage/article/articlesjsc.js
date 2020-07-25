
var varurl=$("#varurl").val();

var varurl2=$("#varurl2").val();



function listearticle() {
    //line added for the var that will have the result


    var result = [];

    $.ajax({
        type: 'GET',
        url: varurl2+'Article/liste2/'+$("#ids").val(),
        dataType: "json",
        //line added to get ajax response in sync
        success: function(data) {
            // alert(1);
            console.log(data);
            $.each(data, function (index, value) {

                var delicon='';
                if (value["in_stock"]==1){
                    delicon='<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round  deleteBtn" title="Supprimer">' +
                        '<i class="glyphicon glyphicon-trash red"></i>' +

                        '</a>';
                }
                if (value["in_stock"]==0){
                    delicon='<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-inverse btn-white btn-round  deleteBtndisable" title="impossible de Supprimer">' +
                        '<i class="glyphicon glyphicon-trash black"></i>' +

                        '</a>';
                }
                var markup ='<tr  id="tr_'+value["id"]+'">' +
                    '<td> ' +
                    '<img src="'+varurl2+'public/assets/images/gallery/'+value["path_photo"]+'" class="msg-photo" alt="'+value["nom_article"]+'" height="32" width="32"/>' +
                    '<input class="editInput path_photo form-control input-sm" type="file" name="path_photo" value="'+value["path_photo"]+'" readonly style="display: none;">'+
                    '</td>' +

                    '<td>' +
                    '<a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  '+value["nom_article"]+' "><span class="editSpan nom_categorie ">'+value["nom_article"]+' </span></a>' +
                    '<input class="editInput nom_article form-control input-sm" type="text" name="nom_article" value="'+value["nom_article"]+'" style="display: none;">'+
                    '</td>' +
                    '<td> '+value["nom_categorie"]+'' +
                    '<input class="editInput nom_categorie form-control input-sm" type="text" name="nom_categorie" value="'+value["nom_categorie"]+'" style="display: none;">'+
                    '</td>' +
                    '<td> '+value["pxa_article"]+'' +
                    '<input class="editInput pxa_article form-control input-sm" type="number" name="pxa_article" value="'+value["pxa_article"]+'" style="display: none;">'+
                    '</td>' +
                    '<td> '+value["pxv_article"]+'' +
                    '<input class="editInput pxv_article form-control input-sm" type="text" name="pxv_article" value="'+value["pxv_article"]+'" style="display: none;">'+
                    '</td>' +
                    '<td> '+value["pxvbar_article"]+'' +
                    '<input class="editInput pxvbar_article form-control input-sm" type="text" name="pxvbar_article" value="'+value["pxvbar_article"]+'" style="display: none;">'+
                    '</td>' +
                    '<td> '+value["id_stock"]+
                    '<input class="editInput id_stock form-control input-sm" type="text" name="id_stock" value="'+value["id_stock"]+'" style="display: none;">'+
                    '</td>' +
                    '<td>' +
                    '<input type="checkbox" class="checketed" data-emp-id="'+value["id"]+'"> ' +
                    '<a href="javascript:void(0)" data-toggle="tooltip"  onclick="addfrm()" class="btn btn-sm btn-info btn-white btn-round  editBtn" title="Editer"> <i class="glyphicon glyphicon-edit blue"></i> </a> ' +


                    '<div class="btn-group btn-group-sm">' +
                    '<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-danger btn-white btn-round cancelBtn" title="anuller" style="display: none">' +
                    '<i class="glyphicon glyphicon-remove red"></i>' +
                    '</a>' +
                    '<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round saveBtn" title="enregister" style="display: none">' +
                    '<i class="glyphicon glyphicon-floppy-disk green"></i>' +
                    '</a>' +
                    '<a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-sm btn-success btn-white btn-round confirmBtn" title="valider" style="display: none">' +
                    '<i class="glyphicon glyphicon-ok green"></i>'+
                    '</a>' +
                    '</div>' +delicon +



                    ' </td>' +

                    '</tr>';
                $("#myTable").append(markup);
                var addbnt=' <button class=" btn btn-sm btn-primary btn-white btn-round"  id="add"  onclick="addfrm()"  type="button">' + '<i class="fa fa-plus light-blue bigger-150"></i>' + '</button>';

                // $("#ok").html(addbnt);



            });
        },
        error: function() {
            alert('Error occured');
        }
    });
}


function getarticle(id) {
    //line added for the var that will have the result
    var result = null;
    var chnData = '';

    $.ajax({
        type: 'GET',
        url: varurl2+'Article/get2/'+$("#ids").val(),
        dataType: "json",
        //line added to get ajax response in sync
        async: false,
        success: function(data) {
            result=data;

        },
        error: function() {
            alert('Error occured');
        }
    });
    //line added to return ajax response
    return result;
}



function getcategories(selector) {
    //line added for the var that will have the result
    var result = null;
    var chnData = '';
    var selectobtion = ' <option  > </option>';

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


                    chnData  +=''+value["id"]+':'+value["nom_categorie"]+b;
                    selectobtion  +='<option value="'+value["id"]+'">'+value["nom_categorie"]+'</option>';
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

                result = (selector=='tab')?gridArrayData:((selector=='option')?selectobtion:chnData);

            });
        },
        error: function() {
            alert('Error occured');
        }
    });
    //line added to return ajax response
    return result;
}


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
            $('#valeur_categorie').val(data.valeur_categorie);
            $('#id_service').val(data.id_service);
            $('#nom_categorie').val(data.nom_categorie);
            $('#nbr_produit_categorie').val(data.nbr_produit_categorie);
        })
        .fail(function(){
            $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
        });
}


function updatemarter(id,del) {
    //line added for the var that will have the result
    var result = null;
    var newvarurl = $("#newvarurl").val();
    var vurl = (del==false)?newvarurl+'setmaster/'+id: newvarurl+'Photo_article/delete/'+id;

    $.ajax({
        type: 'GET',
        url: vurl,
        dataType: "json",
        //line added to get ajax response in sync
        async: false,
        //line added to get ajax response in sync
        success: function(data) {
            result = 1;
        }
    });
    return result;
}

function setmarter(id) {
    this.updatemarter(id,false);
    window.location.reload();

}
function delimg(id) {
    this.updatemarter(id,true);
    $("#rm_"+id).remove();
}
//SELECT `id`, `id_service`, `id_famille`, `nom_categorie`, `nbr_produit_categorie`, `flag_categorie` FROM `categorie` WHERE 1
function closefrm()
{

    $("#id").val(0);
    $("#valeur_categorie").val(0);
    $("#nom_categorie").val('');
    $("#nbr_produit_categorie").val(0);

    $("#save").slideUp(200);
    $("#nom_categorie").slideUp(200);
    $("#id_famille_wraper").css("visibility", "hidden");

    $("#close").slideUp(200);
    $("#add").slideDown(200);
    $("#refresh").slideDown(200);
    $("#search").slideDown(200);

}


function add()
{
    var id = $("#id").val();
    var valeur_categorie = $("#valeur_categorie").val();
    var id_service = $("#id_service").val();
    var nom_famille =$("#id_famille option:selected").text();
    var nom_categorie = $("#nom_categorie").val();
    var id_famille = $("#id_famille").val();
    var nbr_produit_categorie = $("#nbr_produit_categorie").val();
    $("#ok").fadeOut();
    var sendInfo = {
        valider: 'add',
        id: id,
        id_service: id_service,
        nom_categorie: nom_categorie,
        id_famille: id_famille,
        nbr_produit_categorie: nbr_produit_categorie,
        valeur_categorie:valeur_categorie
    };
//alert(id);
    if (nom_categorie!=''){

        $.ajax({

            type: 'POST',
            url: varurl+'/add',
            data: sendInfo,
            dataType: "json"

        }).done(function(response)
        {


            // alert(nom_categorie);
            var lbnom_categorie='<a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  ' +nom_categorie + '"><span class="editSpan nom_categorie "> ' +nom_categorie + '</span></a><input class="editInput nom_categorie form-control input-sm" type="text" name="nom_categorie" value="' +nom_categorie + '" style="display: none;">';

            var lbid_famille='<span class="editSpan id_famille "> ' +nom_famille + '</span><select class="editInput id_famille form-control input-sm"  id="id_famille" name="id_famille" readonly style="display: none;">{if isset($familles)}{if $familles != null}<option selected disabled value="' +id_famille + '">' +nom_famille + '</option>{foreach from=$familles item=obj}<option value="{$obj[\'id\']}">{$obj["nom_famille"]}</option>{/foreach}{else}<option disabled>Liste vide</option>{/if}{/if}</select>';

            var lbnbr_produit_categorie='<span class="editSpan nbr_produit_categorie "> ' +nbr_produit_categorie + '</span><input class="editInput nbr_produit_categorie form-control input-sm" type="text" name="nbr_produit_categorie" value="' +nbr_produit_categorie + '" readonly style="display: none;">';
            var lbvaleur_categorie='<span class="editSpan valeur_categorie "> ' +valeur_categorie + '</span><input class="editInput valeur_categorie form-control input-sm" type="text" name="valeur_categorie" value="' +valeur_categorie + '" readonly style="display: none;">';

            var tblRow = '<tr><td>' +lbnom_categorie+ '</td><td>' +lbid_famille+ '</td> <td>' +lbnbr_produit_categorie + '</td> <td>' +lbvaleur_categorie + '</td><td><input type="checkbox" class="checketed" data-emp-id="' +response + '"><button class=" btn btn-sm btn-primary btn-white btn-round"  onclick="editor(0)"  type="button"><i class="fa fa-edit light-blue bigger-110"></i></button><button class=" btn btn-sm btn-danger btn-white btn-round"  onclick="deletor(0)"  type="button"><i class="fa fa-trash light-red bigger-110"></i></button></td></tr>';

            $("#stable").append(tblRow);
            $("#ok").fadeIn(1000);
            $("#ok").html('<div class="alert alert-success">Categorie ajouté!</div>');
            $("#ok").fadeOut(7000);


        }).fail(function()
        {
            $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');

        });
    }

}

$(document).ready(function(){
    $(document).on('click', '#addArticle', function(e){
        $("#preview").html('');
        $('#old_id_categorie').html(''); // hide dynamic div
        $("#dinamic_categorie").hide();
        $("#normal_categorie").show();
        $('#id').val(0); // hide dynamic div
        $('#dynamic-image-preview').html('');    // hide ajax loader
        $('#nom_article').val('');
        $('#fiche_technique').val("");
        $('#file-input').val("");
        $('#action').val("add");
        $('#type_article').val(0);
        $('#nbrstockage').val(0);
        $('#tabidstock').val('');
        $('#flag_article').val(0);
        $('#addmethode').val(1);
        $('#old_id_categorie').val(0);    // hide ajax loader
    });
    $(document).on('click', '#getArticle', function(e){

        e.preventDefault();

        var uid = $(this).data('id'); // get id of clicked row
        $("#preview").html('');

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
                $('#fiche_technique').val(data.fiche_technique);
                $('#type_article').val(data.type_article);
                $('#tabidstock').val(data.tabidstock);
                $('#nbrstockage').val(data.nbrstockage);
                $('#flag_article').val(data.flag_article);
                $('#addmethode').val(0);
                $('#old_id_categorie').val(data.id_categorie);    // hide ajax loader
                $('#action').val("update");
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
        var newvarurl = $("#newvarurl").val();
      //  alert(newvarurl+'/addArticle/ajaxupdate');
        $.ajax({
            type:'POST',
            url: newvarurl+'ajaxupdateArticle',
            dataType: "json",
            data:'addmethode=0&id='+ID+'&'+inputData,
            success:function(response){

               // $("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                 if(response.status ==1){
                    //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `categorie` WHERE 1
                    //$("#ok").html('<div class="alert alert-success">'+JSON.stringify(response)+'</div>');
                    trObj.find(".editSpan.nom_article").text(response.data.nom_article);
                    trObj.find(".editSpan.id_categorie").text(response.data.nom_categorie);

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






function previewImages() {
    $("#preview").html('');
    var preview = document.querySelector('#preview');

    if (this.files) {
        [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

        // Make sure `file.name` matches our extensions criteria
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return alert(file.name + " is not an image");
        } // else...

        var reader = new FileReader();

        reader.addEventListener("load", function() {
            var image = new Image();
            image.height = 64;
            image.width = 64;
            image.title  = file.name;
            image.src    = this.result;
            preview.appendChild(image);
        });

        reader.readAsDataURL(file);

    }

}

document.querySelector('#file-input').addEventListener("change", previewImages);
