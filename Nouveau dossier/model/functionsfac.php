<?php
function Show_Etatref($val,$date,$idfa)
{
    include "bd.php";

    $resref = $MySQLiconn->query("SELECT * FROM `etat_compte` WHERE `DATEE` ='$date' AND `IDFA` ='$idfa' ");
    $countref = $resref->num_rows;
    if($countref > 0) {
//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='idfa'){return $IDFA;}
            if($val=='idmv'){return $IDMOUV;}
            if($val=='ide'){return $IDE;}
            if($val=='dep'){return $DEPENSE;}
            if($val=='gain'){return $GAINS;}
            if($val=='stock'){return $STOCK;}
            if($val=='date'){return $DATEE;}



        }

    }else{

        return 0;
    }




}
function Get_Etatref($id)
{
    include "bd.php";

    $resref = $MySQLiconn->query("SELECT * FROM `etat_compte` WHERE `IDE` =".$id." ");
    $countref = $resref->num_rows;
    if($countref > 0) {
//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='idfa'){return $IDFA;}
            if($val=='idmv'){return $IDMOUV;}
            if($val=='ide'){return $IDE;}
            if($val=='dep'){return $DEPENSE;}
            if($val=='gain'){return $GAINS;}
            if($val=='stock'){return $STOCK;}
            if($val=='date'){return $DATEE;}



        }

    }else{

        return 0;
    }




}
function Show_caiseveil($date)
{
    include "bd.php";
                                                      $date2= date('y-m-d', strtotime($date.' - 1 DAY'));

    $resref = $MySQLiconn->query("SELECT * FROM `etat_compte` WHERE `DATEE` ='$date2' AND `IDFA` =6 ");
    $countref = $resref->num_rows;
    if($countref > 0) {
//SELECT `IDE`, `IDFA`, `IDMOUV`, `DEPENSE`, `GAINS`, `STOCK`, `DATEE` FROM `etat_compte` WHERE 1
        if ($row = $resref->fetch_array()) {


            extract($row);
			return $STOCK;
			
			



        }

    }else{

        return 0;
    }




}
function Show_Mvmref($val,$id)
{
    include "bd.php";

    //SELECT `IDMV`, `IDU`, `NOMMV`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `mouvement` WHERE 1
    $resref = $MySQLiconn->query("SELECT * FROM `mouvement` WHERE IDMV='$id'");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='com'){
                $ret=$IDU;
            }
            if($val=='nom'){
                $ret=$NOMMV;

            }
            if($val=='date'){
                $ret=$DATE_DEL;

            }
            if($val=='obj'){
                $ret=$OBJET;

            }
            if($val=='cont'){
                $ret=$CONTEN;

            }

            if($val=='tht'){
                $ret=$TOTALHT;

            }

            if($val=='ttc'){
                $ret=$MTSCH;

            }

            if($val=='ltr'){
                $ret=$MTSLTR;

            }

            if($val=='avans'){
                $ret=$AVANS;

            }

            if($val=='tva'){
                $ret=$TVA;

            }


            if($val=='reste'){
                $ret=$RESTE;

            }
        }

    }
    return $ret;

}



function QNT_Facref($idmv)
{
    include "bd.php";

    $resref = $MySQLiconn->query("SELECT IDMV FROM `facture` WHERE  `IDMV` ='$idmv'");
    $countref = $resref->num_rows;
    if($countref > 0) {

        return $countref;

    }
 return 0;
}
function Show_Facref($val,$id)
{
    include "bd.php";

    $resref = $MySQLiconn->query("SELECT * FROM `v_facture_details` WHERE IDF='$id'");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {


            extract($row);
            if($val=='idp'){return $IDP;}
            if($val=='idfa'){return $IDFA;}
            if($val=='pu'){return $PU;}
            if($val=='qnt'){return $QNT;}
            if($val=='mts'){return $MTS;}

            if($val=='type'){return $TYPEF;}
            if($val=='date'){return $DATE_DEL;}


            if($val=='row'){return $ROW;}
            if($val=='condis'){return $FCONDIS;}
            if($val=='desi'){return $FDESI;}
            if($val=='achat'){return $ACHAT;}
            if($val=='vente'){return $VENTE;}
        }

    }

}
function Show_Raprt($idfa,$date,$type)
{
    include "bd.php";
    $tt=0;
$take="SELECT * FROM v_facture_details WHERE IDFA=$idfa  AND	TYPEF='$type' AND 	DATE_DEL='$date'";
        if($result=$base->query($take))
        {

        while($ligne=mysqli_fetch_array($result)) {

            extract($ligne);
            $tt=$tt+$MTS;
           }
         }
    return $tt;
}
function Show_TMSRaprt($date)
{
    include "bd.php";
    $i=0;
$take="SELECT DISTINCT IDFA FROM  `v_facture_details` WHERE DATE_DEL='$date' ";
        if($result=$base->query($take))
        {

        while($ligne=mysqli_fetch_array($result)) {

            extract($ligne);
            $tab[$i]= $IDFA;
            $i=$i+1;
           }

            return $tab;
         }
}



/*********************************************************************************************************************************************************************/
/**********************************************************SELECT OPTION////////////////////////////////////////////////////***********************************************************************************************************/

