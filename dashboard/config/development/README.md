# 开发环境配置
    hooks.php
    <?php
    $hook['post_controller_constructor']['debug'] = [
        'class' => 'Debug',
        'function' => 'enable_profile',
        'filename' => 'Debug.php',
        'filepath' => 'hooks'
    ];
    
    
    database.php
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    $active_group = 'default';
    $query_builder = TRUE;
    
    $db['default'] = array(
        'dsn'	=> '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '123456',
        'database' => 'oa',
        'dbdriver' => 'mysqli',
        'dbprefix' => '',
        'pconnect' => FALSE,
        'db_debug' => (ENVIRONMENT !== 'production'),
        'cache_on' => FALSE,
        'cachedir' => '',
        'char_set' => 'utf8',
        'dbcollat' => 'utf8_general_ci',
        'swap_pre' => '',
        'encrypt' => FALSE,
        'compress' => FALSE,
        'stricton' => FALSE,
        'failover' => array(),
        'save_queries' => TRUE
    );