<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * 数据库抽象层
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/1
 * Time: 0:27
 */
class drivers_db_base extends core_base{
    protected $dbhost;          //数据库主机地址
    protected $dbport;          //数据库服务端口
    protected $dbtype;          //数据库类型
    protected $dbname;          //数据库名
    protected $dbusername;      //数据库登录用户
    protected $dbpassword;      //数据库登录密码
    protected $dbcharacter;     //数据库连接字符集
    protected $dbpconnect;      //是否开启持久连接
    

    public function __construct(){
        core_log::getInstance()->write_log('数据库类已初始化');
        $this->_init_config();
    }

    /**
     * 利用config配置类初始化数据库参数
     */
    protected  function _init_config(){
        $dbconfig = core_config::getInstance()->get_config('db');
        //不实现默认配置 必须填写配置文件 否则抛出异常
        if(!core_common::is_empty($dbconfig['host'])){
            $this->dbhost = $dbconfig['host'];
        } else {
            throw new Exception("请检查数据库配置文件的主机地址配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['type'])){
            $this->dbtype = $dbconfig['type'];
        } else {
            throw new Exception("请检查数据库配置文件的数据库类型配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['user'])){
            $this->dbusername = $dbconfig['user'];
        } else {
            throw new Exception("请检查数据库配置文件的用户名配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['pwd'])){
            $this->dbpassword = $dbconfig['pwd'];
        } else {
            throw new Exception("请检查数据库配置文件的密码配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['name'])){
            $this->dbname = $dbconfig['name'];
        } else {
            throw new Exception("请检查数据库配置文件的数据库名配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['character'])){
            $this->dbcharacter = $dbconfig['character'];
        } else {
            throw new Exception("请检查数据库配置文件的密码配置是否填写");
        }
        if(!core_common::is_empty($dbconfig['port'])){
            $this->dbport = $dbconfig['port'];
        } else {
            throw new Exception("请检查数据库配置文件的密码配置是否填写");
        }
        $this->dbpconnect = $dbconfig['pconnect'] ? $dbconfig['pconnect'] : '0';
    }
    
}