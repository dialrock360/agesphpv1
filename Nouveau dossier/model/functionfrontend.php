<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 25/02/2018
 * Time: 11:29
 */
function Show_frontend($val)
{
    include "bd.php";

    //SELECT `IDFR`, `LIBELE`, `SIBLE`, `SECTION`, `COLOR` FROM `frontend` WHERE 1
    $resref = $MySQLiconn->query("SELECT * FROM `frontend` WHERE `CIBLE`='appdseting' and fSECTION='$val'");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {


            extract($row);
            $ret=$LIBELE;
        }else{
            $ret='';
        }

    }else{
        $ret='';
    }
    return $ret;

}

function Show_service($val)
{
    include "bd.php";

    //SELECT `id`, `ninea`, `nom`, `sigle`, `emmail`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`, `theme` FROM `service` WHERE 1
    $resref = $MySQLiconn->query("SELECT * FROM `service` ");
    $countref = $resref->num_rows;
    if($countref > 0) {

        if ($row = $resref->fetch_array()) {


            extract($row);

            if($val=='id'){
                $ret=$id;

            }
            if($val=='ninea'){
               return $ninea;

            }
            if($val=='achat'){
               return $ACHAT;

            }
            if($val=='nom'){
               return $nom;

            }
            if($val=='sigle'){
               return $sigle;

            }
            if($val=='tel'){
               return $tel;

            }
            if($val=='adress'){
               return $adress;

            }    if($val=='secteur'){
               return $secteur_E;

            }
            if($val=='type'){
                return $type;

            }
            if($val=='ca'){
                return $ca;

            }
            if($val=='type'){
                return $type;

            }
            if($val=='logo'){
                return $logo;

            }
        }else{
            return '';
        }

    }else{
        return '';
    }

}
    function slidebar()
    {

    }
    function theme()
    {

    }

    function menu()
    {

    }

    function ithem()
    {

    }
    function boite()
    {

    }