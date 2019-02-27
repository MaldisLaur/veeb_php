<?php

function failiKontroll($failiNimi){
    if(file_exists($failiNimi) and is_file($failiNimi) and is_readable($failiNimi)){
        return true;
    }
    return false;
}

function loeFailist($failiNimi){
    if(failiKontroll($failiNimi)){
        $fp = fopen($failiNimi, 'r');
        while(!feof($fp)){
            $rida = fgets($fp);
            if(trim($rida) == ''){
                echo '===================<br>';
            } else {
                echo $rida.'<br>';
            }
        }
    }
}

function tabelFailist($failiNimi){
    if(failiKontroll($failiNimi)){
        $fp = fopen($failiNimi, 'r');
        echo '<table border="1">';
        echo '<tr>';
                while(!feof($fp)) {
                    $rida = fgets($fp);
                    if(trim($rida) !='') {
                        echo '<td>'.$rida.'</td>';
                    } else {
                        echo '</tr>';
                    }
                }
        echo '</table>';
    }
}


//toob välja tabeli kujul
tabelFailist('raamatud.txt');

