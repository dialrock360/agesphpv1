var varurl=$("#varurl").val();
 //SELECT `id`, `id_service`, `nom_famille`, `color_famille`, `nbr_categorie_famille`, `valeur_famille`, `flag_famille` FROM `famille` WHERE 1
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
            $('#valeur_famille').val(data.valeur_famille);
            $('#id_service').val(data.id_service);
            $('#nom_famille').val(data.nom_famille);
            $('#nbr_categorie_famille').val(data.nbr_categorie_famille);
        })
        .fail(function(){
            $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
        });
}


function closefrm()
{

   $("#id").val(0);
   $("#valeur_famille").val(0);
   $("#nom_famille").val('');
   $("#color_famille").val('');
   $("#nbr_categorie_famille").val(0);

    $("#save").slideUp(200);
    $("#nom_famille").slideUp(200);
    $("#color_famille").slideUp(200);
    $("#close").slideUp(200);
    $("#add").slideDown(200);
    $("#refresh").slideDown(200);
    $("#search").slideDown(200);

}
function addfrm()
{
   $("#id").val(0);
   $("#valeur_famille").val(0);
   $("#nom_famille").val('');
   $("#color_famille").val('');
   $("#nbr_categorie_famille").val(0);

    $("#add").slideUp(200);
    $("#refresh").slideUp(200);
    $("#search").slideUp(200);
    $("#save").slideDown(200);
    $("#nom_famille").slideDown(200);
    $("#color_famille").slideDown(200);
    $("#close").slideDown(200);

}

function add()
{
    var id = $("#id").val();
    var valeur_famille = $("#valeur_famille").val();
    var id_service = $("#id_service").val();
    var nom_famille = $("#nom_famille").val();
    var color_famille = $("#color_famille").val();
    var nbr_categorie_famille = $("#nbr_categorie_famille").val();
    $("#ok").fadeOut();
    var sendInfo = {
        valider: 'add',
        id: id,
        id_service: id_service,
        nom_famille: nom_famille,
        color_famille: color_famille,
        nbr_categorie_famille: nbr_categorie_famille,
        valeur_famille:valeur_famille
    };
//alert(id);
if (nom_famille!=''){

     $.ajax({

        type: 'POST',
        url: varurl+'/add',
        data: sendInfo,
         dataType: "json"

    }).done(function(response)
    {
        //alert(response);
        if(response >0){
            var lbtd1='<a href="javascript:void(0)" data-toggle="tooltip"  class="editBtn" title="Modifier  ' +nom_famille + '"><span class="editSpan nom_famille "> ' +nom_famille + '</span></a>';
            var inptd1='<input class="editInput nom_famille form-control input-sm" type="text" name="nom_famille" value="' +nom_famille + '" style="display: none;">';
            var lbtd2='<span class="editSpan color_famille editBtn" style="background-color: ' +color_famille + '"> </span>';
            var inptd2='<input class="editInput color_famille form-control input-sm" type="text" name="color_famille" value=" ' +color_famille + '" style="display: none;">';
            var lbtd3=' <span class="editSpan nbr_categorie_famille "> ' +nbr_categorie_famille + '</span>';
            var inptd3='<input class="editInput nbr_categorie_famille form-control input-sm" type="text" name="nbr_categorie_famille" value="' +nbr_categorie_famille + '" readonly style="display: none;">';
           // var lbtd4='<span class="editSpan valeur_famille "> ' +valeur_famille + '</span>';
            var inptd4='<input class="editInput valeur_famille form-control input-sm" type="hidden" name="valeur_famille" value=" ' +valeur_famille + '" style="display: none;">';
            var tblRow = '<tr><td>' +lbtd1 + '' +inptd1 + '</td><td>' +lbtd2 + '' +inptd2 + '</td> <td>' +lbtd3 + '' +inptd3 + '' +inptd4 + '</td> <td><input type="checkbox" class="checketed" data-emp-id="' +response + '"><button class=" btn btn-sm btn-primary btn-white btn-round"  onclick="editor(0)"  type="button"><i class="fa fa-edit light-blue bigger-110"></i></button><button class=" btn btn-sm btn-danger btn-white btn-round"  onclick="deletor(0)"  type="button"><i class="fa fa-trash light-red bigger-110"></i></button></td></tr>';

            $("#stable").append(tblRow);
            $("#ok").fadeIn(1000);
            $("#ok").html('<div class="alert alert-success">Famille ajoutée!</div>');
            $("#ok").fadeOut(7000);
        }else{
            $("#ok").fadeIn(500);
            $("#ok").html('<div class="alert alert-danger">Erreur Insertion ....</div>');
            $("#ok").fadeOut(7000);
        }
       // alert(nom_famille);



    }).fail(function()
    {
        $("#ok").fadeIn(500);
        $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');
        $("#ok").fadeOut(7000);

    });
}

}

$(document).ready(function(){
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
                //$("#ok").html('<div class="alert alert-success">'+response+'</div>');
               if(response.status ==1){
                    //SELECT SELECT `id`, `id_service`, ``, ``, `` FROM `famille` WHERE 1
                    trObj.find(".editSpan.nom_famille").text(response.data.nom_famille);
                    trObj.find(".editSpan.color_famille").html('<span class="editSpan color_famille editBtn" style="background-color: ' +response.data.color_famille + '"> </span>');
                    trObj.find(".editSpan.nbr_categorie_famille").text(response.data.nbr_categorie_famille);
                    trObj.find(".editSpan.valeur_famille").text(response.data.valeur_famille);

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
        $(this).closest("tr").find(".cancelBtn").show();

        //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        //hide delete button
        $(this).closest("tr").find(".deleteBtn").hide();
        $(this).closest("tr").find(".modaledit").hide();
        $(this).closest("tr").find(".checketed").hide();

        //show confirm button
        $(this).closest("tr").find(".confirmBtn").show();

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



