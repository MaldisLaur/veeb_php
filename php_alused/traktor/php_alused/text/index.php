<?php
/*Kasutaja lisab vormi nime, seda näiteks suured ja väikesed tähed läbisegi.
Sinu kood tervitab teda kenasti nimepidi, kus nimi algab suure algustähega.
Näiteks: sisend–>mARiO; väljund–>Tere, Mario!*/
$sisestatudNimi = $_GET['nimi'];
$muudetudNimi = ucfirst(strtolower($sisestatudNimi));
echo 'sisend–> '.$sisestatudNimi.'<br>';
echo 'väljund–> Tere, '.$muudetudNimi.'!<br>';
echo '<hr>';
/*Kuna on teada, et PHP käsitleb teksti kui massiivi,
siis peaks saama seda tsükli abil nö. tükeldada.
Ülesandeks on etteantud teksti iga tähe järgi lisada punkt.
Näiteks: sisend–>stalker; väljund–>S.T.A.L.K.E.R.*/
$sisestatudTekst = $_GET['tekst'];
echo 'sisend–> '.$sisestatudTekst.'<br>';
echo 'väljund–> ';
for($i = 0; $i < strlen($sisestatudTekst); $i++){
    echo strtoupper($sisestatudTekst[$i]).'.';
}
echo '<br>';
echo '<hr>';
// Koosta tekstiväli, mis kuvab kasutaja sisestatud sõnumeid.
// Kasutaja ropud sõnad asendatakse tärnidega.
// Näiteks: sisend–>Sa oled täielik noob; väljund–>Sa oled täielik ***
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
/*Kasutajalt saadud eesnime ja perenime põhjal luuakse talle email lõpuga
@hkhk.edu.ee. Kusjuures täpitähed asendatakse ä->a, ö->o, ü->y, õ->o ja
kogu email on väikeste tähtedega
Näiteks: sisend–>Ülle ja Doos; väljund–>ylle.doos@hkhk.edu.ee*/
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

