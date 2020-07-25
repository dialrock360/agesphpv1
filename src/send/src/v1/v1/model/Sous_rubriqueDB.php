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
  use src\entities\Sous_rubrique;

    /*==================Classe creer par Samane samane_ui_admin le 05-12-2019 02:38:08=====================*/
        class Sous_rubriqueDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count sous_rubrique =====================*/
					public function countSous_rubrique(){
					                       return count($this->listeSous_rubrique());
					        }

				/*================== Get sous_rubrique =====================*/
					public function getSous_rubrique($id){
					$sql = "SELECT * FROM sous_rubrique WHERE sous_rubrique.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste sous_rubrique =====================*/
					public function listeSous_rubrique(){
					                $sql = "SELECT * FROM sous_rubrique";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one sous_rubrique =====================*/
					public function listeSous_rubriqueByRubriqueId($id){
					$sql = "SELECT * FROM sous_rubrique WHERE  sous_rubrique.id_rubrique = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== One to many sous_rubrique =====================*/
					public function listeRubriqueBySous_rubriqueId($id_rubrique){
					$sql = "SELECT * FROM rubrique WHERE  rubrique.id_rubrique = ".$id_rubrique."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

               public function addSous_rubrique($sous_rubrique){
                        $sql = "INSERT INTO sous_rubrique  VALUES(
                                     null
,
                                     ".$sous_rubrique->getId_rubrique()."
,
                                     '".$sous_rubrique->getId_model()."'
,
                                     '".$sous_rubrique->getNom_sous_rubrique()."'
,
                                     '".$sous_rubrique->getValeur_sous_rubrique()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updatesous_rubrique($sous_rubrique){
                        $sql = "UPDATE sous_rubrique  SET  sous_rubrique.id_rubrique =  '".$sous_rubrique->getId_rubrique()."' ,sous_rubrique.id_model =  '".$sous_rubrique->getId_model()."' ,sous_rubrique.nom_sous_rubrique =  '".$sous_rubrique->getNom_sous_rubrique()."' ,sous_rubrique.valeur_sous_rubrique =  '".$sous_rubrique->getValeur_sous_rubrique()."'   WHERE   sous_rubrique.id =  ".$sous_rubrique->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete sous_rubrique =====================*/
					public function deleteSous_rubrique($id){
					$sql = "DELETE FROM sous_rubrique WHERE sous_rubrique.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If sous_rubrique existe =====================*/
					public function ifSous_rubriqueexiste($id_rubrique){
					$sql = "SELECT * FROM sous_rubrique WHERE id_rubrique='".$id_rubrique."' ";
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



