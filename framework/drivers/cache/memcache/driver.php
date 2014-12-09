<?php   if ( ! defined('DRPATH')) exit('访问错误');

/**
 * memcache驱动
 * @author yongbaolinux
 * 2014-12-09
 */
class drivers_cache_memcache_driver extends core_cache{
    private $connectid;
    private $memcache;
    
    public function __construct(){
        parent::__construct();
    }
    
    public function connect(){
        $this->memcache = new Memcache;
         
        if(is_object($this->memcache)){
           
            $this->memcache->addServer($this->host,$this->port);
        }
    }
    
    public function addServer($host,$port){
        $this->memcache->addServer($host,$port);
    }
    
    public function add($key,$value){
        $this->memcache->add($key,$value,false,30);
    }
}
?>
