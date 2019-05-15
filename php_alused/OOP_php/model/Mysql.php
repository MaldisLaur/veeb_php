<?php
//andmebaasi klass

class MySQL
{
    var $conn = false; // connection to database server
    var $history = array(); // db query logs

    var $host = false;
    var $user = false;
    var $pass = false;
    var $dbname = false;

    function __construct($h, $u, $p, $n)
    {
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $n;
        $this->connect();
    }

    // connection to db
    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            echo 'Problem with db connection<br />';
            exit;
        }
    }
    // db query such like INSERT, DROP, UPDATE
    function query($sql){
        $begin = $this->getMicrotime();
        $result = mysqli_query($this->conn, $sql);
        if(!$result){
            echo 'Problem with query '.$sql.' <br />';
            return false;
        }
        $time = $this->getMicrotime() - $begin;
        $this->history[] = array(
            'sql' => $sql,
            'time' => $time
        );
        return $result;
    }
    // db data query
    function getData($sql){
        $result = $this->query($sql); // db query
        $data = array(); // array for data
        while ($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        if(count($data) == 0){
            return false;
        }
        return $data;
    }

    // query time measurement
    function getMicrotime()
    {
        list($usec, $sec) = explode(' ', microtime());
        return ((float)$usec + (float)$sec);

    }

    // show db query logs
    function showHistory()
    {
        if(count($this->history) > 0)
        {
            echo '<hr><ol>';
            foreach($this->history as $key=>$val)
            {
                echo '<li>'.$val['sql'].'<br /><strong>';
                echo round($val['time'], 6).'</strong></li>';
            }
            echo '</ol>';
        }
    }
}
