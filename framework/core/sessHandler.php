<?php   if(!defined('DRPATH')) exit('���ʴ���');

/**
 * �Ự�洢���Ƴ�����Ʋ�
 * @author yongbaolinux
 * 2014-12-10
 */
class core_sessHandler extends core_base{
    private $handlerInstance;                                                   //�Ự���ƻ���ʵ��
    private $allowed_handlers = array('redis','db','memcache','files');        //������ĻỰ���ƻ����б�
    
    public function __initialize(){
        //�������ò�ȡ���ֻỰ�洢����
        $handlerType = core_config::getInstance()->get_config('session','handler');
        if(in_array($handlerType,$this->allowed_handlers)){
            $handlerClassName = 'drivers_session_'.$handlerType.'Handler';
            $this->handlerInstance = new $handlerClassName;
        } else {
            throw new Exception("�Ự�洢������������,����Ự�����ļ�   session.ini.php");
        }
    }
    
    /**
     * �Զ���Ự�洢���ƻ��ƿ���
     */
    public function start(){
        session_set_save_handler(array($dbhandler,'open'),array($dbhandler,'close'),array($dbhandler,'read'),array($dbhandler,'write'),array($dbhandler,'destroy'),array($dbhandler,'gc'));
    }
}
?>