/*********************************************************************************************************************************************************************/
/****************************************************************************************CATEGORIE************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/




/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
/*********************************************************************************************************************************************************************/
/****************************************************************************************COUNTER************************************************************************//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*****/
//SELECT `IDP`, `IDU`, `IDC`, `ID_CAT`, `DESI`, `PHOTO`, `PRIXA`, `PRIXV`, `QNT`, `FTECH`, `FLAG` FROM `PRODUIT` WHERE 1
function Pa_prd($IDP)
{
	include "bd.php";
	$take='SELECT * FROM PRODUIT WHERE IDP="'.$IDP.'"';
	if($result=$base->query($take))
	{

		IF($ligne=mysqli_fetch_array($result))
		{

			extract($ligne);
		return $PRIXA;

		}
	}

}
function Pv_prd($IDP)
{
	include "bd.php";
	$take='SELECT * FROM PRODUIT WHERE IDP="'.$IDP.'"';
	if($result=$base->query($take))
	{

		IF($ligne=mysqli_fetch_array($result))
		{

			extract($ligne);
		return $PRIXV;

		}
	}

}
//SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1


function Show_Caisse($val)
{
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
	include "bd.php";
	$query ="SELECT * FROM `FAMILLE` WHERE FLAG=3 ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		if ($val=='dep'){
            $ret=$DEPENSE;
		}
		if ($val=='gain'){
            $ret=$GAINS;
		}
		if ($val=='stock'){
            $ret=$STOCK;
		}
		if ($val=='id'){
            $ret=$IDFA;
		}
	}
	return $ret;

}

function Show_VFam($val1,$val2)
{
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
	include "bd.php";
	$query ="SELECT * FROM `FAMILLE` WHERE FLAG=0 AND DESI='$val1'";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		if ('DEPENSE'==$val2){
			$val2=$DEPENSE;
		}
		if ('GAINS'==$val2){
			$val2=$GAINS;
		}
		if ('STOCK'==$val2){
			$val2=$STOCK;
		}
	}
	return $val2;

}

function Show_Mouv($val)
{
//SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1
	include "bd.php";
	$query ="SELECT * FROM `MOUVEMENT` WHERE FLAG=0 ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		if ('facture'==$val){
			$val=$MTSCH;
		}
		if ('recu'==$val){
			$val=$MTSCH;
		}
	}
	return $val;

}

function Count_Art($id)
{
	include "bd.php";
	$resCat = $MySQLiconn->query(
		"
SELECT * FROM `PRODUIT` WHERE FLAG=0 AND `ID_CAT` IN
 ( SELECT ID_CAT
FROM `CATEGORIE`
WHERE `IDFA` IN (
    SELECT `IDFA`
    FROM `FAMILLE`
    WHERE IDFA='$id' )
  )
"
	);
	$countCat = $resCat->num_rows;
	return $countCat;

}


function Taux_Facr()
{

	include "bd.php";
	$val1='dep';$val2='gain';$val3='stock';
	$dep=Select_famcaisse($val1);
	$gain=Select_famcaisse($val2);
	$caisse=Select_famcaisse($val3);
	$mts=0;
	$mtsinv=0;

	$sdate = new DateTime();
	$fdate = $sdate->format('Y-m-d');

	//SELECT `IDINV`, `IDFA`, `IDMV`, `TYPEMV`, `MTS`, `DATEINV` FROM `INVENTAIRE` WHERE 1
    $FacF = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='facture' AND DATEF='$fdate'" );
    $countFacF = $FacF->num_rows;
    $Facr = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='recu' AND DATEF='$fdate'" );
    $countFacr = $Facr->num_rows;
    $resCat = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='recu' " );
    $countCat = $resCat->num_rows;
    $resCat2 = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='facture' " );
    $countCat2 = $resCat2->num_rows;
if($countFacr==0){
    $TAUXFacr=0;
}
if($countFacr>0){
    $TAUXFacr=($countCat*$countFacr)/100;
    if($countFacF>0){
        $TAUXFacF=($countCat2*$countFacF)/100;
    }
    else{
        $TAUXFacF=0;

    }
}
    $vc=$TAUXFacr;

	if($countFacr==0){
		echo '<div class="badge badge-primary"><i class="ace-icon fa fa-arrow-right"></i>0%<i class="ace-icon fa fa-arrow-left"></i></div>';
	}else{
        if($mtsinv>0){
            $P=$mtsinv*100/$mts;
        }else{
            $P=0;
        }

		echo $P;
		if($countFacr>$countFacF){
			echo '<div class="badge badge-success">+ '.round($vc, 1).'%<i class="ace-icon fa fa-arrow-up"></i></div>';

		}else{
            $vc=$TAUXFacF-$TAUXFacr;
			echo '<div class="badge badge-primary"><i class="ace-icon fa fa-arrow-right"></i>'.$vc.'%<i class="ace-icon fa fa-arrow-left"></i></div>';
		}
	}


}


