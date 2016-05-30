<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller
{

    public function index()
    {
        $this->output->enable_profiler(FALSE);
        $this->load->view('test');
    }

}
