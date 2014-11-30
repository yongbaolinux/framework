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
    /**
     * 内部成员方法 用于初始化配置类的时候加载配置文件
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
}
?>