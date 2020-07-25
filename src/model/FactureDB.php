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
  use src\entities\Facture;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:38=====================*/
        class FactureDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count facture =====================*/
					public function countFacture(){
					                       return count($this->listeFacture());
					        }

				/*================== Get facture =====================*/
					public function getFacture($IDF){
					$sql = "SELECT * FROM facture WHERE facture.id = ".$IDF."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste facture =====================*/
					public function listeFacture(){
					                $sql = "SELECT * FROM facture";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one facture =====================*/

				/*================== One to many facture =====================*/

               public function addFacture($facture){
                        $sql = "INSERT INTO facture  VALUES(
                                     null
,
                                     '".$facture->getIdmv()."'
,
                                     '".$facture->getIdp()."'
,
                                     '".$facture->getPu()."'
,
                                     '".$facture->getQnt()."'
,
                                     '".$facture->getMts()."'
,
                                     '".$facture->getRow()."'
,
                                     '".$facture->getFdesi()."'
,
                                     '".$facture->getFcondis()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefacture($facture){
                        $sql = "UPDATE facture  SET  facture.IDMV =  '".$facture->getIdmv()."' ,facture.IDP =  '".$facture->getIdp()."' ,facture.PU =  '".$facture->getPu()."' ,facture.QNT =  '".$facture->getQnt()."' ,facture.MTS =  '".$facture->getMts()."' ,facture.ROW =  '".$facture->getRow()."' ,facture.FDESI =  '".$facture->getFdesi()."' ,facture.FCONDIS =  '".$facture->getFcondis()."'   WHERE   facture.IDF =  ".$facture->getIdf()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete facture =====================*/
					public function deleteFacture($IDF){
					$sql = "DELETE FROM facture WHERE facture.IDF = ".$IDF."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If facture existe =====================*/
					public function ifFactureexiste($IDMV){
					$sql = "SELECT * FROM facture WHERE IDMV='".$IDMV."' ";
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



