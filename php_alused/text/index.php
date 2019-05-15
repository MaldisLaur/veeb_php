<?php
$sisestatudNimi = $_GET['nimi'];
$muudetudNimi = ucfirst(strtolower($sisestatudNimi));
echo 'sisend–> '.$sisestatudNimi.'<br>';
echo 'väljund–> Tere, '.$muudetudNimi.'!<br>';
echo '<hr>';
$sisestatudTekst = $_GET['tekst'];
echo 'sisend–> '.$sisestatudTekst.'<br>';
echo 'väljund–> ';
for($i = 0; $i < strlen($sisestatudTekst); $i++){
    echo strtoupper($sisestatudTekst[$i]).'.';
}
echo '<br>';
echo '<hr>';
$kasutajaSonum = $_GET['sonum'];
echo 'sisend–>'.$kasutajaSonum.'<br>';
$roopSonad = array(
    'loll',
    'noob'
);
foreach ($roopSonad as $roopSona){
    $roopSonaAlgusPositsioon = strpos($kasutajaSonum, $roopSona, 0);
    if($roopSonaAlgusPositsioon != false){
        $asendatudTekst = str_replace($roopSona, str_repeat("*", strlen($roopSona)), $kasutajaSonum);
        echo 'väljund–>'.$asendatudTekst.'<br>';
    }
}
echo '<hr>';
$kasutajaEesnimi = $_GET['eesnimi'];
$kasutajaPerenimi = $_GET['perenimi'];
echo 'sisend–>'.$kasutajaEesnimi.' ja '.$kasutajaPerenimi.'<br>';
$tapitahedeAsendused = array(
    'ä' => 'a',
    'ö' => 'o',
    'ü' => 'y',
    'õ' => 'o'
);
$kasutajaNimi = str_replace(array_keys($tapitahedeAsendused), array_values($tapitahedeAsendused), mb_strtolower($kasutajaEesnimi)).'.'.str_replace(array_keys($tapitahedeAsendused), array_values($tapitahedeAsendused), mb_strtolower($kasutajaPerenimi));
$email = $kasutajaNimi.'@hkhk.edu.ee';
echo 'väljund–>'.$email.'<br>';
echo '<hr>';