function Taux_Facf()
{

	include "bd.php";
	$val1='dep';$val2='gain';$val3='stock';
	$dep=Select_famcaisse($val1);
	$gain=Select_famcaisse($val2);
	$caisse=Select_famcaisse($val3);
	$mts=0;
	$mtsinv=0;

	$sdate = new DateTime();
	$fdate = $sdate->format('Y-m-d');

	//SELECT `IDINV`, `IDFA`, `IDMV`, `TYPEMV`, `MTS`, `DATEINV` FROM `INVENTAIRE` WHERE 1
    $FacF = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='recu' AND DATEF='$fdate'" );
    $countFacF = $FacF->num_rows;
    $Facr = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='facture' AND DATEF='$fdate'" );
    $countFacr = $Facr->num_rows;
    $resCat = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='facture' " );
    $countCat = $resCat->num_rows;
    $resCat2 = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE TYPEF='recu' " );
    $countCat2 = $resCat2->num_rows;
if($countFacr==0){
    $TAUXFacr=0;
}
if($countFacr>0){
    $TAUXFacr=($countCat*$countFacr)/100;
    if($countFacF>0){
        $TAUXFacF=($countCat2*$countFacF)/100;
    }
    else{
        $TAUXFacF=0;

    }
}
    $vc=$TAUXFacr;

	if($countFacr==0){
		echo '<div class="badge badge-primary"><i class="ace-icon fa fa-arrow-right"></i>0%<i class="ace-icon fa fa-arrow-left"></i></div>';
	}else{
        if($mtsinv>0){
            $P=$mtsinv*100/$mts;
        }else{
            $P=0;
        }

        echo $P;
		if($countFacr>$countFacF){
			echo '<div class="badge badge-success">+ '.round($vc, 1).'%<i class="ace-icon fa fa-arrow-up"></i></div>';

		}else{
            $vc=$TAUXFacF-$TAUXFacr;
			echo '<div class="badge badge-primary"><i class="ace-icon fa fa-arrow-right"></i>'.$vc.'%<i class="ace-icon fa fa-arrow-left"></i></div>';
		}
	}


}

function Taux_Facs()
{

	include "bd.php";

    $qntr=0;$qntf=0;$qntp=0;
$resref = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE VENTE=1 AND ACHAT=1 AND TYPEF='recu'");
$countref = $resref->num_rows;
if($countref > 0)
{

    while($row=$resref->fetch_array())
    {
        $qntr=$qntr+$row['QNT'];
    }
}
$resref2 = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE VENTE=1 AND ACHAT=1 AND TYPEF='facture'");
$countref2 = $resref2->num_rows;
if($countref2 > 0)
{

    while($row2=$resref2->fetch_array())
    {
        $qntf=$qntf+$row2['QNT'];
    }
}
$resref3 = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE QNT>0 AND ID_CAT IN
 (SELECT `ID_CAT` FROM `CATEGORIE` WHERE VENTE=1) ");
$countref3 = $resref3->num_rows;
if($countref3 > 0)
{

    while($row3=$resref3->fetch_array())
    {
        $qntp=$qntp+$row3['QNT'];
    }
}

	$qntf=$qntr-$qntp;
    if($qntf>0){
        $vc=($qntf*100)/$qntr;
        $vr=100-$vc;
    }else{
        $vc=0;
        $vr=0;
    }



	?>

	<div class="infobox infobox-blue2">
		<div class="infobox-progress">
			<div class="easy-pie-chart percentage" data-percent="<?php echo round($vc, 0) ; ?>" data-size="46">
				<span class="percent"><?php echo round($vc, 1); ?></span>%
			</div>
		</div>

		<div class="infobox-data">
			<span class="infobox-text">Conso Stock</span>

			<div class="infobox-content">
				<span class="bigger-110">~</span>
				<?php  echo round($vr, 1); ?>% Restant
			</div>
		</div>
	</div>
	<?php
}
/*
include "bd.php";
$query = "SELECT * FROM `MOUVEMENT` WHERE FLAG=0";
$stmt = $db_con->prepare( $query );
$stmt->execute();
$qntr=0;$qntf=0;$t=0;$v=0;

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

	extract($row);
	if($NOMMV=='facture'){
		$take= "SELECT * FROM FACTURE WHERE IDMV='.$IDMV.' AND 	ACHAT = 1";
		if($result=$base->query($take))
		{
			while($ligne1=mysqli_fetch_array($result))
			{

				$QNTf=$ligne1['QNT'];
				$idp=$ligne1['IDP'];
				$qntf=$qntf+$QNTf;

			}
			//echo ' <hr/> ';
		}

	}

	if($NOMMV=='recu'){
		$take= "SELECT * FROM FACTURE WHERE IDMV='.$IDMV.' AND 	VENTE = 1";
		if($result=$base->query($take))
		{
			while($ligne2=mysqli_fetch_array($result))
			{
				$QNTr=$ligne2['QNT'];

				$qntr=$qntr+$QNTr;


			}
			//echo ' <hr/> ';
		}

		}


}

echo $qntr.' <hr/> ';
echo $qntf.' <hr/> ';
*/
function Val_Facbn()
{

	include "bd.php";
	$query = "SELECT * FROM `MOUVEMENT` WHERE FLAG=0";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();

	$mtsa=0;$mtsI=0;$mtsv=0;$pa=0;
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

		extract($row);
		if($NOMMV=='facture'){
			$take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
			if($result=$base->query($take))
			{

				while($ligne=mysqli_fetch_array($result))
				{

					extract($ligne);
					$mtsv=$mtsv+$MTS;
					$pa=Pa_prd($IDP);
					$mtsI=$pa*$QNT;
					$mtsa=$mtsa+$mtsI;


				}
			}

		}
	}

	$bn=($mtsv)-($mtsa);
	echo $bn.' F';
}

function CA()
{

	include "bd.php";
	$query = "SELECT * FROM `FAMILLE` WHERE FLAG=3 AND DESI='CAISSE'";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();

	if ($rowS=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($rowS);

		?>

		<div class="clearfix">
			<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-money fa-2x blue"></i>
																&nbsp; Gains
															</span>
				<h4 class="bigger pull-right"><?php echo $GAINS.' F'; ?></h4>
			</div>

			<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-shopping-cart fa-2x red"></i>
																&nbsp; Depense
															</span>
				<h4 class="bigger pull-right"><?php echo $DEPENSE.' F'; ?></h4>
			</div>

			<div class="grid3">
															<span class="grey">
																<i class="ace-icon fa fa-lock fa-2x orange"></i>
																&nbsp; Caisse
															</span>
				<h4 class="bigger pull-right"><?php echo $STOCK.' F'; ?></h4>
			</div>

		</div>
		<?php
	}
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
}

