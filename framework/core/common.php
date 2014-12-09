<?php   if ( ! defined('DRPATH')) exit('访问错误');
class core_common
{
    /**
     * 获取数组的维度
     * @param array $arr
     * @return int 所给数组的维度
     */
    static public function arrayLevel($arr)
    {
        $level = array();            //存放各键的维度 最后的维度就是键中维度最大的
        foreach ($arr as $value) {
            if (is_array($value)) {
                $level[] = arrayLevel($value);
            } else {
                $level[] = 0;
            }
        }
        $level = count($level) > 0 ? $level : array(0);
        $level = max($level);      //最后在键的最大维度上加一
        return ++$level;
    }

    /**
     * 浏览器友好输出
     * TODO 摘自thinkphp 需要修改和研究 有版权嫌疑
     * @param $var
     * @param bool $echo
     * @param null $label
     * @param bool $strict
     * @return mixed|null|string
     */
    static public function dump($var, $echo = true, $label = null, $strict = true)
    {
        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        } else
            return $output;
    }

    /**
     * 对二维数组按内层键值数组的某个键值对整个二维数组进行排序
     * TODO 摘自网络 需要研究和修改 有版权和BUG嫌疑
     * @param $arr
     * @param $keys
     * @param string $type
     * @param bool $keep
     * @return array
     */
    static public function array_sort($arr, $keys, $type = 'asc', $keep = true)
    {
        $keysvalue = $new_array = array();
        foreach ($arr as $k => $v) {
            $keysvalue[$k] = $v[$keys];
        }
        if ($type == 'asc') {
            asort($keysvalue);
        } else {
            arsort($keysvalue);
        }
        reset($keysvalue);
        foreach ($keysvalue as $k => $v) {
            if ($keep) {
                $new_array[] = $arr[$k];
            } else {
                $new_array[$k] = $arr[$k];
            }
        }
        return $new_array;
    }

    /**
     * 加载类库
     */
    static public function require_class(){

    }
    
    /**
     * 判断某一变量是否为空
     */
    static public function is_empty($var){
        if(isset($var) && !empty($var)){
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * 打印一条SQL执行错误信息 并抛出一个异常
     */
    static public function print_sql_error(){
        $php_errormsg = "SQL执行错误:".mysql_errno()."-".mysql_error();
        core_log::getInstance()->write_log($php_errormsg);
        throw new Exception($php_errormsg);
    }
    
    /**
     * 对字符串进行转义操作
     * 支持数组
     */
    static public function advance_addslashes($str){
        if(is_array($str)){
            foreach ($str as &$v){
                $v = self::advance_addslashes($v);
            }
        } else {
            $str = addslashes($str);
        }
        return $str;
    }
    
    
}
?>