

<div class="row">

    <div class="col-xs-12">
        <div class="row">
            <div class="col-sm-11" style="margin-left: 3%">

                <div class="table-responsive" id="myTablecat">

                    <table class="table">
                        <caption>Dates Récentes</caption>
                        <thead>

                        <tr>
                            <th>
                            #
                            </th>
                            <th>
                            Dates
                            </th>
                            <th>
                                <div class="row">

                                    <div class="col-sm-12" >
                                        <form action="start.php" method="get" enctype="multipart/form-data" >
                                            <div class="row">

                                                <div class="col-sm-6">
                           <span class="input-icon">
									<input type="date" placeholder="Recherche" class="nav-search-input" id="Condisinput" onkeyup="mycondisFunction()" autocomplete="off" name="date" required />
									<i class="ace-icon fa fa-search nav-search-icon " id="SCI"></i>
									<i class="ace-icon fa fa-plus nav-search-icon" id="ACI"></i>
								</span>
                                                </div>
                                                <div class="col-sm-6" >
                                                    <div class="hidenC">
                                                        <button type="submit" class="btn btn-info btn-sm  "   >
                                                            <i class="ace-icon fa fa-key bigger-110"></i>Valider
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>




                                        </form>
                                    </div>
                                </div>
                            </th>

                        </tr>
                        </thead>

                        <tbody id="mycondisTable">
                        <?php


                        //SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `ACHAT`, `VENTE`, `FLAG` FROM `famille` WHERE 1
                        $resref = $MySQLiconn->query("SELECT DISTINCT DATE_DEL FROM  `MOUVEMENT` WHERE FLAG=0 ORDER BY DATE_DEL DESC LIMIT 8");
                        $countref = $resref->num_rows;
                        if($countref > 0)
                        {
                            $i=1;
                            while($row=$resref->fetch_array())
                            {
                                extract($row);

                                ?>

                                <tr>
                                    <td>
                                        <a href="printraport.php?date=<?php echo $DATE_DEL;?>" target="_blank" ><?php echo $i; ?></a>
                                    </td>
                                    <td>
                                        <a href="?date=<?php echo $DATE_DEL;?>" >
                                            <?php
                                            $date=date_create("$DATE_DEL");
                                            $date=date_format($date,"d M Y");

                                            echo $date; ?>


                                        </a>
                                    </td>


                                </tr>
                            <?php
                                $i=$i+1;
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>