function Mts_Stk()
{

	$mtsTK=0;$mtsI=0;$mtsv=0;$pa=0;

	include "bd.php";
	$take='SELECT * FROM PRODUIT WHERE FLAG=0';
	if($result=$base->query($take))
	{

		while($ligne=mysqli_fetch_array($result))
		{

			extract($ligne);
			$mtsTK=$mtsTK+$PRIXA;


		}
	}

	echo $mtsTK.' F';
}



function desiF(){

	include "bd.php";

	$take='SELECT * FROM FAMILLE WHERE FLAG=0';
	$t=0;
	$i=0;$x=0;$y=0;
	if($result=$base->query($take))
	{

		while($ligne=mysqli_fetch_array($result))
		{
			$arrN[$i] =$ligne['DESI'];



			$i=$i+1;
		}
	}
	return $arrN;
}
function TauxF(){

	include "bd.php";
	$take="SELECT * FROM FAMILLE WHERE DESI='CAISSE'";
	if($result1=$base->query($take))
	{

		if($ligne1=mysqli_fetch_array($result1))
		{

			$depCS=$ligne1['DEPENSE'];

			$take='SELECT * FROM FAMILLE WHERE FLAG=0';
			$t=0;
			$i=0;$x=0;$y=0;
			if($result=$base->query($take))
			{

				while($ligne=mysqli_fetch_array($result))
				{

					$DEP = $ligne['DEPENSE'];
					if ($DEP!=0){

						$t=($DEP*100)/$depCS;
						$arrT[$i] =round($t, 1);

					}else{
						$arrT[$i]=0;
					}


					$i=$i+1;
				}
			}


		}
	}
	return $arrT;
}
/*$AD=10;$ND=5;$DC=0;$updd=0;
for($i = 0; $i < 5; $i++) {
	$DI=$AD;
	$DC=$DC+$ND;

	echo $DC.'<br/>';
}

$updd=$AD+$DC;
echo $updd;*/


function Count_lin($IDMV)
{
	include "bd.php";
	$resCat = $MySQLiconn->query("SELECT * FROM `FACTURE` WHERE FLAG=0 AND IDMV='$IDMV' AND FLAG=0 " );
	$countCat = $resCat->num_rows;
	echo $countCat;

}
function Spref($idc)
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
function Echoprd($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE IDP=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref=$resref->fetch_array())
		{
			$nomp=$rowref['DESI'];
			return $nomp;
		}
	}


}
function SUref($idc)
{
	include 'bd.php';
	$resref = $MySQLiconn->query("SELECT * FROM `UTILISATEUR` WHERE IDU=$idc");
	$countref = $resref->num_rows;
	if($countref > 0)
	{
		if($rowref=$resref->fetch_array())
		{

			?>
			<option value="<?php echo  $rowref['IDU']; ?>"><?php echo $rowref['NOM_USER']; ?></option>
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




function ID_fam($idp)
{
	include 'bd.php';

	$query = "SELECT * FROM `FAMILLE` WHERE FLAG=0 AND IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP=$idp)) ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		$idf=$IDFA;
		return $idf;
	}

}


?>




















<?php

/*
include 'bd.php';


//SELECT `IDMV`, `IDU`, `NOMMV`, `TYPE_FACT`, `DATE_DEL`, `OBJET`, `CONTEN`, `TOTALHT`, `TVA`, `MTSCH`, `MTSLTR`, `REG`, `AVANS`, `RESTE`, `CACHER`, `FLAG` FROM `MOUVEMENT` WHERE 1
$query = "SELECT * FROM `MOUVEMENT` WHERE FLAG=0";
$stmt = $db_con->prepare( $query );
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	extract($row);
	if ( $NOMMV== "recu") {




		?>

		<table class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
			<thead>
			<tr>
				<th>Libele</th>
				<th>Prix</th>
				<th>Qnte</th>

				<th>
					Montant
				</th>
			</tr>
			</thead>

			<tbody>

			<?php
			//SELECT `IDMV`, `IDP`, `QNTE`, `PU`, `MTS`, `FLAG` FROM `FACTURE` WHERE 1
			//SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI` FROM `FACTURE` WHERE 1
			$take='SELECT * FROM FACTURE WHERE IDMV="'.$IDMV.'"';
			if($result=$base->query($take))
			{
				echo $IDMV.'=<hr/>';
				while($ligne=mysqli_fetch_array($result))
				{

					extract($ligne);
					?>

					<tr>
						<td>
							<a href="#"><?php Spref($IDP) ?></a>
						</td>
						<td><?php echo $PU; ?></td>
						<td><?php echo $QNT; ?></td>
						<td><?php echo $MTS; ?></td>
					</tr>

					<?php
				}}
			?>
			<hr/>
			</tbody>
		</table>


		<?php
	}

}
*/
?>




<?php



function Vente_fam($desi)
{
	include 'bd.php';

	$query ="SELECT * FROM `FACTURE` WHERE  `IDMV` IN (SELECT IDMV FROM `MOUVEMENT` WHERE NOMMV='facture') AND IDP IN 	(
SELECT IDP FROM `PRODUIT` WHERE FLAG=0 AND `ID_CAT` IN
 ( SELECT ID_CAT
FROM `CATEGORIE`
WHERE `IDFA` IN (
    SELECT `IDFA`
    FROM `FAMILLE`
    WHERE DESI='$desi')
     )
  )
";

	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	$x=0;
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		$t2[$x]=$MTS;
		$x=$x+1;
	}
	$t2[$x]=100;
return $t2;

}
function Donee_fam($desi,$flag,$val)
{
	include 'bd.php';
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
	$query ="SELECT * FROM `FAMILLE` WHERE FLAG='$flag' AND DESI='$desi' ";

	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	$x=0;
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		if ($val=='DEPENSE'){
			return $DEPENSE;
		}
		if ($val=='GAINS'){
			return $GAINS;
		}
		if ($val=='STOCK'){
			return $STOCK;
		}
	}


}
function CoutVente_fam($desi)
{
	include 'bd.php';

	$query ="SELECT * FROM `FACTURE` WHERE  `IDMV` IN (SELECT IDMV FROM `MOUVEMENT` WHERE NOMMV='facture') AND IDP IN 	(
SELECT IDP FROM `PRODUIT` WHERE FLAG=0 AND `ID_CAT` IN
 ( SELECT ID_CAT
FROM `CATEGORIE`
WHERE `IDFA` IN (
    SELECT `IDFA`
    FROM `FAMILLE`
    WHERE DESI='$desi')
     )
  )
