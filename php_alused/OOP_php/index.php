<?php
require_once 'conf.php';
// main page by html templates
$main = new Template('app.main');
$meta = new Template('app.meta');
$style = new Template('app.style');
$js = new Template('app.js');
// add meta, style and js templates content to main template
$main->set('meta', $meta->parse());
$main->set('style', $style->parse());
$main->set('js', $js->parse());
// set up main page real values
$main->set('lang', $http->get('lang_id'));
$main->set('title', 'Söökla menüü');
$mainContent = new Template('menu.main_content');
$nav = new Template('nav.nav');
$sql = 'SELECT DISTINCT * FROM dish_availability GROUP BY dish_date';
$dates = $db->getData($sql);
foreach ($dates as $date){
    $navItem = new Template('nav.item');
    $link = $http->getLink(array('date' => $date['dish_date']));
    $navItem->set('link', $link);
    $navItem->set('date', $date['dish_date']);
    $nav->add('nav_items', $navItem->parse());
}
$mainContent->set('nav', $nav->parse());
// page content from controller
// add action control
require_once 'controller.php';
//require_once 'nav.php'; // nav element
$mainContent->set('footer', 'Page Footer');
$main->set('content', $mainContent->parse());
// print out main page full view
echo $main->parse();