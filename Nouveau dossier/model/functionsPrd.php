<?php
function Get_fond()
{
    include "bd.php";
//SELECT `id`, `capital` FROM `fond` WHERE 1
    $resref = $MySQLiconn->query("SELECT * FROM `fond` WHERE  `id` =1");
    $countref = $resref->num_rows;
    if($countref > 0) {

         if ($row = $resref->fetch_array()) {


            extract($row);
            return $capital;
			}
	}
 return 0;
}
/*********************************************************************************************************************************************************************/
/**********************************************************SHOW OPTION////////////////////////////////////////////////////***********************************************************************************************************/
function Show_FAref($val,$id)
{

    include "bd.php";
    if($val=='prod'){
        $resref = $MySQLiconn->query("SELECT IDFA FROM `FAMILLE` WHERE IDFA=(SELECT IDFA FROM `CATEGORIE` WHERE ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE IDP='$id'))");
        $countref = $resref->num_rows;
        if($countref > 0) {

            //INSERT INTO `PRODUIT`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1
//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

            if ($row = $resref->fetch_array()) {

                extract($row);
                $ret = $IDFA;
            }
        }


    }
    else{
        $resref = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE IDFA='$id'");
        $countref = $resref->num_rows;
        if($countref > 0) {

//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

            if ($row = $resref->fetch_array()) {


                extract($row);
                if($val=='nom'){
                    $ret=$DESI;

                }
                if($val=='dep'){
                    $ret=$DEPENSE;

                }
                if($val=='gain'){
                    $ret=$GAINS;

                }
                if($val=='stock'){
                    $ret=$STOCK;

                }
                if($val=='color'){
                    $ret=$COLOR;

                }
                if($val=='id'){
                    $ret=$IDFA;

                }



            }

        }
    }

    return $ret;
}


function Show_Prostock($idp) {

    $ret=0;
    $tempo=10000000000000000000000000000000000000000;
    include 'bd.php';

    $resref = $MySQLiconn->query("SELECT * FROM `produit_cmp` WHERE idp=$idp");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        $ret=' ';
    } else
    {
        $ret=(Souselect_Cat('compta',$idp)==1)? Show_Prodref('qnt',$idp): ' ';
    }
    return $ret;
}










function Show_Prodref($val,$id)
{
    include "bd.php";


//SELECT `IDP`, ``, ``, ``, ``, ``, ``, ``, ``, `FLAG` FROM `produit` WHERE 1
    $resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE IDP='$id' ");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {

            extract($row);
            if($val=='idc'){
                $ret=$IDC;
            }
            if($val=='idcat'){
                $ret=$ID_CAT;
            }
            if($val=='desi'){
                $ret=$DESI;
            }
            if($val=='img'){
                $ret=$PHOTO;
            }
            if($val=='pa'){
                $ret=$PRIXA;
            }
            if($val=='pv'){
                $ret=$PRIXV;

            }

            if($val=='qnt'){
                $ret=($QNT=='')?0:$QNT;

            }

            if($val=='fiche'){
                $ret=$FTECH;

            }

            return $ret;

        }

    }


}




function Show_Catref($val,$id)
{
    include "bd.php";


    $resref = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE ID_CAT='$id'");
    $countref = $resref->num_rows;
    if($countref > 0) {
//SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `FLAG` FROM `categorie` WHERE 1
        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='idfa'){
                $ret=$IDFA;
            }
            if($val=='nom'){
                $ret=$NOM_CAT;

            }
            if($val=='achat'){
                $ret=$ACHAT;

            }
            if($val=='vente'){
                $ret=$VENTE;

            }



        }

    }



    return $ret;
}
function Souselect_Cat($val,$id)
{
    include "bd.php";

    $resref = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE ID_CAT= (SELECT ID_CAT FROM `PRODUIT` WHERE IDP=$id)");
    $countref = $resref->num_rows;
    if($countref > 0) {
//SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `FLAG` FROM `categorie` WHERE 1
        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='id'){
                $ret=$ID_CAT;

            }
            if($val=='vente'){
                $ret=$VENTE;

            }
            if($val=='achat'){
                $ret=$ACHAT;

            }
            if($val=='nom'){
                $ret=$NOM_CAT;

            }
            if($val=='idfa'){
                $ret=$IDFA;

            }
            if($val=='compta'){
                $ret=$COMPT;

            }



        }

    }



    return $ret;
}






/*********************************************************************************************************************************************************************/
/**********************************************************SELECT OPTION////////////////////////////////////////////////////***********************************************************************************************************/