";

	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	$x=0;
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		$x=$x+1;

	}
	return $x;

}
function Select_idinvent($idmv,$nommv,$mtsIF,$date,$row,$val)
{
	include 'bd.php';
//SELECT `IDINV`, `IDFA`, `IDMV`, `TYPEMV`, `MTS`, `DATEINV` FROM `INVENTAIRE` WHERE 1


	$query ="SELECT * FROM `INVENTAIRE` WHERE `IDMV`='$idmv' AND `TYPEMV`='$nommv'AND `MTS`='$mtsIF'AND `DATEINV`='$date'AND `ROW`='$row' ";

	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		if ($val == 'date') {
			return $DATEINV;
		}
		if ($val == 'mts') {
			return $MTS;
		}
		if ($val == 'type') {
			return $TYPEMV;
		}
		if ($val == 'id') {
			return $IDINV;
		}
		if ($val == 'row') {
			return $ROW;
		}

	}else{
		return 0;
	}


}

function Select_famval($idp,$val)
{
	include 'bd.php';

	$query = "SELECT * FROM `FAMILLE` WHERE IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP='$idp')) ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	while ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
		if ($val=='id'){
			return $IDFA;
		}

		if ($val=='dep'){
			return $DEPENSE;
		}

		if ($val=='gain'){
			return $GAINS;
		}

		if ($val=='stock'){
			return $STOCK;
		}

	}


}
function Select_famvente($idp)
{
	include 'bd.php';
	$query = "SELECT * FROM `FAMILLE` WHERE IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE FLAG=0 AND ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP='$idp'))   AND VENTE=1 ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		return 1;

	}else {
		return 0;
	}


}

function Select_ProdVtabid()
{
	include 'bd.php';
	//AND ID_CAT= (SELECT ID_CAT FROM `CATEGORIE` WHERE FLAG=0 AND IDFA=(SELECT IDFA FROM `FAMILLE` WHERE FLAG=0 AND VENTE=1))

	$t=0;
$resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE ID_CAT IN
 (SELECT `ID_CAT` FROM `CATEGORIE` WHERE VENTE=1)");
$countref = $resref->num_rows;
if($countref > 0) {

    while ($row = $resref->fetch_array()) {
        extract($row);
        $tab[$t] = $IDP;
        $t = $t + 1;
    }
}
	return $tab;
}

function Select_QNTProdstk()
{
	include 'bd.php';
//AND ID_CAT= (SELECT ID_CAT FROM `CATEGORIE` WHERE FLAG=0 AND IDFA=(SELECT IDFA FROM `FAMILLE` WHERE FLAG=0 AND VENTE=1))
	$tab= Select_ProdVtabid();
	$qntp=0;

	for($x=0;$x<count($tab);$x++)
	{
		$idp=$tab[$x];
		$resref = $MySQLiconn->query("SELECT * FROM `PRODUIT` WHERE QNT>0 AND IDP=$idp");
		$countref = $resref->num_rows;
		if($countref > 0)
		{
			if($rowref=$resref->fetch_array())
			{
				$qntp=$qntp+$rowref['QNT'];
			}
		}


	}
	return $qntp;
}



function Select_catachat($idp)
{
	include 'bd.php';
	$query = "SELECT * FROM `FAMILLE` WHERE IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE  ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP='$idp') AND NOM_CAT NOT IN ('CHAMBRE','CHAMBRES'))";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		return 1;

	}else {
		return 0;
	}


}

function Select_catHCHAMBRE($idp)
{
	include 'bd.php';
	$query = "SELECT * FROM `FAMILLE` WHERE IDFA= (SELECT IDFA FROM `CATEGORIE` WHERE  ID_CAT=(SELECT ID_CAT FROM `PRODUIT` WHERE FLAG=0 AND IDP='$idp') AND NOM_CAT IN ('CHAMBRE','CHAMBRES'))";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
		return 1;

	}else {
		return 0;
	}


}

