<div class="row">

    <div class="col-xs-12">

        <div id="temp-modal" class="modal fade" tabindex="-1">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Modificateur d'Aparence</h3>
                        </div>

                        <div class="modal-body">

                          <span class="pull-left inline" id="radio-group">
                                        <span class="grey">style:</span>

                                        <span class="btn-toolbar inline middle no-margin">
                                            <label class="btn btn-xs btn-primary active">

                                                    bleu
                                                    <input type="radio" value="bleu" name="theme" onclick="check('theme,bleu')" />
                                                </label>

                                                <label class="btn btn-xs btn-Light">
                                                    gris
                                                    <input type="radio" value="gris" name="theme" onclick="check('theme,gris')" />
                                                </label>

                                                <label class="btn btn-xs btn-grey">
                                                    noire
                                                    <input type="radio" value="noire" name="theme" onclick="check('theme,noire')"/>
                                                </label>

                                                <label class="btn btn-xs btn-pink">
                                                    rose
                                                    <input type="radio" value="rose" name="theme"  onclick="check('theme,rose')" />
                                                </label>
                                        </span>
                                    </span>
                            <hr />
                            <span class="pull-left inline">
	                                        <div>
															<label for="form-field-select-3">Menu</label>

															<br />
															<select name="slidebar" class="chosen-select form-control" onchange="test(this)" id="select_id" >
																<option value="slidebar, <?php echo $nmain?>"><?php echo $vmain?></option>
																<option value="slidebar,default">Menu Gauche</option>
																<option value="slidebar,top">Menu Haut</option>
																<option value="slidebar,mobil"> Menu Pour Telephone</option>
																<option value="slidebar,two-menu"> Menu double</option>

															</select>
														</div>
                                    </span>
                            <hr />
                            <br />




                            <br />
                            <br />
                        </div>

                        <div class="modal-footer">

                            <button class="btn btn-sm btn-success pull-right" onclick="myFunction()">
                                <i class="ace-icon fa fa-check-square-o"></i>
                                valider
                            </button>
                            <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                fermer
                            </button>
                        </div>
                    </div><!-- /.modal-content -->


        </div><!-- /.modal-dialog -->

 <?php
 if (Count_Service()<1){
     require_once 'view/page/dashboard.php';
 }
 else{
     if(isset($_GET['file'])) {
         switch ($_GET['file']) {
             case 'page/dashboard':
                 require_once 'view/page/dashboard.php';
                 break;
             case 'page/user':
                 require_once 'view/page/user.php';
                 break;
             case 'page/modifuser':
                 require_once 'view/page/modifuser.php';
                 break;
             case 'page/caisse':
                 require_once 'view/page/caisse.php';
                 break;
             case 'file=page/printepage/':
                 require_once 'view/page/printepage.php';
                 break;
             case 'page/facture':
                 require_once 'view/page/facture.php';
                 break;
             case 'page/facture/table':
                 require_once 'view/page/facture.php';
                 break;
             case 'page/proforma/table':
                 require_once 'view/page/proforma.php';
                 break;
             case 'page/recu':
                 require_once 'view/page/recu.php';
                 break;
             case 'page/recu/table':
                 require_once 'view/page/recu.php';
                 break;
             case 'page/proforma':
                 require_once 'view/page/proforma.php';
                 break;
             case 'page/stock':
                 require_once 'view/page/stock.php';
                 break;
             case 'page/reservation':
                 require_once 'view/page/reservation.php';
                 break;
             case 'page/publication':
                 require_once 'view/page/publication.php';
                 break;
             case 'page/trash':
                 require_once 'view/page/trash.php';
                 break;
             case 'page/trash2':
                 require_once 'view/page/trash2.php';
                 break;
             default:
                 header("location:$base_url");
                 break;
         }
     }
 }

                ?>


    </div>
</div>

<script>
    function myFunction() {
        location.reload();
    }
    function test(a) {
        var x = (a.value || a.options[a.selectedIndex].value);  //crossbrowser solution =)
        additem(x);
    }


    function check(x) {
        additem(x);
    }
    function additem(x){
        var send=x;
        var itest=1;


        var sendInfo = {
            send: send,
            itest: itest
        };
        $.ajax({
            url: 'view/page/get/addline.php',
            type: 'POST',
            data: sendInfo,
            dataType: 'html'
        })
            .done(function(data){

                //alert(send);

            })
            .fail(function(){
                alert('Something went wrong, Please try again...');
            });





    }
</script>