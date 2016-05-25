<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpl extends CI_Controller {

    public function index()
    {
        $this->load->view('tpl/index');
    }

    public function table()
    {
        $this->load->view('tpl/table');
    }

    public function form()
    {
        $this->load->view('tpl/form');
    }


    public function widgets()
    {
        $this->load->view('tpl/widgets');
    }
}
