


<?php
//$id=0;$cni=0;$prenom=0;$nom=0;$login=0;$sexe=0;$poste=0;$salaire=0;$statut=0;$daten=0;$datem=0;$secu=0;$passe=0;$adresse=0;$email=0;$tel=0;$userpic=0;$info=0;$cacher=0;
function testechouser($id,$cni,$prenom,$nom,$login,$sexe,$poste,$salaire,$statut,$daten,$datem,$secu,$passe,$adresse,$email,$tel,$userpic,$info,$cacher)

{
    echo $id.' nom=> '.$nom.' prenom=> '.$prenom.' sex=> '.$sexe.' => ne le '.$daten.'=> tel:'.$tel.
        '<hr/> img= '.$userpic.' cni=> '.$cni.'<hr/>'.
        ' secu=> '.$secu.' post=> '.$poste.' sal=> '.$salaire.'=> pri le '.$datem.' par=> '.$cacher.'<hr/>'.
        'adres => '.$adresse.' email=> '.$email.' pass=> '.$passe.' stat=> '.$statut.' log=> '.$login.' info=> '.$info.'<hr/> ';

}
//$idmv=0; $idp=0; $idfaM=0; $pu=0; $qnt=0; $mts=0;$nommv=0; $date=0; $i=0; $fdesi=0; $fcondis=0; $achat=0; $vente=0;
function testechofac($idmv, $idp, $idfaM, $pu, $qnt, $mts,$nommv, $date, $i, $fdesi, $fcondis, $achat, $vente)
{
    echo ' idp=> '.$idp.' nom=> '.$fdesi.' cond=> '.$fcondis.' => ligne '.$i.'=> idf:'.$idfaM.
        '<hr/>  pu=> '.$pu.' qnt=> '.$qnt.' mts=>  '.$mts.
        'idmv => '.$idmv.' type=> '.$nommv.' date=> '.$date.' achat=> '.$achat.' vente=> '.$vente.' famille=> '.$idfaM.'<hr/> ';

}
//$idmv=0; $idp=0; $idfaM=0; $pu=0; $qnt=0; $mts=0;$nommv=0; $date=0; $i=0; $fdesi=0; $fcondis=0; $achat=0; $vente=0;
function testechofac2($idmv, $idp, $idfaM, $pu, $qnt, $qntI,$qntF, $mts,$mtsI,$mtsF,$nommv, $date, $i, $fdesi, $fcondis,$ndep, $ngain, $fDEPENSE, $fGAINS,$fdepCS, $fgainsCS,$fstockCS, $desif, $ndepCS, $ngainCS, $nstockCS)

{

    echo ' idp=> '.$idp.' nom=> '.$fdesi.' cond=> '.$fcondis.' => ligne '.$i.'=> idf:'.$idfaM.
        '<hr/>  pu=> '.$pu.' qnt=> '.$qnt.' qntI=> '.$qntI.' qntF=> '.$qntF.' mts=>  '.$mts.' mtsI=>  '.$mtsI.' mtsF=>  '.$mtsF.
        '<hr/>  gainI : '.$fGAINS.' gainN=> '.$ngain.' depI :  '.$fDEPENSE.' depN=>  '.$ndep.
        '<hr/> '.$desif.' SCgainI : '.$fgainsCS.' SCgainN=> '.$ngainCS.' SCdepI :  '.$fdepCS.' SCdepN=>  '.$ndepCS.' stockI :  '.$fstockCS.' stockN=>  '.$nstockCS.
        '<hr/>idmv => '.$idmv.' type=> '.$nommv.' date=> '.$date.' famille=> '.$idfaM.'<hr/> ';

}
//$idmv=0;$idcom=0;$nommv=0;$date=0;$obj=0;$cont=0;$totalht=0;$tva=0;$mtsch=0;$mtsltr=0;$reg=0;$avans=0;$reste=0;$cacher=0;
function testechomuv($idmv,$idcom,$nommv,$date,$obj,$cont,$totalht,$tva,$mtsch,$mtsltr,$reg,$avans,$reste,$cacher,$opt)
{
    echo $opt.'<hr/><hr/>id :  '.$idmv.' type=> '.$nommv.' => fait le '.$date.'=> par:'.$idcom.
        '<hr/> obj= '.$obj.'<hr/> cnt=> '.$cont.'<hr/>'.
        'tht => '.$totalht.' tva=> '.$tva.' ttc=> '.$mtsch.' ltr=> '.$mtsltr.' reg=> '.$reg.' avans=> '.$avans.' reste=> '.$reste.'<hr/> '.$cacher;

}
//$idp=0;$idf=0;$idc=0;$idcat=0;$desi=0;$img=0;$pa=0;$pv=0;$fiche=0;$color=0;$vente=0;$achat=0;
function testechopro($idp,$idf,$idc,$idcat,$desi,$img,$pa,$pv,$fiche,$color,$vente,$achat)
{
    echo
        '<hr/> idfa=> '.$idf.' desi=> '.$desi.'=> color'.$color.
        '<hr/> idcat => '.$idcat.' noncat=> '.$desi.' color=> '.$color.' achat=> '.$achat.' vente=> '.$vente.
        '<hr/> idpro=> '.$idp.' nom=> '.$desi.' img=> '.$img.' prixa=> '.$pa.'=> prixv:'.$pv.'=> fiche:'.$fiche.
        '<hr/> idc=> '.$idc.' nomc= '.$desi;

}
function testeserv($objet,$id,$ninea,$nom,$sigle,$emmail,$tel,$adress,$secteur_E,$type,$ca,$logo)
{
    echo
        '<hr/> $objet=> '.$objet.' desi=> '.$nom.'=> $sigle '.$sigle.
        '<hr/> $id => '.$id.' $ninea=> '.$ninea.' $emmail=> '.$emmail.' $tel=> '.$tel.' $adress=> '.$adress.
        '<hr/> $secteur_E=> '.$secteur_E.' $type=> '.$type.' $ca=> '.$ca.' $logo=> '.$logo;

}

function testeetat($idfa,$idmv,$dep,$gain,$stock,$date)
{
    echo
        '<hr/> $idfa=> '.$idfa.' $idmv=> '.$idmv.'=> $date '.$date.
        '<hr/> $dep=> '.$dep.' $gain=> '.$gain.' $stock=> '.$stock;

}

function testecat($id,$nom,$idf,$ach,$vent,$compt)
{
    echo
        '<hr/> id=> '.$id.' desi=> '.$nom.'=> famille '.$idf.
        '<hr/> achat => '.$ach.' vente=> '.$vent.' compta=> '.$compt.'<hr/><br/>';

}