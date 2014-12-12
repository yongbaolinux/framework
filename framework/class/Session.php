<?php   if ( ! defined('DRPATH')) exit('���ʴ���');
/**
 * Session������
 * @author yongbaolinux
 * 2014-12-10
 * TODO ȥ���Զ���ĳ��� ʹ��PHP����ĳ��� - PHP_SESSION_DISABLED/PHP_SESSION_NONE/PHP_SESSION_ACTIVE
 */
class class_session{
    static private $session_status = 0;
    const PHP_SESSION_DISABLED = 0;        //�Ự������
    const PHP_SESSION_NONE = 1;             //�Ự���� ������ȫ�ַ���
    const PHP_SESSION_ACTIVE = 2;           //ȫ�ֻỰ���� 
    
    /**
     * ���Ự�Ƿ��Ѿ��Զ�����
     * ���û�п����Ϳ����Ự
     * php >= 5.4 session_status��������
     * ���� getSession/setSessionϵ�к������Զ����øú���
     * ���Բ���Ҫ�ֶ����øú���
     * ��Ӧ�ó�����ֱ��ʹ�� getSession/setSessionϵ�к�������
     */
    static protected function startSession(){
        if(function_exists('session_status')){
            if(session_status() === PHP_SESSION_DISABLED || session_status() === PHP_SESSION_NONE){
                session_start();
            }
        } else {
            if(self::$session_status === self::PHP_SESSION_DISABLED){
                $auto_start = ini_get('session.auto_start');
                if(!$auto_start){
                    session_start();
                }
                self::$session_status = self::PHP_SESSION_ACTIVE;
            }
        }
    }
    
    /**
     * ����ĳ��������ȡĳ���Ự�ļ�ֵ
     * ��ȡǰ�ȼ��Ự�Ƿ��Զ�����
     * ����Ҫ�����Ự����ʹ�øù���
     * @param string $key ����
     * @return mixed|NULL
     */
    static public function getSession($key=''){
        self::startSession();
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
    static public function setSession($key,$value=''){
        self::startSession();
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
    static public function cleanSession($key=''){
        self::startSession();
        if(core_common::is_empty($key)){
            unset($_SESSION);
        }
        if(@isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
    
    /**
     * ���ص�ǰ�Ự����״̬
     * php >= 5.4 session_status��������
     */
    static public function statusSession(){
        if(function_exists('session_status')){
            return session_status();
        } else {
            return self::$session_status;
        }
    }
    
    /**
     * �رյ�ǰ�Ự
     * php >= 5.4 session_status��������
     */
    static public function closeSession(){
        if(function_exists('session_status')){
            if(session_status() === PHP_SESSION_ACTIVE){
                session_write_close();
            }
        } else {
            if(self::$session_status === self::PHP_SESSION_ACTIVE){
                session_write_close();
                self::$session_status = self::PHP_SESSION_DISABLED;
            } else {
                if(@ini_get('session.auto_start')){
                    session_write_close();
                }
            }
        }
    }
}
?>
