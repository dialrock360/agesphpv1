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
  use src\entities\Fiche_inventaire;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class Fiche_inventaireDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count fiche_inventaire =====================*/
					public function countFiche_inventaire(){
					                       return count($this->listeFiche_inventaire());
					        }

				/*================== Get fiche_inventaire =====================*/
					public function getFiche_inventaire($idl){
					$sql = "SELECT * FROM fiche_inventaire WHERE fiche_inventaire.id = ".$idl."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste fiche_inventaire =====================*/
					public function listeFiche_inventaire(){
					                $sql = "SELECT * FROM fiche_inventaire";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one fiche_inventaire =====================*/
					public function listeFiche_inventaireByFiche_inventaireId($idl){
					$sql = "SELECT * FROM fiche_inventaire WHERE  fiche_inventaire.IDE = ".$idl."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many fiche_inventaire =====================*/
					public function listeFiche_inventaireByFiche_inventaireId($IDE){
					$sql = "SELECT * FROM fiche_inventaire WHERE  fiche_inventaire.IDE = ".$IDE."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addFiche_inventaire($fiche_inventaire){
                        $sql = "INSERT INTO fiche_inventaire  VALUES(
                                     null
,
                                     ".$fiche_inventaire->getIde()."
,
                                     '".$fiche_inventaire->getConten()."'
,
                                     '".$fiche_inventaire->getDatefiche()."'
,
                                     '".$fiche_inventaire->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefiche_inventaire($fiche_inventaire){
                        $sql = "UPDATE fiche_inventaire  SET  fiche_inventaire.IDE =  '".$fiche_inventaire->getIde()."' ,fiche_inventaire.conten =  '".$fiche_inventaire->getConten()."' ,fiche_inventaire.datefiche =  '".$fiche_inventaire->getDatefiche()."' ,fiche_inventaire.flag =  '".$fiche_inventaire->getFlag()."'   WHERE   fiche_inventaire.idl =  ".$fiche_inventaire->getIdl()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete fiche_inventaire =====================*/
					public function deleteFiche_inventaire($idl){
					$sql = "DELETE FROM fiche_inventaire WHERE fiche_inventaire.idl = ".$idl."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If fiche_inventaire existe =====================*/
					public function ifFiche_inventaireexiste($IDE){
					$sql = "SELECT * FROM fiche_inventaire WHERE IDE='".$IDE."' ";
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



