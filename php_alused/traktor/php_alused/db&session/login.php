<?php
require_once 'db/db_conf.php';
require_once 'db/db_fnc.php';

$user = $_GET['user'];
$pass = $_GET['pass'];

$connectIKT = dbConnect(HOST, USER, PASS, DB);
$sql = 'SELECT * FROM user WHERE username="'.$user.'" AND password="'.md5($pass).'"';
$userData = dataQuery($connectIKT, $sql);
if($userData != false){
    session_start();
    $_SESSION['user'] = $userData[0];

}
header('Location: index.php');