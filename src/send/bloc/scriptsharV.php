<script>
    function UnsheckAll(){


        $(":checkbox").attr("checked", false);


    }

    //////////////////////SHECK ALL///////////////////////
    /////////////////////////////////////////////

    $("#checkAllp").click(function () {
        $(".checkp").prop('checked', $(this).prop('checked'));

    });
    //////////////////////GET MODAL///////////////////////
    /////////////////////////////////////////////


    $(document).on('click', '#getUser', function(e){

        e.preventDefault();

        var uid = $(this).data('id');   // it will get id of clicked row

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'get/getuser.php',
            type: 'POST',
            data: 'id='+uid,
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

    $(document).on('click', '#getcUser', function(e){

        e.preventDefault();

        var uid = $(this).data('id');   // it will get id of clicked row

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'get/getuser.php',
            type: 'POST',
            data: 'idc='+uid,
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

    $(document).on('click', '#getcUserM', function(e){

        e.preventDefault();

        var uid = $(this).data('id');   // it will get id of clicked row

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'get/getuser.php',
            type: 'POST',
            data: 'idM='+uid,
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
    $(document).on('click', '#getVUserM', function(e){

        e.preventDefault();

        var uid = $(this).data('id');   // it will get id of clicked row

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'get/getuser.php',
            type: 'POST',
            data: 'idc='+uid,
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
/*
    function getMpro(){

        var  Countp = $("input:checkbox:checked").length;
        $('#number').val(Countp);
        var uid=  $('#number').val();
        var choix = "";
        $("input:checkbox:checked").each(function(){
                choix = choix.concat(' ' + $(this).val());
            }
        );
        //alert(uid+' Cocher!!!'+choix);


        var sendInfo = {
            idmp: uid,
            chk: choix
        };
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'get/getMprd.php',
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
    */
    //////////////////////SINGLE DELETED///////////////////////
    /////////////////////////////////////////////


    $('.delete_user').click(function(e){

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
                         url: 'get/delete.php',
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



    //////////////////////MULTIPLE DELETED///////////////////////
    /////////////////////////////////////////////

    function getDpro(){


        var  Countp = $("input:checkbox:checked").length;
        $('#number').val(Countp);
        var uid=  $('#number').val();
        var choix = "";
        $("input:checkbox:checked").each(function(){
                choix = choix.concat(' ' + $(this).val());
            }
        );

        if(uid>0){
            bootbox.dialog({
                message: "Etes vous sure de vouloir supprimer ces produit?",
                title: "<i class='glyphicon glyphicon-trash'></i> Supprimer !",
                buttons: {

                    success: {
                        label: "Non",
                        className: "btn-success",
                        callback: function() {
                            window.location.href='stock.php';
                        }
                    },
                    danger: {
                        label: "Oui",
                        className: "btn-danger",
                        callback: function() {
                            // using $.ajax();
                            //alert(uid+' Cocher!!!'+choix);


                            var sendInfo = {
                                mdeletep: uid,
                                chk: choix
                            };

                            $.ajax({

                                type: 'POST',
                                url: 'delete.php',
                                data: sendInfo

                            })
                                .done(function(response){

                                    bootbox.alert(response);
                                    parent.fadeOut('slow');


                                })
                                .fail(function(){

                                    bootbox.alert('Something Went Wrog ....');

                                })



                            /*$.post('delete.php', { 'deletep':pid })
                             .done(function(response){
                             bootbox.alert(response);
                             parent.fadeOut('slow');
                             })
                             .fail(function(){
                             bootbox.alert('Something Went Wrog ....');
                             })*/

                            //window.location.href='stock.php';
                            setTimeout(' window.location.href = "stock.php"; ',2000);


                        }
                    }
                }
            });

        }else{


            alert('Veillez Cocher au moins une case !!!');
            //window.location.href='stock.php';
        }


        /*
         $('#dynamic-content').html(''); // leave it blank before ajax call
         $('#modal-loader').show();      // load ajax loader

         $.ajax({
         url: 'getDprd.php',
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
         });*/
    }
    ////////VAR FILTER/////////////////////////////////////
    /////////////////////////////////////////////


    function cliFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("CLI");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTablec");
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

    function fourFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("FOUR");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTablef");
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




    /////////////////////////////////////////////
    /////////////////////////////////////////////

    function readProducts(){
        $('#load-products').load('tableprd.php');
    }




</script>