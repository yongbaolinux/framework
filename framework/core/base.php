<?php   if(!defined('DRPATH')) exit('访问错误');
/**
 * 基类 单例模式
 * @author yongbaolinux
 *
 */
class core_base{
    private static $instance;
    public static function getInstance(){
        $className = get_called_class();
        //如果该属性非对象 或者 不是所调用的类的实例 就会重新实例化该类并赋值到该属性
        if(!@is_object(self::$instance[$className]) || @get_class(self::$instance[$className]) !== $className){
            $obj = new $className;
            //因为参数的不确定性 故不再能完全通过构造函数去初始化一个对象 而是另外开辟一个__initialize函数 将参数
            //作为数组传入 并初始化对象的各属性
            call_user_func_array(array($obj,'__initialize'),func_get_args());
            self::$instance[$className] = $obj;
        }
        return  self::$instance[$className];
    }

    public function __get($key){
        echo '您所访问的属性 '.$key.'不存在';
    }

    public function __set($key,$value){
        echo '您设置的属性 '.$key.'不存在';
    }
}
?>