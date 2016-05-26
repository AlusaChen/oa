<?php
class Member_model extends MY_Model
{
    public $is_super = 0;

    public $did;

    public $username;

    public $nickname;

    public $phone;

    public $email;

    public $password;

    public $rand_code;

    public $last_login_time;

    public $last_login_ip;

    public $last_login_session_id;

    public $login_num = 0;

    public $create_time;

    public $status;

    public $setting;

    public function __set($name, $value)
    {

    }

    public function __get($name)
    {
        if (isset($this->$name))
        {
            return $this->$name;
        }
    }



}