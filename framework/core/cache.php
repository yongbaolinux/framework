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
    protected $type;    //缓存系统类型
    protected $flag;    //是否对数据进行压缩
    protected $persistent;  //是否与缓存服务器进行持久连接
    protected $expire;  //设置缓存数据过期时间
    
    static $cacheInstance;  //缓存对象实例
    public function __construct(){
        core_log::getInstance()->write_log('缓存基类已初始化');
        $this->_check_config();
        $this->_check_env();
    }

    public function __initialize(){ 
        $cache_driver_name = 'drivers_cache_'.$this->type.'_driver';
        self::$cacheInstance = new $cache_driver_name;
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
                $this->type = $cache_type;
                if($this->type === 'file'){
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
        } else {
            $this->host = $cache_host;
        }
        if(!class_net::is_valid_port($cache_port)){
            core_log::getInstance()->write_log("缓存服务器的端口配置不正确");
            throw new Exception("缓存服务器的端口配置不正确");
        } else {
            $this->port = $cache_port;
        }
        $this->flag = (bool)$cache_config['flag'];          //是否启用数据压缩
        $this->expire = (int)$cache_config['expire'] ? $cache_config['expire'] : 3600;   //设置缓存数据过期时间
    }
    
    /**
     * 检查环境
     */
    protected function _check_env(){
        if($this->type === 'file'){
            $this->_check_env_file();
        } else {
            $this->_check_env_mem();
        }
    }
    
    /**
     * 检查环境 是否安装相应缓存系统的扩展
     * 如果检测到相应模块没有加载 会根据OS的类型和ext文件夹来动态加载
     * 加载失败会抛出异常
     */
    protected function _check_env_mem(){
        if(extension_loaded($this->type) === false){
            //$ext_path = @ini_get('extension_dir');
            /* if ( strtoupper ( substr ( PHP_OS ,  0 ,  3 )) ===  'WIN' ) {
                 dl ( 'php_'.$this->type.'.dll' );
            } else {
                 dl ( $this->type.'.so' );
            } */
            //throw new Exception("PHP未加载{$this->type}相应扩展,请手动修改php.ini配置文件以确认添加该模块");
            //没有加载dll就加载memcache操作类
            require_once    rtrim(DRPATH,'/').'/'.ucfirst($this->type).'.php';
        }
        //var_dump(extension_loaded($this->type));
    }
    
    /**
     * 检查环境 文件缓存是否有可写权限
     */
    protected function _check_env_file(){
        
    }
    
    /**
     * 连接到缓存服务器抽象接口
     * core_cache::getInstance()实例化后可以直接
     * 使用core_cache::getInstance()->add来添加数据
     * 不需要显示使用connect函数去连接缓存服务器
     * 因为在实例化core_cache类的时候已自动连接到缓存服务器
     * 除非是手动连接到除配置文件外的另一台缓存服务器上
     * @param $host 缓存服务器主机地址
     * @param $port 缓存服务端口
     */
    public function connect($host,$port){
        if($this->type !== 'file'){
            self::$cacheInstance->_connect($host,$port);
        }
    }

    /**
     * 向连接池中添加一台缓存服务器
     * @param $host 缓存服务器主机地址
     * @param $port 缓存服务端口
     */
    public function addServer($host,$port){
        if(!$this->type !== 'file'){
            self::$cacheInstance->_addServer($host,$port,$this->persistent);
        }
    }

    /**
     * 添加数据到缓存服务器的抽象接口
     * 如果缓存服务器中已存在该数据
     * 则会添加失败
     * @param string $key   数据键名
     * @param string $value 数据键值
     */
    public function add($key,$value){
        if($this->type !== 'file'){
            self::$cacheInstance->_add($key,$value,$this->flag,$this->expire);
        }
    }

    /**
     * 修改缓存服务器数据的抽象接口
     * 如果缓存中已存在该数据 则会修改原数据
     * 如果缓存中不存在该数据 则会新增数据
     * @param string $key   待修改数据的键名
     * @param string $value 修改后的键值数据
     */
    public function set($key,$value){
        if($this->type !== 'file') {
            self::$cacheInstance->_set($key, $value, $this->flag, $this->expire);
        }
    }


}
?>