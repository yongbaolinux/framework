<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/1
 * Time: 0:27
 */
class drives_db_base extends core_base{
    protected $dbhost;          //数据库主机地址
    protected $dbport;          //数据库服务端口
    protected $dbtype;          //数据库类型
    protected $dbname;          //数据库名
    protected $dbusername;      //数据库登录用户
    protected $dbpassword;      //数据库登录密码
    protected $dbcharacter;     //数据库连接字符集
    protected $dbpconnect;      //是否开启持久连接
    protected $connetid;        //连接数据库句柄

    public function __construct(){
        core_log::getInstance()->write_log('数据库类已初始化');
        $this->_init_config();
    }

    /**
     * 利用config配置类初始化数据库参数
     */
    protected  function _init_config(){
        core_common::dump(get_class_vars(__CLASS__));
    }

}