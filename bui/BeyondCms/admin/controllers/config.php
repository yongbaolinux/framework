<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 系统配置控制器
 */
class config extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('common_func');
        $this->load->library('session_');
        $this->admin_res = base_url().'admin_res/';                 //后台资源存放路径(js css images)
        if(!$this->session_->getSession('admin.login')){
            redirect('admin/login','location');
        }
    }
    
    /**
     * 基础配置
     */
    public function baseConfig(){
        $config = json_encode($this->db->query("SELECT * FROM `bd_config`")->result_array());
        $this->load->view('baseConfig',array('config'=>$config,'PUBLIC'=>$this->admin_res));
    }
    
    /**
     * 邮件发送配置
     */
    public function emailConfig(){
        $emails = json_encode($this->db->query("SELECT * FROM `bd_email`")->result_array());
        $hosts = json_encode($this->db->query("SELECT * FROM `bd_distributed`")->result_array());
        $this->load->view('emailConfig',array('PUBLIC'=>$this->admin_res,'emails'=>$emails,'hosts'=>$hosts));
    }
    
    
    /**
     * ajax方式删除配置项
     * 一次删除一个和多个配置项均使用该方法
     */
    public function ajaxDelConfigs(){
        if(isAjax()){
            $config_ids = $this->input->post('config_ids');
            $config_ids = is_array($config_ids) ? $config_ids : array($config_ids);
            $config_ids = implode(',', $config_ids);
            echo json_encode($this->db->query("DELETE FROM `bd_configs` WHERE `id` IN(".$config_ids.")"));
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式添加配置项
     */
    public function ajaxAddConfig(){
        if(isAjax()){
            $configName = $this->input->post('configName');
            if(empty($configName)){
                exit(json_encode(array('code'=>-2,'msg'=>'配置项不能为空')));
            }
            //判断该配置项是否已经存在
            $result = $this->db->query("SELECT COUNT(id) AS count FROM `bd_config` WHERE `config_key`='".$configName."'")->result_array();
            if($result[0]['count']){
                echo json_encode(array('code'=>-1,'msg'=>'该配置项已存在'));
            } else {
                $configValue = $this->input->post('configValue');
                if(empty($configValue)){
                    exit(json_encode(array('code'=>-2,'msg'=>'配置值不能为空')));
                }
                $configDesc = $this->input->post('configDesc');
                if($this->db->query("INSERT INTO `bd_config`(`config_key`,`config_desc`,`config_value`) VALUES('".$configName."','".$configDesc."','".$configValue."')")){
                    echo json_encode(array('code'=>1,'msg'=>'添加配置成功'));
                } else {
                    echo json_encode(array('code'=>0,'msg'=>'添加配置失败'));
                }
            }
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式保存修改配置项
     * Todo 支持批量更新
     */
    public function ajaxSaveConfig(){
        if(isAjax()){
            $config_ids = $this->input->post('config_ids');
            $config_data = $this->input->post('config_data');
            if($this->db->query("UPDATE `bd_config` SET `config_desc`='".$config_data['config_desc']."',`config_value`='".$config_data['config_value']."' WHERE `id`=".$config_ids)){
                echo json_encode(array('code'=>1,'msg'=>'保存成功'));
            } else {
                echo json_encode(array('code'=>0,'msg'=>'保存失败'));
            }
            
        } else {
            exit(json_encode(array('code'=>-100,'msg'=>'非法访问')));
        }
    }
    
    /**
     * ajax方式添加邮件
     */
    public function ajaxAddEmail(){
        if(isAjax()){
            $validator = array(
                '邮件名'=>array('required'=>true,'minLength'=>2,'maxLength'=>20),
                '邮件标题'=>array('required'=>true),
                '邮件正文'=>array('required'=>true)
            );
            $emailName = $this->input->post('emailName');
            $emailTitle = $this->input->post('emailTitle');
            $emailText = $this->input->post('emailText');
            $emailNote = $this->input->post('emailNote');
            $this->validate(array($emailName,'邮件名'),$validator);
            $this->validate(array($emailText,'邮件标题'), $validator);
            $this->validate(array($emailText,'邮件正文'), $validator);
            $insertResult = $this->db->query("INSERT INTO `bd_email`(`name`,`title`,`content`,`note`) VALUES('".$emailName."','".$emailTitle."','".$emailText."','".$emailNote."')");
            if($insertResult){
                echo json_encode(array('code'=>1,'msg'=>'添加成功'));
            } else {
                echo json_encode(array('code'=>0,'msg'=>'添加失败'));
            }
        } else {
            exit(json_encode(array('code'=>-1,'msg'=>'非法访问')));
        }
    }
    
    /**
     * 数据验证方法
     */
    private function validate($data,$validator){
        if(is_array($data)){
            if(isset($data[1]) && is_array($validator[$data[1]])){
                foreach ($validator[$data[1]] as $_valid_key=>$_valid_value){
                    switch ($_valid_key){
                        case 'required':
                            if($_valid_value && empty($data[0])){
                                exit(json_encode(array('code'=>-1,'msg'=>$data[1].'不能为空')));
                            }
                            break;
                        case 'minLength':
                            if(strlen($data[0]) < intval($_valid_value)){
                                exit(json_encode(array('code'=>-2,'msg'=>$data[1].'长度低于'.$_valid_value.'个字符')));
                            }
                            break;
                        case 'minLength':
                            if(strlen($data[0]) < intval($_valid_value)){
                                exit(json_encode(array('code'=>-2,'msg'=>$data[1].'长度低于'.$_valid_value.'个字符')));
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        } else {
            throw new Exception('待验证参数错误');
        }
    }
}
?>
