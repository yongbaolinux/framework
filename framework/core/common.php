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
     * 
     */
}
?>