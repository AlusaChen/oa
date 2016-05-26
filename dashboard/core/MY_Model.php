<?php
class MY_Model extends CI_Model
{

    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }

}
