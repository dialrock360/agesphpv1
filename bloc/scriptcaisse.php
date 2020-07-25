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
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#userData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!-- inline scripts related to this page -->
<script>

    function clearline() {
        $('#manligneCalcul').html('');

    }
    function getetat() {
        alert($(this).data("id"));
        if(x  == 'hhh'){

            var uid= x;



            //alert(b);
            var sendInfo = {
                idetat: uid,
                line: 0
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
    function setline(x) {
        b=SearchNbChamp();
        document.getElementById("ligne").value = b;

    }
    function updatecaisse() {
        var x = document.getElementById("capital").value;
		 var sendInfo = {
        updatecaisse: 1,
        mts: x
    };
		//alert(x);
         
			
			 $.ajax({
        url: 'view/page/get/getfac.php',
        type: 'POST',
        data: sendInfo,
        dataType: 'html'
    })
        .done(function(data){
            console.log(data);
            $('#dynamic-content').html('');
            $('#dynamic-content').html(data); // load response
			
        })
        .fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
            $('#modal-loader').hide();
        });
    }

    function setEtat(){

        var uid=  $('#room').val();
        var a=0, b=SearchNbChamp(), c='', d='';

        var e=  $('#i').val();


        var ligne=e+1;
        var type=  'chambre';
        //alert(uid+'!!!');
        // alert(type+'!!!');
        if(uid==''){

            alert('Veillez Electionner un Article svp!!!');
            //window.location.href='stock.php';

        }else{


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

    $(document).ready(function(){





        $('.viewer').on('click',function(){

            var uid= $(this).data("id");
            //alert(uid);
            var sendInfo = {
                idetat: uid,
                line: 0
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



        });
		$(document).on('click', '#getfac', function(e){

        e.preventDefault();

        var uid = $(this).data('id');   // it will get id of clicked row

        $('#dynamic-content').html(''); // leave it blank before ajax call
        $('#modal-loader').show();      // load ajax loader

        $.ajax({
            url: 'view/page/get/getfac.php',
            type: 'POST',
            data: 'idpcmp='+uid,
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


		
        $('.delete_etat').click(function(e){

            e.preventDefault();
            var  Countp = $("input:checkbox:checked").length;
            $('#number').val(Countp);
            var uid=  $('#number').val();
            var choix = "";
            $("input:checkbox:checked").each(function(){
                    choix = choix.concat(' ' + $(this).val());
                }
            );
            var sid = $(this).attr('data-id');
           // alert(type+' Cocher!!!'+choix);
            var qnt = uid;   // it will get id of clicked row

            if(qnt==2){
                alert(sid+'veiller cocher des case svp!!!'+choix);
            }


            var choix = "";
            var qnt = 1;   // it will get id of clicked row
            var type = 'condis';   // it will get id of clicked row




            var parent = $(this).parent("td").parent("tr");

            var sendInfo = {
                idflux: uid,
                qnt: qnt
            };

            bootbox.dialog({
                message: "Etes vous sure de vouloir supprimer ce(s) flux ?",
                title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
                buttons: {
                    success: {
                        label: "Non",
                        className: "btn-success",
                        callback: function() {
                            window.location.href='?file=page/caisse';
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
        $('#gete').on('click',function(){
            var row=  $('#ligne').val();

            if(row<=0){

                var uid= $('#datee').val();
                var a=0, b=SearchNbChamp(), c='', d='';

                var e=  $('#i').val();
                //alert(b);
                var sendInfo = {
                    idetat: uid,
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
                url: 'view/page/get/getecmp.php',
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
            $(this).closest("tr").find(".checkp").hide();

            //hide edit button
            $(this).closest("tr").find(".editBtn").hide();

            //show edit button
            $(this).closest("tr").find(".saveBtn").show();

        });

        $('.saveBtn').on('click',function(){
            var trObj = $(this).closest("tr");
            var ID = $(this).closest("tr").attr('id');
            var inputData = $(this).closest("tr").find(".editInput").serialize();
            //alert(inputData);
            $.ajax({
                type:'POST',
                url: 'view/page/get/getecmp.php',
                dataType: "json",
                data:'action=edit&id='+ID+'&'+inputData,
                success:function(response){
                    if(response.status == 'ok'){
                        //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1
                        trObj.find(".editSpan.DESI").text(response.data.DESI);
                        trObj.find(".editSpan.PRIXA").text(response.data.PRIXA);
                        trObj.find(".editSpan.PRIXV").text(response.data.PRIXV);
                        trObj.find(".editSpan.QNT").text(response.data.QNT);
                        // trObj.find(".editSpan.ID_CAT").text(response.data.ID_CAT);

                        trObj.find(".editInput.DESI").text(response.data.DESI);
                        trObj.find(".editInput.PRIXA").text(response.data.PRIXA);
                        trObj.find(".editInput.PRIXV").text(response.data.PRIXV);
                        trObj.find(".editInput.QNT").text(response.data.QNT);
                        //trObj.find(".editInput.ID_CAT").text(response.data.ID_CAT);


                        trObj.find(".editInput").hide();
                        trObj.find(".cancelBtn").hide();
                        trObj.find(".saveBtn").hide();
                        trObj.find(".editSpan").show();
                        trObj.find(".editBtn").show();
                        trObj.find(".checkp").show();
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
            $(this).closest("tr").find(".checkp").hide();

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
                url:'server.php',
                dataType: "json",
                data:'action=deleterap&id='+ID,
                success:function(response){	
                    if(response.status == 'ok'){
					alert(response.msg);
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
            trObj.find(".checkp").show();
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
                url: 'view/page/get/getecmp.php',
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
        var rows = document.querySelector("#myTablePRO tbody").rows;

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
        var a=0; while(Champ2desi=IdentPERSO('Champ2desi_'+a)){ a++; } return a;} // Trouve le nombre de Champ2s à calculer

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
        var Champ2stock, Champ2gain, Champ2Result;
        alert(a);
        for(a; a<b; a++){
            Champ2stock=IdentPERSO('Champ2stock_'+a).value;
            IdentPERSO('Champ2stock_'+a).value=(Champ2stock);
            Champ2gain=IdentPERSO('Champ2gain_'+a).value;
            IdentPERSO('Champ2gain_'+a).value=(Champ2gain);
            Champ2Result=IdentPERSO('Champ2Result_'+a);
            Champ2Result.value=(Champ2stock*Champ2gain);
            valueSousTotal=valueSousTotal + (Champ2stock*Champ2gain);

            if(a>7){

            }

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
        var Champ2desi, Champ2stock, Champ2gain, Champ2dep,Champ2Idfa;


        for(a; a<b; a++){
            Champ2desi=IdentPERSO('Champ2desi_'+a).value;
            Champ2gain=IdentPERSO('Champ2gain_'+a).value;
            Champ2dep=IdentPERSO('Champ2dep_'+a).value;
            Champ2stock=IdentPERSO('Champ2stock_'+a).value;
            Champ2Idfa=IdentPERSO('Champ2Idfa_'+a).value;

            if(a!=where){
                c='<td><input type="text" name="nom_'+e+'" id="Champ2desi_'+e+'" value="'+Champ2desi+'" style="text-align:left;" class="form-control" readonly/><input type="hidden" name="idfa_'+e+'" id="Champ2Idfa_'+e+'" value="Champ2Idfa"/></td>'+"\n";
                c+='<td><input type="number" step="0.0001" min="0" max="" name="dep_'+e+'"id="Champ2dep_'+e+'" value="'+Champ2dep+'"  style="text-align:right;" class="form-control" required /></td>'+"\n";
                c+='<td><input type="number" step="0.0001" min="0" max="" name="gain_'+e+'"id="Champ2gain_'+e+'"  value="'+Champ2gain+'"  style="text-align:right;" class="form-control"  required /></td>'+"\n";

                if (Champ2stock=='CAISSE') {

                    c+='<td><input type="text" type="number" step="0.0001" min="0" name="stock_'+e+'" id="Champ2stock_'+e+'"  value="'+Champ2stock+'" style="text-align:right;  background-color: #fdfbf3;color: blue;" class="form-control" required /></td>'+"\n";


                }
                else {

                    c+='<td><input type="text" type="number" step="0.0001" min="0" name="stock_'+e+'" id="Champ2stock_'+e+'"  value="'+Champ2stock+'" style="text-align:right;  background-color: rgba(147,100,200,0.1);color: #fdfbf3;" class="form-control" readonly /></td>'+"\n";


                }


                if(a==b-1 || e==b-2){
                    c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                }else{
                    c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                }
                d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
                e++;
            }
            else{
                e=a;

            }
        }
        IdentPERSO('manligneCalcul').innerHTML=d;

            /*

                        if(a!=where){
                            c='<td><input readonly type="text" name="nom_'+e+'" id="Champ2desi_'+e+'" value="'+Champ2desi+'" style="text-align:left;" class="form-control" /><input type="hidden" name="idfa_'+e+'" id="Champ2Idfa_'+e+'" value="'+Champ2Idfa+'"/></td>'+"\n";
                            c+='<td><input type="number" min="1" max="" step="0.0001" name="dep_'+e+'"id="Champ2dep_'+e+'" value="'+Champ2dep+'" style="text-align:left;" class="form-control" /></td>'+"\n";
                            c+='<td><input  type="number" min="1" max="" step="0.0001" name="gain_'+e+'"id="Champ2gain_'+e+'" value="'+Champ2gain+'" style="text-align:left;" class="form-control" /></td>'+"\n";
                            if(Champ2desi=='CAISSE'){
                                c+='<td><input  type="number" min="1" max="" step="0.0001" name="stock_'+e+'" id="Champ2stock_'+e+'" value="'+Champ2stock+'" style="text-align:right; background-color: #5BA4D5;color: #fdfbf3;" class="form-control" required/></td>'+"\n";
                            }else{
                                c+='<td><input  type="number" min="1" max="" step="0.0001" name="stock__'+e+'" id="Champ2stock_'+e+'" value="'+Champ2stock+'" style="text-align:right;" class="form-control" readonly/></td>'+"\n";
                            }
                            if(a==b-1 || e==b-2){
                                c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                            }else{
                                c+='<td><button class="btn btn-xs btn-white btn-default btn-round INPUTFACT" type="button" onclick="suprLine('+e+')"><i class="ace-icon fa fa-times red2"></i>Suppr</button></td>'+"\n";
                            }
                            d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
                            e++;
                        }
                        else{

                            e=a;

                        }

                    }
                    IdentPERSO('manligneCalcul').innerHTML=d;
            */
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