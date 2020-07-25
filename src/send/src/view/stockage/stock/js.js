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

function deletor(id)
{
    alert(id);
}

function save(id)
{
    alert(id);
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

function add()
{
    var id = $("#id").val();
    var valeur = $("#valeur").val();
    var id_service = $("#id_service").val();
    var nom_stock = $("#nom_stock").val();
    var nbrarticle = $("#nbrarticle").val();
    $("#ok").fadeOut();
    var sendInfo = {
        valider: 'add',
        id: id,
        id_service: id_service,
        nom_stock: nom_stock,
        nbrarticle: nbrarticle,
        valeur:valeur
    };
//alert(id);
    if (nom_stock!=''){

        $.ajax({

            type: 'POST',
            url: varurl+'/add',
            data: sendInfo,
            dataType: "json"

        }).done(function(response)
        {
            // alert(nom_stock);
            var tblRow = '<tr><td>' +nom_stock + '</td> <td>' +nbrarticle + '</td> <td>' +valeur + '</td><td><input type="checkbox" class="checketed" data-emp-id="' +response + '"><button class=" btn btn-sm btn-primary btn-white btn-round"  onclick="editor(0)"  type="button"><i class="fa fa-edit light-blue bigger-110"></i></button><button class=" btn btn-sm btn-danger btn-white btn-round"  onclick="deletor(0)"  type="button"><i class="fa fa-trash light-red bigger-110"></i></button></td></tr>';

            $("#stable").append(tblRow);
            $("#ok").fadeIn(1000);
            $("#ok").html('<div class="alert alert-success">Stock ajouté!</div>');
            $("#ok").fadeOut(7000);


        }).fail(function()
        {
            $("#ok").html('<div class="alert alert-danger">Erreur! Something Went Wrog ....</div>');

        });
    }

}

$(document).ready(function(){







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



