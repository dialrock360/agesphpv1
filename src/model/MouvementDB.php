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

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
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
					public function getMouvement($IDMV){
					$sql = "SELECT * FROM mouvement WHERE mouvement.id = ".$IDMV."  ";
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

				/*================== One to many mouvement =====================*/

               public function addMouvement($mouvement){
                        $sql = "INSERT INTO mouvement  VALUES(
                                     null
,
                                     '".$mouvement->getIdu()."'
,
                                     '".$mouvement->getNommv()."'
,
                                     '".$mouvement->getDate_del()."'
,
                                     '".$mouvement->getObjet()."'
,
                                     '".$mouvement->getConten()."'
,
                                     '".$mouvement->getTotalht()."'
,
                                     '".$mouvement->getTva()."'
,
                                     '".$mouvement->getMtsch()."'
,
                                     '".$mouvement->getMtsltr()."'
,
                                     '".$mouvement->getReg()."'
,
                                     '".$mouvement->getAvans()."'
,
                                     '".$mouvement->getReste()."'
,
                                     '".$mouvement->getCacher()."'
,
                                     '".$mouvement->getFlag()."'
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
                        $sql = "UPDATE mouvement  SET  mouvement.IDU =  '".$mouvement->getIdu()."' ,mouvement.NOMMV =  '".$mouvement->getNommv()."' ,mouvement.DATE_DEL =  '".$mouvement->getDate_del()."' ,mouvement.OBJET =  '".$mouvement->getObjet()."' ,mouvement.CONTEN =  '".$mouvement->getConten()."' ,mouvement.TOTALHT =  '".$mouvement->getTotalht()."' ,mouvement.TVA =  '".$mouvement->getTva()."' ,mouvement.MTSCH =  '".$mouvement->getMtsch()."' ,mouvement.MTSLTR =  '".$mouvement->getMtsltr()."' ,mouvement.REG =  '".$mouvement->getReg()."' ,mouvement.AVANS =  '".$mouvement->getAvans()."' ,mouvement.RESTE =  '".$mouvement->getReste()."' ,mouvement.CACHER =  '".$mouvement->getCacher()."' ,mouvement.FLAG =  '".$mouvement->getFlag()."'   WHERE   mouvement.IDMV =  ".$mouvement->getIdmv()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete mouvement =====================*/
					public function deleteMouvement($IDMV){
					$sql = "DELETE FROM mouvement WHERE mouvement.IDMV = ".$IDMV."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If mouvement existe =====================*/
					public function ifMouvementexiste($IDU){
					$sql = "SELECT * FROM mouvement WHERE IDU='".$IDU."' ";
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



