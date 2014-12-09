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
     * 初步检查缓存系统配置文件是否正常
     */
    protected function _check_config(){
        $cache_type_allowed = array('memcache','redis','file');    //系统支持的缓存系统类型
        $cache_config = core_config::getInstance()->get_config('cache');
        if(core_common::is_empty($cache_config) || !is_array($cache_config)){
            core_log::getInstance()->write_log("缓存系统配置不正确");
            throw new Exception("缓存系统配置不正确");
        } else {
            $cache_type = $cache_config['type'];
            if(!in_array($cache_type,$cache_type_allowed)){
                core_log::getInstance()->write_log("配置的缓存系统类型不被支持,请检查配置文件是否正确,目前只支持memcache,redis和file");
                throw new Exception("配置的缓存系统类型不被支持,请检查配置文件是否正确,目前只支持memcache,redis和file文件缓存");
            } else {
                if($cache_type === 'file'){
                    $this->_check_config_file($cache_config);
                } else {
                    $this->_check_config_mem($cache_config);
                }
            }
        }
    }
    
    /**
     * 检查文件缓存系统配置
     */
    protected function _check_config_file($cache_config){
        
    }
    
    /**
     * 检查内存缓存系统配置
     */
    protected function _check_config_mem($cache_config){
        //检查缓存服务器地址和端口合法性
        $cache_host = $cache_config['host'];
        $cache_port = $cache_config['port'];
        if(!class_net::is_valid_ip($cache_host)){
            core_log::getInstance()->write_log("缓存服务器的地址配置不正确");
            throw new Exception("缓存服务器的地址配置不正确");
        }
        if(!class_net::is_valid_port($cache_port)){
            core_log::getInstance()->write_log("缓存服务器的端口配置不正确");
            throw new Exception("缓存服务器的端口配置不正确");
        }
    }
    
    /**
     * 检查环境 是否安装相应缓存系统的扩展
     */
    protected function _check_env_mem(){
        
    }
}
?>