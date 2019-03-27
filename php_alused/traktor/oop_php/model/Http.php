<?php
class Http
{
    var $vars = array(); // server requests data
    var $cookie = array(); // cookiede data

    function __construct()
    {
        $this->init();
        $this->initConst();
    }

    function initConst()
    {
        $vars = array('REMOTE_ADDR', 'PHP_SELF');
        foreach($vars as $var)
        {
            if(!defined($var) and isset($this->server[$var]))
            {
                define($var, $this->server[$var]);
            }
        }
    }

    function init()
    {
        //$_GET $_POST $COOKIE $FILES
        if(get_magic_quotes_gpc() == 1)
        {
            // save values
            array_walk($_GET, 'fixValue');
            array_walk($_POST, 'fixValue');
            array_walk($_COOKIE, 'fixValue');
        }

        // put all data from form or url and from file to one array
        $this->vars = array_merge($_GET, $_POST, $_FILES);
        $this->cookie = $_COOKIE;
        $this->server = $_SERVER;
    }

    /*
    // unsave function example
    function get($name)
    {
        if(isset($this->vars[$name]))
        {
            return $this->vars[$name];
        }
        return false;
    }
    */

    // save for html function example
    // form or url data getting
    function get($name, $fix = false)
    {
        if(isset($this->vars[$name]))
        {
            if($fix)
            {
                return fixHtml($this->vars[$name]);
            }
            return $this->vars[$name];
        }
        return false;
    }

    // set up specific values for form or url data
    function set($name, $val)
    {
        $this->vars[$name] = $val;
    }

    // delete value from form or url data
    function del($name)
    {
        if(isset($this->vars[$name]))
        {
            unset($this->vars[$name]);
        }
    }

    // user redirection to other page of application
    function redirect($url = false)
    {
        global $sess;
        $sess->flush();

        if($url == false)
        {
            $url = $this->getLink();
        }
        $url = str_replace('&amp;', '&', $url);
        header('Location: '.$url);
        exit;
    }
}