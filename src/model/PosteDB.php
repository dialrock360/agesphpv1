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
  use src\entities\Poste;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class PosteDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count poste =====================*/
					public function countPoste(){
					                       return count($this->listePoste());
					        }

				/*================== Get poste =====================*/
					public function getPoste($id){
					$sql = "SELECT * FROM poste WHERE poste.id = ".$id."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste poste =====================*/
					public function listePoste(){
					                $sql = "SELECT * FROM poste";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one poste =====================*/

				/*================== One to many poste =====================*/

               public function addPoste($poste){
                        $sql = "INSERT INTO poste  VALUES(
                                     null
,
                                     '".$poste->getLibelle()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateposte($poste){
                        $sql = "UPDATE poste  SET  poste.libelle =  '".$poste->getLibelle()."'   WHERE   poste.id =  ".$poste->getId()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete poste =====================*/
					public function deletePoste($id){
					$sql = "DELETE FROM poste WHERE poste.id = ".$id."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If poste existe =====================*/
					public function ifPosteexiste($libelle){
					$sql = "SELECT * FROM poste WHERE libelle='".$libelle."' ";
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



