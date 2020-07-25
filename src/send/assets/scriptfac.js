$("#checkAllF").click(function () {
    $(".checkp").prop('checked', $(this).prop('checked'));

});



$('.delete_doc').click(function(e){

    e.preventDefault();


    var choix = "";
    var qnt = 1;   // it will get id of clicked row
    var type = 'mouv';   // it will get id of clicked row

    var curenpage=  $('#curenpage').val();
    //alert(curenpage);
    var uid = $(this).attr('data-id');
    var parent = $(this).parent("td").parent("tr");

    var sendInfo = {
        deletep: uid,
        name: type,
        qnt: qnt,
        chk: choix
    };

    bootbox.dialog({
        message: "Etes vous sure de vouloir supprimer ce Document?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
            success: {
                label: "Non",
                className: "btn-success",
                callback: function() {
                    window.location.href='?file=page/'+curenpage'/table';
                }
            },
            danger: {
                label: "Oui",
                className: "btn-danger",
                callback: function() {

                    /*

                     using $.ajax();*/

                    $.ajax({

                        type: 'POST',
                        url: 'view/page/get/delete.php',
                        data: sendInfo

                    })
                        .done(function(response){


                            bootbox.alert(response);
                            parent.fadeOut('slow');
                            window.location.href='?file=page/'+curenpage+'/table';


                        })
                        .fail(function(){

                            bootbox.alert('Something Went Wrog ....');

                        })



                    /* $.post('delete.php', { 'delete':pid })
                     .done(function(response){
                     bootbox.alert(response);
                     parent.fadeOut('slow');
                     })
                     .fail(function(){
                     bootbox.alert('Something Went Wrog ....');
                     })*/

                }
            }
        }
    });


});

$(document).on('click', '#printfac', function(e){

    e.preventDefault();

    var uid = $(this).data('id');   // it will get id of clicked row

    $('#dynamic-content3').html(''); // leave it blank before ajax call
    $('#modal-loader3').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getfac.php',
        type: 'POST',
        data: 'idpr='+uid,
        dataType: 'html'
    })
        .done(function(data){
            console.log(data);
            $('#dynamic-content3').html('');
            $('#dynamic-content3').html(data); // load response
            $('#modal-loader3').hide();		  // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content3').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader3').hide();
        });

});

$(document).on('click', '#getfac', function(e){

    e.preventDefault();

    var uid = $(this).data('id');   // it will get id of clicked row

    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getfac.php',
        type: 'POST',
        data: 'idpf='+uid,
        dataType: 'html'
    })
        .done(function(data){
            console.log(data);
            $('#dynamic-content').html('');
            $('#dynamic-content').html(data); // load response
            $('#modal-loader').hide();		  // hide ajax loader
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });

});


function getDMouv(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );

    var qnt = uid;   // it will get id of clicked row
    var type = 'Fstamdard';   // it will get id of clicked row
    /*
     alert(uid+' Cocher!!!'+choix);*/
    if(uid>1){


        var sendInfo = {
            deletep: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        bootbox.dialog({
            message: "Etes vous sure de vouloir supprimer ces Documents ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='proforma.php';
                    }
                },
                danger: {
                    label: "Oui",
                    className: "btn-danger",
                    callback: function() {

                        /*

                         using $.ajax();*/

                        $.ajax({

                            type: 'POST',
                            url: 'view/page/get/delete.php',
                            data: sendInfo

                        })
                            .done(function(response){


                                bootbox.alert(response);
                                window.location.href='proforma.php';

                            })
                            .fail(function(){

                                bootbox.alert('Something Went Wrog ....');

                            })



                        /* $.post('delete.php', { 'delete':pid })
                         .done(function(response){
                         bootbox.alert(response);
                         parent.fadeOut('slow');
                         })
                         .fail(function(){
                         bootbox.alert('Something Went Wrog ....');
                         })*/

                    }
                }
            }
        });
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='proforma.php';


    }

}



