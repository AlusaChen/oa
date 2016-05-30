<?php

class Member extends MY_Controller
{
    public function index()
    {
        $data = db_master()->from('admin_member')->get();
        foreach($data->result() as $item)
        {
            /**
             * @var Member_model $item
             */
            echo $item->username.'<br>';
        }
    }

    public function add()
    {
        $this->load->view('admin/member_add');
    }


}
