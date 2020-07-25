
<style>
    #closehidenfam,#AfamI, .hidenfam{
        display: none;
    }
    input[type="color"] {
        opacity: 0;
        display: block;
        width: 32px;
        height: 32px;
        border: none;
    }
    #color-picker-wrapper {
        float: left;
    }
    #borderlesF td {
        border: 0;
    }
    input[type="color"] {
        opacity: 0;
        display: block;
        width: 32px;
        height: 32px;
        border: none;
    }
    .color-picker-wrapper {
        float: left;
    }
    .borderlesF td {
        border: 0;
    }
</style>
<?php



$prddb = new Produit();
$catdb = new Categorie();
$condisdb = new Condis();
$famdb = new Famille();
$prdcomdb = new Produit_cmp();
$Optioncat= optionVarier('cat');
$Optioncondis= optionVarier('condis');
$Optionprd= optionVarier('prd');
$Optioncomposer= optionVarier('noprdcmp');
$Optionfam= optionVarier('fam');

 require_once 'stock/stockcontent.php';
?>
<?php
require_once 'bloc/scripstock.php';
?>

<script>



    var varurl=$("#url").val();

 function setQNT(x,y) {
  alert(x+" "+y);

  $('#iimodal-bodyt').html(x+" "+y); // leave it blank before ajax call
  $('#myModal').show(); // load response
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

  // alert(uid);
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

 //  alert(post_arr+'   ---'+t);

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




  $.ajax({
    type:'POST',
    url: 'controller/server.php',
    dataType: "json",
    data:'action=edit&id='+ID+'&'+inputData,
    success:function(response){

     //   $("#error").html(response.data);
      if(response.status == 'ok'){
      //SELECT `IDP`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `produit` WHERE 1
      trObj.find(".editSpan.DESI").text(response.data.DESI);
      trObj.find(".editSpan.PRIXA").text(response.data.PRIXA);
      trObj.find(".editSpan.PRIXV").text(response.data.PRIXV);
      trObj.find(".editSpan.IDC").text(response.data.NOMC);
      trObj.find(".editSpan.QNT").text(response.data.QNT);
      trObj.find(".editSpan.ID_CAT").text(response.data.NOM_CAT);
      // trObj.find(".editSpan.ID_CAT").text(response.data.ID_CAT);




      trObj.find(".editInput").hide();
      trObj.find(".cancelBtn").hide();
      trObj.find(".saveBtn").hide();
      trObj.find(".editSpan").show();
      trObj.find(".editBtn").show();
      trObj.find(".checketed").show();
      trObj.find(".modaledit").show();
      trObj.find(".deleteBtn").show();
     }else{
          $("#error").html(response.data);
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
