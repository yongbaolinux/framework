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
            throw new Exception("未加载 mbstring扩展");
        }
    }
    
    /**
     * 将字符串、一个文件或一个文件夹设置成目标字符集
     * 原字符集如果为空 会自动探测 但不保证完全正确性
     * 故如果你已明确知道原字符集 就应显示填上 
     * 但如果你填写错误 将不会得到期待的结果
     * @param string $str   文件路径或字符串
     * @param string $out_charset  目标字符集
     * @param string $in_charset 原字符集 
     * @return true or false 成功或失败 
     */
    static function set_charset($str = '',$out_charset='utf8',$in_charset=''){
        if(is_dir($str) && file_exists($str)){
            if($dir_h = opendir($str)){
                while($file_h = readdir($dir_h)){
                    if($file_h == '.' || $file_h == '..'){
                        continue;
                    } else {
                        self::set_charset($str.'/'.$file_h,$out_charset,$in_charset);
                    }
                }
            } else {
                throw new Exception("修改字符集:打开文件夹失败");
            }
        } else if(is_file($str) && file_exists($str)){
            //TODO 检测字符集 转换字符集 两次调用file_get_contents 影响效率
            $in_charset = core_common::is_empty($in_charset) ? self::get_charset($str) : $in_charset;
            //如果原字符集和目标字符集相同 直接返回 不操作
            if($in_charset === $out_charset){
                return;
            } else {
                if(function_exists('iconv')){
                    $content = file_get_contents($str);
                    $content = iconv($in_charset,$out_charset,$content);
                    file_put_contents($str,$content);
                } elseif(function_exists('mb_convert_encoding')) {
                    $content = file_get_contents($str);
                    $content = mb_convert_encoding($in_charset,$out_charset,$content);
                    file_put_contents($str,$content);
                } else {
                    return false;
                }
            }
        } else if(is_string($str)){
            $in_charset = core_common::is_empty($in_charset) ? self::get_charset($str) : $in_charset;
            if($in_charset === $out_charset){
                return $str;
            } else {
                if(function_exists('iconv')){
                    return iconv($in_charset,$out_charset,$str);
                } elseif(function_exists('mb_convert_encoding')) {
                    return mb_convert_encoding($in_charset,$out_charset,$str);
                } else {
                    return false;
                }
            }
        } else {
            throw new Exception("参数类型错误:类型须为字符串");
        }
    }
    
    /**
     * 对数组的键值进行urlencode操作(参数为字符串亦可)
     * @param array $arr
     * @return mixed
     */
    static public function advance_urlencode($arr)
    {
        if (is_array($arr) && count($arr) > 0) {
            foreach ($arr as &$v) {
                if (is_array($v)) {
                    $v = self::advance_urlencode($v);
                } else {
                    $v = urlencode($v);
                }
            }
            return $arr;
        } else {
            return urlencode($arr);
        }
    }
}
?>
