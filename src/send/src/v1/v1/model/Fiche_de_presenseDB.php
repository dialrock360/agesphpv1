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
  use src\entities\Fiche_de_presense;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:07=====================*/
        class Fiche_de_presenseDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count fiche_de_presense =====================*/
					public function countFiche_de_presense(){
					                       return count($this->listeFiche_de_presense());
					        }

				/*================== Get fiche_de_presense =====================*/
					public function getFiche_de_presense($id){
					$sql = "SELECT * FROM fiche_de_presense WHERE fiche_de_presense.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste fiche_de_presense =====================*/
					public function listeFiche_de_presense(){
					                $sql = "SELECT * FROM fiche_de_presense";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one fiche_de_presense =====================*/

				/*================== One to many fiche_de_presense =====================*/

               public function addFiche_de_presense($fiche_de_presense){
                        $sql = "INSERT INTO fiche_de_presense  VALUES(
                                     null
,
                                     '".$fiche_de_presense->getAnne_fiche()."'
,
                                     '".$fiche_de_presense->getDate_fiche()."'
,
                                     '".$fiche_de_presense->getObjet_fiche()."'
,
                                     '".$fiche_de_presense->getHeur_depart()."'
,
                                     '".$fiche_de_presense->getNbr_heur()."'
,
                                     '".$fiche_de_presense->getFiche_paie_id()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatefiche_de_presense($fiche_de_presense){
                        $sql = "UPDATE fiche_de_presense  SET  fiche_de_presense.anne_fiche =  '".$fiche_de_presense->getAnne_fiche()."' ,fiche_de_presense.date_fiche =  '".$fiche_de_presense->getDate_fiche()."' ,fiche_de_presense.objet_fiche =  '".$fiche_de_presense->getObjet_fiche()."' ,fiche_de_presense.heur_depart =  '".$fiche_de_presense->getHeur_depart()."' ,fiche_de_presense.nbr_heur =  '".$fiche_de_presense->getNbr_heur()."' ,fiche_de_presense.fiche_paie_id =  '".$fiche_de_presense->getFiche_paie_id()."'   WHERE   fiche_de_presense.id =  ".$fiche_de_presense->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete fiche_de_presense =====================*/
					public function deleteFiche_de_presense($id){
					$sql = "DELETE FROM fiche_de_presense WHERE fiche_de_presense.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If fiche_de_presense existe =====================*/
					public function ifFiche_de_presenseexiste($anne_fiche){
					$sql = "SELECT * FROM fiche_de_presense WHERE anne_fiche='".$anne_fiche."' ";
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



