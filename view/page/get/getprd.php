

<?php
$dburl='../../../model/DB.php';
require_once '../../../classes/classeinclude.php';
require_once '../../../model/include.php';
require_once '../../../model/DB.php';
require_once '../../../assets/web/rooting.php';

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
//error_reporting(0);
function getprotoperator($sql,$sqltype='get',$returntype='all'){

    $db = new DB();
    $ret =($sqltype='get')? $db->getspecificQuery($sql,$returntype):$db->updatespecificQuery($sql);

    return   $ret;
}
function colorOptionget(){
    $color='';
    $color .=' <option value="#FFFFFF">Blanc</option>';
    $color .=' <option value="#F5F5DC">Belge</option>';
    $color .=' <option value="#0000FF">Bleu</option>';
    $color .=' <option value="#00CED1">Bleu Claire</option>';
    $color .=' <option value="#1E90FF">Bleu Ciel</option>';
    $color .=' <option value="#00FFFF">Bleu Marin</option>';
    $color .=' <option value="#BDB76B">Dnaki</option>';
    $color .=' <option value="#708090">Gris</option>';
    $color .=' <option value="#FFFF33">Jaune</option>';
    $color .=' <option value="#8B4513">Maron</option>';
    $color .=' <option value="#CD853F">Maron Claire</option>';
    $color .=' <option value="#000000">Noir</option>';
    $color .=' <option value="#FFD700">Orange</option>';
    $color .=' <option value="#FF4500">Orange Foncé</option>';
    $color .=' <option value="#FF33CC">Rose</option>';
    $color .=' <option value="#FF3399">Rose  Claire</option>';
    $color .=' <option value="#FF69B4">Rose Sombre</option>';
    $color .=' <option value="#FF1493">Rose Vif</option>';
    $color .=' <option value="#FF0000">Rouge</option>';
    $color .=' <option value="#F08080">Rouge Claire</option>';
    $color .=' <option value="#800000">Rouge Sombre</option>';
    $color .=' <option value="#008000">Vert</option>';
    $color .=' <option value="#90EE90">Vert Claire</option>';
    $color .=' <option value="#808000">Vert Olive</option>';
    $color .=' <option value="#FFC0CB">Violet</option>';
    $color .=' <option value="#DA70D6">Violet  Claire</option>';
    $color .=' <option value="#9400D3">Violet Vif</option>';
    $color .=' <option value="#660066">Violet Sombre</option>';

    return $color;
}
if (isset($_REQUEST['idcmp'])) {

    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idcmp = intval($_REQUEST['idcmp']);
    $chk = $_REQUEST['chk'];

        $i=1;
     /*   $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE IDP='$idcmp'");
        $countref = $resref->num_rows;*/


        /*$condition = array("IDP" =>$idcmp);
        $countref=getlineoperatorparam($condition,'single','v_produit');*/

    $resref =  "SELECT * FROM v_produit WHERE IDP='$idcmp'" ;
    $countref=getprotoperator($resref, 'get', 'single');
        if($countref != null)
        {

                extract($countref);

                ?>
                <form action="<?php echo $base_url; ?>/controller/FacController.php" method="post" >

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title" align="center"> <i class="icon-certificate"></i>
                                <strong><i class="fa fa-gavel"></i>PRODUIT DE FACTURATION INDUSTRIELLE</strong>

                            </h2>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-info">

                                <div class="widget-box">


                                    <div class="widget-body">
                                        <div class="widget-main">


                                            <div id="contencmpt">

                                                <div class="element">

                                                    <div>
                                                        <label for="form-field-select-3">Articles et Services</label>

                                                        <br />
                                                        <select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choix du Produit..." name="idcmp">
                                                            <option value="">  </option>
                                                            <?php    Select_Prdcmpose();?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="element">
                                                    <div>
                                                        <label for="form-field-select-3">Composants</label>

                                                        <br />

                                                        <select multiple class="chosen-select form-control" class="chosen" data-placeholder="Choix des Produit "  id="uid" style="width:70%;">
                                                            <optgroup label="Articles et Services"><?php    $val='all';   Select_Prd($val);?></optgroup>
                                                        </select>
                                                        <a href="#"  id="getpcmp"  class="preview" title="Ajouter Produit"><i class="glyphicon glyphicon-plus icon-large"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="panel panel-default">


                                            </div>

                                            <div class="table-responsive table-bordered">
                                                <h5><strong>produit de composition</strong></h5>
                                                <table class="table">
                                                    <thead id="titleCalcul"  >
                                                    <tr>
                                                        <th>Designation</th>
                                                        <th>Quantite</th>
                                                        <th>Montant</th>
                                                        <th> <!--<a href="#" onClick="ajoutLine()"  class="preview" title="Ajouter Produit">Aj<i class="icon-plus-sign icon-large"></i>uter</a>-->
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="manligneCalcul" style="clear:both">


                                                    </tbody>
                                                    <tfoot>


                                                    <tr>

                                                        <td >
                                                            <input type="hidden" id="valTotalHT_stand" value="0" name="totalht"  class="form-control"  readonly />

                                                            <input type="hidden" id="valTVA_stand" value="0"  class="form-control"  />

                                                            <button type="button" onClick="monCalcul()" class="btn btn-sm btn-info" id="BING">Calculer</button>
                                                            <input name="ligne"   type="hidden" id="ligne" />
                                                        </td>

                                                        <td colspan="3">
                                                            <input name="tva" type="hidden" id="valueTVARETURN2"   readonly="true" required/>
                                                            <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reg" readonly/>
                                                            <input  type="hidden" class="form-control " id="Reste" value="0.00" name="reste" readonly/>
                                                            <input  type="hidden" class="form-control" id="Avance"  name="avance" value="0" onChange="calcul2()"  />
                                                            <input name="lettr"  type="hidden" id="lettrSTAND" value="" style="width:97.7%; border:none;background: url(background/pattern/white-linen.png); color:#0033FF;text-shadow:0px 1px 1px #00000; " class="form-control"  required readonly/>
                                                            <input name="number"   type="hidden" value="" id="lignenombre" />

                                                            <div class="form-group">
                                                                <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Prix De Revient : </label>

                                                                <div class="col-sm-8">
                                                                    <input type="text" id="valTotalTTC_stand" value="0" name="totalttc"   class="form-control"  readonly required />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tfoot>

                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>









                                <input type="submit" name="savecmp" value="ENREGISTER"  class="btn btn-success " onClick="PUTIT3()" id="DEFLTR" >

                            </div>
                        </div>
                    </div>
                </form>

                <?php
        }


}

