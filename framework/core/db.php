<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * 数据库抽象层
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/1
 * Time: 0:27
 */
class core_db extends core_base{
    protected $dbhost;          //数据库主机地址
    protected $dbport;          //数据库服务端口
    protected $dbtype;          //数据库类型
    protected $dbname;          //数据库名
    protected $dbusername;      //数据库登录用户
    protected $dbpassword;      //数据库登录密码
    protected $dbcharacter;     //数据库连接字符集
    protected $dbpconnect;      //是否开启持久连接
    
    //protected $dbtransaction;   //是否开启事务
    
    static protected $dbInstance;   //数据库驱动对象实例

    public function __construct(){
        core_log::getInstance('file',array('./'))->write_log("数据库类已初始化\n");
        $this->_check_config();
        //$driver_name = 'drivers_db_'.$this->dbtype.'_driver';    //待实例化的数据库驱动
        //if(!class_exists($driver_name)){    //自动加载
           //throw new Exception("数据库驱动类不存在，请检查驱动文件是否存在或查看{$driver_name}类是否定义");
        //}
        //self::$dbInstance = new $driver_name; //将这几行放入__initialize函数中 否则会发生堆栈溢出
    }
    
    public function __initialize(){
        $db_driver_name = 'drivers_db_'.$this->dbtype.'_driver';    //待实例化的数据库驱动
        if(!class_exists($db_driver_name)) {    //自动加载
            throw new Exception("数据库驱动类不存在，请检查驱动文件是否存在或查看{$db_driver_name}类是否定义");
        }
        self::$dbInstance = new $db_driver_name;

    }
    /**
     * 利用config配置类初始化数据库参数
     */
    protected  function _check_config(){
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
    
    /**
     * 查询方法query
     */
    public function query($sql){
        try {
            return self::$dbInstance->_query($sql);
        } catch(Exception $e){
            core_log::getInstance()->write_log($e->getFile().":".$e->getLine()."行:".$e->getMessage());
        }
    }
    
    /**
     * 事务处理方法
     */
    public function transaction($sqls = array()){
        try {
            self::$dbInstance->_transaction($sqls);
        } catch (Exception $e){
            core_log::getInstance()->write_log($e->getFile().":".$e->getLine()."行:".$e->getMessage());
        }
    }
    
    /**
     * 锁表
     * @param string $tableName 要锁住的表名
     * @param boolean $flag 设置锁的类型  true为共享锁  false为排他锁
     */
    public function lock($tableName,$flag=true){
        if(core_common::is_empty($tableName)){
            throw new Exception('待锁的表名不能为空');
        }
        self::$dbInstance->_lock($tableName,$flag);
    }
    
    /**
     * 解锁表
     */
    public function unlock(){
        self::$dbInstance->_unlock();
    }
    
    /**
     * 返回最近一次 insert操作的 id
     */
    public function insert_last_id(){
        return self::$dbInstance->_insert_last_id();
    }
}
?>