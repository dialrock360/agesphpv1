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
  use src\entities\Produit_cmp;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class Produit_cmpDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count produit_cmp =====================*/
					public function countProduit_cmp(){
					                       return count($this->listeProduit_cmp());
					        }

				/*================== Get produit_cmp =====================*/
					public function getProduit_cmp($idpcmp){
					$sql = "SELECT * FROM produit_cmp WHERE produit_cmp.id = ".$idpcmp."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste produit_cmp =====================*/
					public function listeProduit_cmp(){
					                $sql = "SELECT * FROM produit_cmp";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one produit_cmp =====================*/

				/*================== One to many produit_cmp =====================*/

               public function addProduit_cmp($produit_cmp){
                        $sql = "INSERT INTO produit_cmp  VALUES(
                                     null
,
                                     '".$produit_cmp->getIdp()."'
,
                                     '".$produit_cmp->getTabidp()."'
,
                                     '".$produit_cmp->getTabqnt()."'
,
                                     '".$produit_cmp->getTabmts()."'
,
                                     '".$produit_cmp->getPrv()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateproduit_cmp($produit_cmp){
                        $sql = "UPDATE produit_cmp  SET  produit_cmp.IDP =  '".$produit_cmp->getIdp()."' ,produit_cmp.tabidp =  '".$produit_cmp->getTabidp()."' ,produit_cmp.tabqnt =  '".$produit_cmp->getTabqnt()."' ,produit_cmp.tabmts =  '".$produit_cmp->getTabmts()."' ,produit_cmp.prv =  '".$produit_cmp->getPrv()."'   WHERE   produit_cmp.idpcmp =  ".$produit_cmp->getIdpcmp()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete produit_cmp =====================*/
					public function deleteProduit_cmp($idpcmp){
					$sql = "DELETE FROM produit_cmp WHERE produit_cmp.idpcmp = ".$idpcmp."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If produit_cmp existe =====================*/
					public function ifProduit_cmpexiste($IDP){
					$sql = "SELECT * FROM produit_cmp WHERE IDP='".$IDP."' ";
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



