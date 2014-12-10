<?php   if ( ! defined('DRPATH')) exit('���ʴ���');
/**
 * session������
 * author yongbaolinux
 * 2014-12-10
 */
class class_session{
    static private $session_status = -1;
    const PHP_SESSION_DISABLED = -1;        //�Ự������
    const PHP_SESSION_NONE = 0;             //�Ự���� ����û������
    const PHP_SESSION_ACTIVE = 1;           //�Ự���� ����������
    /**
     * ���Ự�Ƿ��Ѿ��Զ�����
     * ���û�п����Ϳ����Ự
     */
    static protected function _init_env(){
        if(self::$session_status === self::PHP_SESSION_DISABLED){
            $auto_start = ini_get('session.auto_start');
            if(!$auto_start){
                session_start();
            }
            self::$session_status = self::PHP_SESSION_ACTIVE;
        }
    }
    
    /**
     * ����ĳ��������ȡĳ���Ự�ļ�ֵ
     * ��ȡǰ�ȼ��Ự�Ƿ��Զ�����
     * ����Ҫ�����Ự����ʹ�øù���
     * @param string $key ����
     * @return mixed|NULL
     */
    static function getSession($key=''){
        self::_init_env();
        if(core_common::is_empty($key)){
            return $_SESSION;
        } else {
            if(@isset($_SESSION[$key])){
                return $_SESSION[$key];
            } else {
                return null;
            }
        }
    }
   
    /**
     * ����ĳ���Ự��ֵ
     * ͬ�� Ҫ�ȿ����Ự����ʹ�øù���
     * ��������һҳ���ȡ�����ûỰֵ
     * Ҳ����˵ ȫ�ֻỰû����Ч
     * ����ǰ�ȼ��ϵͳ�Ƿ����Զ�����
     * @param unknown $key
     * @param string $value
     */
    static function setSession($key,$value=''){
        self::_init_env();
        if(core_common::is_empty($key)){
            throw new Exception("���ûỰ�ļ�������Ϊ��");
        }
        $_SESSION[$key] = $value;
    }
    
    /**
     * ����Ự
     * �����Ӧ�����Ļ�Ա ��δָ������ ��������лỰ
     * @param  $key Ҫ����ĻỰ����
     */
    static function cleanSession($key=''){
        self::_init_env();
        if(core_common::is_empty($key)){
            unset($_SESSION);
        }
        if(@isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
    
    /**
     * �޸ĻỰ����
     */
    static function statSession(){
        
    }
    
    
    
}
?>
