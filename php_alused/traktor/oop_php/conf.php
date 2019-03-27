<?php
// app basic configuration

define('BASE_DIR', './');
set_time_limit(0);//30 seconds  - default
// localization to Estonia
setlocale(LC_TIME, 'Estonia');
// reporting for tests
error_reporting(E_ALL);

// app constants
//define('SITENAME', 'Site real name');

// model file system constants
define('MODEL_DIR', BASE_DIR.'model/');
define('TMPL_DIR', BASE_DIR.'views/');
define('LIB_DIR', BASE_DIR.'lib/');
define('LANG_DIR', BASE_DIR.'lang/');
define('CONTROLLER_DIR', BASE_DIR.'controllers/');

// role constants
define('ROLE_NONE', 0);
define('ROLE_ADMIN', 1);
define('ROLE_USER', 2);

$siteRoles = array(
    ROLE_NONE => 'Pole',
    ROLE_ADMIN => 'Administraator',
    ROLE_USER => 'Kasutaja'
);

define('DEFAULT_CONTROLLER', 'default');

// import support functions
require_once(LIB_DIR.'utils.php');

// import model classes
require_once(MODEL_DIR.'Template.php');
require_once(MODEL_DIR.'Http.php');
require_once(MODEL_DIR.'Mysql.php');
require_once(MODEL_DIR.'Linkobject.php');
require_once(MODEL_DIR.'Session.php');

// import database configuration
require_once(BASE_DIR.'db_conf.php');

// set up language settings
define('DEFAULT_LANG', 'et');
$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian'
);

// app objects for db connection, html data and session
$db = new MySQL(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$http = new LinkObject;
$sess = new Session($http, $db);

// language changing support
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id]))
{
    $lang_id = DEFAULT_LANG;
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);