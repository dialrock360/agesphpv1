<!-- basic scripts -->

<!-- basic scripts -->

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

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="<?php echo $base_url; ?>assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo $base_url; ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/spinbox.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/moment.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/daterangepicker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.knob.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/autosize.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootstrap-tag.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/bootbox.min.js"></script>




<script type="text/javascript" src="<?php echo $base_url; ?>assets/DataTables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/datatab.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/function.js"></script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/scriptstock.js"></script>



<!-- inline scripts related to this page -->
<script>
function mychangeFunction() {
    
 var x = document.getElementById("mySelect").value;
     document.getElementById("myText").value = x;
}




    $('#getpcmp').on('click',function(){

        var uid=  $('#uid').val();
        var a=0, b=SearchNbChamp(), c='', d='';

        var e=  $('#i').val();


        var ligne=e+1;

        // alert(type+'!!!');
        if(uid==null){

            alert('Veillez Electionner un Article svp!!!');
            //window.location.href='stock.php';

        }else{
            //  alert(uid+'!!!');

            var sendInfo = {
                idcmp: uid,
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

    });
    $('.getPrdcmp').on('click',function(){
        var uid = $(this).attr('data-id');

        alert(uid);
        var choix = 'produit';   // it will get id of clicked row
        var qnt = 1;   // it will get id of clicked row
        var chk = 1;   // it will get id of clicked row
        var sendInfo = {
            idcmp: uid,
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
    $(document).ready(function(){


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

         //  alert(inputData);

            $.ajax({
                type:'POST',
                url: 'server.php',
                dataType: "json",
                data:'action=edit&id='+ID+'&'+inputData,
                success:function(response){
                    if(response.status == 'ok'){
                        //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1
                        trObj.find(".editSpan.DESI").text(response.data.DESI);
                        trObj.find(".editSpan.PRIXA").text(response.data.PRIXA);
                        trObj.find(".editSpan.PRIXV").text(response.data.PRIXV);
                        trObj.find(".editSpan.QNT").text(response.data.QNT);
                        //trObj.find(".editSpan.ID_CAT").text(response.data.ID_CAT);
                        // trObj.find(".editSpan.ID_CAT").text(response.data.ID_CAT);

                        trObj.find(".editInput.DESI").text(response.data.DESI);
                        trObj.find(".editInput.PRIXA").text(response.data.PRIXA);
                        trObj.find(".editInput.PRIXV").text(response.data.PRIXV);
                        trObj.find(".editInput.QNT").text(response.data.QNT);
                      //  trObj.find(".editInput.ID_CAT").text(response.data.ID_CAT);
                        //trObj.find(".editInput.ID_CAT").text(response.data.ID_CAT);


                        trObj.find(".editInput").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".saveBtn").hide();
                        trObj.find(".editSpan").show();
                        trObj.find(".editBtn").show();
                        trObj.find(".checketed").show();
                        trObj.find(".modaledit").show();
                        trObj.find(".deleteBtn").show();
                    }else{
                        alert(response.msg);
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
            $.ajax({
                type:'POST',
                url: 'view/page/get/delete.php',
                dataType: "json",
                data:'action=delete&id='+ID,
                success:function(response){
                    if(response.status == 'ok'){
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

        $('.deletePrdcmp').on('click',function(){
            //show edit input
            $(this).closest("tr").find(".cancelBtnPrdcmp").show();

            $(this).closest("tr").find(".deletePrdcmp").hide();

            $(this).closest("tr").find(".cancelBtnPrdcmp").show();
            //show confirm button
            $(this).closest("tr").find(".confirmBtnPrdcmp").show();

        });
        $('.cancelBtnPrdcmp').on('click',function(){
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');


            //show edit input
            $(this).closest("tr").find(".cancelBtnPrdcmp").hide();

            trObj.find(".confirmBtnPrdcmp").hide();
            //hide delete button
            trObj.find(".deletePrdcmp").show();

            //hide edit button
            $(this).closest("tr").find(".editBtn").show();

            //show edit button
            $(this).closest("tr").find(".saveBtn").hide();
        });
        $('.confirmBtnPrdcmp').on('click',function(){
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');
           // alert(ID);
            $.ajax({
                type:'POST',
                url: 'view/page/get/getprd.php',
                dataType: "json",
                data:'action=delete&id='+ID,
                success:function(response){
                    if(response.status == 'ok'){
                        trObj.remove();
                    }else{
                        trObj.find(".confirmBtnPrdcmp").hide();
                        trObj.find(".cancelBtnPrdcmp").hide();
                        trObj.find(".deletePrdcmp").show();
                        alert(response.msg);
                    }
                }
            });
        });

    });
</script>
<script>
    function filterTable(event) {
        var filter = event.target.value.toUpperCase();
        var rows = document.querySelector("#recordsTable tbody").rows;

        for (var i = 0; i < rows.length; i++) {
            var firstCol = rows[i].cells[0].textContent.toUpperCase();
            var secondCol = rows[i].cells[1].textContent.toUpperCase();
            if (firstCol.indexOf(filter) > -1 || secondCol.indexOf(filter) > -1) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

    function protabFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("addpinput");
        filter = input.value.toUpperCase();
        table = document.getElementById("userData");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    document.querySelector('#prosinput').addEventListener('keyup', filterTable, false);
    function IdentPERSO(Obj){ return (document.all)?document.all[Obj]:document.getElementById(Obj); } // IdentPERSOification d'objet lib_js_1

    function SearchNbChamp(){
        var a=0; while(Champ2Design=IdentPERSO('Champ2Design_'+a)){ a++; } return a;} // Trouve le nombre de Champ2s à calculer

    function LeformatChamp(nombre){ // Retourne le nombre au format 2 chiffres après la virgule
        var num_string=Math.abs(Math.round(nombre*100)).toString();
        var moin=nombre<0?"-":"";
        var pos=num_string.length-2;
        var chiffre="."+num_string.substr(pos);
        if(nombre==0) return "0.00";
        if(nombre > -1 && nombre < 1) return moin+"0"+chiffre;
        while(pos>3){ pos=pos-3; chiffre=","+num_string.substr(pos,3)+chiffre; }
        return moin+num_string.substring(0,pos)+chiffre;
    }

    function monCalcul()
    { // Calucule Les valeurs
        // Définition des variables
        var a=0, b=SearchNbChamp(), valueSousTotal=0;
        var valTotalHT=IdentPERSO('valTotalHT_stand'), valTVA=IdentPERSO('valTVA_stand'), valTotalTTC=IdentPERSO('valTotalTTC_stand'),TVARETURN2=IdentPERSO('valueTVARETURN2');
        var Champ2TarifHT, Champ2Qte, Champ2Result;
        for(a; a<b; a++){
            Champ2TarifHT=IdentPERSO('Champ2TarifHT_'+a).value;
            IdentPERSO('Champ2TarifHT_'+a).value=(Champ2TarifHT);
            Champ2Qte=IdentPERSO('Champ2Qte_'+a).value;
            IdentPERSO('Champ2Qte_'+a).value=(Champ2Qte);
            Champ2Result=IdentPERSO('Champ2Result_'+a);
            Champ2Result.value=(Champ2TarifHT*Champ2Qte);
            valueSousTotal=valueSousTotal + (Champ2TarifHT*Champ2Qte);


        }
        var tvaTotaTVATPM;
        tvaTotaTVATPM=((valueSousTotal*valTVA.value)/100);
        valTotalHT.value=(valueSousTotal);
        var tvaTotaTVA=parseInt(tvaTotaTVATPM),valueTotaTASX=parseInt(valueSousTotal);
        valTotalTTC.value=(tvaTotaTVA+valueTotaTASX);
        TVARETURN2.value=parseInt(tvaTotaTVA);
        $('#ligne').val(b);
        LeConvetisseur();

    }

    function suprLine(where){ // Fonction de suppression de ligne
        var a=0, b=SearchNbChamp(), c='', d='', e=0;
        var Champ2Design, Champ2TarifHT, Champ2Qte, Champ2Result,Champ2Condis,Champ2Idp,Champ2Idf,Champ2Row;

        for(a; a<b; a++){
            Champ2Design=IdentPERSO('Champ2Design_'+a).value;
            Champ2TarifHT=IdentPERSO('Champ2TarifHT_'+a).value;
            Champ2Qte=IdentPERSO('Champ2Qte_'+a).value;
            Champ2Result=IdentPERSO('Champ2Result_'+a).value;
            Champ2Condis=IdentPERSO('Champ2Condis_'+a).value;
            Champ2Idp=IdentPERSO('Champ2Idp_'+a).value;
            Champ2Idf=IdentPERSO('Champ2Idf_'+a).value;
            Champ2Row=IdentPERSO('Champ2Row_'+a).value;

            if(a!=where){
                c='<td><input type="text" name="nom_'+e+'" id="Champ2Design_'+e+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /><input type="hidden" name="idp_'+e+'" id="Champ2Idp_'+e+'" value="'+Champ2Idp+'"/><input type="hidden" name="idfac_'+e+'" id="Champ2Idf_'+e+'" value="'+Champ2Idf+'"/><input type="hidden" name="row_'+e+'" id="Champ2Row_'+e+'" value="'+Champ2Row+'"/></td>'+"\n";
                c+='<td><input type="hidden" name="condis_'+e+'"id="Champ2Condis_'+e+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control" /><input type="number" min="1" max="" step="0.5" name="qnte_'+e+'" id="Champ2Qte_'+e+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" required /></td>'+"\n";
                c+='<td><input type="hidden" name="prix_'+e+'" id="Champ2TarifHT_'+e+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" readonly/><input type="text" name="ptotal_'+e+'" id="Champ2Result_'+e+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control" readonly/></td>'+"\n";
                if(a==b-1 || e==b-2){
                    c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                }else{
                    c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                }
                d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
                e++;
            }
            else{
                /*$idf = strval($_REQUEST['idf']);
                $idp = strval($_REQUEST['idf']);
                $nommv = strval($_REQUEST['type']);

                $qnt = strval($_REQUEST['qnt']);
                $mts = strval($_REQUEST['mts']);*/

                var uid= 'dltfac';
                var idf= Champ2Idf;
                var idp= Champ2Idp;
                var qnt= Champ2Qte;
                var mts= Champ2Result;
                var idmv=  $('#INCREMENT').val();
                uid=a;
                e=a;

            }
        }
        IdentPERSO('manligneCalcul').innerHTML=d;
        monCalcul();
    }
</script>
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


        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
            //resize the chosen on window resize

            $(window)
                .off('resize.chosen')
                .on('resize.chosen', function() {
                    $('.chosen-select').each(function() {
                        var $this = $(this);
                        $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            });


            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }


        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});

        autosize($('textarea[class*=autosize]'));

        $('textarea.limited').inputlimiter({
            remText: '%n character%s remaining...',
            limitText: 'max allowed : %n.'
        });

        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



        $( "#input-size-slider" ).css('width','200px').slider({
            value:1,
            range: "min",
            min: 1,
            max: 8,
            step: 1,
            slide: function( event, ui ) {
                var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                var val = parseInt(ui.value);
                $('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
            }
        });

        $( "#input-span-slider" ).slider({
            value:1,
            range: "min",
            min: 1,
            max: 12,
            step: 1,
            slide: function( event, ui ) {
                var val = parseInt(ui.value);
                $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
            }
        });



        //"jQuery UI Slider"
        //range slider tooltip example
        $( "#slider-range" ).css('height','200px').slider({
            orientation: "vertical",
            range: true,
            min: 0,
            max: 100,
            values: [ 17, 67 ],
            slide: function( event, ui ) {
                var val = ui.values[$(ui.handle).index()-1] + "";

                if( !ui.handle.firstChild ) {
                    $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                        .prependTo(ui.handle);
                }
                $(ui.handle.firstChild).show().children().eq(1).text(val);
            }
        }).find('span.ui-slider-handle').on('blur', function(){
            $(this.firstChild).hide();
        });


        $( "#slider-range-max" ).slider({
            range: "max",
            min: 1,
            max: 10,
            value: 2
        });

        $( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                animate: true

            });
        });

        $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
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
            btn_choose: 'Drop files here or click to choose',
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

        $('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
            .closest('.ace-spinner')
            .on('changed.fu.spinbox', function(){
                //console.log($('#spinner1').val())
            });
        $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
        $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
        $('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

        //$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
        //or
        //$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
        //$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


        //datepicker plugin
        //link
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});


        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        })
            .prev().on(ace.click_event, function(){
            $(this).next().focus();
        });


        $('#timepicker1').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            disableFocus: true,
            icons: {
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down'
            }
        }).on('focus', function() {
            $('#timepicker1').timepicker('showWidget');
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });




        if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
            //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-arrows ',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });


        $('#colorpicker1').colorpicker();
        //$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe

        $('#simple-colorpicker-1').ace_colorpicker();
        //$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
        //$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
        //var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
        //picker.pick('red', true);//insert the color if it doesn't exist


        $(".knob").knob();


        var tag_input = $('#form-field-tags');
        try{
            tag_input.tag(
                {
                    placeholder:tag_input.attr('placeholder'),
                    //enable typeahead by specifying the source array
                    source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
                    /**
                     //or fetch data from database, fetch those that match "query"
                     source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
                     */
                }
            )

            //programmatically add/remove a tag
            var $tag_obj = $('#form-field-tags').data('tag');
            $tag_obj.add('Programmatically Added');

            var index = $tag_obj.inValues('some tag');
            $tag_obj.remove(index);
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //autosize($('#form-field-tags'));
        }


        /////////
        $('#modal-form input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'ace-icon fa fa-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })

        //chosen plugin inside a modal will have a zero width because the select element is originally hidden
        //and its width cannot be determined.
        //so we set the width after modal is show
        $('#modal-form').on('shown.bs.modal', function () {
            if(!ace.vars['touch']) {
                $(this).find('.chosen-container').each(function(){
                    $(this).find('a:first-child').css('width' , '210px');
                    $(this).find('.chosen-drop').css('width' , '210px');
                    $(this).find('.chosen-search input').css('width' , '200px');
                });
            }
        })
        /**
         //or you can activate the chosen plugin after modal is shown
         //this way select element becomes visible with dimensions and chosen works as expected
         $('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
         */



        $(document).one('ajaxloadstart.page', function(e) {
            autosize.destroy('textarea[class*=autosize]')

            $('.limiterBox,.autosizejs').remove();
            $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
        });

    });


</script>


<!-- page specific plugin scripts --><!-- page specific plugin scripts -->
<script src="<?php echo $base_url; ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/buttons.colVis.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/dataTables.select.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo $base_url; ?>assets/js/ace-elements.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/ace.min.js"></script>
<script type="text/javascript">
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        { "bSortable": false },
                        null, null,null, null, null,
                        { "bSortable": false }
                    ],
                    "aaSorting": [],


                    //"bProcessing": true,
                    //"bServerSide": true,
                    //"sAjaxSource": "http://127.0.0.1/table.php"	,

                    //,
                    //"sScrollY": "200px",
                    //"bPaginate": false,

                    //"sScrollX": "100%",
                    //"sScrollXInner": "120%",
                    //"bScrollCollapse": true,
                    //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                    //you may want to wrap the table inside a "div.dataTables_borderWrap" element

                    //"iDisplayLength": 50


                    select: {
                        style: 'multi'
                    }
                } );



        $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

        new $.fn.dataTable.Buttons( myTable, {
            buttons: [
                {
                    "extend": "colvis",
                    "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    columns: ':not(:first):not(:last)'
                },
                {
                    "extend": "copy",
                    "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "csv",
                    "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "excel",
                    "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "pdf",
                    "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                    "className": "btn btn-white btn-primary btn-bold"
                },
                {
                    "extend": "print",
                    "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                    "className": "btn btn-white btn-primary btn-bold",
                    autoPrint: false,
                    message: 'This print was produced using the Print button for DataTables'
                }
            ]
        } );
        myTable.buttons().container().appendTo( $('.tableTools-container') );

        //style the message box
        var defaultCopyAction = myTable.button(1).action();
        myTable.button(1).action(function (e, dt, button, config) {
            defaultCopyAction(e, dt, button, config);
            $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        });


        var defaultColvisAction = myTable.button(0).action();
        myTable.button(0).action(function (e, dt, button, config) {

            defaultColvisAction(e, dt, button, config);


            if($('.dt-button-collection > .dropdown-menu').length == 0) {
                $('.dt-button-collection')
                    .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                    .find('a').attr('href', '#').wrap("<li />")
            }
            $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        });

        ////

        setTimeout(function() {
            $($('.tableTools-container')).find('a.dt-button').each(function() {
                var div = $(this).find(' > div').first();
                if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
                else $(this).tooltip({container: 'body', title: $(this).text()});
            });
        }, 500);





        myTable.on( 'select', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
            }
        } );
        myTable.on( 'deselect', function ( e, dt, type, index ) {
            if ( type === 'row' ) {
                $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
            }
        } );




        /////////////////////////////////
        //table checkboxes
        $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

        //select/deselect all rows according to table header checkbox
        $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $('#dynamic-table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) myTable.row(row).select();
                else  myTable.row(row).deselect();
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
            var row = $(this).closest('tr').get(0);
            if(this.checked) myTable.row(row).deselect();
            else myTable.row(row).select();
        });



        $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
            e.stopImmediatePropagation();
            e.stopPropagation();
            e.preventDefault();
        });



        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function(){
                var row = this;
                if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
            var $row = $(this).closest('tr');
            if($row.is('.detail-row ')) return;
            if(this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });



        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
        }




        /***************/
        $('.show-details-btn').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/





        /**
         //add horizontal scrollbars to a simple table
         $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
         {
                    horizontal: true,
                    styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
                    size: 2000,
                    mouseWheelLock: true
                  }
         ).css('padding-top', '12px');
         */


    })

</script>