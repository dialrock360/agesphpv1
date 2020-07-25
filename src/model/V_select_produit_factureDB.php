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
  use src\entities\V_select_produit_facture;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class V_select_produit_factureDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_select_produit_facture =====================*/
					public function countV_select_produit_facture(){
					                       return count($this->listeV_select_produit_facture());
					        }

				/*================== Get v_select_produit_facture =====================*/
					public function getV_select_produit_facture($id){
					$sql = "SELECT * FROM v_select_produit_facture WHERE v_select_produit_facture.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_select_produit_facture =====================*/
					public function listeV_select_produit_facture(){
					                $sql = "SELECT * FROM v_select_produit_facture";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_select_produit_facture =====================*/

				/*================== One to many v_select_produit_facture =====================*/

               public function addV_select_produit_facture($v_select_produit_facture){
                        $sql = "INSERT INTO v_select_produit_facture  VALUES(
                                     '".$v_select_produit_facture->getIdp()."'
,
                                     '".$v_select_produit_facture->getDesi()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_select_produit_facture($v_select_produit_facture){
                        $sql = "UPDATE v_select_produit_facture  SET  v_select_produit_facture.IDP =  '".$v_select_produit_facture->getIdp()."' ,v_select_produit_facture.DESI =  '".$v_select_produit_facture->getDesi()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_select_produit_facture =====================*/
					public function deleteV_select_produit_facture($id){
					$sql = "DELETE FROM v_select_produit_facture WHERE v_select_produit_facture.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_select_produit_facture existe =====================*/
					public function ifV_select_produit_factureexiste($IDP){
					$sql = "SELECT * FROM v_select_produit_facture WHERE IDP='".$IDP."' ";
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



