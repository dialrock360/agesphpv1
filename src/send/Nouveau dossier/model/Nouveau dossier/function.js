
function formatChamp(nombre){ // Retourne le nombre au format 2 chiffres après la virgule
    var num_string=Math.abs(Math.round(nombre*100)).toString();
    var moin=nombre<0?"-":"";
    var pos=num_string.length-2;
    var chiffre="."+num_string.substr(pos);
    if(nombre==0) return "0.00";
    if(nombre > -1 && nombre < 1) return moin+"0"+chiffre;
    while(pos>3){ pos=pos-3; chiffre=","+num_string.substr(pos,3)+chiffre; }
    return moin+num_string.substring(0,pos)+chiffre;
}

function calculPoid(champ){ // Calucule Les valeurs
    // Définition des variables
    var a=0, b=findNbChamp(), valueSousTotal=0;
    var ChampTarifHT, ChampQte, ChampResult;

    ChampResult=champ.value;
    if(isNaN(ChampResult) || ChampResult < 2 || ChampResult > 250)
    {
        $('div.error').fadeIn('fast');
        surligne(champ, true);
        return false;
    }
    else
    {

        Ident('ChampResult_'+a).value=formatChamp(ChampResult)+(" Kg");
        $('div.error').fadeOut('fast');
        surligne(champ, false);
        return true;
    }

}
function calcultaill(champ){ // Calucule Les valeurs
    // Définition des variables
    var a=0, b=findNbChamp(), valueSousTotal=0;
    var ChampTarifHT, ChampQte, ChampResult;

    ChampTarifHT=champ.value;
    if(isNaN(ChampTarifHT) || ChampTarifHT < 0 || ChampTarifHT > 2.5)
    {
        $('div.errorTAILLE').fadeIn('fast');
        surligne(champ, true);
        return false;
    }
    else
    {

        Ident('ChampTarifHT_'+a).value=formatChamp(ChampTarifHT)+(" m");
        $('div.errorTAILLE').fadeOut('fast');
        surligne(champ, false);
        return true;
    }

}
/*********************************************************************************************************SELET_ALLLLLLLLLLLLLLLLLLLLLLLLùùùùùùùùùùùùùùùùùù********************************/

// JavaScript Document
/****************************************************************************

 ________________________________________________________________________ *
 About :	Convertit jusqu'à 999 999 999 999 999 (billion) *
 avec respect des accords *
 /*/


function Unite( nombre ){
    var unite;
    switch( nombre ){
        case 0: unite = "zéro";		break;
        case 1: unite = "un";		break;
        case 2: unite = "deux";		break;
        case 3: unite = "trois"; 	break;
        case 4: unite = "quatre"; 	break;
        case 5: unite = "cinq"; 	break;
        case 6: unite = "six"; 		break;
        case 7: unite = "sept"; 	break;
        case 8: unite = "huit"; 	break;
        case 9: unite = "neuf"; 	break;
    }//fin switch
    return unite;
}//-----------------------------------------------------------------------

function Dizaine( nombre ){
    switch( nombre ){
        case 10: dizaine = "dix"; break;
        case 11: dizaine = "onze"; break;
        case 12: dizaine = "douze"; break;
        case 13: dizaine = "treize"; break;
        case 14: dizaine = "quatorze"; break;
        case 15: dizaine = "quinze"; break;
        case 16: dizaine = "seize"; break;
        case 17: dizaine = "dix-sept"; break;
        case 18: dizaine = "dix-huit"; break;
        case 19: dizaine = "dix-neuf"; break;
        case 20: dizaine = "vingt"; break;
        case 30: dizaine = "trente"; break;
        case 40: dizaine = "quarante"; break;
        case 50: dizaine = "cinquante"; break;
        case 60: dizaine = "soixante"; break;
        case 70: dizaine = "soixante-dix"; break;
        case 80: dizaine = "quatre-vingt"; break;
        case 90: dizaine = "quatre-vingt-dix"; break;
    }//fin switch
    return dizaine;
}//-----------------------------------------------------------------------

