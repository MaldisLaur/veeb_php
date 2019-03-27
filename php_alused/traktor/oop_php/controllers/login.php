<?php
$login = new Template('login');

$login->set('username', 'User');
$login->set('password', 'Pass');
$login->set('button', 'Log In!');

$link = $http->getLink(array('controller' => 'login_do'));
$login->set('link', $link);

$mainContent->set('content', $login->parse());