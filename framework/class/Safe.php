<?php   if(!defined('DRPATH')) exit('���ʴ���');

/**
 * ��ȫ������
 * @author yongbaolinux
 * 2014-12-11
 */
class class_safe{
    
    /**
     * �Բ���ת��
     * ����SQLע�����
     */
    static protected function _filter_sql_inject($sql=''){
        return core_common::advance_addslashes($sql);
    }
    
    static public function safe($var=''){
        return self::_filter_sql_inject($var);
    }
}
?>
