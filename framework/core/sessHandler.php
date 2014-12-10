<?php   if(!defined('DRPATH')) exit('访问错误');

/**
 * 会话存储机制抽象控制层
 * @author yongbaolinux
 * 2014-12-10
 */
class core_sessHandler extends core_base{
    private $handlerInstance;                                                   //会话控制机制实例
    private $allowed_handlers = array('redis','db','memcache','files');        //所允许的会话控制机制列表
    
    public function __initialize(){
        //根据配置采取何种会话存储机制
        $handlerType = core_config::getInstance()->get_config('session','handler');
        if(in_array($handlerType,$this->allowed_handlers)){
            $handlerClassName = 'drivers_session_'.$handlerType.'Handler';
            $this->handlerInstance = new $handlerClassName;
        } else {
            throw new Exception("会话存储机制配置有误,请检查会话配置文件   session.ini.php");
        }
    }
    
    /**
     * 自定义会话存储控制机制开启
     */
    public function start(){
        session_set_save_handler(array($dbhandler,'open'),array($dbhandler,'close'),array($dbhandler,'read'),array($dbhandler,'write'),array($dbhandler,'destroy'),array($dbhandler,'gc'));
    }
}
?>