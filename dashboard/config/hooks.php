<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/



//头部 css
$hook['post_controller_constructor']['head'] = [
    'class' => 'View',
    'function' => 'show_head',
    'filename' => 'View.php',
    'filepath' => 'hooks'
];


//尾
$hook['post_controller']['foot'] = [
    'class' => 'View',
    'function' => 'show_foot',
    'filename' => 'View.php',
    'filepath' => 'hooks'
];
