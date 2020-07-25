function IdentPERSO(Obj){ return (document.all)?document.all[Obj]:document.getElementById(Obj); } // IdentPERSOification d'objet lib_js_1

function SearchNbChamp2(){
    var a=0; while(Champ2Design=IdentPERSO('Champ2Design_'+a)){ a++; } return a;} // Trouve le nombre de Champ2s à calculer


function PUTIT1(){ // Retourne le nombre au format 2 chiffres après la virgule
    var AUTOINCREMENT=Ident('AUTOINCREMENTF1'), INCREMENT=Ident('INCREMENT1'), lettrPRO=Ident('valTotalTTC_stand');
    // Définition des variables
    var a=0, b=SearchNbChamp2(), valueSousTotal=0;
    var Numbr=IdentPERSO('lignenombre');
    Numbr.value=b;
    AUTOINCREMENT.value=parseInt(INCREMENT.value);
}



function LeformatChamp2(nombre){ // Retourne le nombre au format 2 chiffres après la virgule
    var num_string=Math.abs(Math.round(nombre*100)).toString();
    var moin=nombre<0?"-":"";
    var pos=num_string.length-2;
    var chiffre="."+num_string.substr(pos);
    if(nombre==0) return "0.00";
    if(nombre > -1 && nombre < 1) return moin+"0"+chiffre;
    while(pos>3){ pos=pos-3; chiffre=","+num_string.substr(pos,3)+chiffre; }
    return moin+num_string.substring(0,pos)+chiffre;
}

function monCalcul(){ // Calucule Les valeurs
    // Définition des variables
    var a=0, b=SearchNbChamp2(), valueSousTotal=0;
    var valTotalHT=IdentPERSO('valTotalHT_stand'), valTVA=IdentPERSO('valTVA_stand'), valTotalTTC=IdentPERSO('valTotalTTC_stand'),TVARETURN2=IdentPERSO('valueTVARETURN2');
    var Champ2TarifHT, Champ2Qte, Champ2Result;
    for(a; a<b; a++){
        Champ2TarifHT=IdentPERSO('Champ2TarifHT_'+a).value;
        IdentPERSO('Champ2TarifHT_'+a).value=(Champ2TarifHT);
        Champ2Qte=IdentPERSO('Champ2Qte_'+a).value;
        IdentPERSO('Champ2Qte_'+a).value=(Champ2Qte);
        Champ2Result=IdentPERSO('Champ2Result_'+a);
        Champ2Result.value=(Champ2TarifHT*Champ2Qte);
        valueSousTotal=valueSousTotal + (Champ2TarifHT*Champ2Qte);


    }
    var tvaTotaTVATPM;
    tvaTotaTVATPM=((valueSousTotal*valTVA.value)/100);
    valTotalHT.value=(valueSousTotal);
    var tvaTotaTVA=parseInt(tvaTotaTVATPM),valueTotaTASX=parseInt(valueSousTotal);
    valTotalTTC.value=(tvaTotaTVA+valueTotaTASX);
    TVARETURN2.value=parseInt(tvaTotaTVA);
    $('#ligne').val(b);
    LeConvetisseur();

}

function suprLine(where){ // Fonction de suppression de ligne
    var a=0, b=SearchNbChamp2(), c='', d='', e=0;
    var Champ2Design, Champ2TarifHT, Champ2Qte, Champ2Result,Champ2Condis;

    for(a; a<b; a++){
        Champ2Design=IdentPERSO('Champ2Design_'+a).value;
        Champ2TarifHT=IdentPERSO('Champ2TarifHT_'+a).value;
        Champ2Qte=IdentPERSO('Champ2Qte_'+a).value;
        Champ2Result=IdentPERSO('Champ2Result_'+a).value;
        Champ2Condis=IdentPERSO('Champ2Condis_'+a).value;
        if(a!=where){
            c='<td><input type="text" name="nom_'+e+'" id="Champ2Design_'+e+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /></td>'+"\n";
            c+='<td><input type="text" name="condis_'+e+'"id="Champ2Condis_'+e+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control" /></td>'+"\n";
            c+='<td><input type="text" name="prix_'+e+'" id="Champ2TarifHT_'+e+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" /></td>'+"\n";
            c+='<td><input type="text" name="qnte_'+e+'" id="Champ2Qte_'+e+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" /></td>'+"\n";
            c+='<td><input type="text" name="ptotal_'+e+'" id="Champ2Result_'+e+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control" /></td>'+"\n";
            if(a==b-1 || e==b-2){
                c+='<td><input type="button" value="Suppr." onclick="suprLine('+e+')" class="INPUTFACT" /></td>'+"\n";
            }else{
                c+='<td><input type="button" value="Suppr." onclick="suprLine('+e+')" class="INPUTFACT" /></td>'+"\n";
            }
            d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
            e++;
        }else{
            e=a;
        }
    }
    IdentPERSO('manligneCalcul').innerHTML=d;
    monCalcul();
}

