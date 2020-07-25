<?php



function Mailler($id,$nom,$idf,$ach,$vent)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1

    $sql = updCat($id,$idf,$nom,$ach,$vent);
    if($sql==1){
        $insert=$sql;
    }else{
        $insert=0;
    }
    return $insert;
}

function MInsertfam2($val,$idn,$nom,$dep,$gain,$stk,$color)
{
    require_once'include.php';
    //SELECT `IDFA`, `DESI`, `NATURE`, `FLAG` FROM `FAMILLE` WHERE 1
    $test=Test_fam($val,$nom);
    if($test==0){
        $sql = addFam($idn,$nom,$dep,$gain,$stk,$color);
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



















