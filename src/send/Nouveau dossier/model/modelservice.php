<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 25/02/2018
 * Time: 06:24
 */
error_reporting( ~E_NOTICE ); // avoid notice
include 'bd.php';
require_once 'functionsInsert.php';
require_once 'functionsTest.php';
require_once 'functionsuser.php';
require_once 'functionsUpdate.php';

//SELECT `id`, ``, `nom`, ``, ``, ``, ``, ``, ``, ``, `` FROM `service` WHERE 1

function Saveservice($objet,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo){
    if($objet=='addservice'){
//INSERT INTO `service`(`ids`, `ninea`, `nom`, `sigle`, `email`, `tel`, `adress`, `secteur_E`, `type`, `ca`, `logo`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])
        $sql = addservice($ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);
    }else{
        $sql =updservice($id,$ninea,$nom,$sigle,$email,$tel,$adress,$secteur_E,$type,$ca,$logo);

    }

        return $sql;




}