if(($_POST['action'] == 'delete') && !empty($_POST['id'])){
    //delete data
    $idp = $_POST['id'];

    // $update = $db->update($table,$colvalSet,$conditions);


  //  $condition = array("idpcmp" =>$idcmp);
    //$countref=getlineoperatorparam($condition,'single','produit_cmp');

    $resref =  "DELETE FROM produit_cmp WHERE idpcmp='$idcmp'" ;
    $delete=getprotoperator($resref, 'del', 'single');
    if($delete){
        $returnData = array(
            'status' => 'ok',
            'msg' => 'produit supprimer avec success.'
        );
    }else{
        $returnData = array(
            'status' => 'error',
            'msg' => 'Problème de suppression essayer encore...'
        );
    }

    echo json_encode($returnData);
}



if (isset($_REQUEST['idMp'])) {


    $type = strval($_REQUEST['name']);
    $qnt = intval($_REQUEST['qnt']);
    $idMp = intval($_REQUEST['idMp']);
    $chk = $_REQUEST['chk'];
    if($qnt>1){
        $a = explode(' ', $chk);
    }

    /*echo $type.' qnt '.$qnt.' idmp '.$idMp.'<br>';
    foreach($a as $cat) {

        echo $cat."<br>";
    }*/
    if ($type == 'produitQ'){

        if($qnt==1)
        {
            $i=1;
            /*$resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE IDP='$idMp'");
            $countref = $resref->num_rows;*/


            $resref =  "SELECT * FROM produit WHERE IDP='$idMp'" ;
            $countref=getprotoperator($resref, 'get', 'single');
            if($countref != null)
            {
                if($countref != null)
                {
                    extract($countref);

                    ?>
                    <style>
                        #bcgimg {
                            background-image: url("assets/images/gallery/<?php echo $PHOTO;?>");
                            background-color: #cccccc;
                        }
                    </style>
                    <form class="form-signin" method="post" action="<?php echo $base_url; ?>/controller/ProController.php" enctype="multipart/form-data" >
                        <div class="row">
                            <input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDP; ?>">

                            <input name="7name<?php echo $i; ?>" type="file" value="<?php echo $PHOTO; ?>" style="display: none;">

                            <input type="hidden" name="total" value="<?php echo $i; ?>" />

                            <div class="modal-header" id="bcgimg">
                                <h4 class="modal-title">
                                    <img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="100" height="100">

                                </h4>
                            </div>
                            <div class="modal-body">

                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered">


                                        <th>Designation</th>
                                        <td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $DESI;?>" class='form-control' /></td>

                                        </tr>
                                        <tr>
                                            <th>Quantite</th>
                                            <td COLSPAN="2">
                                                <input name="8name<?php echo $i; ?>" type="number" step="0.5" min="0" max="" value="<?php echo $QNT; ?>">
                                                <input name="2name<?php echo $i; ?>" type="hidden" value="<?php echo $IDC; ?>">
                                                <input name="3name<?php echo $i; ?>" type="hidden" value="<?php echo $PRIXA; ?>">
                                                <input name="4name<?php echo $i; ?>" type="hidden" value="<?php echo $PRIXV; ?>">
                                                <input name="5name<?php echo $i; ?>" type="hidden" value="<?php echo $FTECH; ?>">
                                                <input name="6name<?php echo $i; ?>" type="hidden" value="<?php echo $ID_CAT; ?>">
                                                <input name="oldimg<?php echo $i; ?>" type="hidden" value="<?php echo $PHOTO; ?>">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default" name="mudatepro" id="btn-submit">
                                                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </form>
                    <?php
                }
            }

        }
        ?>
        <?php
        if($qnt>1)
        {



            ?>
            <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                <div class="table-responsive">
                    <h2>Modifier <?php echo $qnt; ?> Produits <img src="assets/images/gallery/imagesnh.jpg" width="32" height="32"/>
                    </h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>IMG</th>
                            <th>Designation</th>
                            <th>Quantité</th>
                            <input type="hidden" name="total" value="<?php echo $qnt; ?>" />

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i=1; $i<=$qnt; $i++) {
                            if($qnt==1) {$id = $idMp;} if($qnt>1){$id = $a[$i];}
                            /* $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE IDP='$id'");*/
                            $resref =  "SELECT * FROM PRODUIT WHERE IDP='$idMp'" ;
                            $countref=getprotoperator($resref, 'get', 'single');
                            if($id!='on' && $countref != null) {

                                ?>
                                <tr>
                                    <td>
                                        <input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $row['IDP']; ?>">


                                        <?php
                                        $PHOTO= $row['PHOTO'];
                                        if ($PHOTO == "" || $PHOTO == ".") {
                                            ?>
                                            <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                            <?php
                                        }else{
                                            ?>
                                            <img class="lesImg"  src="assets/images/gallery/<?php echo $row['PHOTO'];?>" alt="#"  width="32" height="32">

                                            <?php




                                        }
                                        ?>                                        </td>
                                    <td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $row['DESI'];?>" class='form-control' /></td>

                                    <td>

                                        <input name="2name<?php echo $i; ?>" type="hidden" value="<?php $IDC= $row['IDC'];echo $IDC; ?>">
                                        <input name="3name<?php echo $i; ?>" type="hidden" value="<?php $PRIXA= $row['PRIXA'];echo $PRIXA; ?>">
                                        <input name="4name<?php echo $i; ?>" type="hidden" value="<?php $PRIXV= $row['PRIXV'];echo $PRIXV; ?>">
                                        <input name="5name<?php echo $i; ?>" type="hidden" value="<?php $FTECH= $row['FTECH'];echo $FTECH; ?>">
                                        <input name="6name<?php echo $i; ?>" type="hidden" value="<?php $ID_CAT= $row['ID_CAT'];echo $ID_CAT; ?>">
                                        <input name="8name<?php echo $i; ?>" type="number" step="0.5" min="0" max="" value="<?php $QNT= $row['QNT'];echo $QNT; ?>">
                                        <input name="7name<?php echo $i; ?>" type="file" value="<?php echo $PHOTO; ?>" style="display: none;">
                                        <input name="oldimg<?php echo $i; ?>" type="hidden" value="<?php $PHOTO= $row['PHOTO'];echo $PHOTO; ?>">

                                    </td>

                                </tr>
                                <?php
                            }}
                        ?>

                        </tbody>
                    </table>

                    <div class="clearfix">
                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="mudatepro">
                            <span class="bigger-110">Valider</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>

                </div>
            </form>
            <?php


        }
        ?>
        <?php




    }
    if ($type == 'produit'){

        if($qnt=='v')
        {
            $i=1;
            // $resref = $MySQLiconn->query("SELECT * FROM PRODUIT WHERE IDP='$idMp'");

            $resref =  "SELECT * FROM v_produit WHERE IDP='$idMp'" ;
            $countref=getprotoperator($resref, 'get', 'single');
            if($countref != null)
            {
                if($countref != null)
                {
                    extract($countref);

                    ?>
                    <style>
                        #bcgimg {
                            background-image: url("assets/images/gallery/<?php echo $PHOTO;?>");
                            background-color: #cccccc;
                        }
                    </style>
                    <div class="row">
                        <input name="olimg<?php echo $i; ?>" type="hidden" value="<?php echo $row['PHOTO']; ?>">

                        <input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDP; ?>">
                        <input name="8name<?php echo $i; ?>" type="hidden" value="<?php echo $QNT; ?>">

                        <input type="hidden" name="total" value="<?php echo $i; ?>" />

                        <div class="modal-header" id="bcgimg">
                            <h4 class="modal-title">
                                <img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="100" height="100">

                            </h4>
                        </div>
                        <div class="modal-body">

                            <div class="table-responsive">

                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th><b>Categorie</b></th>

                                        <td  COLSPAN="2">
                                            <select id="form-field-select-3" name="6name<?php echo $i; ?>">
                                                <option value=”<?php echo $ID_CAT; ?>” disabled selected><?php echo $NOM_CAT; ?></option>

                                                <?php
                                                echo $Optioncat;
                                                ?>
                                            </select>
                                        </td>

                                    </tr>

                                    <th>Designation</th>
                                    <td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $DESI;?>" class='form-control' readonly /></td>
                                    <td>
                                        <select id="form-field-select-4" name="2name<?php echo $i; ?>" >
                                            <option value=”<?php echo $IDC; ?>” disabled selected><?php echo $NOMC; ?></option>
                                            <?php
                                            echo  $Optioncondis;
                                            ?>
                                        </select>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th>Prix</th>
                                        <td>
                                            <label><b>Achat</b></label>

                                            <input type="number" name="3name<?php echo $i; ?>" value="<?php echo $PRIXA;?>" class='form-control' readonly/>

                                        </td>
                                        <td>
                                            <label><b>Vente</b></label>

                                            <input type="number" name="4name<?php echo $i; ?>" value="<?php echo $PRIXV;?>" class='form-control' readonly/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <td COLSPAN="2">
						<textarea type="text" name="5name<?php echo $i; ?>" class='form-control' readonly >
							<?php echo $FTECH;?>
							</textarea>

                                        </td>

                                    </tr>

                                </table>

                            </div>

                        </div>
                    </div>

                    <?php
                }
            }

        }
        if($qnt==1)
        {
            $i=1;
            $resref =  "SELECT * FROM v_produit WHERE IDP='$idMp'" ;
            $countref=getprotoperator($resref, 'get', 'single');
            if($countref != null)
            {
                if($countref != null)
                {
                    extract($countref);

                    ?>
                    <style>
                        #bcgimg {
                            background-image: url("assets/images/gallery/<?php echo $PHOTO;?>");
                            background-color: #cccccc;
                        }
                    </style>
                    <form class="form-signin" method="post" action="<?php echo $base_url; ?>/controller/ProController.php" enctype="multipart/form-data" >
                        <div class="row">
                            <input name="olimg<?php echo $i; ?>" type="hidden" value="<?php echo $row['PHOTO']; ?>">

                            <input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $IDP; ?>">
                            <input name="8name<?php echo $i; ?>" type="hidden" value="<?php echo $QNT; ?>">
                            <input name="10name<?php echo $i; ?>" type="hidden" value="<?php echo $COMPOSER; ?>">

                            <input type="hidden" name="total" value="<?php echo $i; ?>" />

                            <div class="modal-header" id="bcgimg">
                                <h4 class="modal-title">
                                    <img id="myImg"  src="assets/images/gallery/<?php echo $PHOTO;?>" alt="<?php echo $DESI;?>"  width="100" height="100">
                                    <input type="file" name="7name<?php echo $i; ?>" class='form-control' />
                                    <input type="hidden"  name="oldimg<?php echo $i; ?>"  value="<?php echo $PHOTO;?>" />

                                </h4>
                            </div>
                            <div class="modal-body">

                                <div class="table-responsive">

                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th><b>Categorie</b></th>

                                            <td  COLSPAN="2">
                                                <select id="form-field-select-3" name="3name<?php echo $i; ?>">

                                                    <option value=”<?php echo $ID_CAT; ?>”   selected><?php echo $NOM_CAT; ?></option>

                                                     <?php echo  $Optioncat;  ?>

                                                </select>
                                            </td>

                                        </tr>

                                        <th>Designation</th>
                                        <td><input type="text" name="1name<?php echo $i; ?>" value="<?php echo $DESI;?>" class='form-control' /></td>
                                        <td>
                                            <select id="form-field-select-4" name="2name<?php echo $i; ?>">
                                                <option value=”<?php echo $IDC; ?>”   selected><?php echo $NOMC; ?></option>
                                                <?php
                                                echo  $Optioncondis;
                                                ?>
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                            <th>Prix</th>
                                            <td>
                                                <label><b>Achat</b></label>

                                                <input type="number" name="4name<?php echo $i; ?>" value="<?php echo $PRIXA;?>" class='form-control' />

                                            </td>
                                            <td>
                                                <label><b>Vente</b></label>

                                                <input type="number" name="5name<?php echo $i; ?>" value="<?php echo $PRIXV;?>" class='form-control' />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Details</th>
                                            <td COLSPAN="2">
						<textarea type="text" name="6name<?php echo $i; ?>" class='form-control' >
							<?php echo $FTECH;?>
							</textarea>

                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="3">

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default" name="mudatepro" id="btn-submit">
                                                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Enregistrer
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </form>
                    <?php
                }
            }

        }
        ?>
        <?php
        if($qnt>1)
        {



            ?>
            <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
                <div class="table-responsive">
                    <h2>Modifier Plusieurs Produits <img src="assets/images/gallery/imagesnh.jpg" width="32" height="32"/>
                    </h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>IMG</th>
                            <th>Designation</th>
                            <th>Conditionement</th>
                            <th>Prix D'Achat</th>
                            <th>Prix De Vente</th>
                            <th>Details</th>

                            <th>Categorie</th>
                            <th>Photo</th>
                            <input type="hidden" name="total" value="<?php echo $qnt; ?>" />

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        for($i=1; $i<=$qnt; $i++) {
                            if($qnt==1) {
                                $id = $idMp;}
                            if($qnt>1){
                                $id = $a[$i];}

                            $resref =  "SELECT * FROM v_produit WHERE IDP='$id'" ;
                            $countref=getprotoperator($resref, 'get', 'single');
                            $row=$countref;
                            if($row!='on') {
                                extract($row);
                                ?>
                                <tr>
                                    <td>
                                        <input name="olimg<?php echo $i; ?>" type="hidden" value="<?php echo $row['PHOTO']; ?>">
                                        <input name="0name<?php echo $i; ?>" type="hidden" value="<?php echo $row['IDP']; ?>">
                                        <input name="8name<?php echo $i; ?>" type="hidden" value="<?php echo $row['QNT']; ?>">
                                        <input name="10name<?php echo $i; ?>" type="hidden" value="<?php echo $COMPOSER; ?>">


                                        <?php
                                        $PHOTO= $row['PHOTO'];
                                        if ($PHOTO == "") {
                                            echo $resref;
                                            ?>
                                            <i class="ace-icon fa fa-image fa-2x icon-only"></i>

                                            <?php
                                        }else{
                                            ?>
                                            <img class="lesImg"  src="assets/images/gallery/<?php echo $row['PHOTO'];?>" alt="#"  width="32" height="32">

                                            <?php




                                        }
                                        ?>                                        </td>
                                    <td><input type="text" name="2name<?php echo $i; ?>" value="<?php echo $row['DESI'];?>" class='form-control' /></td>
                                    <td>
                                        <select id="form-field-select-4" name="2name<?php echo $i; ?>">
                                            <option value=”<?php echo $IDC; ?>”   selected><?php echo $NOMC; ?></option>

                                            <?php echo  $Optioncondis;  ?>
                                        </select>
                                    </td>

                                    <td><input type="text" name="4name<?php echo $i; ?>" value="<?php $PRIXA= $row['PRIXA'];echo $PRIXA;?>" class='form-control' /></td>
                                    <td><input type="text" name="5name<?php echo $i; ?>" value="<?php $PRIXV= $row['PRIXV'];echo $PRIXV;?>" class='form-control' /></td>
                                    <td><textarea rows="1" name="6name<?php echo $i; ?>"  class='form-control'  ><?php $FTECH= $row['FTECH'];echo $FTECH;?></textarea></td>
                                    <td>

                                        <select id="form-field-select-3" name="3name<?php echo $i; ?>">

                                            <option value=”<?php echo $ID_CAT; ?>”   selected><?php echo $NOM_CAT; ?></option>

                                            <?php echo  $Optioncat;  ?>
                                        </select>
                                    </td>
                                    <td><input type="file" name="7name<?php echo $i; ?>" class='form-control' />
                                        <input type="hidden"  name="oldimg<?php echo $i; ?>"  value="<?php echo $PHOTO;?>" />

                                    </td>

                                </tr>
                                <?php
                            }}
                        ?>

                        </tbody>
                    </table>

                    <div class="clearfix">
                        <button type="reset" class="width-30 pull-left btn btn-sm">
                            <i class="ace-icon fa fa-refresh"></i>
                            <span class="bigger-110">Vider</span>
                        </button>

                        <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="mudatepro">
                            <span class="bigger-110">Valider</span>

                            <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                        </button>
                    </div>

                </div>
            </form>
            <?php


        }
        ?>
        <?php




    }
    if ($type == 'categorie'){



        ?>

        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $qnt;?>" />

            <div class="table-responsive">
                <h2>Modifier de Catégories</h2>
                <table class="table">
                    <thead>
                    <tr>

                        <th>Désignation</th>
                        <th>Famille des Articles</th>
                        <th>Achetable</th>
                        <th>Vendable</th>
                        <th>Comptabilisé</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$qnt; $i++)
                    {
                        if($qnt==1) {$id = $idMp;} if($qnt>1){$id = $a[$i];}
                        /*   $resref = $MySQLiconn->query("SELECT * FROM CATEGORIE WHERE ID_CAT='$id'");
                           $countref = $resref->num_rows;*/

                        $resref =  "SELECT * FROM v_categorie WHERE ID_CAT='$id'" ;
                        $countref=getprotoperator($resref, 'get', 'single');
                        if($countref != null)
                        {
                            if($countref != null)
                            {
                                extract($countref);
                                ?>
                                <tr>

                                    <td>

                                        <input type="text" VALUE="<?php echo $NOM_CAT; ?>" class="form-control"  name="3name<?php echo $i; ?>" />
                                        <input type="hidden" VALUE="<?php echo $ID_CAT; ?>" class="form-control"  name="1name<?php echo $i; ?>" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Famille des Article" >

                                            <select id="sel1" data-native-menu="false" class="form-control" name="2name<?php echo $i; ?>"  data-placeholder="Famille des Articles" required>

                                                <option value=”<?php echo $IDFA; ?>”   selected><?php echo $DESI; ?></option>

                                                <?php echo  $Optionfam;  ?>
                                            </select>
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                        if($ACHAT==1){
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="4name<?php echo $i; ?>" type="radio" class="ace" VALUE="<?php echo $ACHAT; ?>" checked />
                                                    <span class="lbl"> Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="4name<?php echo $i; ?>" type="radio" class="ace"  VALUE="0" />
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="4name<?php echo $i; ?>" type="radio" class="ace" VALUE="1"  />
                                                    <span class="lbl">Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="4name<?php echo $i; ?>" type="radio" class="ace" VALUE="0"  checked/>
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                    <td>
                                        <?php
                                        if($VENTE==1){
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="5name<?php echo $i; ?>" type="radio" class="ace" VALUE="<?php echo $VENTE; ?>" checked />
                                                    <span class="lbl"> Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="5name<?php echo $i; ?>" type="radio" class="ace"  VALUE="0" />
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="5name<?php echo $i; ?>" type="radio" class="ace" VALUE="1"  />
                                                    <span class="lbl">Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="5name<?php echo $i; ?>" type="radio" class="ace" VALUE="0"  checked/>
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                    <td>
                                        <?php
                                        if($COMPT==1){
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="6name<?php echo $i; ?>" type="radio" class="ace" VALUE="<?php echo $VENTE; ?>" checked />
                                                    <span class="lbl"> Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="6name<?php echo $i; ?>" type="radio" class="ace"  VALUE="0" />
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <div class="radio">
                                                <label>
                                                    <input name="6name<?php echo $i; ?>" type="radio" class="ace" VALUE="1"  />
                                                    <span class="lbl">Oui</span>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input name="6name<?php echo $i; ?>" type="radio" class="ace" VALUE="0"  checked/>
                                                    <span class="lbl">Non</span>
                                                </label>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </td>
                                </tr>
                                <?php

                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="mudatecat">
                        <span class="bigger-110">Mettre à Jour</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>

            </div>
        </form>
        <?php
    }

    if ($type == 'famille'){
        ?>
        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $qnt;?>" />
            <input type="hidden" name="idn" value="1" />
            <div class="table-responsive">
                <h2>Enregistrer Plusieurs Familles D'articles</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Couleur Thème</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$qnt; $i++)
                    {
                        if($qnt==1) {$id = $idMp;} if($qnt>1){$id = $a[$i];}
//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1
                        //$resref = $MySQLiconn->query("SELECT * FROM FAMILLE WHERE IDFA='$id'");

                        $resref =  "SELECT * FROM famille WHERE IDFA='$id'" ;
                        $countref=getprotoperator($resref, 'get', 'single');
                        if($countref != null)
                        {
                            if($countref != null)
                            {
                                extract($countref);
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" VALUE="<?php echo $DESI;?>" class="form-control" id="Faminput" name="Bname<?php echo $i;?>" />

                                        <input type="hidden" VALUE="<?php echo $IDFA; ?>" class="form-control"  name="Aname<?php echo $i; ?>" />
                                        <input type="hidden" VALUE="<?php echo $DEPENSE; ?>" class="form-control"  name="Dname<?php echo $i; ?>" />
                                        <input type="hidden" VALUE="<?php echo $GAINS; ?>" class="form-control"  name="Ename<?php echo $i; ?>" />
                                        <input type="hidden" VALUE="<?php echo $STOCK; ?>" class="form-control"  name="Fname<?php echo $i; ?>" />

                                    </td>
                                    <td>

                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Couleur Pour les Representation Graphic" >
                                            <select  name="Cname<?php echo $i;?>" required>
                                                <option value="<?php echo $COLOR; ?>" ><?php echo colorFnam($COLOR); ?></option>

                                                <?php
                                                include 'colorselct.php';
                                                ?>
                                            </select>


                                        </a>

                                    </td>
                                </tr>
                                <?php
                            }
                        }

                    }
                    ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="mudatefa">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </div>
        </form>

        <?php

    }

    if ($type == 'condis'){
        ?>
        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $qnt;?>" />

            <div class="table-responsive">
                <h2>Contextual Classes</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Désignation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$qnt; $i++)
                    {
                        if($qnt==1) {$id = $idMp;} if($qnt>1){$id = $a[$i];}

                        // $resref = $MySQLiconn->query("SELECT * FROM CONDIS WHERE IDC='$id'");

                        $resref =  "SELECT * FROM condis WHERE IDC='$id'" ;
                        $countref=getprotoperator($resref, 'get', 'single');
                        if($countref != null)
                        {
                            if($countref != null)
                            {
                                extract($countref);

                                ?>
                                <tr>
                                    <td>
                                        <input type="text" VALUE="<?php echo $NOMC;?>" class="form-control"  name="Aname<?php echo $i;?>" />
                                        <input type="hidden" VALUE="<?php echo $IDC;?>" class="form-control"  name="Bname<?php echo $i;?>" />
                                    </td>
                                </tr>
                                <?php
                            }
                        }


                    }
                    ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="mudatecondis">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </div>
        </form>
        <?php

    }

}

if (isset($_REQUEST['idprd'])) {

    $id = intval($_REQUEST['idprd']);
    $type = strval($_REQUEST['name']);
    if ($type == 'produit'){
        ?>
        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $id;?>" />

            <div class="table-responsive">
                <h2>Enregister Plusieurs Nouveaux Produits <img src="assets/images/gallery/imagesnh.jpg" width="32" height="32"/>
                </h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Categorie</th>
                        <th>Designation</th>
                        <th>Conditionement</th>
                        <th>Prix D'Achat</th>
                        <th>Prix De Vente</th>
                        <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$id; $i++)
                    {
                        ?>
                        <tr>

                            <td>
                                <input type="file" class="form-control" name="7name<?php echo $i; ?>" />
                                <input type="hidden" class="form-control" name="oldimg<?php echo $i; ?>" value="..."/>
                            </td>

                            <td>
                                <select id="form-field-select-3" name="3name<?php echo $i; ?>" REQUIRED>

                                    <?php echo  $Optioncat;  ?>

                                </select>
                            </td>



                            <td>
                                <input type="text" id="myInputpro" name="1name<?php echo $i; ?>" placeholder="Designation" class='form-control' onkeyup="proFunction()" required/>
                            </td>


                            <td>

                                <select id="form-field-select-4" name="2name<?php echo $i; ?>" REQUIRED>
                                    <?php echo  $Optioncondis;  ?>
                                </select>

                            </td>


                            <td>
                                <input type="number" min="0" step="0.0001" class="form-control" name="4name<?php echo $i; ?>" placeholder="Prix d'Achat"  required/>
                            </td>

                            <td>
                                <input type="number" min="0" step="0.0001"name="5name<?php echo $i; ?>" placeholder="Prix de Vente"  required/>
                            </td>


                            <td>
                                    <textarea name="6name<?php echo $i; ?>" class='form-control' >

                                    </textarea>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="msavepro">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>

            </div>
        </form>
        <?php

    }
    if ($type == 'categorie'){
        ?>
        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $id;?>" />

            <div class="table-responsive">
                <h2>Ajout des Catégories d'Articles </h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Famille des Articles</th>
                        <th>Désignation</th>
                        <th>Vendable</th>
                        <th>Achetable</th>
                        <th>Comptabilisé</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$id; $i++)
                    {
                        ?>
                        <tr>
                            <td>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Famille des Article" >

                                    <select id="sel1" data-native-menu="false" class="form-control" name="1name<?php echo $i; ?>"  data-placeholder="Famille des Articles" required>

                                        <?php echo  $Optionfam;  ?>
                                    </select>
                                </a>
                            </td>
                            <td>
                                <input type="text" placeholder="Nom de la Catégorie" class="form-control"  name="3name<?php echo $i; ?>" />
                            </td>
                            <td>
                                <input name="4name<?php echo $i; ?>" type="checkbox"  />


                            </td>
                            <td>
                                <input name="5name<?php echo $i; ?>" type="checkbox"  />

                            </td>
                            <td>
                                <input name="6name<?php echo $i; ?>" type="checkbox"  />

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="msavecat">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>

            </div>
        </form>
        <?php

    }
    if ($type == 'famille'){
        ?>

        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $id;?>" />
            <input type="hidden" name="idn" value="1" />
            <div class="table-responsive">
                <h2>Enregistrer Plusieurs Familles D'articles</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Couleur Thème</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$id; $i++)
                    {
                        ?>
                        <tr>
                            <td>
                                <input type="text" placeholder="Nom de la Famille" class="form-control" id="Faminput" name="Aname<?php echo $i;?>" />

                            </td>
                            <td>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Couleur Pour les Representation Graphic" >
                                    <select  name="Bname<?php echo $i;?>" required>
                                        <option ></option>

                                        <?php
                                       echo colorOptionget();
                                        ?>
                                    </select>


                                </a>

                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="msavefa">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </div>
        </form>
        <?php

    }

    if ($type == 'condis'){
        ?>
        <form action="<?php echo $base_url; ?>/controller/ProController.php" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="total" value="<?php echo $id;?>" />

            <div class="table-responsive">
                <h2>Contextual Classes</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Désignation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for($i=1; $i<=$id; $i++)
                    {
                        ?>
                        <tr>
                            <td>
                                <input type="text" placeholder="Désignations" class="form-control"  name="Aname<?php echo $i;?>" />
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <button type="reset" class="width-30 pull-left btn btn-sm">
                        <i class="ace-icon fa fa-refresh"></i>
                        <span class="bigger-110">Vider</span>
                    </button>

                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success" name="msavecondis">
                        <span class="bigger-110">Valider</span>

                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                    </button>
                </div>
            </div>
        </form>
        <?php

    }
}
?>





