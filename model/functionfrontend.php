<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 25/02/2018
 * Time: 11:29
 */

  require_once 'classes/Frontend.php';
  require_once 'classes/Service.php';


function Show_frontend($val)
{
    $frontenddb = new Frontend();

    return $frontenddb->Show_frontend($val);

}

function Show_service($val)
{


    $servicedb = new Service();

    return $servicedb->Show_service($val);

}

