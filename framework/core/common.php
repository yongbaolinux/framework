<?php
class core_common
{
    /**
     * 获取数组的维度
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
            return;
        }
    }
}
?>