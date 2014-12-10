<?php   if ( ! defined('DRPATH')) exit('���ʴ���');
/**
 * cookie������
 * @author yongbaolinux
 * 2014-12-10
 */
class class_cookie{
    static function setCookie($key,$value,$expire='',$path='',$domain='',$secure=null,$httponly=null){
        if(core_common::is_empty($key)){
            throw new Exception("cookie��������Ϊ��");
        }
        if(core_common::is_empty($value)){
            throw new Exception("cookie��ֵ����Ϊ��");
        }
        $cookie_config = core_config::getInstance()->get_config('cookie');
        $expire = !core_common::is_empty($expire) ? intval($expire) : ($cookie_config['expire'] ? $cookie_config['expire'] : 3600);
        $expire = $expire ? time()+intval($expire) : 0;
        
        $path = !core_common::is_empty($path) ? $path : ($cookie_config['path'] ? $cookie_config['path'] : '/');
        $domain = !core_common::is_empty($domain) ? $domain : ($cookie_config['domain'] ? $cookie_config['domain'] : 'localhost');
        $secure = $secure !==null ? (bool)$secure : (bool)$cookie_config['secure'];
        $httponly = $httponly !== null ? (bool)$httponly : (bool)$cookie_config['httponly'];
        
        setCookie($key,$value,$expire,$path,$domain,$secure,$httponly);
    }
    
}
?>