function Select_getPrd($val)
{
//`IDFA` IN(SELECT `IDFA` FROM `FAMILLE`WHERE DESI IN ('CHARGE','CHARGES')

    include 'bd.php';

//get users from database
    if($val=='fac'){
        $req ="SELECT * FROM `v_select_produit_facture`";

    }
    if($val=='rec'){
        $req ="SELECT * FROM `v_select_produit_recu`";

    }
    if($val=='cmp'){
        $req ="SELECT * FROM `v_select_produit_composer`";

    }
    if($val=='charge'){
        $req ="SELECT * FROM `v_select_produit_charge`";

    }


    $resref = $MySQLiconn->query($req);

    $countref = $resref->num_rows;
    if($countref > 0)
    {

        while($row=$resref->fetch_array())
        {
            extract($row);
            ?>
            <option value="<?php echo  $IDP; ?>"><?php echo $DESI; ?></option>
            <?php

        }
    } else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }

    }
function Prdcmp_dispo($id)
{
    $ret=Show_Prodref('qnt',$id);
    $i=0;
    $tab[$i]=0;
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `produit_cmp` WHERE idp=$id");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        if($rowref=$resref->fetch_array())
        {
            $tempo=10000000000000000000000000000000000000000;

            $tid = explode(",",  $rowref['tabidp']);
            $coef = explode(",",  $rowref['tabqnt']);

            for ($i = 0; $i < count($tid); $i++) {

                $qnti=Show_Prodref('qnt',$tid[$i]);
                $tab[$i] =$qnti/$coef[$i];

                $i++;
            }
            $ret= minval($tab);
        }
    }
    else
    {
        $ret=Show_Prodref('qnt',$id);
    }
    return $ret;
}
function Select_Prd($val)
{
//`IDFA` IN(SELECT `IDFA` FROM `FAMILLE`WHERE DESI IN ('CHARGE','CHARGES')
    $db = new Db();
    include 'bd.php';
//get users from database
    if($val=='fac'){
        $tables = $db->getRows('v_select_produit_facture',array('order_by'=>'desi asc'));

    }
    if($val=='rec'){
        $tables = $db->getRows('v_select_produit_recu',array('order_by'=>'desi asc'));

    }
    if($val=='cmp'){
        $tables = $db->getRows('v_select_produit_composer',array('order_by'=>'desi asc'));

    }
    if($val=='charge'){
        $tables = $db->getRows('v_select_produit_charge',array('order_by'=>'desi asc'));

    }
    if($val=='all'){
        $condition = array('flag' => 0);
        //get users from database
        $tables = $db->getRows('produit',array('where'=>$condition,'order_by'=>'desi asc'));
    }
    if($val=='prix'){
        $req ="SELECT * FROM `PRODUIT` WHERE FLAG=0 AND PRIXA >0 ORDER BY DESI";
        $resref = $MySQLiconn->query($req);

        $countref = $resref->num_rows;
        if($countref > 0)
        {

            while($row=$resref->fetch_array())
            {
                extract($row);
                ?>
                <option value="<?php echo  $IDP; ?>"><?php echo $DESI; ?></option>
                <?php

            }
        } else
        {
            ?>
            <option ><?php echo 'Liste vide'; ?></option>
            <?php
        }
    }


//get status message from session
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }


    ?>
    <?php $count = 1; if(!empty( $tables)): foreach( $tables as $table):  extract($table) ?>
    <option value="<?php echo  $IDP; ?>"><?php echo $DESI; ?></option>
    <?php  $count++; endforeach; else: ?>
    <option ><?php echo 'Liste vide'; ?></option>
<?php endif; ?>
    <?php

    }

function Select_Prdcmpose()
{
//`IDFA` IN(SELECT `IDFA` FROM `FAMILLE`WHERE DESI IN ('CHARGE','CHARGES')
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE ID_CAT IN (
    SELECT `ID_CAT`
    FROM `CATEGORIE`
    WHERE VENTE=1 AND ACHAT=0) ORDER BY DESI");
    $countref = $resref->num_rows;
    if($countref > 0)
    {

        while($row=$resref->fetch_array())
        {
            extract($row);
            if($QNT>0){

                ?>
                <option value="<?php echo  $IDP; ?>"><?php echo $DESI; ?></option>
                <?php
            }

        }
    } else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}

