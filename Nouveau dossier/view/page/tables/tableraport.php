

<?php

//load and initialize database class

$db = new Db();
//SELECT idmv, distinct DATE_DEL FROM mouvement where order BY DATE_DEL DESC
$query =("SELECT * FROM `mouvement` WHERE FLAG=0  GROUP BY DATE_DEL ORDER BY DATE_DEL  DESC  " );
//get users from database
$tables = $db->getspecificQuery($query);

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<div class="row">
    <div class="col-xs-12">


        <!-- div.dataTables_borderWrap -->
        <div>



            <table class='display'>
                <thead>
                <tr>
                    <th>Date</th>

                    <th class="center">
                        N°
                    </th>
                </tr>
                </thead>


                <tbody>
                <?php  $i=0; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
                    <?php


                    $i= $i+1;
                    if($NOMMV=='recu' ||  $NOMMV=='facture'){
                        ?>

                        <tr>



                            <td>
                                <a href="?date=<?php echo $DATE_DEL;?>" >

                                    <?php
                                    $date=date_create("$DATE_DEL");
                                    $date=date_format($date,"d M Y");

                                    echo $date; ?>


                                </a>
                            </td>

                            <td>
                                <?php echo $IDMV; ?>
                            </td>
                        </tr>
                        <?php

                    }

                    ?>
                <?php endforeach; else: ?>
                    <tr><td colspan="5">Aucune ligne(s) trouvé......</td></tr>
                <?php endif; ?>
                </tbody>
            </table>



        </div>
    </div>
</div>
