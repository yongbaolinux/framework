<?php   if(!defined('DRPATH')) exit('访问错误');

/**
 * 安全控制类
 * @author yongbaolinux
 * 2014-12-11
 */
class class_safe{
    
    /**
     * 对参数转义
     * 过滤SQL注入风险
     */
    static protected function _filter_sql_inject($sql=''){
        return core_common::advance_addslashes($sql);
    }
    
    static public function safe($var=''){
        return self::_filter_sql_inject($var);
    }
}
?>
