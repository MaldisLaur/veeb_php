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

switch ($sugu) {
    case 'mees':
        echo '<p style="color:blue">';
        break;
    case 'naine':
        echo '<p style="color:red">';
        break;
    default:
        echo '<p style="color:green">';
        break;
}

echo 'Minu eesnimi on '.$eesnimi.'<br>';
echo 'Perenimi on '.$pnimi.'<br>';
echo 'Vanust on mul '.$vanus.' aastat<br>';
echo 'Kaalun '.$kaal.' kilo<br>';
?>