<?php
date_default_timezone_set('Europe/Tallinn');
setlocale(LC_TIME, "et_EE");

echo '<h1>metshein.com Ülesanne 8 lahendused</h1><br>';
//Kuva kuupäev ja kellaaeg formaadis 20.03.2013 12:31
echo date('d.m.Y G:i').'<br>';
echo '<hr>';
//Kuva tänane eestikeelne nädalapäev, N: kolmapäev
echo utf8_encode(strftime('%A')).'<br>';
echo '<hr>';
//Kuva eestikeelne kuupäev koos nädalapäevaga. Näiteks: 23.veebruar 2013 laupäev
echo utf8_encode(strftime('%d.%B %Y %A')).'<br>';
echo '<hr>';
//Leia mitu päeva on jäänud järgmise jaanipäevani. Näiteks: 2014 aasta jaanipäevani on jäänud 236 päeva!
$hetkel = time();
$jaanipaev = mktime(0,0,0,6, 24, 2019);
$vaheSekundites = $jaanipaev - $hetkel;
//ühel päeval on 60sekunditMinutis * 60minutidTunnis * 24tundiPaevas = sekundit
$paevadeArv = round($vaheSekundites / (60 * 60 * 24), 0);
echo strftime('%Y'.' aasta jaanipäevani on jäänud '.$paevadeArv.' päeva!').'<br>';
echo '<hr>';
//Minu sünnipäev on 06.11.1980! Leia kumb on meist vanem. Kuva mõlema sünnikuupäevad ning vahe aastates.
$minuSynniKuupaev = mktime(0,0,0, 8, 30, 1980);
$sinuSynniKuupaev = mktime(0,0,0, 11, 06, 1980);
$vaheSekundites = $sinuSynniKuupaev - $minuSynniKuupaev;
//ühel aastal on 60sekunditMinutis * 60minutidTunnis * 24tundiPaevas * 365päevaAastas = sekundit
$vaheAastates = round($vaheSekundites / (60 * 60 * 24 * 365), 0);
echo 'Minu sünnikuupäev '.utf8_encode(strftime('%d.%m.%Y', $minuSynniKuupaev)).'<br>';
echo 'Sinu sünnikuupäev '.utf8_encode(strftime('%d.%m.%Y', $sinuSynniKuupaev)).'<br>';
if($vaheSekundites > 0){
    echo 'Mina olen vanem kui sina<br>';
} else {
    echo 'Sina oled vanem kui mina<br>';
}
echo 'Vahe aastates on '.abs($vaheAastates).'<br>';
echo '<hr>';
//Maailmalõpp saabub 29.02.2016! Las PHP otsustab, kas see on võimalik
$maailmaLopp = mktime(23,59,59, 02, 29, 2016);
$paevParastMaailmaLoppu = $maailmaLopp + 1;
if (($paevParastMaailmaLoppu = strtotime(strftime('%d.%m.%Y %H:%M', $paevParastMaailmaLoppu))) === false) {
    echo "Maailma lõpp on saabunud<br>";
} else {
    echo utf8_encode(strftime('%d.%m.%Y %H:%M', $paevParastMaailmaLoppu)) . '<br>';
    echo 'Maailma lõppu ei tulnud<br>';
}
echo '<hr>';
//Leia, kas sul on järgmine aasta juubel?
$minuSynniKuupaev = mktime(0,0,0,11,27,1981);
$aastaHetkel = date('Y');
$minuSynniPaevJargmiselAastal = mktime(0,0,0,11,27, $aastaHetkel+1);
$vanusAastates = round(($minuSynniPaevJargmiselAastal - $minuSynniKuupaev) / (60 * 60 * 24 * 365));
if($vanusAastates % 5 == 0){
    echo 'Aastal '.($aastaHetkel+1).' Sinul on juubel, saad '.$vanusAastates.' vanaks'.'<br>';
} else {
    echo 'Aastal '.($aastaHetkel+1).' Sinul pole juubeli, saad alles '.$vanusAastates.' vanaks'.'<br>';
}
echo '<hr>';
//Koosta kood, mis tervitab sind vastavalt ajale. N: 8:00+ “Tere hommikust!”, 13:00+ “Tere päevast!” ja 17:00+ “Tere õhtust!”
$kellTundidesHetkel = date('G');
echo 'Kell hetkel on '.date('G:i').'<br>';
if($kellTundidesHetkel >= 8 and $kellTundidesHetkel < 13){
    echo 'Tere hommikust!';
} else if($kellTundidesHetkel >= 13 and $kellTundidesHetkel < 17){
    echo 'Tere päevast!';
} else {
    echo 'Tere õhtust!';
}