function ajoutLine(){ // Fonction d'ajout de ligne
    var a=0, b=SearchNbChamp2(), c='', d='';
    var Champ2Design, Champ2TarifHT, Champ2Qte, Champ2Result,Champ2Condis;

    for(a; a<b; a++){
        Champ2Design=IdentPERSO('Champ2Design_'+a).value;
        Champ2TarifHT=IdentPERSO('Champ2TarifHT_'+a).value;
        Champ2Qte=IdentPERSO('Champ2Qte_'+a).value;
        Champ2Result=IdentPERSO('Champ2Result_'+a).value;
        Champ2Condis=IdentPERSO('Champ2Condis_'+a).value;


        c='<td><input type="text" name="nom_'+a+'" id="Champ2Design_'+a+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /></td>'+"\n";
        c+='<td><input type="text" name="condis_'+a+'" id="Champ2Condis_'+a+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control"  /></td>'+"\n";
        c+='<td><input type="text" name="prix_'+a+'" id="Champ2TarifHT_'+a+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" /></td>'+"\n";
        c+='<td><input type="text" name="qnte_'+a+'" id="Champ2Qte_'+a+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" /></td>'+"\n";
        c+='<td><input type="text" name="ptotal_'+a+'" id="Champ2Result_'+a+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control"/></td>'+"\n";
        c+='<td><input type="button" value="Suppr." onclick="suprLine('+a+')" class="INPUTFACT" /></td>'+"\n";
        d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
    }

    c='';
    c+='<td><input type="text" name="nom_'+a+'" id="Champ2Design_'+a+'" value="" style="text-align:left;" class="form-control"  /></td>'+"\n";
    c+='<td><input type="text" name="condis_'+a+'" id="Champ2Condis_'+a+'" value="" style="text-align:left;" class="form-control"   /></td>'+"\n";
    c+='<td><input type="text" name="prix_'+a+'" id="Champ2TarifHT_'+a+'" value="0" style="text-align:right;" class="form-control" /></td>'+"\n";
    c+='<td><input type="text" name="qnte_'+a+'" id="Champ2Qte_'+a+'" value="1.00" style="text-align:right;" class="form-control" /></td>'+"\n";
    c+='<td><input type="text" name="ptotal_'+a+'"id="Champ2Result_'+a+'" value="0" style="text-align:right;" class="form-control" /></td>'+"\n";
    c+='<td><input type="button" value="Suppr." onclick="suprLine('+a+')" class="INPUTFACT" /><input type="button" value="Ajouter" onclick="ajoutLine()" class="INPUTFACT" /></td>'+"\n";
    d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";


    IdentPERSO('manligneCalcul').innerHTML=d;
    monCalcul();
}











/*   *******************************************************************************************************************************************
 ******************************************************************************************************************************************/

/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/

/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/
/************************************************************************************************************************************************************/






function IdentPERSO2(Obj){ return (document.all)?document.all[Obj]:document.getElementById(Obj); } // IdentPERSO2ification d'objet lib_js_1

function SearchNbChamp2(){
    var a=0; while(Champ2Design=IdentPERSO2('Champ2Design_'+a)){ a++; } return a;} // Trouve le nombre de Champ2s à calculer


function PUTIT1(){ // Retourne le nombre au format 2 chiffres après la virgule
    var AUTOINCREMENT=Ident('AUTOINCREMENTF1'), INCREMENT=Ident('INCREMENT1'), lettrPRO=Ident('valTotalTTC_stand');
// Définition des variables
    var a=0, b=SearchNbChamp2(), valueSousTotal=0;
    var Numbr=IdentPERSO2('lignenombre');
    Numbr.value=b;
    AUTOINCREMENT.value=parseInt(INCREMENT.value);
}



