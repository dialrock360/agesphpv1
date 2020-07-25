

<!--[if !IE]> -->
<script src="<?php echo $base_url; ?>assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $base_url; ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $base_url; ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/ace.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootbox.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/autosize.min.js"></script>

<!-- inline scripts related to this page -->


<!-- inline scripts related to this page -->


<script type="text/javascript">
    jQuery(function($) {
        $('#id-disable-check').on('click', function() {
            var inp = $('#form-input-readonly').get(0);
            if(inp.hasAttribute('disabled')) {
                inp.setAttribute('readonly' , 'true');
                inp.removeAttribute('disabled');
                inp.value="This text field is readonly!";
            }
            else {
                inp.setAttribute('disabled' , 'disabled');
                inp.removeAttribute('readonly');
                inp.value="This text field is disabled!";
            }
        });



        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'Choisire Une Photo de Profile',
            btn_choose:'Choisir',
            btn_change:'Changer',
            droppable:false,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });
        //pre-show a file name, for example a previously selected file
        //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


        $('#id-input-file-3').ace_file_input({
            style: 'well',
            btn_choose: 'Choisire Une Photo de Profile',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


        //$('#id-input-file-3')
        //.ace_file_input('show_file_list', [
        //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
        //{type: 'file', name: 'hello.txt'}
        //]);




        //dynamically change allowed formats by changing allowExt && allowMime function
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var whitelist_ext, whitelist_mime;
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "ace-icon fa fa-picture-o";

                whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "ace-icon fa fa-cloud-upload";

                whitelist_ext = null;//all extensions are acceptable
                whitelist_mime = null;//all mimes are acceptable
            }
            var file_input = $('#id-input-file-3');
            file_input
                .ace_file_input('update_settings',
                    {
                        'btn_choose': btn_choose,
                        'no_icon': no_icon,
                        'allowExt': whitelist_ext,
                        'allowMime': whitelist_mime
                    })
            file_input.ace_file_input('reset_input');

            file_input
                .off('file.error.ace')
                .on('file.error.ace', function(e, info) {
                    //console.log(info.file_count);//number of selected files
                    //console.log(info.invalid_count);//number of invalid files
                    //console.log(info.error_list);//a list of errors in the following format

                    //info.error_count['ext']
                    //info.error_count['mime']
                    //info.error_count['size']

                    //info.error_list['ext']  = [list of file names with invalid extension]
                    //info.error_list['mime'] = [list of file names with invalid mimetype]
                    //info.error_list['size'] = [list of file names with invalid size]


                    /**
                     if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
                     */


                    //if files have been selected (not dropped), you can choose to reset input
                    //because browser keeps all selected files anyway and this cannot be changed
                    //we can only reset file field to become empty again
                    //on any case you still should check files with your server side script
                    //because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
                });


            /**
             file_input
             .off('file.preview.ace')
             .on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
             */

        });




    });
</script>
<script type="text/javascript">

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
            url: 'view/page/get/getuser.php',
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
            url: 'view/page/get/getuser.php',
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
            url: 'view/page/get/getuser.php',
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
            url: 'view/page/get/getuser.php',
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
                  url: 'view/page/get/getMprd.php',
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
                            window.location.href='?file=page/user';
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

                            //window.location.href='?file=page/user';
                            setTimeout(' window.location.href = "?file=page/user"; ',2000);


                        }
                    }
                }
            });

        }else{


            alert('Veillez Cocher au moins une case !!!');
            //window.location.href='?file=page/user';
        }


        /*
         $('#dynamic-content').html(''); // leave it blank before ajax call
         $('#modal-loader').show();      // load ajax loader

         $.ajax({
           url: 'view/page/getDprd.php',
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

    function myschUFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("SchUinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myschUTable");
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





    function myschfourFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("Schfourinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myschfourTable");
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





    function myschcliFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("Schcliinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myschcliTable");
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