function Select_Prod($val)
{

    include 'bd.php';
        /*  $resCat = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE ID_CAT IN (
      SELECT `ID_CAT`
      FROM `CATEGORIE`
      WHERE VENTE=1 AND NOM_CAT NOT IN ('CHAMBRES','CHAMBRE') " );*/
        $resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE FLAG=0");
        $countref = $resref->num_rows;
        if($countref > 0)
        {

            while($row=$resref->fetch_array())
            {
                extract($row);
                $RES='<option value="'.$IDP.'">'.$DESI.'</option>';
                $vente=Show_Catref('vente',$ID_CAT);
                $achat=Show_Catref('achat',$ID_CAT);
                if($val=='fac' && $vente==1 && $QNT>0 && $achat==1){
                    ECHO $RES;
                }
                if($val=='rec' && $achat==1){
                    ECHO $RES;
                }
                if($val=='cmp' && $achat==0 && $vente==1 ){
                    ECHO $RES;
                }
                if($val=='charge' && $achat==1 && $vente==0 ){
                    ECHO $RES;
                }


            }
        } else
        {
            ?>
            <option ><?php echo 'Liste vide'; ?></option>
            <?php
        }

}





function Prdcmp_testdispo($idp) {

    $ret=0;
    $tempo=10000000000000000000000000000000000000000;
    include 'bd.php';

    $resref = $MySQLiconn->query("SELECT * FROM `produit_cmp` WHERE idp=$idp");
    $countref = $resref->num_rows;
    if($countref > 0)
    {

        if($row=$resref->fetch_array())
        {
            extract($row);

            $tid = explode(",",  $tabidp);
            $coef = explode(",",  $tabqnt);
            for ($i = 0; $i < count($tid); $i++) {
                 $qnti=Show_Prodref('qnt',$tid[$i]);
                 $tab[$i]=$qnti/$coef[$i].' // / ';
            }
            $ret=minval($tab);

        }
    } else
    {
        $ret=Show_Prodref('qnt',$idp);
    }
return $ret;
}





function Select_Prdref($idc)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE IDP=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        if($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['IDP']; ?>"><?php echo $rowref['DESI']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }



}


/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/




/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `IDFA`, `DATE_CAT`, `NOM_CAT`, `FLAG` FROM `CATEGORIE` WHERE 1

function Select_Cat()
{

    include 'bd.php';
    $resCat = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE FLAG=0  ORDER BY NOM_CAT" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowCat['ID_CAT']; ?>"><?php echo $rowCat['NOM_CAT']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }

}

function Select_Catref($idc)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['ID_CAT']; ?>"><?php echo $rowref['NOM_CAT']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}

