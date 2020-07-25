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
  use src\entities\V_facture;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_factureDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_facture =====================*/
					public function countV_facture(){
					                       return count($this->listeV_facture());
					        }

				/*================== Get v_facture =====================*/
					public function getV_facture($id){
					$sql = "SELECT * FROM v_facture WHERE v_facture.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_facture =====================*/
					public function listeV_facture(){
					                $sql = "SELECT * FROM v_facture";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_facture =====================*/

				/*================== One to many v_facture =====================*/

               public function addV_facture($v_facture){
                        $sql = "INSERT INTO v_facture  VALUES(
                                     '".$v_facture->getIdf()."'
,
                                     '".$v_facture->getIdmv()."'
,
                                     '".$v_facture->getIdp()."'
,
                                     '".$v_facture->getPu()."'
,
                                     '".$v_facture->getQnt()."'
,
                                     '".$v_facture->getMts()."'
,
                                     '".$v_facture->getRow()."'
,
                                     '".$v_facture->getFdesi()."'
,
                                     '".$v_facture->getFcondis()."'
,
                                     '".$v_facture->getNommv()."'
,
                                     '".$v_facture->getDate_del()."'
,
                                     '".$v_facture->getIdc()."'
,
                                     '".$v_facture->getId_cat()."'
,
                                     '".$v_facture->getDesi()."'
,
                                     '".$v_facture->getPhoto()."'
,
                                     '".$v_facture->getPrixa()."'
,
                                     '".$v_facture->getPrixv()."'
,
                                     '".$v_facture->getQntstk()."'
,
                                     '".$v_facture->getComposer()."'
,
                                     '".$v_facture->getFtech()."'
,
                                     '".$v_facture->getFlag()."'
,
                                     '".$v_facture->getIdfa()."'
,
                                     '".$v_facture->getNom_cat()."'
,
                                     '".$v_facture->getAchat()."'
,
                                     '".$v_facture->getVente()."'
,
                                     '".$v_facture->getCompt()."'
,
                                     '".$v_facture->getNomf()."'
,
                                     '".$v_facture->getColor()."'
,
                                     '".$v_facture->getNomc()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_facture($v_facture){
                        $sql = "UPDATE v_facture  SET  v_facture.IDF =  '".$v_facture->getIdf()."' ,v_facture.IDMV =  '".$v_facture->getIdmv()."' ,v_facture.IDP =  '".$v_facture->getIdp()."' ,v_facture.PU =  '".$v_facture->getPu()."' ,v_facture.QNT =  '".$v_facture->getQnt()."' ,v_facture.MTS =  '".$v_facture->getMts()."' ,v_facture.ROW =  '".$v_facture->getRow()."' ,v_facture.FDESI =  '".$v_facture->getFdesi()."' ,v_facture.FCONDIS =  '".$v_facture->getFcondis()."' ,v_facture.NOMMV =  '".$v_facture->getNommv()."' ,v_facture.DATE_DEL =  '".$v_facture->getDate_del()."' ,v_facture.IDC =  '".$v_facture->getIdc()."' ,v_facture.ID_CAT =  '".$v_facture->getId_cat()."' ,v_facture.DESI =  '".$v_facture->getDesi()."' ,v_facture.PHOTO =  '".$v_facture->getPhoto()."' ,v_facture.PRIXA =  '".$v_facture->getPrixa()."' ,v_facture.PRIXV =  '".$v_facture->getPrixv()."' ,v_facture.QNTSTK =  '".$v_facture->getQntstk()."' ,v_facture.COMPOSER =  '".$v_facture->getComposer()."' ,v_facture.FTECH =  '".$v_facture->getFtech()."' ,v_facture.FLAG =  '".$v_facture->getFlag()."' ,v_facture.IDFA =  '".$v_facture->getIdfa()."' ,v_facture.NOM_CAT =  '".$v_facture->getNom_cat()."' ,v_facture.ACHAT =  '".$v_facture->getAchat()."' ,v_facture.VENTE =  '".$v_facture->getVente()."' ,v_facture.COMPT =  '".$v_facture->getCompt()."' ,v_facture.NOMF =  '".$v_facture->getNomf()."' ,v_facture.COLOR =  '".$v_facture->getColor()."' ,v_facture.NOMC =  '".$v_facture->getNomc()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_facture =====================*/
					public function deleteV_facture($id){
					$sql = "DELETE FROM v_facture WHERE v_facture.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_facture existe =====================*/
					public function ifV_factureexiste($IDF){
					$sql = "SELECT * FROM v_facture WHERE IDF='".$IDF."' ";
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



