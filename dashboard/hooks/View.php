<?php

/**
 * 显示相关
 * Class View
 */
class View
{
    protected $CI;

    protected $view_path = '';

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->view_path = $this->CI->load->get_package_paths()[0].'views';
    }


    /**
     * 按照当前 类 方法 加载自定义 存在的文件
     *  e.g.
     *      /tpl/table
     *      自动加载 tpl_{$type}
     *              tpl/table_{$type}
     *
     *      /products/shoes/show
     *      自动加载 products/shoes_{$type}
     *              products/shoes/show_{$type}
     * @param string $type
     */
    protected function load_module_file($type = 'css')
    {
        $dir = $this->CI->router->directory;
        $path = rtrim($this->view_path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$dir;
        $class = $this->CI->router->class;
        $method = $this->CI->router->method;

        $class_file = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$class.'_'.$type.'.php';
        if(file_exists($class_file))
        {
            $class_view = $class.DIRECTORY_SEPARATOR.'_'.$type;
            $this->CI->load->view($class_view);
        }
        $method_file = rtrim($path, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$class.DIRECTORY_SEPARATOR.$method.'_'.$type.'.php';
        if(file_exists($method_file))
        {
            $method_view = $class.DIRECTORY_SEPARATOR.$method.'_'.$type;
            $this->CI->load->view($method_view);
        }
    }

    //头
    public function show_head()
    {
        if($this->CI->input->is_ajax_request()) return;
        $this->CI->load->view('layout/head_begin');
        $this->load_module_file('css');
        $this->CI->load->view('layout/head_end');
    }


    //尾
    public function show_foot()
    {
        if($this->CI->input->is_ajax_request()) return;

        $this->CI->load->view('layout/foot_begin');
        $this->load_module_file('js');
        $this->CI->load->view('layout/foot_end');
    }
}