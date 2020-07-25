<?php
/*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16

    PERFECTIONNEZ PAR PIERRE YEM MBACK
    dialrock360@gmail.com
    (+221) 77 - 567 - 21 - 79
    AUTEUR DU MODUL UI SAMANE MANAGER

    POUR TOUTE MODIFICATION VISANT A AMELIORER
    CE MODELE.
    VOUS ETES LIBRE DE TOUTE UTILISATION.
  ===================================================*/

namespace libs\system\sm_manager;

use http\Params;

class ViewManager
{


    //DataBase settings
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $etat;
    private $connection;
    private $ent_dir;
    private $ent_shema;
    private $mgr_dir;

    public function __construct(){

        require_once 'config/database.php';

        $this->host = connexion_params()["host"];
        $this->user = connexion_params()["user"];
        $this->pass = connexion_params()["password"];
        $this->dbname = connexion_params()["database_name"];
        $this->ent_dir = array_filter(glob('src/view/*'), 'is_dir');
        $this->ent_shema = glob('src/view/view_shema/*');
        $this->mgr_dir = glob('src/views/migrations/*');

    }





    function views_list(){



            $dbList = array();
            $i=1;

            foreach($this->ent_dir  as $dirpath){
                //Use the is_file function to make sure that it is not a directory.
                //  print_r($dirpath);     echo '<hr/>';
                $tmptableList = array();
                if($dirpath!='src/view/sm-sdmin' && $dirpath!='src/view/welcome'){


                    $directory =$dirpath;
                    $filecount = 0;
                    $files = glob($dirpath.'/*');




                    $array = explode("/", $dirpath);
                    $viewname= $array[2]; // piece1

                    $fileList = array();
                    $fileList['viewname'] =$viewname;
                    if ($files){
                        $filecount = count($files);
                        foreach($files as $filepath){
                            if((is_file($filepath) )){
                                $fileList[] =$filepath;
                                /*print_r ($filepath);

                                echo '<hr/>';*/
                            }
                        }
                    }


                    $tableList = array();
                    $tableList['id'] = $i;
                    $tableList['entpath'] =$dirpath;
                    $tableList['entname'] = $viewname;
                    $tableList['nbrfile'] = $filecount;
                    $tableList['fileList'] = $fileList;
                    $dbList[] = $tableList;
                    /* print_r ($tableList);

                     echo '<hr/>';
                    */
                    $i++;
                }
            }

            return $dbList;
    }

