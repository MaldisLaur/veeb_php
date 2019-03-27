<?php
//linkide koostamiseks vajalik klass
require_once('Http.php');

class Linkobject extends Http
{
    var $baseUrl = false;
    var $delim = '&amp;'; 	// '&' symbol in html
    var $eq = '=';
    var $protocol = 'http://';  //$this->server['SERVER_PROTOCOL']

    // add if exists
    var $aie = array('lang_id', 'sid'=>'sid', 'nocache');

    function __construct()
    {
        parent::__construct();

        // base url creation
        $this->baseUrl = $this->protocol.$this->server['HTTP_HOST'].$this->server['SCRIPT_NAME'];

        $this->set('nocache', time());

        // set uo cookies
        if (isset($this->cookie[SITENAME]))
        {
            unset($this->aie['sid']);
            $this->set('sid', $this->cookie[SITENAME]);
        }
    }

    function addToLink(&$link, $name, $val)
    {
        if($link != '')
        {
            $link .= $this->delim;
        }
        $link .= fixUrl($name).$this->eq.fixUrl($val);

    }



    /*
    $add = array('page_id'=>, 'news_id'=>2, 'username'=>'admin');
    $aie = array('page_id', 'news_id'); // add if exists
    $not = array('lang_id');
    */

    function getLink($add = array(), $aie = array(), $not = array())
    {
        $link = '';
        foreach($add as $name=>$val)
        {
            $this->addToLink($link, $name, $val);
        }

        foreach($aie as $name)
        {
            $val = $this->get($name);
            if ($val !== false)
            {
                $this->addToLink($link, $name, $val);
            }
        }

        foreach($aie as $name)
        {
            $val = $this->get($name);
            if ($val !== false and !in_array($name, $not))
            {
                $this->addToLink($link, $name, $val);
            }
        }

        if ($link !='')
        {
            $link = $this->baseUrl.'?'.$link;
        } else {
            $link = $this->baseUrl;
        }
        return $link;
    }

}
?>