<?php
// ruumalate arvutused
function keraRuumala($keraRaadius){
    return 4/3 * pi() * pow($keraRaadius, 3);
}
function koonuseRuumala($koonuseRaadius, $koonuseKorgus){
    return 1/3 * pi() * pow($koonuseRaadius, 2) * $koonuseKorgus;
}
function silindriRuumala($silindriRaadius, $silindriKorgus){
    return pi() * pow($silindriRaadius, 2) * $silindriKorgus;
}
// andmete väljastamine
function valjasta($ruumala){
    return round($ruumala, 2).' cm<sup>3</sup><br>';
}
// vormist andmed töötlus
echo 'Kera ruumala on '.valjasta(keraRuumala($_GET['keraRaadius'])) ;
echo 'Silindri ruumala on '.valjasta(silindriRuumala($_GET['silindriRaadius'], $_GET['silindriKorgus'])) ;
echo 'Koonuse ruumala on '.valjasta(koonuseRuumala($_GET['koonuseRaadius'], $_GET['koonuseKorgus'])) ;