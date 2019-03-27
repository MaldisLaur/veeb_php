<?php
if(!defined('BASE_DIR'))
{
    exit;
}
// controller name getting from url data
$controller = $http->get('controller');
$fn = CONTROLLER_DIR.str_replace('.', '/', $controller).'.php';

if(file_exists($fn) and is_file($fn) and is_readable($fn))
{
    require_once($fn);

} else {
    $fn = CONTROLLER_DIR.DEFAULT_CONTROLLER.'.php';
    $http->set('controller', DEFAULT_CONTROLLER);
    require_once $fn;
}