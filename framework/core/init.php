<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/11/30
 * Time: 17:50
 */

class core_init{
    static function __init(){
        //定义框架路径 引入框架加载器加载核心文件
        define('DRPATH',rtrim(dirname(dirname(__FILE__)),'/').'/');
        require_once    DRPATH.'core/loader.php';
        //设置时区
        date_default_timezone_set('PRC');
    }
}
core_init::__init();