    function get_view($entname)
    {
       // $dbname=($dbname=='')?$this->dbname:$dbname;

        $dalabase ='';
        foreach($this->views_list()  as $cle=>$valeur){
            if ($valeur['entname']==$entname)
                $dalabase=$valeur;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }

    function list_files_view($viewname)
    {
       // $dbname=($dbname=='')?$this->dbname:$dbname;

        $view=$this->get_view($viewname);
        $dbList = array();
        $i=1;

        foreach($view['fileList'] as $filepath){
            //Use the is_file function to make sure that it is not a directory.
            if ($filepath!=$viewname){
                $array = explode("/", $filepath);
                $filename= $array[3]; // piece1
                $array = explode(".", $filename);
                $name= $array[0]; // piece1


                $tableList['id'] =$i;
                $tableList['filepath'] =$filepath;
                $tableList['filename'] = $name;
                $dbList[] = $tableList;
              /* print_r ($tableList);

            echo '<hr/>';*/


                $i++;
            }


        }

        return $dbList;
    }


    function if_view_exist($entname)
    {


        $dalabase = 0;
        foreach($this->views_list() as $cle=>$valeur){
            if ($valeur['entname']==$entname)
                $dalabase=1;
            //echo $cle.' : '.$valeur.'<br>';
        }

        return $dalabase;
    }



    //methode ou url
    public function create_view($viewname,$bdname='',$object='crud',$post=0){

         $bdname=($bdname=='')?$this->dbname:$bdname;




      /*echo  $fndb->if_autoincrement($fndb->get_table_cols_detail(strtolower($viewname),$bdname),'author_id');
        echo '<hr>';
        print_r($coltable);
        echo '<hr>';
        print_r($idsobj);*/

      //  $this->add_content_maker($viewname,$frgtabletab,$importab,$fridkeytab,$bdname,$coltable2);


/*
      print_r($bdname);
        echo '<hr>';
        print_r($viewname);
        echo '<hr>';
        print_r($coltable);
        echo '<hr>';
        print_r($idobj);
        echo '<hr>';
        print_r($importab);
        echo '<hr>';
        print_r($frgtabletab);
        echo '<hr>';
        print_r($fridkeytab);*/


        $fndb= new DatabaseManager();
        if ($post==1){
           /* print_r($viewname);
            echo '<hr>';
            echo '<hr>';*/
            // print_r($tablels);

            $ok=0;

            $coltable2=  $fndb->get_table_cols_detail(strtolower($viewname),$bdname);

            $crud= array('add', 'liste', 'edit', 'index', 'get_id');

            if ($object=='crud'){
                $viewname = ucfirst(strtolower($viewname));

                foreach($crud as  $objt){
                    $this->create_file_view($viewname,$bdname,$objt,$coltable2);
                 }
            }
        }
        if ($post==0){
/*
            print_r($post);
            echo '<hr>';
            echo '<hr>';*/
            if ($this->if_view_exist($viewname)==0){

                if ($fndb->if_table_exist($viewname)>0){



                    // print_r($tablels);

                    $ok=0;

                    $coltable2=  $fndb->get_table_cols_detail(strtolower($viewname),$bdname);

                    $crud= array('add', 'liste', 'edit', 'index', 'get_id');

                    if ($object=='crud'){
                        $viewname = ucfirst(strtolower($viewname));
                        foreach($crud as  $objt){
                            $ok= $this->create_file_view($viewname,$bdname,$objt,$coltable2);
                            //$this->create_file_view($viewname,$coltable,$idobj,$importab,$frgtabletab,$fridkeytab,$bdname,$objt);
                        }
                    }
                    if ($object=='basic'){
                        //---------------------------- index  view ------------------------------------------
                        $ok=$this->create_file_view($viewname,$bdname,'free',$coltable2);
                    }

                    if ($ok>0)
                        return '<label class="text-success">Vue(s) créée(s) avec succès </label>';
                }else{
                    return  '<label class="text-danger">Cette classe ne fait pas partie de la BD active</label>';
                }
            }

        }
    }


    //methode ou url
    public function create_file_view($viewname,$bdname,$object,$coltable2){

/*

     print_r($viewname);
     echo '<hr>';
     print_r($coltable2);
     echo '<hr>';
     print_r($object);

        echo '<hr>';*/

        $txt = '';
        $content = '';
         if ($object=='add'){

            //---------------------------- add  view ------------------------------------------
            $content=$this->add_content_maker($viewname,$bdname,$coltable2);

        }
        if ($object=='edit'){
            //---------------------------- edit  view ------------------------------------------
            $content=$this->edit_content_maker($viewname,$bdname,$coltable2);

        }
        if ($object=='liste'){
            $content= $this->list_content_maker($viewname,$coltable2);
            //---------------------------- list  view ------------------------------------------
        }
        if ($object=='index'){
            $content= $this->index_content_maker();
            //---------------------------- index  view ------------------------------------------
        }
        if ($object=='get_id'){
            $content= $this->get_id_content_maker($viewname);
            //---------------------------- index  view ------------------------------------------
        }
        if ($object=='free'){
            $content= $this->freeview_content_maker();
            //---------------------------- index  view ------------------------------------------
        }

        $txt = $this->conten_maker($viewname,$content,$object);

       $dirpath='src/view/'.strtolower($viewname);
        if (!file_exists($dirpath)) {
            mkdir($dirpath, 0777, true);

        }
        $path=$dirpath."/".strtolower($object).".html";
        //print_r($txt);
        $myfile = fopen($path, "w") or die("Unable to open file!");
        fwrite($myfile, $txt);
        fclose($myfile);


        return (!file_exists($path))?0:1;
    }
    //methode ou url
    public function conten_maker($viewname,$content='',$object='index'){
        $oldfile =  "\n\n";

	    $oldfile .= '     <html>'."\n";
	    $oldfile .= '          <head>'."\n";
		$oldfile .= '                 <meta charset="UTF-8">'."\n";
		$oldfile .= '                 <title>page '.$object.'</title>'."\n";
		$oldfile .= '                 <!-- l\'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->'."\n";
		$oldfile .= '                 <link type="text/css" rel="stylesheet" href="{$url_base}public/css/bootstrap.min.css"/>'."\n";
		$oldfile .= '                 <link type="text/css" rel="stylesheet" href="{$url_base}public/css/samane.css"/>'."\n";
		$oldfile .= '                 <style>'."\n";
		$oldfile .= '                   h1{'."\n";
		$oldfile .= '                        color: #40007d;'."\n";
		$oldfile .= '                   }'."\n";
		$oldfile .= '                 </style>'."\n";
	    $oldfile .= '          </head>'."\n";
	    $oldfile .= '          <body>'."\n";
		$oldfile .= '                <div class="nav navbar navbar-default navbar-fixed-top">'."\n";
		$oldfile .= '                   <ul class="nav navbar-nav">'."\n";
		$oldfile .= '                        <!-- l\'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->'."\n";
		$oldfile .= '                        <li><a href="{$url_base}">Accueil</a></li>'."\n";
		$oldfile .= '                        <li><a href="{$url_base}'.$viewname.'/index">Index '.$viewname.'</a></li>'."\n";
		$oldfile .= '                        <li><a href="{$url_base}'.$viewname.'/add">Ajout '.$viewname.'</a></li>'."\n";
		$oldfile .= '                        <li><a href="{$url_base}'.$viewname.'/getID/1">Get id '.$viewname.' 1</a></li>'."\n";
		$oldfile .= '                        <li><a href="{$url_base}'.$viewname.'/liste">Liste '.$viewname.' </a></li>'."\n";
		$oldfile .= '                   </ul>'."\n";


        $oldfile .= '                   <div class="thumbnail pull-right">'."\n";
        $oldfile .= '                         <a href="{$url_base}SM_Admin/index">'."\n";
        $oldfile .= '                            <img src="{$url_base}public/image/logo.jpg" height="64" width="64" class="img-circle " />'."\n";
        $oldfile .= '                            <div class="caption">'."\n";
        $oldfile .= '                               <p>Samane UI Manager</p>'."\n";
        $oldfile .= '                            </div>'."\n";
        $oldfile .= '                        </a>'."\n";
        $oldfile .= '                   </div>'."\n";

		$oldfile .= '               </div>'."\n";
		$oldfile .= '               <div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
		$oldfile .= '                    <div class="panel panel-info">'."\n";
		$oldfile .= '                   	<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>'."\n";
		$oldfile .= '                    		<div class="panel-body">'."\n";

		$oldfile .= "\n\n";

		$oldfile .= $content;

		$oldfile .= "\n\n";


		$oldfile .= '                    		</div>'."\n";
		$oldfile .= '                   	</div>'."\n";
		$oldfile .= '                    </div>'."\n";
		$oldfile .= '              </div>'."\n";

	    $oldfile .= '          </body>'."\n";
        $oldfile .= '       </html>'."\n";


        $txt = $oldfile."\n";



        return $txt;
    }





    function index_content_maker()
    {



	 $oldfile = '				<div class="row">'."\n";
	 $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
	 $oldfile .= '						<div class="thumbnail">'."\n";
         $oldfile .= '                <img src="{$url_base}public/image/logo.jpg" alt="Lights" style="width:50%" />'."\n";

        $oldfile .= '								<div class="caption">'."\n";




        $oldfile .= '									<p>'."\n";
        $oldfile .= '									<div class="alert alert-success" style="font-size:18px; text-align:justify;">'."\n";
        $oldfile .= '										Merci, l\'équipe samanemvc vous remercie :) :'."\n";
        $oldfile .= '										je vous ai préparé un CRUD qui marche, il suffit tout simplement d\'importer'."\n";
        $oldfile .= '										la base de données qui se trouve dans le dossier src/view puis test (src/view/test);'."\n";
        $oldfile .= '										cette base s\'appelle samane_test.sql et elle comporte une seule table nommée test.'."\n";
        $oldfile .= '										ça vous sera très utile j\'espère.'."\n";
        $oldfile .= '										<br/>Et surtout noubliez pas de configurer votre base de données : ou? Dans le dossier config'."\n";
        $oldfile .= '										puis éditez le fichier database.php. Mettez à on l\'etat de la base! Bon code!!!!  :)'."\n";
        $oldfile .= '									</div>'."\n";
        $oldfile .= '									MODELE DEVELOPPE PAR Ngor SECK !'."\n";
        $oldfile .= '									<br/>'."\n";
        $oldfile .= '									<h1>IT WORKS !!!! </h1>'."\n";
        $oldfile .= '									</p>'."\n";


	 $oldfile .= '								</div>'."\n";
	 $oldfile .= '							</a>'."\n";
	 $oldfile .= '						</div>'."\n";
	 $oldfile .= '					</div> '."\n";
	 $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

    function freeview_content_maker()
    {



	 $oldfile = '				<div class="row">'."\n";
	 $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
	 $oldfile .= '						<div class="thumbnail">'."\n";
         $oldfile .= '                <img src="{$url_base}public/image/logo.jpg" alt="Lights" style="width:50%" />'."\n";

        $oldfile .= '								<div class="caption">'."\n";





        $oldfile .= '									<p>'."\n";
        $oldfile .= '									<div class="alert alert-success" style="font-size:18px; text-align:justify;">'."\n";
        $oldfile .= '										Merci, l\'équipe samanemvc vous remercie :) :'."\n";
        $oldfile .= '										Lorem ipsum dolor sit amet, consectetur adipiscing elit'."\n";
        $oldfile .= '										Mauris id facilisis odio. Integer ut est semper, sollicitudin nisi at,'."\n";
        $oldfile .= '										cursus ligula. Sed eleifend, massa eu sollicitudin pulvinar, risus sapien eleifend massa,'."\n";
        $oldfile .= '										 sed lobortis augue enim in nulla. Maecenas faucibus ornare semper. Etiam vel elit fringilla.'."\n";
        $oldfile .= '										<br/>Suspendisse vitae metus ornare, auctor velit eu, vehicula velit. Praesent ac metus nisi.'."\n";
        $oldfile .= '										cursus diam eu, auctor dolor. Nullam vestibulum non massa id sollicitudin. Nulla facilisi.! Bon code!!!!  :)'."\n";
        $oldfile .= '									</div>'."\n";
        $oldfile .= '									MODELE DEVELOPPE PAR Ngor SECK !'."\n";
        $oldfile .= '									<br/>'."\n";
        $oldfile .= '									<h1>IT WORKS !!!! </h1>'."\n";
        $oldfile .= '									</p>'."\n";


	 $oldfile .= '								</div>'."\n";
	 $oldfile .= '							</a>'."\n";
	 $oldfile .= '						</div>'."\n";
	 $oldfile .= '					</div> '."\n";
	 $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

    function get_id_content_maker($viewname)
    {



	 $oldfile = '				<div class="row">'."\n";
	 $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
	 $oldfile .= '						<div class="thumbnail">'."\n";

        $oldfile .= '								<div class="caption">'."\n";




        $fndb= new DatabaseManager();
        $coltable2=  $fndb->get_table_cols_detail(strtolower($viewname));

        $getid='id';
        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );
                //  echo '<hr>';
                if (!empty($id[1])){
                    $getid=$id[0];

                }
                if (empty($id[1])){
                    $getid=$id[0];
                    // echo '<hr>';
                    break;
                }
            }
        }

        $oldfile .= '									<p>'."\n";
        $oldfile .= '									<div class="alert alert-success" style="font-size:18px; text-align:justify;">'."\n";

        $oldfile .= '                                                  <h1>Valeur de l\'identifiant '.$getid.' revoyée par le controller : getID({$'.$getid.'})</h1>'."\n";

        $oldfile .= '									</div>'."\n";

        $oldfile .= '									</p>'."\n";


	 $oldfile .= '								</div>'."\n";
	 $oldfile .= '							</a>'."\n";
	 $oldfile .= '						</div>'."\n";
	 $oldfile .= '					</div> '."\n";
	 $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

    function add_content_maker($viewname,$dbname,$coltable2)
    {

        $fndb= new DatabaseManager();
        $forgtab= $fndb->get_foreign_keyof_table(strtolower($viewname),$dbname);


        $tabfrkid =array();


        $oldfile = '				<div class="row">'."\n";
        $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";

        $oldfile .= '               								{if isset($ok)}'."\n";
        $oldfile .= '               								{if $ok != 0}'."\n";
        $oldfile .= '                    								<div class="alert alert-success">Données ajoutées!</div>'."\n";
        $oldfile .= '               								{else}'."\n";
        $oldfile .= '                    								<div class="alert alert-danger">Erreur!</div>'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '                                      <form method="post" action="{$url_base}'.$viewname.'/add">'."\n";

        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );


                //  echo '<hr>';
                if (!empty($id[1])){
                    $getid=$id[0];
                    $oldfile .= '                                                  <input class="form-control" type="hidden" name="'.$getid.'" value="0" id="'.$getid.'"/>'."\n";

                }

            }
        }

        foreach($forgtab as $tab){
            $colname  =$tab['column_name'];
            $referency =$tab['foreign_column'];
            $foreign_table =$tab['foreign_table'];
            $foreign_db =$tab['foreign_db'];
            //  echo '<hr>';
            //Array ( [column_name] => idautor [foreign_db] => test [foreign_table] => author [foreign_column] => author_id )
            // echo $colname.' : '.$foreign_db.' => '.$foreign_table.' => '.$referency;

            $coltable=$fndb->columnsTable_filter($foreign_table,$foreign_db);
            $tabfrkid[]=$colname;

            $oldfile .= '                                        <div class="form-group">'."\n";
            $oldfile .= '                                                <label class="control-label">Liste de '.ucfirst(strtolower($foreign_table)).'s </label>'."\n";
            $oldfile .= '                                       <select name="'.$colname.'" class="form-control champ" >';
            $oldfile .= '                                                <option selected disabled>--Choisir '.ucfirst(strtolower($foreign_table)).' --</option>'."\n";
            $oldfile .= '                                                {foreach from=$'.strtolower($foreign_table).'s item=champ}'."\n";
            $oldfile .= '                                                <option value="{$champ[\''.$referency.'\']}">{$champ[\''.$coltable[1].'\']}  </option>'."\n";

            $oldfile .= '                                               {/foreach}'."\n";


            $oldfile .= '                                       </select>'."\n";
            $oldfile .= '                                       </div>'."\n";


        }
        if ($coltable2['items']!=null){
            foreach($coltable2['items'] as $col){
                $x=0;
                foreach($tabfrkid as $idcol){
                    $cid=explode( ':' , $idcol )[0];
                    $x=($cid==$col[0])?($x+1):0;

                }
                if ($x==0){
 //Array (
                    // [0] => Array ( [0] => title [1] => varchar(128) [2] => NO [3] => [4] => [5] => )
                    // [1] => Array ( [0] => description [1] => varchar(512) [2] => NO [3] => [4] => [5] => )
                    // [2] => Array ( [0] => published [1] => date [2] => NO [3] => [4] => [5] => )
                    // [3] => Array ( [0] => author_id [1] => int(11) [2] => NO [3] => MUL [4] => [5] => ) )



                    if ((mathDatatipe($col[1],$type='num')==true)){



                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="number" name="'.$col[0].'" id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";

                    }
                    if ((mathDatatipe($col[1],$type='bin')==true)){


                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="file" name="'.$col[0].'" id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }

                    if ((mathDatatipe($col[1],$type='bool')==true)){



                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <label class="checkbox-inline"><input class="form-control" type="checkbox" name="'.$col[0].'" id="'.$col[0].'_1"/>'.$col[0].' 1</label>'."\n";
                        $oldfile .= '                                                <label class="checkbox-inline"><input class="form-control" type="checkbox" name="'.$col[0].'" id="'.$col[0].'_2"/>'.$col[0].' 2</label>'."\n";
                        $oldfile .= '                                       </div>'."\n";

                    }


                    if ((mathDatatipe($col[1],$type='date')==true)){

                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="date" name="'.$col[0].'" id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }

                    if ((mathDatatipe($col[1],$type='p399')==true)){

                       // echo '<hr>'.$col[1].'<hr>';

                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="text" name="'.$col[0].'" id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }
                    if ((mathDatatipe($col[1],$type='p400')==true) ||
                        (mathDatatipe($col[1],$type='text')==true)){
                        //echo '<hr><hr><hr>'.$col[1].'<hr><hr><hr>';
                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                  <textarea class="form-control" rows="5" name="'.$col[0].'" id="comment"></textarea>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }




                }
            }
        }


        $oldfile .= "\n\n".'                                              <div class="form-group">'."\n";
        $oldfile .= '                                                      <input class="btn btn-success" type="submit" name="valider" value="Envoyer"/>'."\n";
        $oldfile .= '                                                      <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>'."\n";

        $oldfile .= '                                              </div>'."\n\n";

        $oldfile .= '                                      </form>'."\n";
        $oldfile .= '					</div> '."\n";
        $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

    function edit_content_maker($viewname,$dbname,$coltable2)
    {

        $fndb= new DatabaseManager();
        $forgtab= $fndb->get_foreign_keyof_table(strtolower($viewname),$dbname);


        $tabfrkid =array();


        $oldfile = '				<div class="row">'."\n";
        $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";

        $oldfile .= '               								{if isset($ok)}'."\n";
        $oldfile .= '               								{if $ok != 0}'."\n";
        $oldfile .= '                    								<div class="alert alert-success">Données ajoutées!</div>'."\n";
        $oldfile .= '               								{else}'."\n";
        $oldfile .= '                    								<div class="alert alert-danger">Erreur!</div>'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '                                      <form method="post" action="{$url_base}'.$viewname.'/update">'."\n";

        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );


                //  echo '<hr>';
                if (!empty($id[1])){
                    $getid=$id[0];
                    $oldfile .= '                                                  <input class="form-control" type="hidden" name="'.$getid.'" value="{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$getid.'\']} {/if}" id="'.$getid.'"/>'."\n";

                }

            }
        }

        foreach($forgtab as $tab){
            $colname  =$tab['column_name'];
            $referency =$tab['foreign_column'];
            $foreign_table =$tab['foreign_table'];
            $foreign_db =$tab['foreign_db'];
            //  echo '<hr>';
            //Array ( [column_name] => idautor [foreign_db] => test [foreign_table] => author [foreign_column] => author_id )
            // echo $colname.' : '.$foreign_db.' => '.$foreign_table.' => '.$referency;

            $coltable=$fndb->columnsTable_filter($foreign_table,$foreign_db);
            $tabfrkid[]=$colname;

            $oldfile .= '                                        <div class="form-group">'."\n";
            $oldfile .= '                                                <label class="control-label">Liste de '.ucfirst(strtolower($foreign_table)).'s </label>'."\n";
            $oldfile .= '                                       <select name="'.$colname.'" class="form-control champ" >';
            $oldfile .= '                                                <option selected value="{$'.strtolower($viewname).'[\''.$colname.'\']}">{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$colname.'\']}   {/if}</option>'."\n";
            $oldfile .= '                                                {foreach from=$'.strtolower($foreign_table).'s item=champ}'."\n";
            $oldfile .= '                                                <option value="{$champ[\''.$referency.'\']}">{$champ[\''.$coltable[1].'\']}  </option>'."\n";

            $oldfile .= '                                               {/foreach}'."\n";


            $oldfile .= '                                       </select>'."\n";
            $oldfile .= '                                       </div>'."\n";


        }
        if ($coltable2['items']!=null){
            foreach($coltable2['items'] as $col){
                $x=0;
                foreach($tabfrkid as $idcol){
                    $cid=explode( ':' , $idcol )[0];
                    $x=($cid==$col[0])?($x+1):0;

                }
                if ($x==0){
                    //Array (
                    // [0] => Array ( [0] => title [1] => varchar(128) [2] => NO [3] => [4] => [5] => )
                    // [1] => Array ( [0] => description [1] => varchar(512) [2] => NO [3] => [4] => [5] => )
                    // [2] => Array ( [0] => published [1] => date [2] => NO [3] => [4] => [5] => )
                    // [3] => Array ( [0] => author_id [1] => int(11) [2] => NO [3] => MUL [4] => [5] => ) )



                    if ((mathDatatipe($col[1],$type='num')==true)){



                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="number" name="'.$col[0].'" value="{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$col[0].'\']} {/if}"  id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";

                    }
                    if ((mathDatatipe($col[1],$type='bin')==true)){


                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="file" name="'.$col[0].'"  value="{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$col[0].'\']} {/if}"  id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }

                    if ((mathDatatipe($col[1],$type='bool')==true)){



                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <label class="checkbox-inline"><input class="form-control" type="checkbox" name="'.$col[0].'" id="'.$col[0].'_1"/>'.$col[0].' 1</label>'."\n";
                        $oldfile .= '                                                <label class="checkbox-inline"><input class="form-control" type="checkbox" name="'.$col[0].'" id="'.$col[0].'_2"/>'.$col[0].' 2</label>'."\n";
                        $oldfile .= '                                       </div>'."\n";

                    }


                    if ((mathDatatipe($col[1],$type='date')==true)){

                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="date" name="'.$col[0].'" value="{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$col[0].'\']} {/if}"  id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }

                    if ((mathDatatipe($col[1],$type='p399')==true)){

                        // echo '<hr>'.$col[1].'<hr>';

                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                <input class="form-control" type="text" name="'.$col[0].'" value="{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$col[0].'\']} {/if}" id="'.$col[0].'"/>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }
                    if ((mathDatatipe($col[1],$type='p400')==true) ||
                        (mathDatatipe($col[1],$type='text')==true)){
                        //echo '<hr><hr><hr>'.$col[1].'<hr><hr><hr>';
                        $oldfile .= '                                        <div class="form-group">'."\n";
                        $oldfile .= '                                                <label class="control-label">'.$col[0].' de '.$viewname.'</label>'."\n";
                        $oldfile .= '                                                  <textarea class="form-control" rows="5" name="'.$col[0].'" id="comment">{if isset($'.strtolower($viewname).')} {$'.strtolower($viewname).'[\''.$col[0].'\']} {/if}</textarea>'."\n";
                        $oldfile .= '                                       </div>'."\n";
                    }




                }
            }
        }



        $oldfile .= "\n\n".'                                              <div class="form-group">'."\n";
        $oldfile .= '                                                         <input class="btn btn-success" type="submit" name="modifier" value="Modifier"/>'."\n";
        $oldfile .= '                                                         <a class="btn btn-info" href="{$url_base}'.$viewname.'/liste">Retour</a>'."\n";
        $oldfile .= '                                                     </div>'."\n";

        $oldfile .= '                                      </form>'."\n";
        $oldfile .= '					</div> '."\n";
        $oldfile .= '				</div>'."\n";

        return $oldfile;
    }



    function list_content_maker($viewname,$coltable2)
    {

        $params='';
        $fndb= new DatabaseManager();
        $Entity = ucfirst(strtolower($viewname));
        $varEntity = strtolower($viewname);

        $oldfile = '				<div class="row">'."\n";
        $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
        $oldfile .= '				{if isset($'.$varEntity.'s)}'."\n";
        $oldfile .= '					{if $'.$varEntity.'s != null}'."\n";
        $oldfile .= '						<table class="table table-bordered table-stripped">'."\n";
        $oldfile .= '			                <caption  > LISTE DE '.$Entity.'</caption>'."\n";
        $oldfile .= '							<tr>'."\n";
        $getid='id';
        if ($coltable2['ids']!=null){
            $primaryKeys=$fndb->primaryKeys_filter($coltable2['ids']);
            $param=array();
            foreach($primaryKeys as $col){
                $id=explode ( ':' , $col );
                if (!empty($id[1])){
                    $getid=$id[0];
                    $param[]=$id[0];
                    $param[]='{$obj["'.$getid.'"]}';
                }
                if (empty($id[1])){
                    $getid=$id[0];
                    $param[]='{$obj["'.$getid.'"]}';
                   // echo '<hr>';

                }

            }

            $params=implode( '/' , $param );
        }
        if ($coltable2['items']!=null){
            foreach($coltable2['items'] as $col){
                $oldfile .= '								<th>'.ucfirst(strtolower($col[0])).'</th>'."\n";
            }

        }

        $oldfile .= '								<th>Action</th>'."\n";
        $oldfile .= '								<th>Action</th>'."\n";

        $oldfile .= '							</tr>'."\n";
        $oldfile .= '							{foreach from=$'.$varEntity.'s item=obj}'."\n";
        $oldfile .= '								<tr>'."\n";


        if ($coltable2['items']!=null){
            foreach($coltable2['items'] as $col){
                $oldfile .= '								<td>{$obj["'.$col[0].'"]}</td>'."\n";
            }

        }
        $oldfile .= '									<td><a href="{$url_base}'.$Entity.'/delete/'.$params.'">Supprimer</a></td>'."\n";
        $oldfile .= '									<td><a href="{$url_base}'.$Entity.'/edit/'.$params.'"]}">Editer</a></td>'."\n";
        $oldfile .= '								</tr>'."\n";
        $oldfile .= '							{/foreach}'."\n";
        $oldfile .= '						</table>'."\n";
        $oldfile .= '					{else}'."\n";
        $oldfile .= '						Liste vide'."\n";
        $oldfile .= '					{/if}'."\n";
        $oldfile .= '				{/if}'."\n";
        $oldfile .= '					</div> '."\n";
        $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

  






    public function updat_view_welcome($update=false){
        if ($update==true){
            $viewname='Welcome';
            $object='index';
            $oldfile =  "\n\n";

            $oldfile .= '     <html>'."\n";
            $oldfile .= '          <head>'."\n";
            $oldfile .= '                 <meta charset="UTF-8">'."\n";
            $oldfile .= '                 <title>Vue '.$viewname.'</title>'."\n";
            $oldfile .= '                 <!-- l\'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->'."\n";
            $oldfile .= '                 <link type="text/css" rel="stylesheet" href="{$url_base}public/css/bootstrap.min.css"/>'."\n";
            $oldfile .= '                 <link type="text/css" rel="stylesheet" href="{$url_base}public/css/samane.css"/>'."\n";
            $oldfile .= '                 <style>'."\n";
            $oldfile .= '                   h1{'."\n";
            $oldfile .= '                        color: #40007d;'."\n";
            $oldfile .= '                   }'."\n";
            $oldfile .= '                 </style>'."\n";
            $oldfile .= '          </head>'."\n";
            $oldfile .= '          <body>'."\n";
            $oldfile .= '                <div class="nav navbar navbar-default navbar-fixed-top">'."\n";
            $oldfile .= '                   <ul class="nav navbar-nav">'."\n";
            $oldfile .= '                        <!-- l\'appel de {$url_base} vous permet de recupérer le chemin de votre site web  -->'."\n";

            foreach($this->views_list() as $key2=>$value2){
                $Entity = ucfirst(strtolower($value2['entname']));
                $oldfile .= '                        <li><a href="{$url_base}'.$Entity.'/index">Page '.$Entity.'</a></li>'."\n";

            }

            $oldfile .= '                        <li>  <a href="{$url_base}"> <img src="{$url_base}public/image/sitelogo.png" height="32" width="32" class="img-circle " /></i>Mon Site Web</a></li>'."\n";
            $oldfile .= '                   </ul>'."\n";
            $oldfile .= '                   <div class="thumbnail pull-right">'."\n";
            $oldfile .= '                         <a href="{$url_base}SM_Admin/index">'."\n";
            $oldfile .= '                            <img src="{$url_base}public/image/logo.jpg" height="64" width="64" class="img-circle " />'."\n";
            $oldfile .= '                            <div class="caption">'."\n";
            $oldfile .= '                               <p>Samane UI Manager</p>'."\n";
            $oldfile .= '                            </div>'."\n";
            $oldfile .= '                        </a>'."\n";
            $oldfile .= '                   </div>'."\n";

            $oldfile .= '               </div>'."\n";
            $oldfile .= '               <div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";
            $oldfile .= '                    <div class="panel panel-info">'."\n";
            $oldfile .= '                   	<div class="panel-heading">BIENVENUE A VOTRE MODELE MVC</div>'."\n";
            $oldfile .= '                    		<div class="panel-body">'."\n";

            $oldfile .= "\n\n";

            $oldfile .= $this->index_content_maker();

            $oldfile .= "\n\n";


            $oldfile .= '                    		</div>'."\n";
            $oldfile .= '                   	</div>'."\n";
            $oldfile .= '                    </div>'."\n";
            $oldfile .= '              </div>'."\n";

            $oldfile .= '          </body>'."\n";
            $oldfile .= '       </html>'."\n";


            $txt = $oldfile."\n";



            $dirpath='src/view/'.strtolower($viewname);
            if (!file_exists($dirpath)) {
                mkdir($dirpath, 0777, true);

            }
            $path=$dirpath."/index.html";
            //print_r($txt);
            $myfile = fopen($path, "w") or die("Unable to open file!");
            fwrite($myfile, $txt);
            fclose($myfile);


            return (!file_exists($path))?0:1;
        }
        return 0;
    }



    private  function deletefile($ent_dir) {
        //  array_map('unlink', glob("src/view/letest/*.*"));

        foreach($ent_dir  as  $valeur){
            //print_r($valeur);     echo '<hr/>';
          unlink($valeur);
            $ok= 1;
        }
        //rmdir('src/view/letest');
    }

    function delete_view_v1($viewname)
    {


        $ok= 0;
        foreach($this->views_list()  as $cle=>$valeur){


            if ($valeur['entname']===$viewname){

                if (file_exists($valeur['entpath'])) {
                    $ent_dir = glob($valeur['entpath'].'/*');
                    $this->deletefile($ent_dir);
                    //  echo $valeur['entname'].' : '.$entname.'<br>';
                    unlink($valeur['entpath']);
                    $ok= 1;
                }
            }
        }


        return $ok;
    }


    public function delete_view($viewname)
    {


        $ok= 0;
        foreach($this->views_list()  as $cle=>$valeur){


            if ($valeur['entname']===$viewname){

                if (file_exists($valeur['entpath'])) {
                    array_map('unlink', glob($valeur['entpath']."/*.*"));
                    rmdir($valeur['entpath']);
                    $ok= 1;
                }
            }
        }


        return $ok;
    }










    function add_content_maker0($viewname,$coltable,$idobj,$frgtabletab,$importab,$fridkeytab,$dbname)
    {



        $oldfile = '				<div class="row">'."\n";
        $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";

        $oldfile .= '               								{if isset($ok)}'."\n";
        $oldfile .= '               								{if $ok != 0}'."\n";
        $oldfile .= '                    								<div class="alert alert-success">Données ajoutées!</div>'."\n";
        $oldfile .= '               								{else}'."\n";
        $oldfile .= '                    								<div class="alert alert-danger">Erreur!</div>'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '                                      <form method="post" action="{$url_base}'.$viewname.'/add">'."\n";


        foreach($idobj as $key=>$value){

            $oldfile .= '                                                  <input class="form-control" type="hidden" name="'.$value.'" value="0" id="'.$value.'"/>'."\n";

        }
        $curencol='';

        foreach($coltable as $key=>$value){
            $i=0;

            foreach($importab as $key2=>$value2){
                if ($value==$value2){
                    $curencol=$value;
                    $fndb= new DatabaseManager();
                    $secondcolumn=$fndb->get_secondcolumn($dbname,$frgtabletab[$i]);


                    $oldfile .= '                                       <select name="'.$value.'" class="form-control champ" >'."\n";
                    $oldfile .= '                                                <option selected disabled>--Liste des '.$frgtabletab[$i].' --</option>'."\n";
                    $oldfile .= '                                                {foreach from=$'.strtolower($frgtabletab[$i]).'s item=champ}'."\n";
                    $oldfile .= '                                                <option value="{$champ[\''.$fridkeytab[$i].'\']}">{$champ[\''.$secondcolumn.'\']}  </option>'."\n";

                    $oldfile .= '                                               {/foreach}'."\n";
                    $oldfile .= '                                       </select>'."\n";

                    //print_r($value2);
                    //   echo $frgtabletab[$i].' => '.$fridkeytab[$i].' => '.$value2.' ====> '.$secondcolumn.'<br>';

                }
                $i++;


            }

            if ($curencol!=$value && $curencol!=$idobj[0]){

                $oldfile .= '                                        <div class="form-group">'."\n";
                $oldfile .= '                                                <label class="control-label">'.$value.' de '.$viewname.'</label>'."\n";
                $oldfile .= '                                                <input class="form-control" type="text" name="'.$value.'" id="'.$value.'"/>'."\n";
                $oldfile .= '                                       </div>'."\n";

                /* foreach($idobj as $key2=>$value2){
                     if ($value!=$value2){

                         $oldfile .= '                                        <div class="form-group">'."\n";
                         $oldfile .= '                                                <label class="control-label">'.$value.' de '.$viewname.'</label>'."\n";
                         $oldfile .= '                                                <input class="form-control" type="text" name="'.$value.'" id="'.$value.'"/>'."\n";
                         $oldfile .= '                                       </div>'."\n";

                     }
                 }*/


                //  echo $key.' => '.$value.'<br>';

            }else{
                $curencol='';
            }
        }



        $oldfile .= "\n\n".'                                              <div class="form-group">'."\n";
        $oldfile .= '                                                      <input class="btn btn-success" type="submit" name="valider" value="Envoyer"/>'."\n";
        $oldfile .= '                                                      <input class="btn btn-danger" type="reset" name="annuler" value="Annuler"/>'."\n";
        $oldfile .= '                                              </div>'."\n\n";


        $oldfile .= '                                      </form>'."\n";
        $oldfile .= '					</div> '."\n";
        $oldfile .= '				</div>'."\n";

        return $oldfile;
    }

    function edit_content_maker0($viewname,$coltable,$idobj,$frgtabletab,$importab,$fridkeytab,$dbname)
    {



        $oldfile = '				<div class="row">'."\n";
        $oldfile .= '					<div class="col-md-8 col-xs-12 col-md-offset-2" style="margin-top:150px;">'."\n";

        $oldfile .= '               								{if isset($ok)}'."\n";
        $oldfile .= '               								{if $ok != 0}'."\n";
        $oldfile .= '                    								<div class="alert alert-success">Données ajoutées!</div>'."\n";
        $oldfile .= '               								{else}'."\n";
        $oldfile .= '                    								<div class="alert alert-danger">Erreur!</div>'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '               								{/if}'."\n";
        $oldfile .= '                                      <form method="post" action="{$url_base}'.$viewname.'/add">'."\n";


        foreach($idobj as $key=>$value){

            $oldfile .= '                                                  <input class="form-control" type="hidden" name="'.$value.'" value="'.$value.'" id="'.$value.'"/>'."\n";

        }
        $curencol='';

        foreach($coltable as $key=>$value){
            $i=0;

            foreach($importab as $key2=>$value2){
                if ($value==$value2){
                    $curencol=$value;
                    $fndb= new DatabaseManager();
                    $secondcolumn=$fndb->get_secondcolumn($dbname,$frgtabletab[$i]);


                    $oldfile .= '                                       <select name="'.$value.'" class="form-control champ" >'."\n";
                    $oldfile .= '                                                <option selected value="{$champ[\''.$value.'\']}">'.$frgtabletab[$i].' {$champ[\''.$value.'\']}  </option>'."\n";
                    $oldfile .= '                                                {foreach from=$'.strtolower($frgtabletab[$i]).'s item=champ}'."\n";
                    $oldfile .= '                                                <option value="{$champ[\''.$fridkeytab[$i].'\']}">{$champ[\''.$secondcolumn.'\']}  </option>'."\n";

                    $oldfile .= '                                               {/foreach}'."\n";
                    $oldfile .= '                                       </select>'."\n";

                    //print_r($value2);
                    //   echo $frgtabletab[$i].' => '.$fridkeytab[$i].' => '.$value2.' ====> '.$secondcolumn.'<br>';

                }
                $i++;


            }

            if ($curencol!=$value){
                $oldfile .= '                   <div class="form-group">'."\n";
                $oldfile .= '                  <label class="control-label">'.$value.' de '.$viewname.'</label>'."\n";
                $oldfile .= '                   <input class="form-control" readonly type="text" name="'.$value.'" id="'.$value.'" value="{if isset($champ)} {$champ[\''.$value.'\']} {/if}"/>'."\n";
                $oldfile .= '                  </div>'."\n";


                //  echo $key.' => '.$value.'<br>';

            }else{
                $curencol='';
            }
        }





        $oldfile .= "\n\n".'                                              <div class="form-group">'."\n";
        $oldfile .= '                                                         <input class="btn btn-success" type="submit" name="modifier" value="Modifier"/>'."\n";
        $oldfile .= '                                                         <a class="btn btn-info" href="{$url_base}'.$viewname.'/liste">Retour</a>'."\n";
        $oldfile .= '                                                     </div>'."\n";

        $oldfile .= '                                      </form>'."\n";

        $oldfile .= '					</div> '."\n";
        $oldfile .= '				</div>'."\n";

        return $oldfile;
    }





























}