<?php
function htmlContent($fn){
    if(file_exists($fn) and is_file($fn) and is_readable($fn)){
        $fp = fopen($fn, 'r');
        $content = fread($fp, filesize($fn));
        fclose($fp);
    } else {
        return false;
    }
    return $content;
}