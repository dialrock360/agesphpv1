<script>
    $(document).ready(function(){
        $("#Allpcheck").click(function () {
            $(".checketed").prop('checked', $(this).prop('checked'));

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
            var ID = $(this).closest("tr").attr('id');

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
            trObj.find(".checkp").show();
            trObj.find(".modaledit").show();
            trObj.find(".deleteBtn").show();

            //hide edit button
            $(this).closest("tr").find(".editBtn").show();

            //show edit button
            $(this).closest("tr").find(".saveBtn").hide();
        });



    });

    $("#getPrd").click(function () {
//var uid = $(this).data('id');   // it will get id of clicked row
        var uid = $(this).data('id');   // it will get id of clicked row
        var choix = 'produit';   // it will get id of clicked row
        var qnt = 1;   // it will get id of clicked row
        var chk = 1;   // it will get id of clicked row

        var x = document.getElementById("taburl");
        var cible = x.defaultValue;

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
            url:cible,
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
    $('#delete').click(function(){

        var post_arr = [];
        $('#recordsTable input[type=checkbox]').each(function() {
            if (jQuery(this).is(":checked")) {
                var id = this.id;
                var splitid = id.split('_');
                var postid = splitid[1];

                post_arr.push(postid);

            }
        });

        var t= $(this).attr('data-id');

        alert('   ---'+post_arr);

        if(post_arr.length > 0){

            // AJAX Request
            $.ajax({
                url: 'delete_mul2.php',
                type: 'POST',
                data: { post_id: post_arr,bdinfo: t},
                success: function(response){
                    $.each(post_arr, function( i,l ){
                        $("#tr_"+l).remove();
                    });
                }
            });
        }
    });
</script>