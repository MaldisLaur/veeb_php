<?php
// defineerime funktsiooni nimega paarsuseKontroll

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

function kirjeldus($paaris) {
    if($paaris == true) {
        echo ' on paaris';
    } else {
        echo ' on paaritu';
    }
    echo '<br>';
}

// kutsume funktsioon tööle
for($arv = 0; $arv <= 10; $arv++){
    echo $arv;
    $kontroll = kasPaaris($arv);
    kirjeldus($kontroll);
}