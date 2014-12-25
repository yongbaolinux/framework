<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Session操作类
 * @author yongbaolinux
 * 2014-12-10
 * TODO 去掉自定义的常量 使用PHP自身的常量 - PHP_SESSION_DISABLED/PHP_SESSION_NONE/PHP_SESSION_ACTIVE
 */
class CI_Session_{
    static private $session_status = 0;
    /*const PHP_SESSION_DISABLED = 0;        //会话不可用
    const PHP_SESSION_NONE = 1;             //会话可用 但不能全局访问
    const PHP_SESSION_ACTIVE = 2;           //全局会话可用 */
    
    /**
     * 检测会话是否已经自动开启
     * 如果没有开启就开启会话
     * php >= 5.4 session_status函数可用
     * 由于 getSession/setSession系列函数会自动调用该函数
     * 所以不需要手动调用该函数
     * 在应用程序中直接使用 getSession/setSession系列函数即可
     */
    static protected function startSession(){
        if(function_exists('session_status')){
            if(session_status() === PHP_SESSION_DISABLED || session_status() === PHP_SESSION_NONE){
                session_start();
            }
        } else {
            if(self::$session_status === PHP_SESSION_DISABLED){
                $auto_start = ini_get('session.auto_start');
                if(!$auto_start){
                    session_start();
                }
                self::$session_status = PHP_SESSION_ACTIVE;
            }
        }
    }
    
    /**
     * 根据某个键名获取某个会话的键值
     * 获取前先检测会话是否自动开启
     * 必须要开启会话才能使用该功能
     * @param string $key 键名
     * @return mixed|NULL
     */
    static public function getSession($key=''){
        self::startSession();
        if(empty($key)){
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
     * 设置某个会话的值
     * 同上 要先开启会话才能使用该功能
     * 否则在另一页面读取不到该会话值
     * 也就是说 全局会话没有生效
     * 开启前先检测系统是否已自动开启
     * @param unknown $key
     * @param string $value
     */
    static public function setSession($key,$value=''){
        self::startSession();
        if(empty($key)){
            throw new Exception("设置会话的键名不能为空");
        }
        $_SESSION[$key] = $value;
    }
    
    /**
     * 清除会话
     * 清除对应键名的会员 若未指定键名 则清除所有会话
     * @param  $key 要清除的会话键名
     */
    static public function cleanSession($key=''){
        self::startSession();
        if(empty($key)){
            unset($_SESSION);
        }
        if(@isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
    
    /**
     * 返回当前会话开启状态
     * php >= 5.4 session_status函数可用
     */
    static public function statusSession(){
        if(function_exists('session_status')){
            return session_status();
        } else {
            return self::$session_status;
        }
    }
    
    /**
     * 关闭当前会话
     * php >= 5.4 session_status函数可用
     */
    static public function closeSession(){
        if(function_exists('session_status')){
            if(session_status() === PHP_SESSION_ACTIVE){
                session_write_close();
            }
        } else {
            if(self::$session_status === PHP_SESSION_ACTIVE){
                session_write_close();
                self::$session_status = PHP_SESSION_DISABLED;
            } else {
                if(@ini_get('session.auto_start')){
                    session_write_close();
                }
            }
        }
    }
}
?>
