<?php


	error_reporting( ~E_NOTICE ); // avoid notice
include 'bd.php';
require_once 'functionsInsert.php';
require_once 'functionsTest.php';
require_once 'functionsuser.php';
require_once 'functionsUpdate.php';



function Saveuser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$passe,$adresse,$email,$tel,$userpic,$cacher){
    include "bd.php";
    $secu=0;
    $flag=0;
    $info='...';
    if ($statut != 'user'){
        $secu=0;
        $prenom=0;
        $poste=0;
        $login='.';
        $salaire=0;
        $datem=date("Y/m/d");
        $daten=date("Y/m/d");
        $passe=0;
        if ($statut != "service"){
            $Test_com=Test_com($tel,$nom,$statut);

            if($Test_com == 0){
                $secu=1;
                $error=0;
            }
            else{
                $error= "Ce commercial existe deja !";
            }
        }
        else{
            $secu=0;
            $error=0;
        }

    }
    if ($statut == "user"){
        $Test_user=Test_user($tel,$nom);

        if($Test_user == 0){

            $error=0;
            if (!empty($login) && !empty($pass)) {
                $Test_login=Test_login($login);
                if($Test_login == 0){
                    if ($poste == 'DIRECTREUR'|| $poste == "DIRECTRICE"){
                        $secu=3;

                    }
                    if ($poste == 'PATRON'|| $poste == "PATRON"){
                        $secu=2;
                    }
                    else{
                        $secu=1;

                    }
                    $error=0;
                }
                else{
                    $error='Login indisponible';
                }
            }
            else{
                  if ($poste == 'DIRECTEUR'|| $poste == "DIRECTRICE"){
            $secu=3;
			 
        }
        if ($poste == 'PATRON'|| $poste == "PATRONE"){
            $secu=2;
			
        }
        if($poste != 'DIRECTEUR'&& $poste != "DIRECTRICE" && $poste != 'PATRON'&& $poste != "PATRONE"){
            $secu=1;
			/*
?>
                <script>
                   // alert('<?php echo "  ".$poste." "; ?>');
                </script>
                <?php
				*/

        }
                $error=0;
            }

        }
        else{
            $error = "Cette Employer existe deja !";
        }

    }

    if($error==0)
    {
        $insert=addUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info,$cacher,$flag);

        if( $insert==1) {
            /* echo '<br/> cni= ' . $cni . '  pren= ' . $prenom . ' non=> ' . $nom . ' genre=> ' . $sexe . ' nais=> ' . $daten . ' tel=> ' . $tel . ' stat=> ' . $statut . ' proto=> ' . $userpic . ' flag => ' . $flag . '<hr/> ';
             echo '<br/> poste= ' . $poste . ' emb=> ' . $datem . '  sal=> ' . $salaire . ' adrs=> ' . $adress . ' mail=> ' . $email . '<hr/> ';
             echo '<hr/> log= ' . $login . ' pass=> ' . $passe . ' levelsec=> ' . $secu . ' statut=> ' . $statut . ' adm=> ' . $cacher;
         */

            $error= 0;


        }
        else{
            $error= 'Erreur d insertion recommensez svp';

        }


    }
    return $error;
}


function Mofifuser($id,$cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info){
    include "bd.php";
    $flag=0;
    if ($statut != 'user'){
        $secu=0;
        $prenom=0;
        $poste=0;
        $login='.';
        $salaire=0;
        $datem=date("Y/m/d");
        $daten=date("Y/m/d");
        $passe=0;
        if ($statut != "service"){
            $secu=1;
            $error=0;
        }else{
            $secu=0;
            $error=0;
        }

    }
	
    if ($statut == "user"){
		
        if ($poste == 'DIRECTEUR'|| $poste == "DIRECTRICE"){
            $secu=3;
			 
        }
        if ($poste == 'PATRON'|| $poste == "PATRONE"){
            $secu=2;
			
        }
        if($poste != 'DIRECTEUR'&& $poste != "DIRECTRICE" && $poste != 'PATRON'&& $poste != "PATRONE"){
            $secu=1;
			/*
?>
                <script>
                   // alert('<?php echo "  ".$poste." "; ?>');
                </script>
                <?php
				*/

        }
        $error=0;

    }

    if($error==0)
    {
        // echo $cni. '   ' .$prenom. '   ' .$nom. '   ' .$login. '   ' .$sexe. '   ' .$poste. '   ' .$salaire. '   ' .$statut. '   ' .$daten. '   ' .$datem. '   ' .$secu. '   ' .$passe. '   ' .$adress. '   ' .$email. '   ' .$tel. '   ' .$userpic. '   ' .$info. '   ' .$cacher. '   ' .$flag.'<hr>';
        $upd=updUser($cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info,$id);

        if( $upd==1) {
            /* echo '<br/> cni= ' . $cni . '  pren= ' . $prenom . ' non=> ' . $nom . ' genre=> ' . $sexe . ' nais=> ' . $daten . ' tel=> ' . $tel . ' stat=> ' . $statut . ' proto=> ' . $userpic . ' flag => ' . $flag . '<hr/> ';
             echo '<br/> poste= ' . $poste . ' emb=> ' . $datem . '  sal=> ' . $salaire . ' adrs=> ' . $adress . ' mail=> ' . $email . '<hr/> ';
             echo '<hr/> log= ' . $login . ' pass=> ' . $passe . ' levelsec=> ' . $secu . ' statut=> ' . $statut . ' adm=> ' . $cacher;
         */

            $error= 0;


        }
        else{
            $error= 'Erreur de mise à jour recommensez svp';

        }


    }
    return $error;
}


function login($Password,$login){
    include "bd.php";

    //Requette pour verifier le couple login / pass dans la bd
    $sql="SELECT count(*) FROM UTILISATEUR WHERE 	PASSE='$Password' AND LOGIN='$login' AND 	LEVESECURITY IN (2,3,4)";
        // on envoie la requÃªte
    $req = $base->query($sql);

    $data =  mysqli_fetch_array($req);

    mysqli_free_result($req);
    //mysql_close();

    // Si RÃ¯Â¿Åponse, alors login:
    if ($data[0] == 1)
    {
        $success = 'ok';
        return $success;
    }if ($data[0] == 0){
        $erreur = 'Mots de Pass ou Login Erroné!';
        return $erreur;
    }else{
        $erreur = 'Problème de base de données : Contacter Aministrateur!!!';
        return $erreur;
    }

}

























?>