function Select_famcaisse($val)
{
	include 'bd.php';

	$query = "SELECT * FROM `FAMILLE` WHERE FLAG=3 AND DESI='CAISSE' ";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();
	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
//SELECT `IDFA`, `DESI`, `NATURE`, `DEPENSE`, `GAINS`, `STOCK`, `FLAG` FROM `FAMILLE` WHERE 1
		if ($val=='id'){
			return $IDFA;
		}

		if ($val=='dep'){
			return $DEPENSE;
		}

		if ($val=='gain'){
			return $GAINS;
		}

		if ($val=='stock'){
			return $STOCK;
		}

	}


}
function Select_facval($idf,$val)
{
	include 'bd.php';

	$query = "SELECT * FROM `FACTURE` WHERE IDF='$idf'";
	$stmt = $db_con->prepare( $query );
	$stmt->execute();

	if ($row=$stmt->fetch(PDO::FETCH_ASSOC) ) {
		extract($row);
//SELECT `IDF`, `IDMV`, `IDP`, `PU`, `QNT`, `MTS`, `FLAG`, `FDESI`, `FCONDIS` FROM `FACTURE` WHERE 1
		if ($val=='id'){
			return $IDF;
		}

		if ($val=='mts'){
			return $MTS;
		}

		if ($val=='qnt'){
			return $QNT;
		}

	}


}


/*

$idfaM= 2 ;$idmv= 18 ;$mtsIF= 7000 ;$nommv= 'recu'; $date= '2017-11-01';
$val='id';
echo ' faM= '.$idfaM.' idmv= '.$idmv.' mts= '.$mtsIF.' nommv= '.$nommv.' date= '.$date.'<hr/>';
*/

/*
function T_date($moi,$semaine,$annee)

{

	$T='-';
// Crée un timestamp pour le 1/1/annee
	$begin = mktime(0,0,0,1,1,$annee);
// Ajoute les semaines
	$offset = strtotime("+$semaine weeks",$begin);
// Le lundi
	if (date('w',$offset) == 1){
		$lundi = date('d',$offset);
	} else {
		$offset = strtotime("last monday",$offset);
		$lundi = date('d',$offset);
	}
	$dlundi=$annee.''.$T.''.$moi.''.$T.''.$lundi;
	//  echo $dlundi.'<br/><br/>';
	$date=date_create("$dlundi");

	for($y=0;$y<7;$y++)
	{
		$date=date_create("$dlundi");
		date_add($date,date_interval_create_from_date_string("$y days"));
		$tdat[$y]=  date_format($date,"Y-m-d");

	}
	return $tdat;

}

function Select_TIDFA()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0   ORDER BY IDFA" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		$i=0;
		while($rowCat=$resCat->fetch_array())
		{
			$TIDFA[$i]=$rowCat['IDFA'];
			$i=$i+1;
		}

	}
	return $TIDFA;
}

function Select_MTSdateF($dated,$facture,$val)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dated.'" and DATEF<="'.$dated.'" and TYPEF="'.$facture.'"  ORDER BY IDFA' );
	$countfac = $resfac->num_rows;

	$mts=0;
	$IDFATMP=0;
	$x=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();

		for ($i=0;$i<count($tidfa);$i++)
		{

			if ($IDFA==$tidfa[$i] AND $IDFA==$IDFATMP){

				$mts=$mts+$MTS;
				$IDFATMP=$tidfa[$i];


			}
			if ($IDFA==$tidfa[$i] AND $IDFA!=$IDFATMP){

				$mts=$mts+$MTS;

				$IDFATMP=$IDFA;

			}
			if ($IDFA!=$tidfa[$i] AND $IDFA==$IDFATMP){

				//echo ' <br>FAMILLE '.$IDFA.' : '.$MTS.'<br>';


			}
			if ($IDFA!=$tidfa[$i] AND $IDFA!=$IDFATMP){
				//echo ' <br>FAMILLE '.$IDFATMP.' : '.$mts.'<br>'.$x;
				$tms[$x]=$mts;

				$tid[$x]=$IDFATMP;
				$IDFATMP=$IDFA;

				$mts=0;
				$x=$x+1;

			}

		}




	}
	$tms[$x]=$mts;
	$tid[$x]=$IDFATMP;
	if ($val=='idfa'){
		return $tid;
	}if ($val=='mts'){
	return $tms;
}


}
function Select_MTSdateFid($dated,$facture,$idfa)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dated.'" and DATEF<="'.$dated.'" and TYPEF="'.$facture.'"and IDFA="'.$idfa.'" ' );
	$countfac = $resfac->num_rows;

	$mts=0;
	$mtsf=0;
	$IDFATMP=0;
	$x=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();

		for ($i=0;$i<count($tidfa);$i++)
		{

			if ($IDFA==$tidfa[$i] AND $IDFA==$IDFATMP){

				$mts=$mts+$MTS;
				$IDFATMP=$tidfa[$i];


			}
			if ($IDFA==$tidfa[$i] AND $IDFA!=$IDFATMP){

				$mts=$mts+$MTS;

				$IDFATMP=$IDFA;

			}
			if ($IDFA!=$tidfa[$i] AND $IDFA==$IDFATMP){

				//echo ' <br>FAMILLE '.$IDFA.' : '.$MTS.'<br>';


			}
			if ($IDFA!=$tidfa[$i] AND $IDFA!=$IDFATMP){
				//echo ' <br>FAMILLE '.$IDFATMP.' : '.$mts.'<br>'.$x;
				$mtsf=$mtsf+$mts;
				$IDFATMP=$IDFA;

				$mts=0;
				$x=$x+1;

			}

		}




	}
	$mtsf=$mtsf+$mts;

	return $mtsf;

}
*/
function T_date($moi,$semaine,$annee)

