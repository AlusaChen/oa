<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *  db_master 实例化 主库
 *  db_slave 实例化 从库
 */

// ------------------------------------------------------------------------

if ( ! function_exists('db_master'))
{
    /**
     * @param string $type
     * @return CI_DB_query_builder
     */
    function db_master($type = 'default')
    {
        $CI =& get_instance();
        if(!property_exists($CI, 'dbs')) $CI->dbs = [];
        if(!array_key_exists($type, $CI->dbs)) $CI->dbs[$type] = [];
        if(!array_key_exists('master', $CI->dbs[$type])) $CI->dbs[$type]['master'] = $CI->load->database($type, TRUE);
        return $CI->dbs[$type]['master'];
    }

}

if ( ! function_exists('db_slave'))
{
    /**
     * @param string $type
     * @return CI_DB_query_builder
     */
    function db_slave($type = 'default')
    {
        $CI =& get_instance();
        if(!property_exists($CI, 'dbs')) $CI->dbs = [];
        if(!array_key_exists($type, $CI->dbs)) $CI->dbs[$type] = [];
        if(!array_key_exists('slave', $CI->dbs[$type]))
        {
            $all_slaves = config_item('db_slaves');
            if(!$all_slaves || !array_key_exists($type, $all_slaves))
            {
                show_error('缺少从库配置');
            }
            $db_slaves = $all_slaves[$type];

            $max = count($db_slaves) - 1;
            $selected = mt_rand(0, $max); //randomly select a database
            $CI->dbs[$type]['slave'] = $CI->load->database($db_slaves[$selected], TRUE);
        }
        return $CI->dbs[$type]['slave'];
    }
}