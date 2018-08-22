<?php

class UserCheck
{
    public $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
    }

    function index()
    {
        
    }

    public function check_login_state()
    {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        
    }
}