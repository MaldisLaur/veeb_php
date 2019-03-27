<?php
/**
 * function paarsuseKontroll
 * @param $arv
 * print is $arv even or add
 */
function kasPaaris($arv){
    if($arv % 2 == 0){
        $kontroll = true;
    } else {
        $kontroll = false;
    }
    return $kontroll;
}

function kasAlgarv($arv){
    $jagaja = 2;
    if($arv == 0 or $arv == 1) {
        $kontroll = true;
    } else {
        while ($arv % $jagaja != 0) $jagaja++;
        if ($arv == $jagaja) {
            $kontroll = true;
        } else {
            $kontroll = false;
        }
    }
    return $kontroll;
}

function tabeliPais(){
    return '
        <thead class="thead-dark">
                <tr>
                    <th>arv</th>
                    <th>paaris</th>
                    <th>paaritu</th>
                    <th>algarv</th>
                </tr>
        </thead>
    ';
}

function tabeliRida($arv){
    $rida = '<tr>'.
            '<td>'.$arv.'</td>'.
            '<td class="paaris">';
    if(kasPaaris($arv)){
        $rida .= '<i class="fas fa-angle-down"></i>';
    }
    $rida .= '</td>'.
             '<td class="paaritu">';
    if(!kasPaaris($arv)){
        $rida .=  '<i class="fas fa-angle-down"></i>';
    }
    $rida .=  '</td>'.
              '<td class="algarv">';
    if(kasAlgarv($arv)){
        $rida .=  '<i class="fas fa-angle-down"></i>';
    }
    $rida .=  '</td>'.'</tr>';
    return $rida;
}

function tabel($ridadeArv){
    echo '<table class="table">';
    echo tabeliPais();
    echo '<tbody>';
    for($reanumber = 0; $reanumber <= $ridadeArv; $reanumber++){
        echo tabeliRida($reanumber);
    }
    echo '</tbody>';
    echo '</table>';
}

function lehePais(){
    echo '
    <!DOCTYPE html>
<html lang="et">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Arvud</title>
<!--        <link rel="stylesheet" href="style.css"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
              crossorigin="anonymous">
    </head>
    <body>
        <div class="container text-center">
    ';
}