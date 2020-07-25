
<script src="<?php echo $base_url; ?>assets/jquery-1.12.4.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootbox.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-colorpicker.min.js"></script>





<?php
require_once 'bloc/script.php';
?>

<script>





    //////////////////////SHECK ALL///////////////////////
    /////////////////////////////////////////////

    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });

    function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
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


    //////////////////////SINGLE DELETED///////////////////////
    /////////////////////////////////////////////


    $('.Cdelete_product').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'produit';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            deletepD: uid,
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
                        window.location.href='?file=page/trash';
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



                    }
                }
            }
        });


    });

    $('.Cdelete_cat').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'categorie';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            deletepD: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.Cdelete_fam').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'famille';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            deletepD: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.Cdelete_condis').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'condis';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            deletepD: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.Cdelete_fac').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'mouv';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            deletepD: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };

        bootbox.dialog({
            message: "Etes vous sure de vouloir supprimer ce Document ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='?file=page/trash';
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

    $('.Cdelete_user').click(function(e){

        e.preventDefault();

        var pid = $(this).attr('data-id');
        var parent = $(this).parent("td").parent("tr");
//alert(pid);
        bootbox.dialog({
            message: "Etes vous sure de vouloir supprimer cet utilisateur?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        $('.bootbox').modal('hide');
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
                            data: 'deleteu='+pid

                        })
                            .done(function(response){

                                bootbox.alert(response);
                                parent.fadeOut('slow');

                            })
                            .fail(function(){

                                bootbox.alert('Something Went Wrog ....');

                            })



                        /*$.post('get/delete.php', { 'deleteu':pid })
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



    //////////////////////SINGLE RESTORATION///////////////////////
    /////////////////////////////////////////////


    $('.restor_product').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'produit';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            restorp: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.restor_cat').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'categorie';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            restorp: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.restor_fam').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'famille';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            restorp: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.restor_condis').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'condis';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            restorp: uid,
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
                        window.location.href='?file=page/trash';
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

    $('.restor_user').click(function(e){

        e.preventDefault();

        var rpid = $(this).attr('data-id');
        var parent = $(this).parent("td").parent("tr");

        bootbox.dialog({
            message: "Etes vous sure de vouloir restaurer cet utilisateur?",
            title: "<i class='glyphicon glyphicon-refresh'></i> Restaure !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-danger",
                    callback: function() {
                        $('.bootbox').modal('hide');
                    }
                },
                danger: {
                    label: "Oui",
                    className: "btn-success",
                    callback: function() {

                        /*

                         using $.ajax();

                         $.ajax({

                         type: 'POST',
                         url: 'delete.php',
                         data: 'restor='+rpid

                         })
                         .done(function(response){

                         bootbox.alert(response);
                         parent.fadeOut('slow');

                         })
                         .fail(function(){

                         bootbox.alert('Something Went Wrog ....');

                         })


                         */

                        $.post('view/page/get/delete.php', { 'restoru':rpid })
                            .done(function(response){
                                bootbox.alert(response);
                                parent.fadeOut('slow');
                            })
                            .fail(function(){
                                bootbox.alert('Something Went Wrog ....');
                            })

                    }
                }
            }
        });


    });


    $('.restor_fac').click(function(e){

        e.preventDefault();


        var choix = "";
        var qnt = 1;   // it will get id of clicked row
        var type = 'mouv';   // it will get id of clicked row


        var uid = $(this).attr('data-id');

        var parent = $(this).parent("td").parent("tr");

        var sendInfo = {
            restorp: uid,
            name: type,
            qnt: qnt,
            chk: choix
        };

        bootbox.dialog({
            message: "Etes vous sure de vouloir supprimer ce Document ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "Non",
                    className: "btn-success",
                    callback: function() {
                        window.location.href='?file=page/trash';
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

    function getRTotal(){

        var  Countp = $("input:checkbox:checked").length;
        $('#number').val(Countp);
        var uid=  $('#number').val();
        var choix = "";
        $("input:checkbox:checked").each(function(){
                choix = choix.concat(' ' + $(this).val());
            }
        );
        var type=  $('#type').val();
        //alert(type+' Cocher!!!'+choix);
        var qnt = uid;   // it will get id of clicked row


        if(uid>1){


            var sendInfo = {
                mrestorT: uid,
                name: type,
                qnt: qnt,
                chk: choix
            };
            bootbox.dialog({
                message: "Voulez Vous Restaurer ces Elements ?",
                title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
                buttons: {
                    success: {
                        label: "Non",
                        className: "btn-danger",
                        callback: function() {
                            window.location.href='?file=page/trash';
                        }
                    },
                    danger: {
                        label: "Oui",
                        className: "btn-success",
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
                                    window.location.href='?file=page/trash';


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
            window.location.href='?file=page/trash';


        }

    }

    function getDTotal(){

        var  Countp = $("input:checkbox:checked").length;
        $('#number').val(Countp);
        var uid=  $('#number').val();
        var choix = "";
        $("input:checkbox:checked").each(function(){
                choix = choix.concat(' ' + $(this).val());
            }
        );
        var type=  $('#type').val();
        //alert(type+' Cocher!!!'+choix);
        var qnt = uid;   // it will get id of clicked row


        if(uid>1){


            var sendInfo = {
                mdeleteT: uid,
                name: type,
                qnt: qnt,
                chk: choix
            };
            bootbox.dialog({
                message: "Etes vous sure de vouloir supprimer Definitivement ces Elements ?",
                title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
                buttons: {
                    success: {
                        label: "Non",
                        className: "btn-success",
                        callback: function() {
                            window.location.href='?file=page/trash';
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
                                    window.location.href='?file=page/trash';


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
            window.location.href='?file=page/trash';


        }

    }

</script>
