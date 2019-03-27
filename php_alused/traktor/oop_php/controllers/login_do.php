<?php
$username = $http->get('username');
$password = $http->get('password');

$sql = 'SELECT * FROM user WHERE username='.fixDb($username).' AND password='.fixDb(md5($password)).' AND is_active=1';

$result = $db->getData($sql);
if($result == false){
    $link = $http->getLink(array('controller' => 'login'));
    $http->redirect($link);
} else {
    $sess->createSession($result[0]);
//    echo '<pre>';
//    print_r($http);
    $http->redirect();
}