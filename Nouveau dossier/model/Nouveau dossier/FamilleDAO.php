<?php
/**
 * Created by PhpStorm.
 * User: D
 * Date: 03/03/2018
 * Time: 08:50
 */
function colorFnam($code){

    if ($code=='#FFFFFF' || $code=='#fffff') {$nom='Vide';}
    if ($code=='#F5F5DC') {$nom='Belge';}
    if ($code=='#0000FF') {$nom='Bleu';}
    if ($code=='#00CED1') {$nom='Bleu Claire';}
    if ($code=='#1E90FF') {$nom='Bleu Ciel';}
    if ($code=='#00FFFF') {$nom='Bleu Marin';}
    if ($code=='#BDB76B') {$nom='Dnaki';}
    if ($code=='#708090') {$nom='Gris';}
    if ($code=='#FFFF33') {$nom='Jaune';}
    if ($code=='#8B4513') {$nom='Maron';}
    if ($code=='#CD853F') {$nom='Maron Claire';}
    if ($code=='#000000') {$nom='Noir';}
    if ($code=='#FFD700') {$nom='Orange';}
    if ($code=='#FF4500') {$nom='Orange Foncé';}
    if ($code=='#FF33CC') {$nom='Rose';}
    if ($code=='#FF3399') {$nom='Rose  Claire';}
    if ($code=='#FF69B4') {$nom='Rose Sombre';}
    if ($code=='#FF1493') {$nom='Rose Vif';}
    if ($code=='#FF0000') {$nom='Rouge';}
    if ($code=='#F08080') {$nom='Rouge Claire';}
    if ($code=='#800000') {$nom='Rouge Sombre';}
    if ($code=='#008000') {$nom='Vert';}
    if ($code=='#90EE90') {$nom='Vert Claire';}
    if ($code=='#808000') {$nom='Vert Olive';}
    if ($code=='#FFC0CB') {$nom='Violet';}
    if ($code=='#DA70D6') {$nom='Violet  Claire';}
    if ($code=='#9400D3') {$nom='Violet Vif';}
    if ($code=='#660066') {$nom='Violet Sombre';}


    return $nom;
}

function colorFbg($code){

    if ($code=='#FFFFFF' || $code=='#fffff') {$val='#FFFFFF';}
    if ($code=='#F5F5DC') {$val='#F5F5DC';}
    if ($code=='#0000FF') {$val='#0000FF';}
    if ($code=='#00CED1') {$val='#00CED1';}
    if ($code=='#1E90FF') {$val='#1E90FF';}
    if ($code=='#00FFFF') {$val='#00FFFF';}
    if ($code=='#BDB76B') {$val='#BDB76B';}
    if ($code=='#708090') {$val='#708090';}
    if ($code=='#FFFF33') {$val='#FFFF33';}
    if ($code=='#8B4513') {$val='#8B4513';}
    if ($code=='#CD853F') {$val='#CD853F';}
    if ($code=='#000000') {$val='#000000';}
    if ($code=='#FFD700') {$val='#FFD700';}
    if ($code=='#FF4500') {$val='#FF4500';}
    if ($code=='#FF33CC') {$val='#FF33CC';}
    if ($code=='#FF3399') {$val='#FF3399';}
    if ($code=='#FF69B4') {$val='#FF69B4';}
    if ($code=='#FF1493') {$val='#FF1493';}
    if ($code=='#FF0000') {$val='#FF0000';}
    if ($code=='#F08080') {$val='#F08080';}
    if ($code=='#800000') {$val='#800000';}
    if ($code=='#008000') {$val='#008000';}
    if ($code=='#90EE90') {$val='#90EE90';}
    if ($code=='#808000') {$val='#808000';}
    if ($code=='#FFC0CB') {$val='#FFC0CB';}
    if ($code=='#DA70D6') {$val='#DA70D6';}
    if ($code=='#9400D3') {$val='#9400D3';}
    if ($code=='#660066') {$val='#660066';}


    return $code;
}