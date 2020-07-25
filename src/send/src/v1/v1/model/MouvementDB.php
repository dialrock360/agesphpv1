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
  use src\entities\Mouvement;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class MouvementDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count mouvement =====================*/
					public function countMouvement(){
					                       return count($this->listeMouvement());
					        }

				/*================== Get mouvement =====================*/
					public function getMouvement($id){
					$sql = "SELECT * FROM mouvement WHERE mouvement.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste mouvement =====================*/
					public function listeMouvement(){
					                $sql = "SELECT * FROM mouvement";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one mouvement =====================*/
					public function listeMouvementByPersonneId($id){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_commercial = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMouvementByServiceId($id){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_service = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMouvementByType_mouvementId($id){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_type_mouvement = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeMouvementByAccountsId($id){
					$sql = "SELECT * FROM mouvement WHERE  mouvement.id_users = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many mouvement =====================*/
					public function listePersonneByMouvementId($id_commercial){
					$sql = "SELECT * FROM personne WHERE  personne.id_commercial = ".$id_commercial."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeServiceByMouvementId($id_service){
					$sql = "SELECT * FROM service WHERE  service.id_service = ".$id_service."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeType_mouvementByMouvementId($id_type_mouvement){
					$sql = "SELECT * FROM type_mouvement WHERE  type_mouvement.id_type_mouvement = ".$id_type_mouvement."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }
					public function listeAccountsByMouvementId($id_users){
					$sql = "SELECT * FROM accounts WHERE  accounts.id_users = ".$id_users."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addMouvement($mouvement){
                        $sql = "INSERT INTO mouvement  VALUES(
                                     null
,
                                     ".$mouvement->getId_commercial()."
,
                                     ".$mouvement->getId_service()."
,
                                     ".$mouvement->getId_type_mouvement()."
,
                                     ".$mouvement->getId_users()."
,
                                     '".$mouvement->getDate_mouvement()."'
,
                                     '".$mouvement->getObject_mouvement()."'
,
                                     '".$mouvement->getContent_mouvement()."'
,
                                     '".$mouvement->getTotal_ht_mouvement()."'
,
                                     '".$mouvement->getTva_mouvement()."'
,
                                     '".$mouvement->getTotalttc_mouvement()."'
,
                                     '".$mouvement->getTotalltr_mouvement()."'
,
                                     '".$mouvement->getAvance_mouvement()."'
,
                                     '".$mouvement->getReste_mouvement()."'
,
                                     '".$mouvement->getFlag_mouvement()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatemouvement($mouvement){
                        $sql = "UPDATE mouvement  SET  mouvement.id_service =  '".$mouvement->getId_service()."' ,mouvement.id_type_mouvement =  '".$mouvement->getId_type_mouvement()."' ,mouvement.id_commercial =  '".$mouvement->getId_commercial()."' ,mouvement.id_users =  '".$mouvement->getId_users()."' ,mouvement.date_mouvement =  '".$mouvement->getDate_mouvement()."' ,mouvement.object_mouvement =  '".$mouvement->getObject_mouvement()."' ,mouvement.content_mouvement =  '".$mouvement->getContent_mouvement()."' ,mouvement.total_ht_mouvement =  '".$mouvement->getTotal_ht_mouvement()."' ,mouvement.tva_mouvement =  '".$mouvement->getTva_mouvement()."' ,mouvement.totalttc_mouvement =  '".$mouvement->getTotalttc_mouvement()."' ,mouvement.totalltr_mouvement =  '".$mouvement->getTotalltr_mouvement()."' ,mouvement.avance_mouvement =  '".$mouvement->getAvance_mouvement()."' ,mouvement.reste_mouvement =  '".$mouvement->getReste_mouvement()."' ,mouvement.flag_mouvement =  '".$mouvement->getFlag_mouvement()."'   WHERE   mouvement.id =  ".$mouvement->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete mouvement =====================*/
					public function deleteMouvement($id){
					$sql = "DELETE FROM mouvement WHERE mouvement.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If mouvement existe =====================*/
					public function ifMouvementexiste($id_service){
					$sql = "SELECT * FROM mouvement WHERE id_service='".$id_service."' ";
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



