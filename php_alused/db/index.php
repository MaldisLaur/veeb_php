<?php
session_start();

require_once 'db/db_conf.php';
require_once 'db/db_fnc.php';
require_once 'lib/fnc.php';




if(!isset($_SESSION['user'])){
    echo htmlContent('html/form.html');
} else {
    echo htmlContent('html/page1.html');
    echo htmlContent('html/logout.html');
}




//echo htmlContent('htmls/form.html');

//$connectIKT = dbConnect(HOST, USER, PASS, DB);
//$sql = 'SELECT * FROM user';
//$sqlResult = dataQuery($connectIKT, $sql);
//echo '<pre>';
//print_r($sqlResult);