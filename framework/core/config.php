<?php   if ( ! defined('DRPATH')) exit('访问错误');

/**
 * Created by PhpStorm.
 * Author: yongbaolinux
 * User: Administrator
 * Date: 2014/11/30
 * Time: 16:41
 */
class core_config extends core_base{
    static private $config;
    private $allowed_conf_files;

    public function __construct(){
        self::$config = array();
        $this->allowed_conf_files = array('db','redis','session','cookie','memcache');
        $this->_include_config_file();
    }
    
    public function __initialize(){
        
    }
    
    /**
     * 内部私有方法 用于初始化配置类的时候加载配置文件
     */
    private function _include_config_file(){
        if(!is_array($this->allowed_conf_files) || count($this->allowed_conf_files) == 0){
            throw new Exception('未定义要加载的配置文件序列');
            core_log::getInstance()->write_log('未定义要加载的配置文件序列');
        } else {
            foreach($this->allowed_conf_files as $conf){
                //若需要加载的配置文件不存在 会自动生成该配置文件
                $file_path = rtrim(DRPATH,'/').'/'.'conf/'.$conf.'.ini.php';
                if(file_exists($file_path)){
                    $temp = require_once $file_path;
                    self::$config = array_merge(self::$config,$temp);
                } else {
                    if(is_writeable(DRPATH.'conf/')){
                        $content = "<?php if ( ! defined('DRPATH')) exit('访问错误');\n//配置参数\nreturn array(\n'$conf'=>array(\n\n)\n);\n?>";
                        file_put_contents($file_path,$content);

                    } else{
                        throw new Exception('配置文件夹不可写');
                    }
                }
            }
        }
    }

    /**
     * 外部公开方法 用于设置配置值
     * @param string $key 配置项
     * @param mixed $value 配置值
     */
    public function set_config($key,$value){
        if(!is_string($key)){
            throw new Exception('配置项必须为字符串');
        } else {
            self::$config[$key] = $value;
        }
    }

    /**
     * 外部公开方法 用于批量设置配置值
     * @param array $config
     */
    public function mset_config($config=array()){
        if(is_array($config)){
            if(empty($config)){
                throw new Exception('配置项数组不能为空');
            } else {
                foreach ($config as $k=>$v){
                    $this->set_config($k,$v);
                }
            }
        } else {
            throw new Exception('配置项应为数组');
        }
    }

    /**
     * 外部公开方法 用于获取配置值 支持二位数组的配置项获取
     * e.g. get_config('db','localhost') 将返回数据库的主机地址配置
     * e.g. get_config('db') 将以数组的形式返回数据库的全部配置
     * @string $key1 第一层配置项
     * @string $key2 第二层配置项
     * @return mixed 返回配置值
     */
    public function get_config($key1='',$key2=''){
        if(!is_string($key1) || !is_string($key2)){
            throw new Exception('配置项必须为字符串');
        } else {
            if($key1 == '' && $key2 == ''){
                return self::$config;
            } else {
                if($key2 == '') {
                    return isset(self::$config[$key1]) ? self::$config[$key1] : null;
                } else {
                    return isset(self::$config[$key1][$key2]) ? self::$config[$key1][$key2] : null;
                }
            }
        }
    }

}
?>