<?php
foreach ($_GET as $nimetus => $vaartus ){
    if(strlen($_GET[$nimetus]) == 0){
        header('Location: index.html');
        exit;
    }
}
foreach ($_GET as $nimetus => $vaartus){
    echo $nimetus.' => '.$vaartus.'<br>';
}