//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `CATEGORIE` WHERE 1
function Inter_Cat($idc)
{

    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT!=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['ID_CAT']; ?>"><?php echo $rowref['NOM_CAT']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}
/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



/*********************************************************************************************************************************************************************/
/****************************************************************************************FAMILLE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
function Select_Famref($idc)

{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 AND IDFA=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['IDFA']; ?>"><?php echo $rowref['DESI']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}

function Schose_Famref($val,$id)
{
    include "bd.php";


// SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

    $resref = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE IDFA=$id");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {

            extract($row);
            if($val=='id'){
                $ret=$IDFA;
            }
            if($val=='desi'){
                $ret=$DESI;
            }
            if($val=='dep'){
                $ret=$DEPENSE;
            }
            if($val=='gain'){
                $ret=$GAINS;
            }
            if($val=='stock'){
                $ret=$STOCK;
            }
            if($val=='color'){
                $ret=$FLAG;

            }

            if($val=='flag'){
                $ret=$QNT;

            }

            return $ret;

        }

    }


}



function Select_Famcatref($idc)

{
    include 'bd.php';

    $resref = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 AND IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=$idc)");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            echo  $rowref['DESI'];
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}


//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1

function Stock_Veille($tabid,$tabqntT,$tabqntV,$id,$qnt)
{
 $stock=0;
    for($i=0;$i<count($tabid);$i++) {
		if($id==$tabid[$i]){
			$stock=($tabqntT[$i]-$qnt)+$tabqntV[$i];
		}
		

       }
 return $stock;
}

function gGetDistinctDateEtat()
{
    $ret='';
	$i=0;
    include 'bd.php';
    $resCat = $MySQLiconn->query("SELECT DISTINCT(DATEE) FROM `etat_compte` ORDER BY DATEE desc" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {
		
           $tab[$i]='\''.$rowCat['DATEE'].'\'';
           $i++;
        }
		$ret=implode(",",$tab);
    }
   return $ret;

}

function Select_alldatemouv()
{
    $chaine=gGetDistinctDateEtat();
    include 'bd.php';
    $resCat = $MySQLiconn->query( 'SELECT DISTINCT(DATE_DEL) FROM `mouvement` where DATE_DEL not in ('.$chaine.') ORDER BY DATE_DEL desc' );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {

            ?>
            <option value="<?php   echo $rowCat['DATE_DEL']; ?>"><?php echo dateconverter($rowCat['DATE_DEL'],1); ?></option>
            <?php
        }
    }
    else
    {
         $resCat = $MySQLiconn->query( 'SELECT DISTINCT(DATE_DEL) FROM `mouvement` ORDER BY DATE_DEL desc' );
			$countCat = $resCat->num_rows;
			if($countCat > 0)
			{
				while($rowCat=$resCat->fetch_array())
				{

					?>
					<option value="<?php   echo $rowCat['DATE_DEL']; ?>"><?php echo dateconverter($rowCat['DATE_DEL']); ?></option>
					<?php
				}
			}
			else
			{
				?>
				<option ><?php echo 'Liste vide'; ?></option>
				<?php
			}
    }

}

function Select_allFam()
{

    include 'bd.php';
    $resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG!=1 AND FLAG!=2 ORDER BY DESI" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {

            ?>
            <option value="<?php   echo $rowCat['IDFA']; ?>"><?php echo $rowCat['DESI']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }

}

function Select_Fam()
{

    include 'bd.php';
    $resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0  ORDER BY DESI" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {

            ?>
            <option value="<?php   echo $rowCat['IDFA']; ?>"><?php echo $rowCat['DESI']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }

}

//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
function Inter_Fam($idc)
{

    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0 AND IDFA!=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['IDFA']; ?>"><?php echo $rowref['DESI']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}




//
//	SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1

function Inter_Condis($idc)
{

    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC!=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['IDC']; ?>"><?php echo $rowref['NOMC']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}


function Select_Condis()
{

    include 'bd.php';
    $resCat = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 ORDER BY NOMC" );
    $countCat = $resCat->num_rows;
    if($countCat > 0)
    {
        while($rowCat=$resCat->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowCat['IDC']; ?>"><?php echo $rowCat['NOMC']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }

}

/*********************************************************************************************************************************************************************/
/****************************************************************************************CONDIS************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Select_Condisref($idc)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC=$idc");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {

            ?>
            <option value="<?php echo  $rowref['IDC']; ?>"><?php echo $rowref['NOMC']; ?></option>
            <?php
        }
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }


}
function SousSelect_Condisref($idp)
{
    include 'bd.php';
    $query = "SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC= (SELECT IDC FROM `PRODUIT` WHERE FLAG=0 AND IDP=$idp) ";
    $stmt = $db_con->prepare( $query );
    $stmt->execute();
    $cpt=0;
    if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
        extract($row);
        echo $NOMC;
    }


}

function Select_Condisrefname($idc)
{
    include 'bd.php';
    $resref = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        if($rowref=$resref->fetch_array())
        {
            return $rowref['IDC'];
        }
    }

}
function TEST_FAM_ACTIVE($nom,$date)
{
    include 'bd.php';
	$i=0;
    $resref = $MySQLiconn->query('SELECT DISTINCT(`DESI`) FROM v_facture WHERE  NOMMV="'.$nom.' " AND DATE_DEL="'.$date.' "');
   // $resref = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {
            $tab[$i]='\''.$rowref['DESI'].'\'' ;
			$i++;
        }
		$chaine=implode(",",$tab);
    }else{
		$chaine="'CHARGE'" ;
	}
 return $chaine;
}

function TEST_RANGE_FAM_ACTIVE($nom,$date,$datefin)
{
    include 'bd.php';
	$i=0;
	//SELECT DISTINCT(`DESI`) FROM v_facture WHERE NOMMV="facture" and DATE_DEL BETWEEN '2018-01-01' AND '2018-12-01'
    $resref = $MySQLiconn->query('SELECT DISTINCT(`DESI`) FROM v_facture WHERE  NOMMV="'.$nom.' " 
	AND DATE_DEL BETWEEN "'.$date.' "  AND "'.$datefin.' " ');
   // $resref = $MySQLiconn->query("SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc'");
    $countref = $resref->num_rows;
    if($countref > 0)
    {
        while($rowref=$resref->fetch_array())
        {
            $tab[$i]='\''.$rowref['DESI'].'\'' ;
			$i++;
        }
		$chaine=implode(",",$tab);
    }else{
		$chaine="'CHARGE'" ;
	}
 return $chaine;
}


/*********************************************************************************************************************************************************************/
/****************************************************************************************CONDIS************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//	SELECT `IDC`, `NOMC`, `FLAG` FROM `CONDIS` WHERE 1





/*
$login=4;

Select_Famref($login);*/
/*********************************************************************************************************************************************************************/
/****************************************************************************************IDFACTURE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



?>