{
	$jr=date('d');
	$s=date('W');
	$T='-';
// Crée un timestamp pour le 1/1/annee
	$begin = mktime(0,0,0,1,1,$annee);
// Ajoute les semaines
	$offset = strtotime("+$semaine weeks",$begin);
// Le lundi
	if (date('w',$offset) == 1){
		$lundi = date('d',$offset);
	} else {
		$offset = strtotime("last monday",$offset);
		$lundi = date('d',$offset);
	}
	if ($lundi>$jr && $s > $semaine){
		$moi=$moi-1;
	}
	$dlundi=$annee.''.$T.''.$moi.''.$T.''.$lundi;
	//  echo $dlundi.'<br/><br/>';
	$date=date_create("$dlundi");

	for($y=0;$y<7;$y++)
	{
		$date=date_create("$dlundi");
		date_add($date,date_interval_create_from_date_string("$y days"));
		$tdat[$y]=  date_format($date,"Y-m-d");

	}
	return $tdat;

}
function I_dateD($moi,$semaine,$annee)

{

	$T='-';


	$jr=date('d');
	$s=date('W');
// Crée un timestamp pour le 1/1/annee
	$begin = mktime(0,0,0,1,1,$annee);
// Ajoute les semaines
	$offset = strtotime("+$semaine weeks",$begin);
// Le lundi
	if (date('w',$offset) == 1){
		$lundi = date('d',$offset);
	} else {
		$offset = strtotime("last monday",$offset);
		$lundi = date('d',$offset);
	}
	if ($lundi>$jr && $s > $semaine){
		$moi=$moi-1;
	}
	$dlundi=$annee.''.$T.''.$moi.''.$T.''.$lundi;
	return $dlundi;

}
function F_Wdate($dateI)

{
	$date=date_create("$dateI");
	date_add($date,date_interval_create_from_date_string("6 days"));
	$tdat=  date_format($date,"Y-m-d");
	return $tdat;

}
function F_Mdate($moi)

{
	$T='-';
	$annee=date('Y');
	$jour='01';
	$dateD=$annee.''.$T.''.$moi.''.$T.''.$jour;

	if ($moi=='01' || $moi=='03' || $moi=='05' || $moi=='07' || $moi=='08' || $moi=='10' || $moi=='12' ){
		$date=date_create("$dateD");
		date_add($date,date_interval_create_from_date_string("30 days"));
		$tdat=  date_format($date,"Y-m-d");
	}
	if ($moi=='04' || $moi=='06' || $moi=='09' || $moi=='11'){
		$date=date_create("$dateD");
		date_add($date,date_interval_create_from_date_string("29 days"));
		$tdat=  date_format($date,"Y-m-d");
	}if ($moi=='02'){
	$date=date_create("$dateD");
	date_add($date,date_interval_create_from_date_string("27 days"));
	$tdat=  date_format($date,"Y-m-d");
}

	return $tdat;

}
function TabF_Mdate($moi)

{
	$T='-';
	$annee=date('Y');
	$jour='01';
	$dateD=$annee.''.$T.''.$moi.''.$T.''.$jour;

	if ($moi=='01' || $moi=='03' || $moi=='05' || $moi=='07' || $moi=='08' || $moi=='10' || $moi=='12' ){
		$date=date_create("$dateD");
		date_add($date,date_interval_create_from_date_string("30 days"));
		$dat=  date_format($date,"Y-m-d");
		$jour='07';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='14';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='21';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$jour='28';
		$dateF4=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[3]=$dateF4;
		$tdat[4]=$dat;
	}
	if ($moi=='04' || $moi=='06' || $moi=='09' || $moi=='11'){
		$date=date_create("$dateD");
		date_add($date,date_interval_create_from_date_string("29 days"));
		$dat=  date_format($date,"Y-m-d");
		$jour='07';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='14';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='21';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$jour='28';
		$dateF4=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[3]=$dateF4;
		$tdat[4]=$dat;
	}
	if ($moi=='02'){
		$date=date_create("$dateD");
		date_add($date,date_interval_create_from_date_string("27 days"));
		$dat=  date_format($date,"Y-m-d");
		$jour='07';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='14';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='21';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$tdat[3]=$dat;
	}

	return $tdat;

}

function TabI_Mdate($moi)

{
	$T='-';
	$annee=date('Y');


	if ($moi=='01' || $moi=='03' || $moi=='05' || $moi=='07' || $moi=='08' || $moi=='10' || $moi=='12' ){
		$jour='01';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='08';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='15';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$jour='22';
		$dateF4=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[3]=$dateF4;
		$jour='28';
		$dateF5=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[4]=$dateF5;
	}
	if ($moi=='04' || $moi=='06' || $moi=='09' || $moi=='11'){
		$jour='01';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='08';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='15';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$jour='22';
		$dateF4=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[3]=$dateF4;
		$jour='28';
		$dateF5=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[4]=$dateF5;

	}
	if ($moi=='02'){
		$jour='01';
		$dateF1=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[0]=$dateF1;
		$jour='08';
		$dateF2=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[1]=$dateF2;
		$jour='15';
		$dateF3=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[2]=$dateF3;
		$jour='22';
		$dateF4=$annee.''.$T.''.$moi.''.$T.''.$jour;
		$tdat[3]=$dateF4;

	}

	return $tdat;

}

function I_Mdate($moi)

{
	$T='-';
	$annee=date('Y');
	$jour='01';
	$dateI=$annee.''.$T.''.$moi.''.$T.''.$jour;
	return $dateI;

}

