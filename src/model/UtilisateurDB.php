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
  use src\entities\Utilisateur;

    /*==================Classe creer par Samane samane_ui_admin le 11-12-2019 15:09:39=====================*/
        class UtilisateurDB extends Model {






				/*================== Constructor =====================*/

					public function __construct(){
					                      parent::__construct();
					        }


				/*================== Count utilisateur =====================*/
					public function countUtilisateur(){
					                       return count($this->listeUtilisateur());
					        }

				/*================== Get utilisateur =====================*/
					public function getUtilisateur($IDU){
					$sql = "SELECT * FROM utilisateur WHERE utilisateur.id = ".$IDU."  ";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetch();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Liste utilisateur =====================*/
					public function listeUtilisateur(){
					                $sql = "SELECT * FROM utilisateur";
					                if($this->db != null)
					                    {
					                        return $this->db->query($sql)->fetchAll();
					                    }else{
					                        return null;
					                    }
					                }

				/*================== Many to one utilisateur =====================*/

				/*================== One to many utilisateur =====================*/

               public function addUtilisateur($utilisateur){
                        $sql = "INSERT INTO utilisateur  VALUES(
                                     null
,
                                     '".$utilisateur->getCni()."'
,
                                     '".$utilisateur->getPrenom_user()."'
,
                                     '".$utilisateur->getNom_user()."'
,
                                     '".$utilisateur->getLogin()."'
,
                                     '".$utilisateur->getSexe_user()."'
,
                                     '".$utilisateur->getPoste()."'
,
                                     '".$utilisateur->getSalaire()."'
,
                                     '".$utilisateur->getStatut()."'
,
                                     '".$utilisateur->getDatnais()."'
,
                                     '".$utilisateur->getDatem()."'
,
                                     '".$utilisateur->getLevesecurity()."'
,
                                     '".$utilisateur->getPasse()."'
,
                                     '".$utilisateur->getAdress()."'
,
                                     '".$utilisateur->getEmail()."'
,
                                     '".$utilisateur->getNum_uer()."'
,
                                     '".$utilisateur->getPhoto()."'
,
                                     '".$utilisateur->getInfos()."'
,
                                     '".$utilisateur->getCacher()."'
,
                                     '".$utilisateur->getFlag()."'
) ";

                      if($this->db != null)
                        {
                              $this->db->exec($sql);
                              return $this->db->lastInsertId();//Si la clé primaire est auto_increment
                        }else{
                        return null;
                        }
               }

               public function updateutilisateur($utilisateur){
                        $sql = "UPDATE utilisateur  SET  utilisateur.CNI =  '".$utilisateur->getCni()."' ,utilisateur.PRENOM_USER =  '".$utilisateur->getPrenom_user()."' ,utilisateur.NOM_USER =  '".$utilisateur->getNom_user()."' ,utilisateur.LOGIN =  '".$utilisateur->getLogin()."' ,utilisateur.SEXE_USER =  '".$utilisateur->getSexe_user()."' ,utilisateur.POSTE =  '".$utilisateur->getPoste()."' ,utilisateur.SALAIRE =  '".$utilisateur->getSalaire()."' ,utilisateur.STATUT =  '".$utilisateur->getStatut()."' ,utilisateur.DATNAIS =  '".$utilisateur->getDatnais()."' ,utilisateur.DATEM =  '".$utilisateur->getDatem()."' ,utilisateur.LEVESECURITY =  '".$utilisateur->getLevesecurity()."' ,utilisateur.PASSE =  '".$utilisateur->getPasse()."' ,utilisateur.ADRESS =  '".$utilisateur->getAdress()."' ,utilisateur.EMAIL =  '".$utilisateur->getEmail()."' ,utilisateur.NUM_UER =  '".$utilisateur->getNum_uer()."' ,utilisateur.PHOTO =  '".$utilisateur->getPhoto()."' ,utilisateur.INFOS =  '".$utilisateur->getInfos()."' ,utilisateur.CACHER =  '".$utilisateur->getCacher()."' ,utilisateur.FLAG =  '".$utilisateur->getFlag()."'   WHERE   utilisateur.IDU =  ".$utilisateur->getIdu()."  ";

                      if($this->db != null)
                        {
                              return $this->db->exec($sql);
                        }else{
                        return null;
                        }
               }

				/*================== Delete utilisateur =====================*/
					public function deleteUtilisateur($IDU){
					$sql = "DELETE FROM utilisateur WHERE utilisateur.IDU = ".$IDU."";
					                if($this->db != null)
					                    {
					                        return $this->db->exec($sql);
					                    }else{
					                        return null;
					                    }
					                }

				/*================== If utilisateur existe =====================*/
					public function ifUtilisateurexiste($CNI){
					$sql = "SELECT * FROM utilisateur WHERE CNI='".$CNI."' ";
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



