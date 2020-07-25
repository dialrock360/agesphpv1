
function UnsheckAll(){


    $(":checkbox").attr("checked", false);


}

//////////////////////SHECK ALL///////////////////////
/////////////////////////////////////////////

$("#checkAllp").click(function () {
    $(".checkp").prop('checked', $(this).prop('checked'));

});
$("#checkAllpQ").click(function () {
    $(".checkp").prop('checked', $(this).prop('checked'));

});
$("#checkAllqp").click(function () {
    $(".checkp").prop('checked', $(this).prop('checked'));

});


$("#checkAllf").click(function () {
    $(".checkf").prop('checked', $(this).prop('checked'));
});

$("#checkAllc").click(function () {
    $(".checkc").prop('checked', $(this).prop('checked'));
});

$("#checkAllcat").click(function () {
    $(".checkcat").prop('checked', $(this).prop('checked'));
});
//////////////////////GET MODAL///////////////////////
/////////////////////////////////////////////
$(document).on('click', '#getElem', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid=  $('#qnt').val();
    var choix=($('input[name=choix]:checked').val());

    //alert(uid+' Cocher!!!'+choix);

    var sendInfo = {
        idprd: uid,
        name: choix
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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
$(document).on('click', '#getPrd', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'produit';   // it will get id of clicked row
    var qnt = 1;   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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
$(document).on('click', '#getPrdQ', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'produitQ';   // it will get id of clicked row
    var qnt = 1;   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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

$(document).on('click', '#getCat', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'categorie';   // it will get id of clicked row
    var qnt = 1;   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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

$(document).on('click', '#getFam', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'famille';   // it will get id of clicked row
    var qnt = 1;   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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
$(document).on('click', '#getCondis', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'condis';   // it will get id of clicked row
    var qnt = 1;   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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




$(document).on('click', '#viewPrd', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'produit';   // it will get id of clicked row
    var qnt = 'v';   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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
$(document).on('click', '#viewPrd2', function(e){
    e.preventDefault();

    //var uid = $(this).data('id');   // it will get id of clicked row
    var uid = $(this).data('id');   // it will get id of clicked row
    var choix = 'produit';   // it will get id of clicked row
    var qnt = 'v';   // it will get id of clicked row
    var chk = 1;   // it will get id of clicked row


    //alert(uid+' Cocher!!!');

    var sendInfo = {
        idMp: uid,
        name: choix,
        qnt: qnt,
        chk: chk
    };
    $('#dynamic-content').html(''); // leave it blank before ajax call
    $('#modal-loader').show();      // load ajax loader

    $.ajax({
        url: 'view/page/get/getprd.php',
        type: 'POST',
        data: sendInfo,
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
//////////////////////MULTIPLE UPDATE///////////////////////
/////////////////////////////////////////////
function getMpro(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );
    //   alert(uid+' Cocher!!!'+choix);
    if(uid>1){
        var qnt = uid;   // it will get id of clicked row
        var type = 'produit';   // it will get id of clicked row


        var sendInfo = {
            idMp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getprd.php',
            type: 'POST',
            data: sendInfo,
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
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='?file=page/stock';


    }

}
function getMproQ(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );
    //   alert(uid+' Cocher!!!'+choix);
    if(uid>1){
        var qnt = uid;   // it will get id of clicked row
        var type = 'produitQ';   // it will get id of clicked row


        var sendInfo = {
            idMp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getprd.php',
            type: 'POST',
            data: sendInfo,
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
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='?file=page/stock';


    }

}

function getMCat(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );
    // alert(uid+' Cocher!!!'+choix);
    if(uid>1){
        var qnt = uid;   // it will get id of clicked row
        var type = 'categorie';   // it will get id of clicked row


        var sendInfo = {
            idMp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getprd.php',
            type: 'POST',
            data: sendInfo,
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
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='?file=page/stock';


    }

}

function getMCondis(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );
    //   alert(uid+' Cocher!!!'+choix);
    if(uid>1){
        var qnt = uid;   // it will get id of clicked row
        var type = 'condis';   // it will get id of clicked row


        var sendInfo = {
            idMp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getprd.php',
            type: 'POST',
            data: sendInfo,
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
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='?file=page/stock';


    }

}

function getMfam(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );
    //   alert(uid+' Cocher!!!'+choix);
    if(uid>1){
        var qnt = uid;   // it will get id of clicked row
        var type = 'famille';   // it will get id of clicked row


        var sendInfo = {
            idMp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getprd.php',
            type: 'POST',
            data: sendInfo,
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
    }
    if(uid<=0){
        alert('Veillez Cocher au moins 2 cases !!!');
        window.location.href='?file=page/stock';


    }

}

//////////////////////SINGLE DELETED///////////////////////
/////////////////////////////////////////////



$('.delete_product').click(function(e){

    e.preventDefault();


    var choix = "";
    var qnt = 1;   // it will get id of clicked row
    var type = 'produit';   // it will get id of clicked row


    var uid = $(this).attr('data-id');

    var parent = $(this).parent("td").parent("tr");

    var sendInfo = {
        deletep: uid,
        name: type,
        qnt: qnt,
        chk: choix
    };

    bootbox.dialog({
        message: "Etes vous sure de vouloir supprimer ce produit?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
            success: {
                label: "Non",
                className: "btn-success",
                callback: function() {
                    $('.bootbox').modal('hide');
                    window.location.href='?file=page/stock';
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

                        })
                        .fail(function(){

                            bootbox.alert('Svp essayez encor ....');

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

$('.delete_cat').click(function(e){

    e.preventDefault();


    var choix = "";
    var qnt = 1;   // it will get id of clicked row
    var type = 'categorie';   // it will get id of clicked row


    var uid = $(this).attr('data-id');

    var parent = $(this).parent("td").parent("tr");

    var sendInfo = {
        deletep: uid,
        name: type,
        qnt: qnt,
        chk: choix
    };

    bootbox.dialog({
        message: "Etes vous sure de vouloir supprimer cette Categorie?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
            success: {
                label: "Non",
                className: "btn-success",
                callback: function() {
                    $('.bootbox').modal('hide');
                    window.location.href='?file=page/stock';
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

$('.delete_fam').click(function(e){

    e.preventDefault();


    var choix = "";
    var qnt = 1;   // it will get id of clicked row
    var type = 'famille';   // it will get id of clicked row


    var uid = $(this).attr('data-id');

    var parent = $(this).parent("td").parent("tr");

    var sendInfo = {
        deletep: uid,
        name: type,
        qnt: qnt,
        chk: choix
    };

    bootbox.dialog({
        message: "Etes vous sure de vouloir supprimer cette famille d'articles?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
            success: {
                label: "Non",
                className: "btn-success",
                callback: function() {
                    $('.bootbox').modal('hide');
                    window.location.href='?file=page/stock';
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

$('.delete_condis').click(function(e){

    e.preventDefault();


    var choix = "";
    var qnt = 1;   // it will get id of clicked row
    var type = 'condis';   // it will get id of clicked row


    var uid = $(this).attr('data-id');

    var parent = $(this).parent("td").parent("tr");

    var sendInfo = {
        deletep: uid,
        name: type,
        qnt: qnt,
        chk: choix
    };

    bootbox.dialog({
        message: "Etes vous sure de vouloir supprimer ce Conditionement ?",
        title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
        buttons: {
            success: {
                label: "Non",
                className: "btn-success",
                callback: function() {
                    $('.bootbox').modal('hide');
                    window.location.href='?file=page/stock';
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

//////////////////////MULTIPLE DELETED///////////////////////
/////////////////////////////////////////////




function getDCat(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );

    var qnt = uid;   // it will get id of clicked row
    var type = 'categorie';   // it will get id of clicked row

    //  alert(uid+' Cocher!!!'+choix);
    if(uid>1){


        var sendInfo = {
            deletep: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };
        bootbox.dialog({
            message: "Etes vous sure de vouloir supprimer ces Categories ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='?file=page/stock';
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
                                window.location.href='?file=page/stock';

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
        window.location.href='?file=page/stock';


    }

}


function getDFam(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );

    var qnt = uid;   // it will get id of clicked row
    var type = 'famille';   // it will get id of clicked row
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
            message: "Etes vous sure de vouloir supprimer ces familles de produits ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='?file=page/stock';
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
                                window.location.href='?file=page/stock';

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
        window.location.href='?file=page/stock';


    }

}


function getDCondis(){

    var  Countp = $("input:checkbox:checked").length;
    $('#number').val(Countp);
    var uid=  $('#number').val();
    var choix = "";
    $("input:checkbox:checked").each(function(){
            choix = choix.concat(' ' + $(this).val());
        }
    );

    var qnt = uid;   // it will get id of clicked row
    var type = 'condis';   // it will get id of clicked row
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
            message: "Etes vous sure de vouloir supprimer ces Condistionement ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='?file=page/stock';
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
                                window.location.href='?file=page/stock';

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
        window.location.href='?file=page/stock';


    }

}
////////VAR FILTER/////////////////////////////////////
/////////////////////////////////////////////
function proFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInputpro');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myULpro");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
function mycatFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("Catinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("mycatTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function myfamFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("Faminput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myfamTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function mycondisFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("Condisinput");
    filter = input.value.toUpperCase();
    table = document.getElementById("mycondisTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

var color_picker = document.getElementById("color-picker");
var color_picker_wrapper = document.getElementById("color-picker-wrapper");
color_picker.onchange = function() {
    color_picker_wrapper.style.backgroundColor = color_picker.value;
}
color_picker_wrapper.style.backgroundColor = color_picker.value;

/***********************************************************************************************/
/***********************************************************************************************/
/***********************************************************************************************/
/***********************************************************************************************/