function Select_TIDFA()
{

	include 'bd.php';
	$resCat = $MySQLiconn->query("SELECT * FROM `FAMILLE` WHERE FLAG=0   ORDER BY IDFA" );
	$countCat = $resCat->num_rows;
	if($countCat > 0)
	{
		$i=0;
		while($rowCat=$resCat->fetch_array())
		{
			$TIDFA[$i]=$rowCat['IDFA'];
			$i=$i+1;
		}

	}
	return $TIDFA;
}
function lEGENDE_FAM($val,$elmt,$facture)
{
	include 'bd.php';

	$take='SELECT * FROM FAMILLE WHERE FLAG=0 ORDER BY DESI';
	if($result=$base->query($take))
	{
		//$color = array("BLEU","#JAUNE", "#NOiR","#ROUGE","#GRIE","#VERS");

		$color = array("info","warning", "inverse","purple","danger","success");
		$i=0;
		?>
		<ul class="list-unstyled spaced2">
			

			<?php
			while($ligne=mysqli_fetch_array($result))
			{
				extract($ligne);
				?>

				<li>
					<span class="badge badge-<?php echo $color[$i];?>"><?php echo $i+1;?></span>
					<?php echo $DESI.' : ';

					if ($val=='W'){

						$annee=date('Y');
						$moi=date('m');
						$dateIS=I_dateD($moi,$elmt,$annee);
						$dateFS=F_Wdate($dateIS);
						echo Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA).' F';
					}
					if ($val=='M'){
						$dateIS=I_Mdate($elmt);
						$dateFS=F_Mdate($elmt);
						$facture='facture';
						echo Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA).' F';
					}
					if ($val=='Y'){
						$T='-';

						$moi=01;
						$jour='01';
						$dateD=$elmt.''.$T.''.$moi.''.$T.''.$jour;

						$dateIS=$dateD;

						$moi=12;
						$jour='31';
						$dateF=$elmt.''.$T.''.$moi.''.$T.''.$jour;
						$dateFS=$dateF;
						$facture='facture';
						echo Select_MTSWeekFid($dateIS,$dateFS,$facture,$IDFA).' F';


					}
					?>

				</li>

				<?php
				$i=$i+1;
			}
			?>
	</ul>
		<?php

	}

}

function Select_MTSdateF($dated,$facture,$val)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dated.'" and DATEF<="'.$dated.'" and TYPEF="'.$facture.'"  ORDER BY IDFA' );
	$countfac = $resfac->num_rows;

	$mts=0;
	$IDFATMP=0;
	$x=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();

		for ($i=0;$i<count($tidfa);$i++)
		{

			if ($IDFA==$tidfa[$i] AND $IDFA==$IDFATMP){

				$mts=$mts+$MTS;
				$IDFATMP=$tidfa[$i];


			}
			if ($IDFA==$tidfa[$i] AND $IDFA!=$IDFATMP){

				$mts=$mts+$MTS;

				$IDFATMP=$IDFA;

			}
			if ($IDFA!=$tidfa[$i] AND $IDFA==$IDFATMP){

				//echo ' <br>FAMILLE '.$IDFA.' : '.$MTS.'<br>';


			}
			if ($IDFA!=$tidfa[$i] AND $IDFA!=$IDFATMP){
				//echo ' <br>FAMILLE '.$IDFATMP.' : '.$mts.'<br>'.$x;
				$tms[$x]=$mts;

				$tid[$x]=$IDFATMP;
				$IDFATMP=$IDFA;

				$mts=0;
				$x=$x+1;

			}

		}




	}
	$tms[$x]=$mts;
	$tid[$x]=$IDFATMP;
	if ($val=='idfa'){
		return $tid;
	}if ($val=='mts'){
	return $tms;
}


}
function Select_MTSdateFid($dated,$facture,$idfa)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dated.'" and DATEF<="'.$dated.'" and TYPEF="'.$facture.'"and IDFA="'.$idfa.'" ' );
	$countfac = $resfac->num_rows;

	$mts=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();


		//echo 'F  '.$IDFA.' '.$DATEF.' : '.$MTS.'<br>';
		$mts=$mts+$MTS;
		//echo 'RRRR  '.$mts.'<br>';

	}

	return $mts;

}

function Select_MTSWeekFid($dateI,$dateF,$facture,$idfa)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dateI.'" and DATEF<="'.$dateF.'" and TYPEF="'.$facture.'"and IDFA="'.$idfa.'" ' );
	$countfac = $resfac->num_rows;

	$mts=0;
	$mtsf=0;
	$IDFATMP=0;
	$x=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();


		//echo 'F  '.$IDFA.' '.$DATEF.' : '.$MTS.'<br>';
		$mts=$mts+$MTS;
		//echo 'RRRR  '.$mts.'<br>';

	}

	return $mts;

}

function Select_MTSrange($dateI,$dateF,$facture)

{
	include "bd.php";
	$resfac = $MySQLiconn->query('select * from FACTURE where DATEF>= "'.$dateI.'" and DATEF<="'.$dateF.'" and TYPEF="'.$facture.'"and FLAG=0 ' );
	$countfac = $resfac->num_rows;

	$mts=0;
	$mtsf=0;
	$IDFATMP=0;
	$x=0;
	while($countfac=$resfac->fetch_array())
	{
		extract($countfac);
		$tidfa=Select_TIDFA();


		//echo 'F  '.$IDFA.' '.$DATEF.' : '.$MTS.'<br>';
		$mts=$mts+$MTS;
		//echo 'RRRR  '.$mts.'<br>';

	}

	return $mts;

}


?>