function LeformatChamp2(nombre){ // Retourne le nombre au format 2 chiffres après la virgule
    var num_string=Math.abs(Math.round(nombre*100)).toString();
    var moin=nombre<0?"-":"";
    var pos=num_string.length-2;
    var chiffre="."+num_string.substr(pos);
    if(nombre==0) return "0.00";
    if(nombre > -1 && nombre < 1) return moin+"0"+chiffre;
    while(pos>3){ pos=pos-3; chiffre=","+num_string.substr(pos,3)+chiffre; }
    return moin+num_string.substring(0,pos)+chiffre;
}

function monCalcul2(){ // Calucule Les valeurs
// Définition des variables
    var a=0, b=SearchNbChamp2(), valueSousTotal=0;
    var valTotalHT=IdentPERSO2('valTotalHT_stand'), valTVA=IdentPERSO2('valTVA_stand'), valTotalTTC=IdentPERSO2('valTotalTTC_stand'),TVARETURN2=IdentPERSO2('valueTVARETURN2');
    var Champ2TarifHT, Champ2Qte, Champ2Result;
    for(a; a<b; a++){
        Champ2TarifHT=IdentPERSO2('Champ2TarifHT_'+a).value;
        IdentPERSO2('Champ2TarifHT_'+a).value=(Champ2TarifHT);
        Champ2Qte=IdentPERSO2('Champ2Qte_'+a).value;
        IdentPERSO2('Champ2Qte_'+a).value=(Champ2Qte);
        Champ2Result=IdentPERSO2('Champ2Result_'+a);
        Champ2Result.value=(Champ2TarifHT*Champ2Qte);
        valueSousTotal=valueSousTotal + (Champ2TarifHT*Champ2Qte);


    }
    var tvaTotaTVATPM;
    tvaTotaTVATPM=((valueSousTotal*valTVA.value)/100);
    valTotalHT.value=(valueSousTotal);
    var tvaTotaTVA=parseInt(tvaTotaTVATPM),valueTotaTASX=parseInt(valueSousTotal);
    valTotalTTC.value=(tvaTotaTVA+valueTotaTASX);
    TVARETURN2.value=parseInt(tvaTotaTVA);
    $('#ligne').val(b);
    LeConvetisseur();

}

function suprLine2(where){ // Fonction de suppression de ligne
    var a=0, b=SearchNbChamp2(), c='', d='', e=0;
    var Champ2Design, Champ2TarifHT, Champ2Qte, Champ2Result,Champ2Condis, Champ2Idf, Champ2Idp,Champ2Row;

    for(a; a<b; a++){
        Champ2Design=IdentPERSO2('Champ2Design_'+a).value;
        Champ2TarifHT=IdentPERSO2('Champ2TarifHT_'+a).value;
        Champ2Qte=IdentPERSO2('Champ2Qte_'+a).value;
        Champ2Result=IdentPERSO2('Champ2Result_'+a).value;
        Champ2Condis=IdentPERSO2('Champ2Condis_'+a).value;
        Champ2Idf=IdentPERSO2('Champ2Idf_'+a).value;
        Champ2Idp=IdentPERSO2('Champ2Idp_'+a).value;
        Champ2Row=IdentPERSO2('Champ2Row_'+a).value;
        if(a!=where){
            c='<td><input type="text" name="nom_'+e+'" id="Champ2Design_'+e+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /><input type="hidden" name="idp_'+e+'" id="Champ2Idp_'+e+'" value="'+Champ2Idp+'"   required ></td>'+"\n";
            c+='<td><input type="text" name="condis_'+e+'" id="Champ2Condis_'+e+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control"  /><input type="hidden" name="idfac_'+e+'" id="Champ2Idf_'+e+'" value="'+Champ2Idf+'"   required ></td>'+"\n";
            c+='<td><input type="text" name="prix_'+e+'" id="Champ2TarifHT_'+e+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" /><input type="hidden" name="idfac_'+e+'" id="Champ2Row_'+e+'" value="'+Champ2Row+'"   required ></td>'+"\n";
            c+='<td><input type="text" name="qnte_'+e+'" id="Champ2Qte_'+e+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" /></td>'+"\n";
            c+='<td><input type="text" name="ptotal_'+e+'" id="Champ2Result_'+e+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control"/></td>'+"\n";
            if(a==b-1 || e==b-2){
                c+='<td><input type="button" value="Suppr." onclick="suprLine2('+e+')" class="INPUTFACT" /></td>'+"\n";
            }else{
                c+='<td><input type="button" value="Suppr." onclick="suprLine2('+e+')" class="INPUTFACT" /></td>'+"\n";
            }
            d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
            e++;
        }else{
            e=a;
        }
    }
    IdentPERSO2('manligneCalcul').innerHTML=d;
    monCalcul2();
}

