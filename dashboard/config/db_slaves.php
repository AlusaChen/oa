<?php
$config['db_slaves'] = [
    'default' => [
        [
            'dsn'	=> '',
            'hostname' => '127.0.0.1',
            'username' => 'root',
            'password' => '123456',
            'database' => 'oa',
            'dbdriver' => 'mysqli',
            'port'     => '3308',
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
        ],
    ]
];