<?php   if ( ! defined('DRPATH')) exit('访问错误');
/**
 * session操作类
 * author yongbaolinux
 * 2014-12-10
 */
class class_session{
    static private $session_status = -1;
    const PHP_SESSION_DISABLED = -1;        //会话不可用
    const PHP_SESSION_NONE = 0;             //会话可用 但还没有内容
    const PHP_SESSION_ACTIVE = 1;           //会话可用 并包含内容
    /**
     * 检测会话是否已经自动开启
     * 如果没有开启就开启会话
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
     * 根据某个键名获取某个会话的键值
     * 获取前先检测会话是否自动开启
     * 必须要开启会话才能使用该功能
     * @param string $key 键名
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
     * 设置某个会话的值
     * 同上 要先开启会话才能使用该功能
     * 否则在另一页面读取不到该会话值
     * 也就是说 全局会话没有生效
     * 开启前先检测系统是否已自动开启
     * @param unknown $key
     * @param string $value
     */
    static function setSession($key,$value=''){
        self::_init_env();
        if(core_common::is_empty($key)){
            throw new Exception("设置会话的键名不能为空");
        }
        $_SESSION[$key] = $value;
    }
    
    /**
     * 清除会话
     * 清除对应键名的会员 若未指定键名 则清除所有会话
     * @param  $key 要清除的会话键名
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
     * 修改会话配置
     */
    static function statSession(){
        
    }
    
    
    
}
?>
