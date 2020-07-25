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
  use src\entities\V_personne;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:09=====================*/
        class V_personneDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count v_personne =====================*/
					public function countV_personne(){
					                       return count($this->listeV_personne());
					        }

				/*================== Get v_personne =====================*/
					public function getV_personne($id){
					$sql = "SELECT * FROM v_personne WHERE v_personne.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste v_personne =====================*/
					public function listeV_personne(){
					                $sql = "SELECT * FROM v_personne";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one v_personne =====================*/

				/*================== One to many v_personne =====================*/

               public function addV_personne($v_personne){
                        $sql = "INSERT INTO v_personne  VALUES(
                                     '".$v_personne->getId()."'
,
                                     '".$v_personne->getNom_personne()."'
,
                                     '".$v_personne->getPrenom_personne()."'
,
                                     '".$v_personne->getGenre_personne()."'
,
                                     '".$v_personne->getDate_naiss_personne()."'
,
                                     '".$v_personne->getLieu_naiss_personne()."'
,
                                     '".$v_personne->getNationalite_personne()."'
,
                                     '".$v_personne->getTypepiece_personne()."'
,
                                     '".$v_personne->getNumpiece_personne()."'
,
                                     '".$v_personne->getPhoto_personne()."'
,
                                     '".$v_personne->getDetails_personne()."'
,
                                     '".$v_personne->getId_service()."'
,
                                     '".$v_personne->getFlag_personne()."'
,
                                     '".$v_personne->getAdress()."'
,
                                     '".$v_personne->getTel()."'
,
                                     '".$v_personne->getEmail_personne()."'
,
                                     '".$v_personne->getCodepostal()."'
,
                                     '".$v_personne->getContact_urgent()."'
,
                                     '".$v_personne->getEtat_civile()."'
,
                                     '".$v_personne->getNbr_conjoint()."'
,
                                     '".$v_personne->getNbr_enfant()."'
,
                                     '".$v_personne->getInfo_conjoint()."'
,
                                     '".$v_personne->getFlag_contact()."'
,
                                     '".$v_personne->getStatus_id()."'
,
                                     '".$v_personne->getNom_status()."'
,
                                     '".$v_personne->getNom_service()."'
,
                                     '".$v_personne->getSigle_service()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatev_personne($v_personne){
                        $sql = "UPDATE v_personne  SET  v_personne.id =  '".$v_personne->getId()."' ,v_personne.nom_personne =  '".$v_personne->getNom_personne()."' ,v_personne.prenom_personne =  '".$v_personne->getPrenom_personne()."' ,v_personne.genre_personne =  '".$v_personne->getGenre_personne()."' ,v_personne.date_naiss_personne =  '".$v_personne->getDate_naiss_personne()."' ,v_personne.lieu_naiss_personne =  '".$v_personne->getLieu_naiss_personne()."' ,v_personne.nationalite_personne =  '".$v_personne->getNationalite_personne()."' ,v_personne.typepiece_personne =  '".$v_personne->getTypepiece_personne()."' ,v_personne.numpiece_personne =  '".$v_personne->getNumpiece_personne()."' ,v_personne.photo_personne =  '".$v_personne->getPhoto_personne()."' ,v_personne.details_personne =  '".$v_personne->getDetails_personne()."' ,v_personne.id_service =  '".$v_personne->getId_service()."' ,v_personne.flag_personne =  '".$v_personne->getFlag_personne()."' ,v_personne.adress =  '".$v_personne->getAdress()."' ,v_personne.tel =  '".$v_personne->getTel()."' ,v_personne.email_personne =  '".$v_personne->getEmail_personne()."' ,v_personne.codepostal =  '".$v_personne->getCodepostal()."' ,v_personne.contact_urgent =  '".$v_personne->getContact_urgent()."' ,v_personne.etat_civile =  '".$v_personne->getEtat_civile()."' ,v_personne.nbr_conjoint =  '".$v_personne->getNbr_conjoint()."' ,v_personne.nbr_enfant =  '".$v_personne->getNbr_enfant()."' ,v_personne.info_conjoint =  '".$v_personne->getInfo_conjoint()."' ,v_personne.flag_contact =  '".$v_personne->getFlag_contact()."' ,v_personne.status_id =  '".$v_personne->getStatus_id()."' ,v_personne.nom_status =  '".$v_personne->getNom_status()."' ,v_personne.nom_service =  '".$v_personne->getNom_service()."' ,v_personne.sigle_service =  '".$v_personne->getSigle_service()."'   WHERE    ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete v_personne =====================*/
					public function deleteV_personne($id){
					$sql = "DELETE FROM v_personne WHERE v_personne.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If v_personne existe =====================*/
					public function ifV_personneexiste($id){
					$sql = "SELECT * FROM v_personne WHERE id='".$id."' ";
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



