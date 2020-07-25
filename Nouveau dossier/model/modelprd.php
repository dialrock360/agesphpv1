<?php


function MInsertcat($val,$nom,$idf,$ach,$vent,$compt)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1

    $test=Test_cat($val,$nom);
    if($test==0){
        $sql = addCat($idf,$nom,$ach,$vent,$compt);
        if($sql==1){
            $insert=$sql;
        }else{
            $insert=0;
        }
    }
    else {
        $insert=0;


    }
    return $insert;
}


function MUpdatecat($id,$nom,$idf,$ach,$vent,$compt)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1

    $sql = updCat($id,$idf,$nom,$ach,$vent,$compt);
    if($sql==1){
        $insert=$sql;
    }else{
        $insert=0;
    }
    return $insert;
}

function MInsertfam($val,$nom,$color)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    $test=Test_fam($val,$nom);
    if($test==0){
        $sql = addFam($nom,$color);
        if($sql==1){
            $insert=1;

        }else{
            $insert=0;
        }

    }
    else {
        $insert=0;
    }

    return $insert;
}

function MUpdatefam($ifa,$nom,$col)
{
    require_once'include.php';

    $idn = $_POST["idn"];
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    if (!isset($col) || empty($col)){
        $val='color';
        $col=Show_FAref($val,$ifa);
        if(empty($col)){
            $col='#fffff';
        }
    }
   
    // echo $ifa.' Desi= ' . $nom .' DEP=> '.$dep.' GNS=> '.$gain. ' STK=> ' . $stk . ' || COLOR=> ' . $col.'<BR>';

    $sql = updFam($ifa,$nom,$col);

    if($sql==1){
        ///    echo $sql.'<br>';
        $insert=1;

    }
    else{
        $insert=0;

    }
    return $insert;
}


function MInsertcondis($nom)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    $val='nom';
    $test=Test_condis($val,$nom);
    if($test==0){
        $sql = addCondis($nom);
        if($sql==1){
            $insert=1;

        }else{
            $insert=0;
        }

    }
    else {
        $insert=0;
    }

    return $insert;
}

function MUpdatecondis($nom,$idc)
{
    require_once'include.php';
    $sql = updCondis($nom,$idc);
    if($sql==1){
        $insert=1;

    }
    else{
        $insert=0;

    }
    return $insert;
}



function MInsertprod($val,$idc,$cat,$desi,$img,$pa,$pv,$fiche)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    $test=Test_prd($val,$desi);
    if($test==0){
        $sql=addProd($idc,$cat,$desi,$img,$pa,$pv,$fiche);
        if($sql==1){
            $insert=1;

        }else{
            $insert=0;
        }

    }
    else {
        $insert=0;
    }

    return $insert;
}



?>



















