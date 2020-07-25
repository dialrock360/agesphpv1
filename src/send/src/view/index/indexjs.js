
$(document).ready(function(){

    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

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
            $(this).closest("tr").find("#addArticle").hide();
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

});

