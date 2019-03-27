<?php
$nav = new Template('nav.nav');
$item = new Template('nav.item');

$item->set('name', 'Main Page');
$link = $http->getLink(array('controller' => 'main'));
$item->set('link', $link);
$nav->add('items', $item->parse());

$item->set('name', 'Contact');
$link = $http->getLink(array('controller' => 'contact'));
$item->set('link', $link);
$nav->add('items', $item->parse());

if(USER_ID == ROLE_NONE)
{
    $item->set('name', 'Log In');
    $link = $http->getLink(array('controller' => 'login'));
    $item->set('link', $link);
    $nav->add('items', $item->parse());
} else {
    $item->set('name', 'Log Out');
    $link = $http->getLink(array('controller' => 'logout'));
    $item->set('link', $link);
    $nav->add('items', $item->parse());
}



$mainContent->set('nav', $nav->parse());
