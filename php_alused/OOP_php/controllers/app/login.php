<?php
$login = new Template('login');

$login->set('username','User');
$login->set('password','Pass');
$login->set('button','Log in');

$link = $http->getlink(array('controller'=>'login_do'));
$login->set('link',$link);

$mainContent->SET('content',$login->parse());