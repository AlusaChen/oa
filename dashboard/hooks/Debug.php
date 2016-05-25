<?php

/**
 * 调试
 * Class Debug
 */

class Debug
{
    /**
     * @var CI_Controller $CI
     */
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
    }

    public function enable_profile()
    {
        if(ENVIRONMENT == 'development' && !$this->CI->input->is_ajax_request())
        {
            $this->CI->output->enable_profiler(TRUE);
        }
    }
}