function ajoutLine2(){ // Fonction d'ajout de ligne
    var a=0, b=SearchNbChamp2(), c='', d='';
    var Champ2Design, Champ2TarifHT, Champ2Qte, Champ2Result,Champ2Condis, Champ2Idf, Champ2Idp,Champ2Row;

    for(a; a<b; a++){
        Champ2Design=IdentPERSO2('Champ2Design_'+a).value;
        Champ2TarifHT=IdentPERSO2('Champ2TarifHT_'+a).value;
        Champ2Qte=IdentPERSO2('Champ2Qte_'+a).value;
        Champ2Result=IdentPERSO2('Champ2Result_'+a).value;
        Champ2Condis=IdentPERSO2('Champ2Condis_'+a).value;
        Champ2Idf=IdentPERSO2('Champ2Idf_'+a).value;
        Champ2Idp=IdentPERSO2('Champ2Idp_'+a).value;
        Champ2Row=IdentPERSO2('Champ2Row_'+a).value;


        c='<td><input type="text" name="nom_'+a+'" id="Champ2Design_'+a+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /><input type="hidden" name="idp_'+a+'" id="Champ2Idp_'+a+'" value="'+Champ2Idp+'"   required ></td>'+"\n";
        c+='<td><input type="text" name="condis_'+a+'" id="Champ2Condis_'+a+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control"  /><input type="hidden" name="idfac_'+a+'" id="Champ2Idf_'+a+'" value="'+Champ2Idf+'"   required ></td>'+"\n";
        c+='<td><input type="text" name="prix_'+a+'" id="Champ2TarifHT_'+a+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" /><input type="hidden" name="idfac_'+a+'" id="Champ2Row_'+a+'" value="'+Champ2Row+'"   required ></td>'+"\n";
        c+='<td><input type="text" name="qnte_'+a+'" id="Champ2Qte_'+a+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" /></td>'+"\n";
        c+='<td><input type="text" name="ptotal_'+a+'" id="Champ2Result_'+a+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control"/></td>'+"\n";
        c+='<td><input type="button" value="Suppr." onclick="suprLine2('+a+')" class="INPUTFACT" /></td>'+"\n";
        d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";
    }

    c='';
    c+='<td><input type="text" name="nom_'+a+'" id="Champ2Design_'+a+'" value="'+Champ2Design+'" style="text-align:left;" class="form-control" /><input type="hidden" name="idp_'+a+'" id="Champ2Idp_'+a+'" value="'+Champ2Idp+'"   required ></td>'+"\n";
    c+='<td><input type="text" name="condis_'+a+'" id="Champ2Condis_'+a+'" value="'+Champ2Condis+'" style="text-align:left;" class="form-control"  /><input type="hidden" name="idfac_'+a+'" id="Champ2Idf_'+a+'" value="'+Champ2Idf+'"   required ></td>'+"\n";
    c+='<td><input type="text" name="prix_'+a+'" id="Champ2TarifHT_'+a+'" value="'+Champ2TarifHT+'" style="text-align:right;" class="form-control" /><input type="hidden" name="idfac_'+a+'" id="Champ2Row_'+a+'" value="'+Champ2Row+'"   required ></td>'+"\n";
    c+='<td><input type="text" name="qnte_'+a+'" id="Champ2Qte_'+a+'" value="'+Champ2Qte+'" style="text-align:right;" class="form-control" /></td>'+"\n";
    c+='<td><input type="text" name="ptotal_'+a+'" id="Champ2Result_'+a+'" value="'+Champ2Result+'" style="text-align:right;" class="form-control"/></td>'+"\n";
    c+='<td><input type="button" value="Suppr." onclick="suprLine2('+a+')" class="INPUTFACT" /></td>'+"\n";
    d+='<tr>'+"\n"+c+"\n"+'</tr>'+"\n";


    IdentPERSO2('manligneCalcul').innerHTML=d;
    monCalcul2();
}