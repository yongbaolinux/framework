<?php   if ( ! defined('DRPATH')) exit('访问错误');

/**
 * memcached驱动
 * @author yongbaolinux
 * 2014-12-09
 */
class drivers_cache_memcache_driver extends core_cache{
    private $connectid;
    private $memcache;
    
    public function __construct(){
        parent::__construct();
        $this->memcache = new Memcache;
        if(is_object($this->memcache)){
            if(!$this->memcache->connect($this->host,$this->port)){
                throw new Exception('连接memcached服务失败,请检查memcached服务是否已在  11211端口开启');
            }
        } else {
            throw new Exception('初始化Memcache对象失败');
        }
    }

    /**
     * 连接到一个指定的memcached服务器
     * @param $host 指定的memcache服务器主机地址
     * @param $port 指定的memcache服务端口
     * (函数名不能与基类的core_base的connect函数同名)
     */
    public function _connect($host,$port){
        $this->memcache->connect($host,$port);
    }

    /**
     * 向连接池中添加一台memcached服务器
     * 此 api 需要memcache2.0版本以上才能使用 
     * @param $host
     * @param $port
     * @param $persistent
     */
    public function _addServer($host,$port,$persistent){
        $this->memcache->addServer($host,$port,$persistent);
    }

    /**
     * 向memcached服务器添加缓存数据
     * @param $key      缓存的键名
     * @param $value    缓存的键值
     * @param bool $flag    是否使用 MEMCACHE_COMPRESSED标记对数据进行压缩 true为压缩 false为不压缩
     * @param int $expire   设置缓存数据过期时间
     */
    public function _add($key,$value,$flag=false,$expire=3600){
        if(!$this->memcache->add($key,$value,$flag,$expire)){
            try{
                throw new Exception('向memcached中添加缓存数据失败,已经存在相同的数据键名');
            } catch (Exception $e){
                core_common::print_exception_log($e);
            }
        }
    }

    /**
     * 修改memcached服务器中的缓存数据
     * 如果memcached中存在该数据的键名 则会修改原数据
     * 如果memcached中不存在该数据 则会新增该数据
     * @param $key      待修改数据的键名
     * @param $value    修改后的键值数据
     */
    public function _set($key,$value,$flag,$expire){
        if(!$this->memcache->set($key,$value,$flag,$expire)){
            try{
                throw new Exception('对memcached中修改缓存数据失败,原因未知');
            } catch (Exception $e){
                //输出异常信息到页面并记录日志
                core_common::print_exception_log($e);
            }
        }
    }
    
    /**
     * 删除 memcached服务器中的缓存数据
     * @param string $key       待删除的缓存数据键名
     * @param int    $timeout   缓存数据在 $timeout 秒后被删除 若为0 则立即删除
     */
    public function _delete($key,$timeout){
        if(!$this->memcache->delete($key,$timeout)){
            try{
                throw new Exception('对memcached中删除缓存数据失败,原因未知');
            } catch(Exception $e){
                core_common::print_exception_log($e);
            }
        }
    }
    
    /**
     * 
     */
}
?>
