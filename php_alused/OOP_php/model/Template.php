<?php
if(!defined('TMPL_DIR'))
{
    define('TMPL_DIR', 'views/');
}
class Template
{
    var $file = '';
    var $content = false;
    var $vars = array();

    function __construct($fn)
    {
        $this->file = $fn;
        $this->loadFile();
    }

    function LoadFile()
    {
        $f = $this->file;

        if(!is_dir(TMPL_DIR))
        {
            echo 'Kataloogi '.TMPL_DIR.' ei leidud';
            exit;
        }

        if(file_exists($f) and is_file($f) and is_readable($f))
        {
            $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file;

        if(file_exists($f) and is_file($f) and is_readable($f))
        {
            $this->readFile($f);
        }

        $f = TMPL_DIR.$this->file.'.html';

        if(file_exists($f) and is_file($f) and is_readable($f))
        {
            $this->readFile($f);
        }

        $f = TMPL_DIR.str_replace('.', '/', $this->file).'.html';
        if(file_exists($f) and is_file($f) and is_readable($f))
        {
            $this->readFile($f);
        }

        if($this->content === false)
        {
            echo 'Unable to get file: '.$this->file;
            exit;
        }
    }

    function readFile($filename)
    {
        /*
        $fp = fopen($filename, 'rb'); //rb - binary save
        $this->content = fread($fp, filesize($filename));
        fclose($fp);
        */
        $this->content = file_get_contents($filename);
    }

    function set($name, $val)
    {
        $this->vars[$name] = $val;
    }

    function add($name, $val)
    {
        if(!isset($this->vars[$name]))
        {
            $this->set($name, $val);
        } else {
            $this->vars[$name].= $val;
        }
    }

    function parse()
    {
        $str = $this->content;
        foreach($this->vars as $name=>$val)
        {
            $str = str_replace('{'.$name.'}', $val, $str);
        }
        return $str;
    }
}