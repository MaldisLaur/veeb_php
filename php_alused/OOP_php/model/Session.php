<?php
class Session
{
    var $sid = false;
    var $vars = array();
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800; //default timeout, in seconds, 1800 = 30 minutes
    function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
        $this->sid = $http->get('sid'); //get this value from url
        $this->checkSession();
    }

    function setTimeout($t)
    {
        $this->timeout = $t;
    }

    function setAnonymous($bool)
    {
        $this->anonymous = $bool;
    }

    function checkSession()
    {
        $this->clearSessions();

        if($this->sid === false and $this->anonymous)
        {
            $this->createSession();
        }

        if($this->sid !== false)
        {
            $sql = 'SELECT * FROM session WHERE sid='.fixDb($this->sid);
            $res = $this->db->getData($sql);

            if($res == false)
            {
                if($this->anonymous)
                {
                    $this->createSession();
                } else {
                    $this->sid = false;
                    $this->http->del('sid');
                }
                define('ROLE_ID', 0);
                define('USER_ID', 0);
            } else {
                $vars = @unserialize($res[0]['svars']);
                if(!is_array($vars))
                {
                    $vars = array();
                }
                $this->vars = $vars;
                $user_data = unserialize($res[0]['user_data']);
                define('ROLE_ID', $user_data['role_id']);
                define('USER_ID', $user_data['user_id']);
                $this->user_data = $user_data;
            }
        } else {
            define('ROLE_ID', 0);
            define('USER_ID', 0);
        }
    }

    function clearSessions()
    {
        $sql = 'DELETE FROM session '.' WHERE '.time().' - UNIX_TIMESTAMP(changed) > '.$this->timeout;
        $this->db->query($sql);
    }

    function createSession($user = false)
    {
        if($user == false)
        {
            $user = array(
                'user_id'=>0,
                'role_id'=>0,
                'username'=>'Anonymous'
            );
        }
        $sid = md5(uniqid(time().mt_rand(1, 1000), true));
        $sql = 'INSERT INTO session SET '.'sid='.fixDb($sid).', '.'user_id='.$user['user_id'].', '.'user_data='.fixDb(serialize($user)).', '.'login_ip='.fixDb(REMOTE_ADDR).', '.'created=NOW()';
        $this->db->query($sql);
        $this->sid = $sid;
        $this->http->set('sid', $sid);
        setcookie(SITENAME, $sid, 0);
    }

    function delSession()
    {
        if($this->sid !== false)
        {
            $sql = 'DELETE FROM session WHERE sid='.fixDb($this->sid);
            $this->db->query($sql);
            setcookie(SITENAME, '', -1);
            $this->sid = false;
            $this->http->del('sid');
        }
    }

    function set($name, $val)
    {
        $this->vars[$name] = $val;
    }

    function get($name)
    {
        if(isset($this->vars[$name]))
        {
            return $this->vars[$name];
        }
        return false;
    }

    function del($name)
    {
        if(isset($this->vars[$name]))
        {
            unset($this->vars[$name]);
        }
    }

    function flush()
    {
        if($this->sid != false)
        {
            $sql = 'UPDATE session SET changed=NOW(), '.'svars='.fixDB(serialize($this->vars)).'WHERE sid='.fixDb($this->sid);
            $this->db->query($sql);
        }
    }
}