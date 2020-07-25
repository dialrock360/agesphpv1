<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- page specific plugin styles -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/daterangepicker.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap-colorpicker.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/fullcalendar.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery.gritter.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/select2.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/bootstrap-editable.min.css" />
<!-- text fonts -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="<?php echo $base_url; ?>assets/js/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->


<link href="<?php echo $base_url; ?>assets/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
<!--[if lte IE 8]>
<script src="<?php echo $base_url; ?>assets/js/html5shiv.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/DataTables/media/css/jquery.dataTables.min.css">

<script src="<?php echo $base_url; ?>assets/tinymce/tinymce/js/tinymce/tinymce.js"></script>
<script src="<?php echo $base_url; ?>assets/tinymce/js/tinymce/tinymce.dev.js"></script>
<script src="<?php echo $base_url; ?>assets/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
<script src="<?php echo $base_url; ?>assets/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
<script src="<?php echo $base_url; ?>assets/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script>
<script>
    tinymce.init ({selector: 'textarea.editeur',
        plugins: "fullscreen advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker image emoticons table save textcolor media insertdatetime",
        height: 500,
        toolbar: "insertfile undo redo | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect table | emoticons image media| preview print fullscreen fullpage insertdatetime "


    });


    if (!window.console) {
        console = {
            log: function(text) {
                document.body.appendChild(document.createTextNode(text));
                document.body.appendChild(document.createElement('br'));
            }
        };
    }

    tinymce.init ({selector: 'textarea.Basicediteur',
        plugins: "fullscreen advlist lists charmap hr pagebreak textcolor insertdatetime",
        height: 100,
        toolbar: " undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | fullscreen insertdatetime "


    });

    tinymce.init ({selector: 'textarea.simplediteur',
        plugins: " advlist lists charmap hr insertdatetime",
        height: 150,
        width:180


    });
    tinymce.init ({selector: 'input.nulditeur',
        plugins: " advlist lists charmap hr insertdatetime",
        height:10,
        width:300,
        toolbar: " undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | insertdatetime "


    });
    tinymce.init ({selector: 'textarea.zeroditeur',
        toolbar: "undo redo"

    });
    if (!window.console) {
        console = {
            log: function(text) {
                document.body.appendChild(document.createTextNode(text));
                document.body.appendChild(document.createElement('br'));
            }
        };
    }
</script>
<script src="<?php echo $base_url; ?>assets/editors/ckeditor/ckeditor.js"></script>

<script type="text/javascript">
    $(function() {
        $('#sample-table').tablesorter();
        $('.date1').datepicker();
        $(".chosen").chosen();
    });
</script>
<script type="text/javascript">
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
            url: 'getMprd.php',
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
</script>
<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/DataTables/media/css/jquery.dataTables.min.css">

<style>
    #listuser,#formrec,#formFpro,#formDpro,#formfac{
        display: block;
    }
</style>