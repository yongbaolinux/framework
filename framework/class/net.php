<?php   if(!defined('DRPATH')) exit('访问错误');
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2014/12/8
 * Time: 21:47
 */
class class_net{
    static function client_ip(){
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = $ips[0];
        } elseif(isset($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_X_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_X_CLIENT_IP'];
        } elseif(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return self::is_valid_ip($ip) ? $ip : '0.0.0.0';
    }

    /**
     * 判断一个IP是否是合法的IP地址
     * @param $ip
     * @return bool true 合法 false 不合法
     */
    static function is_valid_ip($ip){
        return self::is_valid_ipv4($ip) ? true : (self::is_valid_ipv6($ip) ? true : false);
    }

    /**
     * 判断一个IP是否是合法的IPv4地址
     * @param string $ipv4
     * @return bool true 合法的IPv4地址 false 非法的IPv4地址
     */
    static function is_valid_ipv4($ipv4='0.0.0.0'){
        return true;
    }

    /**
     * 判断一个IP是否是合法的IPv6地址
     * @param $ipv6
     * @return bool true 合法的IPv6地址 false 非法的IPv6地址
     */
    static function is_valid_ipv6($ipv6){

    }
    
    /**
     * 判断一个端口是否是合法的端口数值范围
     * @param $port
     * @return bool true 合法的端口地址   false 非法的端口地址
     */
    static function is_valid_port($port){
        return (intval($port) >=0) && (intval($port) <= 65535);
    }
    
    /**
     * 判断客户端的请求是否是一个Ajax请求
     * 不应太依赖该函数 因为任何请求头都是可以伪造的
     * @return true 是Ajax请求  / false不是Ajax请求
     */
    static function is_ajax(){
        return $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}
?>