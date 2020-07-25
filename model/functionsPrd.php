<?php

require_once 'DB.php';
function prdoperator($sql,$sqltype='get',$returntype='all'){

    $db = new DB();
    $ret =($sqltype='get')? $db->getspecificQuery($sql,$returntype):$db->updatespecificQuery($sql);

    return   $ret;
}

function Get_fond()
{
     
//SELECT `id`, `capital` FROM `fond` WHERE 1
    $resref =  "SELECT * FROM `fond` WHERE  `id` =1 " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null) {

              $row=$countref;
        if($row != null) {


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

     
    if($val=='prod'){
        $resref =  "SELECT IDFA FROM `famille` WHERE IDFA=(SELECT IDFA FROM `categorie` WHERE ID_CAT=(SELECT ID_CAT FROM ` produit` WHERE IDP='$id')) " ;
         $countref=prdoperator($resref, 'get', 'single');
        if($countref != null) {

            //INSERT INTO ` produit`(`IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `FTECH`, `FLAG`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])
//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `categorie` WHERE 1
//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

                 $row=$countref;
        if($row != null) {

                extract($row);
                $ret = $IDFA;
            }
        }


    }
    elseif($val=='id'){

        $resref =  "SELECT * FROM `famille` WHERE DESI='".$id."' " ;
        $countref=prdoperator($resref, 'get', 'single');
        if($countref != null) {


            $row=$countref;
            if($row != null) {


                extract($row);
                $ret=$IDFA;


            }

        }
    }
    else{
        $resref =  "SELECT * FROM `famille` WHERE IDFA='$id' " ;
         $countref=prdoperator($resref, 'get', 'single');
        if($countref != null) {

//SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

             $row=$countref;
        if($row != null) {


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
     

    $resref =  "SELECT * FROM `produit_cmp` WHERE idp= ".$idp ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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
     


//SELECT `IDP`, ``, ``, ``, ``, ``, ``, ``, ``, `FLAG` FROM `produit` WHERE 1
    $resref =  "SELECT * FROM ` produit` WHERE IDP='$id'  " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null) {

         $row=$countref;
        if($row != null) {

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
     


    $resref =  "SELECT * FROM `categorie` WHERE ID_CAT='$id' " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null) {
//SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `FLAG` FROM `categorie` WHERE 1
         $row=$countref;
        if($row != null) {


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
     

    $resref =  "SELECT * FROM `categorie` WHERE ID_CAT= (SELECT ID_CAT FROM ` produit` WHERE IDP=$id) " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null) {
//SELECT `ID_CAT`, `IDFA`, `NOM_CAT`, `ACHAT`, `VENTE`, `FLAG` FROM `categorie` WHERE 1
         $row=$countref;
        if($row != null) {


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
//`IDFA` IN(SELECT `IDFA` FROM `famille`WHERE DESI IN ('CHARGE','CHARGES')

     

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


    $resref =  $req;

     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
    {

           foreach($countref as $row )
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
     
    $resref =  "SELECT * FROM `produit_cmp` WHERE idp=$id " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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
//`IDFA` IN(SELECT `IDFA` FROM `famille`WHERE DESI IN ('CHARGE','CHARGES')
    $db = new Db();
     
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
        $req ="SELECT * FROM ` produit` WHERE FLAG=0 AND PRIXA >0 ORDER BY DESI";
        $resref =  $req ;

         $countref=prdoperator($resref, 'get', 'single');
        if($countref != null)
        {

               foreach($countref as $row )
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
//`IDFA` IN(SELECT `IDFA` FROM `famille`WHERE DESI IN ('CHARGE','CHARGES')
     
    $resref =  "SELECT * FROM ` produit` WHERE ID_CAT IN (
    SELECT `ID_CAT`
    FROM `categorie`
    WHERE VENTE=1 AND ACHAT=0) ORDER BY DESI " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
    {

           foreach($countref as $row )
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

     
        /*  $resCat =  "SELECT * FROM ` produit` WHERE ID_CAT IN (
      SELECT `ID_CAT`
      FROM `categorie`
      WHERE VENTE=1 AND NOM_CAT NOT IN ('CHAMBRES','CHAMBRE')  "  ;*/
        $resref =  "SELECT * FROM ` produit` WHERE FLAG=0 " ;
         $countref=prdoperator($resref, 'get', 'single');
        if($countref != null)
        {

               foreach($countref as $row )
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
     

    $resref =  "SELECT * FROM `produit_cmp` WHERE idp=$idp " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
    {

       
            extract($countref);

            $tid = explode(",",  $tabidp);
            $coef = explode(",",  $tabqnt);
            for ($i = 0; $i < count($tid); $i++) {
                 $qnti=Show_Prodref('qnt',$tid[$i]);
                 $tab[$i]=$qnti/$coef[$i].' // / ';
            }
            $ret=minval($tab);


    } else
    {
        $ret=Show_Prodref('qnt',$idp);
    }
return $ret;
}





function Select_Prdref($idc)
{
     
    $resref =  "SELECT * FROM ` produit` WHERE IDP=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
    {
        ?>
        <option value="<?php echo  $countref['IDP']; ?>"><?php echo $countref['DESI']; ?></option>
        <?php
    }
    else
    {
        ?>
        <option ><?php echo 'Liste vide'; ?></option>
        <?php
    }



}


/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/




/*********************************************************************************************************************************************************************/
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/


//SELECT `ID_CAT`, `IDFA`, `DATE_CAT`, `NOM_CAT`, `FLAG` FROM `categorie` WHERE 1

function Select_Cat()
{

     
    $resCat =  "SELECT * FROM `categorie` WHERE FLAG=0  ORDER BY NOM_CAT "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
       foreach ($countCat  as $rowCat )  
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
     
    $resref =  "SELECT * FROM `categorie` WHERE FLAG=0 AND ID_CAT=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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

//SELECT `ID_CAT`, `DATE_CAT`, `NOM_CAT` FROM `categorie` WHERE 1
function Inter_Cat($idc)
{

     
    $resref =  "SELECT * FROM `categorie` WHERE FLAG=0 AND ID_CAT!=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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
/****************************************************************************************categorie************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/



/*********************************************************************************************************************************************************************/
/****************************************************************************************famille************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
function Select_Famref($idc)

{
     
    $resref =  "SELECT * FROM `famille` WHERE FLAG=0 AND IDFA=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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
     


// SELECT `IDFA`, `DESI`, `DEPENSE`, `GAINS`, `STOCK`, `COLOR`, `FLAG` FROM `famille` WHERE 1

    $resref =  "SELECT * FROM `famille` WHERE IDFA=$id " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null) {

         $row=$countref;
        if($row != null) {

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
     

    $resref =  "SELECT * FROM `famille` WHERE FLAG=0 AND IDFA= (SELECT IDFA FROM `categorie` WHERE FLAG=0 AND ID_CAT=$idc) " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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


//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `famille` WHERE 1

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



function gGetDistinctDateEtat($stringforquery=0)
{
    $ret='';
    $i=0;
    $tab=array();
    $resCat =  "SELECT DISTINCT(DATEE) FROM `etat_compte` ORDER BY DATEE desc "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
        foreach ($countCat  as $rowCat )
        {

            $tab[]=($stringforquery==0)?$rowCat['DATEE']:'\''.$rowCat['DATEE'].'\'';

            $i++;
        }
         $ret=implode(",",$tab);
    }

    return $ret;

}
function gGetDistinctDatDATE_DEL($stringforquery=0)
{
    $ret='';
    $i=0;
    $tab=array();
    $resCat =  "SELECT DISTINCT(DATE_DEL) FROM `mouvement` ORDER BY DATE_DEL desc "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
        foreach ($countCat  as $rowCat )
        {

            $tab[]=($stringforquery==0)?$rowCat['DATE_DEL']:'\''.$rowCat['DATE_DEL'].'\'';
            $i++;
        }
        $ret=implode(",",$tab);
    }

    return $ret;

}
function gDateAviable()
{
    $chdates = gGetDistinctDateEtat(1);

     $resCat = (empty($chdates))? "SELECT DISTINCT(DATE_DEL) FROM `mouvement` ORDER BY DATE_DEL desc " :
        " SELECT DISTINCT(DATE_DEL) FROM mouvement WHERE DATE_DEL NOT IN (".$chdates.") ORDER BY DATE_DEL desc ";

   /* if($countCat > 0)
    {
        foreach ($countCat  as $rowCat )
        {

            $tab[]=$rowCat['DATE_DEL'];
            $i++;
        }
        $ret=implode(",",$tab);
    }*/

    return  $countCat=prdoperator($resCat, 'get', 'all');

}
function Select_alldatemouv()
{
        $gDateAviable=gDateAviable();
    if($gDateAviable > 0)
    {
        foreach ($gDateAviable  as $rowCat )
        {
            extract($rowCat);

            ?>
            <option value="<?php   echo $DATE_DEL; ?>"><?php echo dateconverter($DATE_DEL,1); ?></option>
            <?php
        }

    }

   /* foreach ($dates  as $rowCat )
    {

        ?>
        <option value="<?php   echo $rowCat; ?>"><?php echo dateconverter($chaine,1); ?></option>
        <?php
    }*/
   // $resCat =   'SELECT DISTINCT(DATE_DEL) FROM `mouvement` where DATE_DEL not in ('.$chaine.') ORDER BY DATE_DEL desc'  ;
    //$countCat=prdoperator($resCat, 'get', 'all');
   /* if($countCat > 0)
    {
       foreach ($countCat  as $rowCat )  
        {

            ?>
            <option value="<?php   echo $rowCat['DATE_DEL']; ?>"><?php echo dateconverter($rowCat['DATE_DEL'],1); ?></option>
            <?php
        }
    }
    else
    {
         $resCat =   'SELECT DISTINCT(DATE_DEL) FROM `mouvement` ORDER BY DATE_DEL desc'  ;
			$countCat=prdoperator($resCat, 'get', 'all');
			if($countCat > 0)
			{
                     foreach ($countCat  as $rowCat )

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
    }*/

}

function Select_allFam()
{

     
    $resCat =  "SELECT * FROM `famille` WHERE FLAG!=1 AND FLAG!=2 ORDER BY DESI "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
       foreach ($countCat  as $rowCat )  
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

     
    $resCat =  "SELECT * FROM `famille` WHERE FLAG=0  ORDER BY DESI "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
       foreach ($countCat  as $rowCat )  
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

//SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `famille` WHERE 1
function Inter_Fam($idc)
{

     
    $resref =  "SELECT * FROM `famille` WHERE FLAG=0 AND IDFA!=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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

     
    $resref =  "SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC!=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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

     
    $resCat =  "SELECT * FROM `CONDIS` WHERE FLAG=0 ORDER BY NOMC "  ;
    $countCat=prdoperator($resCat, 'get', 'all');
    if($countCat > 0)
    {
       foreach ($countCat  as $rowCat )  
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
   function optionVarier($cible)
{
    $db = new DB();
    $condition=$nom=$option= "";

    $ls=array();

    switch($cible){
        case 'prd':
            $db->setTablename('v_produit');
            $condition = array("FLAG" =>0);

            $ls =  $db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
            break;
        case 'cat':
            $db->setTablename('v_categorie');
            $condition = array("flag" =>0);

            $ls =  $db->getRows(array("where"=>$condition,"order_by"=>"NOM_CAT asc","return_type"=>"many"));
            break;
        case 'cmp':
            $db->setTablename('v_produit_cmp');

            $ls =  $db->getRows(array("order_by"=>"DESI asc","return_type"=>"many"));
            break;
        case 'noprdcmp':
            $db->setTablename('produit');
            $condition = array("flag" =>0,"COMPOSER" =>0);

            $ls =  $db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
            break;
        case 'condis':
            $db->setTablename('condis');
            $condition = array("FLAG" =>0);
            $ls =  $db->getRows(array("where"=>$condition,"order_by"=>"NOMC asc","return_type"=>"many"));
            break;
        case 'fam':
            $db->setTablename('famille');
            $condition = array("FLAG" =>0);

            $ls =  $db->getRows(array("where"=>$condition,"order_by"=>"DESI asc","return_type"=>"many"));
            break;
        default:
            $db->setTablename('produit');
            $condition = "";
            $nom= "DESI";
    }

    foreach($ls as $row )
    {
        extract($row);
        switch($cible){
            case 'prd':
                $option .= ' <option value="'.$IDP.'">'.$DESI.' </option>';
                break;
            case 'cat':
                $option .= ' <option value="'.$ID_CAT.'">'.$NOM_CAT.' </option>';
                break;
            case 'cmp':
                $option .= ' <option value="'.$IDP.'">'.$DESI.' </option>';
                break;
            case 'condis':
                $option .= ' <option value="'.$IDC.'">'.$NOMC.' </option>';
                break;
            case 'fam':
                $option .= ' <option value="'.$IDFA.'">'.$DESI.' </option>';
                break;
            default:
                $option .= ' <option value="'.$IDP.'">'.$DESI.' </option>';
        }



    }
    return $option;
}
/*********************************************************************************************************************************************************************/
/****************************************************************************************CONDIS************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/

function Select_Condisref($idc)
{
     
    $resref =  "SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC=$idc " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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
     
    $query = "SELECT * FROM `CONDIS` WHERE FLAG=0 AND IDC= (SELECT IDC FROM ` produit` WHERE FLAG=0 AND IDP=$idp) ";
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
     
    $resref =  "SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc' " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
    {
        if($rowref=$resref->fetch_array())
        {
            return $rowref['IDC'];
        }
    }

}
function TEST_FAM_ACTIVE($nom,$date)
{
    $chaine='';
    $tab =array();
	$i=0;
    $resref =  'SELECT DISTINCT(`DESI`) FROM v_facture WHERE  NOMMV="'.$nom.' " AND DATE_DEL="'.$date.' "' ;
   // $resref =  "SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc' " ;
     $countref=prdoperator($resref, 'get', 'many');
    if($countref != null)
    {
        foreach($countref as $rowref )
        {
            $tab[]='\''.$rowref['DESI'].'\'' ;
			$i++;
        }
		$chaine=implode(",",$tab);
    }
    else{
		$chaine="'CHARGE'" ;
	}
 return $chaine;
}

function TEST_RANGE_FAM_ACTIVE($nom,$date,$datefin)
{
     
	$i=0;
	//SELECT DISTINCT(`DESI`) FROM v_facture WHERE NOMMV="facture" and DATE_DEL BETWEEN '2018-01-01' AND '2018-12-01'
    $resref =  'SELECT DISTINCT(`DESI`) FROM v_facture WHERE  NOMMV="'.$nom.' " 
	AND DATE_DEL BETWEEN "'.$date.' "  AND "'.$datefin.' " ' ;
   // $resref =  "SELECT * FROM `CONDIS` WHERE FLAG=0 AND NOMC='$idc' " ;
     $countref=prdoperator($resref, 'get', 'single');
    if($countref != null)
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

function get_optionprd($docTb)
{
    $option= "";

    $db = new DB();


    switch($docTb){
        case 'rec':
            $db->setTablename('v_select_produit_facture');
            break;
        case 'fac':
            $db->setTablename('v_select_produit_recu');
            break;
        case 'com':
            $db->setTablename('v_select_produit_composer');
            break;
        case 'charge':
            $db->setTablename('v_select_produit_charge');
            break;
        case 'all':
            $db->setTablename('produit');
            break;
        default:
            $db->setTablename('produit');
    }

    $ls =  $db->getRows(array('order_by'=>'desi asc','return_type'=>'many'));
    foreach($ls as $row )
    {
        extract($row);
        $option .= ' <option value="'.$IDP.'">'.$DESI.' </option>';


    }
    return $option;
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