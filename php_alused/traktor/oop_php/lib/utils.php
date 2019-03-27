<?php
// wrapper function
// change unsafe symbols to save versions
//&lt;&gt;&amp;
function fixHtml($val)
{
    return htmlentities($val);
}

function fixUrl($val)
{
    return urlencode($val);
}

function fixValue(&$val, $key)
{
    $val = stripSlashes($val);
}

// add quotas to SQL query
function fixDb($val)
{
    /*
    global $db;
    return '"'.mysql_real_escape_string($val, $db->conn).'"';
    */
    return '"'.addSlashes($val).'"';
}
?>