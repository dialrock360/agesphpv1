<?php

//load and initialize database class

$db = new Db();
$condition = array('flag' => 0,'STATUT' => $doc);
//get users from database
$tables = $db->getRows('UTILISATEUR',array('where'=>$condition,'order_by'=>'NOM_USER DESC'));

//get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<table id="myTablec" class="table table-striped table-hover">

    <thead>
    <tr>

        <th>
        </th>

    </tr>
    </thead>
    <tbody>
    <?php if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>

        <tr>

            <td>
                <a href="#"><?php echo $NOM_USER; ?></a>
            </td>


        </tr>
    <?php endforeach; else: ?>
        <tr><td >Aucune ligne(s) trouvé......</td></tr>
    <?php endif; ?>
    </tbody>
</table>