function getLine(){

    var uid=  $('#uid').val();
    var a=0, b=SearchNbChamp2(), c='', d='';

    var e=  $('#i').val();


    var ligne=e+1;
    var type=  $('#type').val();

    alert(type+'!!!');
    if(uid==''){

        alert('Veillez Electionner un Article svp!!!');
        //window.location.href='stock.php';

    }else{
        //  alert(uid+'!!!');

        var sendInfo = {
            id: uid,
            type: type,
            line: b
        };
        $.ajax({
            url: 'view/page/get/getline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#manligneCalcul').append('');
                //$('#manligneCalcul').html(data); // load response
                $('#manligneCalcul').append(data);
                //  IdentPERSO('manligneCalcul').innerHTML=d;


            })
            .fail(function(){
                $('#manligneCalcul').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

    }



}
function getChambre(){

    var uid=  $('#room').val();
    var a=0, b=SearchNbChamp2(), c='', d='';

    var e=  $('#i').val();


    var ligne=e+1;
    var type='chambre';

    //alert(uid+'!!!');
    if(uid==''){

        alert('Veillez Electionner un Article svp!!!');
        //window.location.href='stock.php';

    }else{
        //  alert(uid+'!!!');

        var sendInfo = {
            id: uid,
            type: type,
            line: b
        };
        $.ajax({
            url: 'view/page/get/getline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#manligneCalcul').append('');
                //$('#manligneCalcul').html(data); // load response
                $('#manligneCalcul').append(data);
                //  IdentPERSO('manligneCalcul').innerHTML=d;


            })
            .fail(function(){
                $('#manligneCalcul').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

    }



}

function getCharge(){

    var uid=  $('#uic').val();
    var a=0, b=SearchNbChamp2(), c='', d='';

    var e=  $('#i').val();


    var ligne=e+1;
    var type='recu';

    //alert(type+'!!!');
    if(uid==''){

        alert('Veillez Electionner un Article svp!!!');
        //window.location.href='stock.php';

    }else{
        //  alert(uid+'!!!');

        var sendInfo = {
            id: uid,
            type: type,
            line: b
        };
        $.ajax({
            url: 'view/page/get/getline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#manligneCalcul').append('');
                //$('#manligneCalcul').html(data); // load response
                $('#manligneCalcul').append(data);
                //  IdentPERSO('manligneCalcul').innerHTML=d;


            })
            .fail(function(){
                $('#manligneCalcul').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

    }



}

function addLine(){

    var uid=  $('#Muid').val();
    var a=0, b=SearchNbChamp2(), c='', d='';

    var e=  $('#i').val();


    var ligne=e+1;
    var type=  $('#type').val();

    //alert(type+'!!!');
    if(uid==''){

        alert('Veillez Electionner un Article svp!!!');
        //window.location.href='stock.php';

    }else{
        //  alert(uid+'!!!');

        var sendInfo = {
            id: uid,
            type: type,
            line: b
        };
        $.ajax({
            url: 'view/page/get/addline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#manligneCalcul3').append('');
                //$('#manligneCalcul').html(data); // load response
                $('#manligneCalcul3').append(data);
                //  IdentPERSO('manligneCalcul').innerHTML=d;


            })
            .fail(function(){
                $('#manligneCalcul2').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

    }



}
function addChambre(){

    var uid=  $('#Mroom').val();
    var a=0, b=SearchNbChamp2(), c='', d='';

    var e=  $('#i').val();


    var ligne=e+1;
    var type='chambre';

    //alert(type+'!!!');
    if(uid==''){

        alert('Veillez Electionner un Article svp!!!');
        //window.location.href='stock.php';

    }else{
        //  alert(uid+'!!!');

        var sendInfo = {
            id: uid,
            type: type,
            line: b
        };
        $.ajax({
            url: 'view/page/get/addline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){
                console.log(data);
                $('#manligneCalcul3').append('');
                //$('#manligneCalcul').html(data); // load response
                $('#manligneCalcul3').append(data);
                //  IdentPERSO('manligneCalcul').innerHTML=d;


            })
            .fail(function(){
                $('#manligneCalcul2').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            });

    }



}