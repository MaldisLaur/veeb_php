<?php
/**
 * Created by PhpStorm.
 * User: maldis-sveno.laur
 * Date: 13.02.2019
 * Time: 14:16
 */
$eesnimi = 'Maldis';
$pnimi = "Laur";
$vanus = 18;
$kaal = 68;
$sugu = 'mees';

if($sugu == 'mees'){
    echo '<p style="color: blue;">';
}   else {
    echo '<p style="color: red;">';
}

echo 'Minu eesnimi on '.$eesnimi.'<br>';
echo 'Perenimi on '.$pnimi.'<br>';
echo 'Vanust on mul '.$vanus.' aastat<br>';
echo 'Kaalun '.$kaal.' kilo<br>';
?>