function NumberToLetter( nombre ){
    var i, j, n, quotient, reste, nb ;
    var ch
    var numberToLetter='';
    //__________________________________

    if(  nombre.toString().replace( / /gi, "" ).length > 15  )	return "dépassement de capacité";
    if(  isNaN(nombre.toString().replace( / /gi, "" ))  )		return "Nombre non valide";

    nb = parseFloat(nombre.toString().replace( / /gi, "" ));
    if(  Math.ceil(nb) != nb  )	return  "Nombre avec virgule non géré.";

    n = nb.toString().length;
    switch( n ){
        case 1: numberToLetter = Unite(nb); break;
        case 2: if(  nb > 19  ){
            quotient = Math.floor(nb / 10);
            reste = nb % 10;
            if(  nb < 71 || (nb > 79 && nb < 91)  ){
                if(  reste == 0  ) numberToLetter = Dizaine(quotient * 10);
                if(  reste == 1  ) numberToLetter = Dizaine(quotient * 10) + "-et-" + Unite(reste);
                if(  reste > 1   ) numberToLetter = Dizaine(quotient * 10) + "-" + Unite(reste);
            }else numberToLetter = Dizaine((quotient - 1) * 10) + "-" + Dizaine(10 + reste);
        }else numberToLetter = Dizaine(nb);
            break;
        case 3: quotient = Math.floor(nb / 100);
            reste = nb % 100;
            if(  quotient == 1 && reste == 0   ) numberToLetter = "cent";
            if(  quotient == 1 && reste != 0   ) numberToLetter = "cent" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0    ) numberToLetter = Unite(quotient) + " cents";
            if(  quotient > 1 && reste != 0    ) numberToLetter = Unite(quotient) + " cent " + NumberToLetter(reste);
            break;
        case 4 :  quotient = Math.floor(nb / 1000);
            reste = nb - quotient * 1000;
            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
            break;
        case 5 :  quotient = Math.floor(nb / 1000);
            reste = nb - quotient * 1000;
            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
            break;
        case 6 :  quotient = Math.floor(nb / 1000);
            reste = nb - quotient * 1000;
            if(  quotient == 1 && reste == 0   ) numberToLetter = "mille";
            if(  quotient == 1 && reste != 0   ) numberToLetter = "mille" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0    ) numberToLetter = NumberToLetter(quotient) + " mille";
            if(  quotient > 1 && reste != 0    ) numberToLetter = NumberToLetter(quotient) + " mille " + NumberToLetter(reste);
            break;
        case 7: quotient = Math.floor(nb / 1000000);
            reste = nb % 1000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
            break;
        case 8: quotient = Math.floor(nb / 1000000);
            reste = nb % 1000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
            break;
        case 9: quotient = Math.floor(nb / 1000000);
            reste = nb % 1000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un million";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un million" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " millions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " millions " + NumberToLetter(reste);
            break;
        case 10: quotient = Math.floor(nb / 1000000000);
            reste = nb - quotient * 1000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
            break;
        case 11: quotient = Math.floor(nb / 1000000000);
            reste = nb - quotient * 1000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
            break;
        case 12: quotient = Math.floor(nb / 1000000000);
            reste = nb - quotient * 1000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un milliard";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un milliard" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " milliards";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " milliards " + NumberToLetter(reste);
            break;
        case 13: quotient = Math.floor(nb / 1000000000000);
            reste = nb - quotient * 1000000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
            break;
        case 14: quotient = Math.floor(nb / 1000000000000);
            reste = nb - quotient * 1000000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
            break;
        case 15: quotient = Math.floor(nb / 1000000000000);
            reste = nb - quotient * 1000000000000;
            if(  quotient == 1 && reste == 0  ) numberToLetter = "un billion";
            if(  quotient == 1 && reste != 0  ) numberToLetter = "un billion" + " " + NumberToLetter(reste);
            if(  quotient > 1 && reste == 0   ) numberToLetter = NumberToLetter(quotient) + " billions";
            if(  quotient > 1 && reste != 0   ) numberToLetter = NumberToLetter(quotient) + " billions " + NumberToLetter(reste);
            break;
    }//fin switch
    /*respect de l'accord de quatre-vingt*/
    if(  numberToLetter.substr(numberToLetter.length-"quatre-vingt".length,"quatre-vingt".length) == "quatre-vingt"  ) numberToLetter = numberToLetter + "s";

    return numberToLetter;
}//-----------------------------------------------------------------------


/*

$('#BING').click(function(e){

    e.preventDefault();
    var userEntry=  $('#valTotalTTC_stand').val();
    userEntry=$.trim(userEntry);
    $('#lettrSTAND').val(NumberToLetter(parseInt(userEntry, 10)));

});
*/

$('.Avance').keyup(function(e){

    e.preventDefault();
    var a=  $('#valTotalTTC_stand').val();
    var b=  $('.Avance').val();
    var userEntry=a-b;
    $('.Reste').val(userEntry);

});

function convertFunction() {
    var a=  $('#valTotalTTC_stand').val();
    var b=  $('.Avance').val();
    var userEntry=a-b;
    $('.Reste').val(userEntry);
}














    $('#MontanDesign_0').keyup(function(){
        var userEntry= $(this).val();
        userEntry=$.trim(userEntry);
        var element =($('#lettr').val(NumberToLetter(parseInt(userEntry, 10))));
        $('#lettr').text(element);
    });
    $(document).ready(function(){
        var userEntry= $('#valTotalTTC').val();
        userEntry=$.trim(userEntry);
        var element =($('.lettr').val(NumberToLetter(parseInt(userEntry, 10))));
        $('#lettr').text(element);

    });
