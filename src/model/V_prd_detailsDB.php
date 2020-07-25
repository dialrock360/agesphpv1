<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



     namespace src\model;
use libs\system\Model;
  use src\entities\V_prd_details;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_prd_detailsDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_prd_details =====================*/
					public function countV_prd_details(){
					                       return count($this->listeV_prd_details());
					        }

				/*================== Get v_prd_details =====================*/
					public function getV_prd_details($id){
					$sql = "SELECT * FROM v_prd_details WHERE v_prd_details.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_prd_details =====================*/
					public function listeV_prd_details(){
					                $sql = "SELECT * FROM v_prd_details";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_prd_details =====================*/

				/*================== One to many v_prd_details =====================*/

               public function addV_prd_details($v_prd_details){
                        $sql = "INSERT INTO v_prd_details  VALUES(
                                     '".$v_prd_details->getIdc()."'
,
                                     '".$v_prd_details->getNomc()."'
,
                                     '".$v_prd_details->getDesi()."'
,
                                     '".$v_prd_details->getImg()."'
,
                                     '".$v_prd_details->getIdp()."'
,
                                     '".$v_prd_details->getIdcp()."'
,
                                     '".$v_prd_details->getPxa()."'
,
                                     '".$v_prd_details->getPxv()."'
,
                                     '".$v_prd_details->getQnt()."'
,
                                     '".$v_prd_details->getFlag()."'
,
                                     '".$v_prd_details->getIdcat()."'
,
                                     '".$v_prd_details->getIdfam()."'
,
                                     '".$v_prd_details->getNomcat()."'
,
                                     '".$v_prd_details->getAchat()."'
,
                                     '".$v_prd_details->getVente()."'
,
                                     '".$v_prd_details->getCompt()."'
,
                                     '".$v_prd_details->getIdfa()."'
,
                                     '".$v_prd_details->getFdesi()."'
,
                                     '".$v_prd_details->getColor()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_prd_details($v_prd_details){
                        $sql = "UPDATE v_prd_details  SET  v_prd_details.idc =  '".$v_prd_details->getIdc()."' ,v_prd_details.nomc =  '".$v_prd_details->getNomc()."' ,v_prd_details.desi =  '".$v_prd_details->getDesi()."' ,v_prd_details.img =  '".$v_prd_details->getImg()."' ,v_prd_details.idp =  '".$v_prd_details->getIdp()."' ,v_prd_details.idcp =  '".$v_prd_details->getIdcp()."' ,v_prd_details.pxa =  '".$v_prd_details->getPxa()."' ,v_prd_details.pxv =  '".$v_prd_details->getPxv()."' ,v_prd_details.qnt =  '".$v_prd_details->getQnt()."' ,v_prd_details.flag =  '".$v_prd_details->getFlag()."' ,v_prd_details.idcat =  '".$v_prd_details->getIdcat()."' ,v_prd_details.idfam =  '".$v_prd_details->getIdfam()."' ,v_prd_details.nomcat =  '".$v_prd_details->getNomcat()."' ,v_prd_details.achat =  '".$v_prd_details->getAchat()."' ,v_prd_details.vente =  '".$v_prd_details->getVente()."' ,v_prd_details.COMPT =  '".$v_prd_details->getCompt()."' ,v_prd_details.idfa =  '".$v_prd_details->getIdfa()."' ,v_prd_details.fdesi =  '".$v_prd_details->getFdesi()."' ,v_prd_details.COLOR =  '".$v_prd_details->getColor()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_prd_details =====================*/
					public function deleteV_prd_details($id){
					$sql = "DELETE FROM v_prd_details WHERE v_prd_details.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_prd_details existe =====================*/
					public function ifV_prd_detailsexiste($idc){
					$sql = "SELECT * FROM v_prd_details WHERE idc='".$idc."' ";
					if($this->db != null)
					      {
					       if($this->db->query($sql)->fetch() != null)
					         {
					                 return true;
					         }
					      } 
					return false;
					                }


           }
  
   



   ?>



