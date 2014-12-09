<?php   if(!defined('DRPATH')) exit('访问错误');

/**
 * 字符转换相关的类
 * @author yongbaolinux
 * 2014-12-09
 */
class class_charset{
    private $charset;
    public function __construct(){
        if(extension_loaded('mbstring') !== false){
            if(function_exists('mb_internal_encoding')){
                $this->charset = mb_internal_encoding();
            } else {
                $this->charset = 'UTF-8';
            }
        }
    }
    
    /**
     * 获取字符串或一个文件的编码
     * @param string $str 文件路径或者字符串
     * @return string 字符编码
     */
    static function get_charset($str = ''){
        if(is_file($str) && file_exists($str)){
            $content = file_get_contents($str);
        } else if(is_string($str)) {
            $content = $str;
        } else {
            throw new Exception("参数类型错误,参数需要为字符串类型");
        }
        if(function_exists('mb_detect_encoding')){
            $charset = mb_detect_encoding($content,array('ASCII','GB2312','UTF-8'));
            switch(strtoupper($charset)){
                case 'ASCII':
                    return 'ascii';
                case 'EUC-CN':
                    return 'gb2312';
                case 'CP936':
                    return 'gbk';
                case 'UTF-8':
                    return 'utf-8';
                default:
                    return 'unknown';
                    break;
            }
        } else {
            throw new Exception("未加载mbstring扩展");
        }
    }
    
    /**
     * 将字符串、一个文件或一个文件夹设置成目标字符集
     * @param string $str   文件路径或字符串
     * @return true or false 成功或失败 
     */
    static function set_charset($str = '',$out_charset='utf8',$in_charset=''){
        
    }
}
?>
