<style>
    #closehidenC,#ACI, .hidenC{
        display: none;
    }
</style>

<div class="row">
    <div class="col-sm-11" style="margin-left: 3%">

        <div class="table-responsive" id="myTablecat">

            <table class="table">
                <caption>Liste Des Conditionnements D'Articles</caption>
                <thead>

                <tr>
                    <th>
                        <div class="row">

                            <div class="col-sm-12" >
                                <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                                    <div class="row">
                                        <input type="hidden"  value="<?php echo $iduser;?>" name="id" />
                                        <input type="hidden" name="total" value="1" />

                                        <div class="col-sm-6">
                           <span class="input-icon">
									<input type="text" placeholder="Désignations" class="nav-search-input" id="Condisinput" onkeyup="mycondisFunction()" autocomplete="off" name="Aname1" required />
									<i class="ace-icon fa fa-search nav-search-icon " id="SCI"></i>
									<i class="ace-icon fa fa-plus nav-search-icon" id="ACI"></i>
								</span>
                                        </div>
                                        <div class="col-sm-6" >
                                            <div class="hidenC">
                                                <button type="submit" class="btn btn-info btn-sm  "  name="msavecondis" >
                                                    <i class="ace-icon fa fa-key bigger-110"></i>Valider
                                                </button>
                                            </div>
                                        </div>
                                    </div>




                                </form>
                            </div>
                        </div>
                    </th>
                    <th>Action:
                        <input type="checkbox" class="checkc" id="checkAllc">
                        <a id="showhidenC" onClick=" $('a#closehidenC').slideDown(500);$('a#showhidenC').slideUp(500);$('div.hidenC').slideDown(600);$('i#ACI').slideDown(600);$('i#SCI').slideUp(600);"  href="javascript:void(0)" data-toggle="tooltip" title="Ajouter une Categorie D'Articles"><span> <i class="glyphicon glyphicon-plus  bigger-120 blue"></i></span> </a>
                        <a id="closehidenC" onClick=" $('a#showhidenC').slideDown(500);$('a#closehidenC').slideUp(500);$('div.hidenC').slideUp(600);$('i#ACI').slideUp(600);$('i#SCI').slideDown(600);"  href="javascript:void(0)" data-toggle="tooltip" title="Ajouter une Categorie D'Articles"><span> <i class="glyphicon glyphicon-off bigger-120 red"></i></span> </a>


                        <a id="getMCondis" onclick="getMCondis()" data-toggle="modal" data-target="#view-modal" data-id=" "  href="javascript:void(0)" data-toggle="tooltip" title="Modification Multiple"><span> <i class="glyphicon glyphicon-edit green"></i></span> </a>

                        <a id="getDCondis" onclick="getDCondis()" href="javascript:void(0)" data-toggle="tooltip" title="Suppression Multiple"><span><i class="glyphicon glyphicon-trash red"></i></span></a>

                    </th>
                </tr>
                </thead>

                <tbody id="mycondisTable">
                <?php


                $countref = $condisdb->listecondis();
                if($countref !=null)
                {

                    foreach($countref as $row )
                    {
                        extract($row);

                        ?>

                        <tr>
                            <td><?php echo $NOMC; ?></td>

                            <td>
                                <input type="checkbox" name="chkcondis[]" class="checkc" value="<?php echo $IDC; ?>"  />

                                <a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $IDC; ?>" id="getCondis" href="javascript:void(0)" data-toggle="tooltip" title="Modifier">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>

                                <?php
                                if($condisdb->nbr_usin_prd($IDC)<=0){
                                ?>
                                <a class="delete_condis" data-id="<?php echo $IDC; ?>" href="javascript:void(0)" data-toggle="tooltip" title="Supprimer">
                                    <i class="glyphicon glyphicon-trash red"></i>
                                </a>
                                <?php
                                }else{
                                ?>
                                <i class="glyphicon glyphicon-trash blac"></i>
                                <?php  } ?>

                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

