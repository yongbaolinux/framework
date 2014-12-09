<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * 缓存抽象层
 * User: yongbaolinux
 * Date: 2014/12/8
 * Time: 23:29
 */
class core_cache extends core_base{
    protected $host;    //缓存服务器地址
    protected $pwd;     //连接缓存服务器密码
    protected $port;    //缓存服务端口

    static $cacheInstance;  //缓存对象实例
    public function __construct(){
        core_log::getInstance()->write_log('缓存基类已初始化');
    }

    public function __initialize(){

    }

    /**
     * 检查环境 是否安装相应缓存系统的扩展
     */
    protected function __check_env(){

    }
}
?>